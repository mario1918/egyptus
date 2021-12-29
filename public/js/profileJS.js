$(document).ready(function() {


    $("#persons").keyup(function ()
    {
        var actTotal= 0;
        $("input:checkbox[class=activityChecked]:checked").each(function() {

            var split = $(this).val().split("=>");
            var trip = split[0];
            var act = split[1];
            var a = $("#actP"+ trip + act).val();

            actTotal+=parseFloat(a);
        });
        var persons = $("#persons").val();
        actTotal = actTotal * parseInt(persons);
        $("#total").empty();
        $("#total").append(actTotal);
    });


    function saveBooking()
    {
        var activities = [];
        $("input:checkbox[class=activityChecked]:checked").each(function(){
            activities.push($(this).val());
        });
        var tourguideId = $("#tourguideId").val();
        var persons = $("#persons").val();
        var hotel = $("#hotel-pickup").val();
        var notes = $("#notes").val();
        var date = $("#date").val();
        var priceTotal = $("#total").html();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            data:{
                tourguideId : tourguideId,
                activities: activities,
                persons: persons,
                hotel:hotel,
                notes:notes,
                date:date,
                priceTotal: priceTotal
            },

            url: "/booking",
            success: function(result){
                $("#book").fadeOut(500);
                $("#success-book").fadeIn(400);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $("#errorResult ul").empty();
                var result = XMLHttpRequest.responseJSON.errors;
                $("#errorResult").css('display','block');
                $.each(result, function( index, value ) {
                    $('#errorResult ul').append('<li>' + value[0] + '</li>')
                });
            }
        });
    };

    var date = document.getElementById('date');
    date.onchange = function ()
    {
        //Check whether valid dd/MM/yyyy Date Format.
        var parts = date.value.split("-");
        var dtDOB = new Date(parts[0] + "/" + parts[1] + "/" + parts[2]);
        var todayDate = new Date();
        if (todayDate > dtDOB) {

            $("#errorResult").empty();
            $("#errorResult").css("display",'block');
            $("#errorResult").append('<li>Please select coming date.</li>');
        }
        else{
            $("#errorResult ul").empty();
            $("#errorResult").css("display",'none');
        }

    };

    $("#sendBooking").click(function ()
    {
        $("#errorResult ul").empty();
        saveBooking();
    });



    var user_image = $(".user-image").attr("src");
    var trip_images_count = $("#trips_images").children('img').length;
    $("#edit_trips").click(function() {
        $(".pop-ups").css("display", "block")
    })

    $("#close_edittrips_button").click(function() {
        $(".pop-ups").css("display", "none");
    })

    $(".profile-settings img").click(function() {
        $(".profile-settings-dropdown ul").fadeToggle(500);
    })
    $(".profile-settings i").click(function() {
        $(".profile-settings-dropdown ul").fadeToggle(500);
    })

    $("#edit-profile-photo").click(function() {
        $(".pop-ups-2").fadeIn(500);

        // take the profile image and put it in the pop up
        $(".editable-photo").attr("src", user_image);
    })
    $(".close-edit-photo-popup").click(function() {
        $(".pop-ups-2").fadeOut(500);
    })

    // when Click On THE button the input of edititng photo will run

    $("#for-edit-photo-input").click(function() {
        $("#edit-profile-photo-input").click();
    })

    $("#edit-langs-btn").click(function() {
        $(".langs-pop-up").fadeIn(400);
    });
    $(".edit-langs-close-button").click(function() {
        $(".langs-pop-up").fadeOut(400);
    });
    $("#edit-Expertise-btn").click(function() {
        $(".Expertise-pop-up").fadeIn(400);
    });
    $(".edit-Expertise-close-button").click(function() {
        $(".Expertise-pop-up").fadeOut(400);
    });
    var c = $("#number").val();
    $("#edit-trip"+c).click(function() {
        $(".pop-ups").fadeOut(500).delay(500);
        $("#edit-trip-pop-up" + c).fadeIn(500);
    });

    $("#close_edittrip_button").click(function() {
        $(".edit-trip-pop-up").fadeOut(500);
    });

    $(".add-trip").click(function() {
        $(".pop-ups").fadeOut(500).delay(500);
        $(".add-trip-pop-up").fadeIn(500);
    });

    $("#close_addtrip_button").click(function() {
        $(".add-trip-pop-up").fadeOut(500);
    });

    $("#edit-profile-description").click(function() {
        $(".description-pop-up").fadeIn(500);
    });

    $(".edit-description-close-button").click(function() {
        $(".description-pop-up").fadeOut(500);
    });

    class CustomSelect {
        constructor(originalSelect) {
            this.originalSelect = originalSelect;
            this.customSelect = document.createElement("div");
            this.customSelect.classList.add("select");

            this.originalSelect.querySelectorAll("option").forEach((optionElement) => {
                const itemElement = document.createElement("div");

                itemElement.classList.add("select__item");
                itemElement.textContent = optionElement.textContent;
                this.customSelect.appendChild(itemElement);

                if (optionElement.selected) {
                    this._select(itemElement);
                }

                itemElement.addEventListener("click", () => {
                    if (
                        this.originalSelect.multiple &&
                        itemElement.classList.contains("select__item--selected")
                    ) {
                        this._deselect(itemElement);
                    } else {
                        this._select(itemElement);
                    }
                });
            });

            this.originalSelect.insertAdjacentElement("afterend", this.customSelect);
            this.originalSelect.style.display = "none";
        }

        _select(itemElement) {
            const index = Array.from(this.customSelect.children).indexOf(itemElement);

            if (!this.originalSelect.multiple) {
                this.customSelect.querySelectorAll(".select__item").forEach((el) => {
                    el.classList.remove("select__item--selected");
                });
            }

            this.originalSelect.querySelectorAll("option")[index].selected = true;
            itemElement.classList.add("select__item--selected");
        }

        _deselect(itemElement) {
            const index = Array.from(this.customSelect.children).indexOf(itemElement);

            this.originalSelect.querySelectorAll("option")[index].selected = false;
            itemElement.classList.remove("select__item--selected");
        }
    }

    document.querySelectorAll(".custom-select").forEach((selectElement) => {
        new CustomSelect(selectElement);
    });


    var trips_activities_template = '<div class="add-activities">\
    <input type="text" placeholder="Activity Title" name="act-title-1">\
    <input type="number" placeholder="Activity Price" name="act-price-1">\
    </div>';

    var counter_act = 0;
    var widthSaveButton = -110;

    $("#add-activity").click(function() {
        counter_act++;
        var trips_activities_template = '<div class="add-activities">\
    <input type="text" required placeholder="Activity Title" name="act-title-' + counter_act + '">\
    <input type="number" required placeholder="Activity Price" name="act-price-' + counter_act + '">\
    </div>';
        $("#save-add-trips").css("bottom", widthSaveButton)
        document.getElementById("addd-trip").innerHTML += trips_activities_template;
        widthSaveButton += -110;

    })

});



function addAct(j)
{
    var act = '<div id="act'+j+'"><input type="text" id="actTitle'+j+'" placeholder="Activity Title" name="actTitle[]">\n' +
        '            <input type="text" id="actDes'+j+'" placeholder="Activity Description" name="actDes[]">\n' +
        '            <input type="number" id="actPrice'+j+'" placeholder="Activity Price" name="actPrice[]"></div>';

    $("#act").after(act);
}
var j = 0;

$("#addAct").click(function ()
{
    j++;
    addAct(j);
});

var count = $("#count").val();

$(".addAct").click(function ()
{
    count--;
    var act = '<div id="act'+count+'"><input type="text" id="actTitle'+count+'" placeholder="Activity Title" name="actTitle[]">\n' +
        '            <input type="text" id="actDes'+count+'" placeholder="Activity Description" name="actDes[]">\n' +
        '            <input type="number" id="actPrice'+count+'" placeholder="Activity Price" name="actPrice[]">' +
        '<input type="hidden" value="" name="actId[]"' +
        '</div>';

    $(".addAct").before(act);
});

// $('#addTrip').submit(function(event) {
//
//     event.preventDefault(); //this will prevent the default submit
//
//     // your code here (But not asynchronous code such as Ajax because it does not wait for a response and move to the next line.)
//
//     // $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
// })

var i = document.getElementById('count').value;

function addLang(i) {
    var append = '<br><div id="langDiv' + i + '" class="eduback">\n' +
        '                <select name="langName[]" id="lang' + i + '">\n' +
        '                    <option value="">Choose the language</option>\n' +
        '                    <option value="Arabic">Arabic</option>\n' +
        '                    <option value="English">English</option>\n' +
        '                    <option value="French">French</option>\n' +
        '                    <option value="German">German</option>\n' +
        '                    <option value="Hindi">Hindi</option>\n' +
        '                    <option value="Italian">Italian</option>\n' +
        '                    <option value="Korean">Korean</option>\n' +
        '                    <option value="Russian">Russian</option>\n' +
        '                    <option value="Spanish">Spanish</option>\n' +
        '                    <option value="Turkish">Turkish</option>\n' +
        '\n' +
        '                </select>\n' +
        '                <select name="speaking[]" id="Speaking' + i + '">\n' +
        '                    <option value="">Speaking Level</option>\n' +
        '                    <option value="Beginner">Beginner</option>\n' +
        '                    <option value="Elementary">Elementary</option>\n' +
        '                    <option value="Intermediate">Intermediate</option>\n' +
        '                    <option value="Upper-intermediate">Upper-intermediate</option>\n' +
        '                    <option value="Advanced">Advanced</option>\n' +
        '                    <option value="Proficiency">Proficiency</option>\n' +
        '                </select>\n' +
        '                <select name="writing[]" id="Writting' + i + '">\n' +
        '                    <option value="">Writting Level</option>\n' +
        '                    <option value="Beginner">Beginner</option>\n' +
        '                    <option value="Elementary">Elementary</option>\n' +
        '                    <option value="Intermediate">Intermediate</option>\n' +
        '                    <option value="Upper-intermediate">Upper-intermediate</option>\n' +
        '                    <option value="Advanced">Advanced</option>\n' +
        '                    <option value="Proficiency">Proficiency</option>\n' +
        '                </select>\n' +
        '                <select name="comprehension[]" id="Comprehension' + i + '">\n' +
        '                    <option value="">Comprehension Level</option>\n' +
        '                    <option value="Beginner">Beginner</option>\n' +
        '                    <option value="Elementary">Elementary</option>\n' +
        '                    <option value="Intermediate">Intermediate</option>\n' +
        '                    <option value="Upper-intermediate">Upper-intermediate</option>\n' +
        '                    <option value="Advanced">Advanced</option>\n' +
        '                    <option value="Proficiency">Proficiency</option>\n' +
        '                </select>\n' +
        '            </div>';
    i--
    $("#langDiv" + i +" ").after(append);
}
$("#addLang").click(function() {
    addLang(i)

});

// var langArray=[];
// function stepFour()
// {
//     var ii = document.getElementById('count').value;
//     for (j=1;j<=ii;j++)
//     {
//         var langName =$('#lang' + j).find(":selected").text();
//         var speaking = $('#Speaking' + j).find(":selected").text();
//         var writting = $("#Writting" + j).find(":selected").text();
//         var comprehension = $("#Comprehension" + j).find(":selected").text();
//
//         var lang = [langName,speaking,writting,comprehension];
//         var langauges = lang.join();
//         langArray.push(langauges);
//     }
//     $("#count").val(langArray);
//     // $.ajaxSetup({
//     //     headers: {
//     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     //     }
//     // });
//     // $.ajax({
//     //     type: 'post',
//     //     data:{
//     //         languages : langArray,
//     //         step : 4
//     //     },
//     //
//     //     url: "/editLang",
//     //     success: function(result){
//     //         window.
//     //         console.log(result);
//     //     }
//     // });
// }
// var ex = [];
// $("#expertises option:selected").map(function(){ ex.push(this.value) }).get().join(", ");
// // console.log($("#expertises option:selected"));
// function saveExpertise()
// {
//     var ex = [];
//     $("#expertises option:selected").map(function()
//     {
//         ex.push(this.value);
//     });
//     var expertises = ex.join(",");
//
//     // $.ajaxSetup({
//     //     headers: {
//     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     //     }
//     // });
//     // $.ajax({
//     //     type: 'post',
//     //     data:{
//     //         expertises : expertises,
//     //     },
//     //
//     //     url: "/saveExpertises",
//     //     success: function(result){
//     //         console.log(result);
//     //     }
//     // });
// }
