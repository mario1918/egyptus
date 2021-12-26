$(document).ready(function() {
    var form1 = document.getElementById("form1"),
        form2 = document.getElementById("form2"),
        form3 = document.getElementById("form3"),
        form4 = document.getElementById("form4"),
        form5 = document.getElementById("form5"),
        next1 = document.getElementById("next1"),
        next2 = document.getElementById("next2"),
        next3 = document.getElementById("next3"),
        next4 = document.getElementById("next4"),
        back1 = document.getElementById("back1"),
        back2 = document.getElementById("back2"),
        back3 = document.getElementById("back3"),
        submitAllForms = document.getElementById("submit-all-forms"),
        back4 = document.getElementById("back4"),
        Email = document.getElementById("Email"),
        password = document.getElementById("password"),
        confirmPassword = document.getElementById("confirm-password"),
        progress = document.getElementById("progress");


    submitAllForms.onclick = function() {
        $('#form1 #form2 #form3 #form4').submit();
    };


    next1.onclick = function() {
        form1.style.left = "-1500px";
        form2.style.left = "40px";
        progress.style.width = "240px";

    }

    back1.onclick = function() {
        form1.style.left = "40px";
        form2.style.left = "1500px";
        progress.style.width = "120px";
    }

    next2.onclick = function() {
        form2.style.left = "-1500px";
        form3.style.left = "40px";
        progress.style.width = "360px";
    }

    back2.onclick = function() {
        form2.style.left = "40px";
        form3.style.left = "1500px";
        progress.style.width = "240px";
    }

    next3.onclick = function() {
        form3.style.left = "-1500px";
        form4.style.left = "40px";
        progress.style.width = "480px";
    }

    back3.onclick = function() {
        form3.style.left = "40px";
        form4.style.left = "1500px";
        progress.style.width = "360px";
    }

    next4.onclick = function() {
        form4.style.left = "-1500px";
        form5.style.left = "40px";
        progress.style.width = "600px";
    }

    back4.onclick = function() {
        form4.style.left = "40px";
        form5.style.left = "1500px";
        progress.style.width = "480px";
        langArray = [];
    }




    Email.onkeyup = function() {
        if (Email.value.includes("@")) {
            Email.style.border = "1px solid green";
            Email.style.borderRadius = "5px";

        } else {
            Email.style.border = "1px solid red";
            Email.style.borderRadius = "5px";
        }
    };


    password.onkeyup = function() {
        if (password.value.length < 8) {
            $("#errorResult1").css("display",'block');
            $("#errorResult1").empty();
            $("#errorResult1").append('<li>Password must be more than 8 characters, has one upper letter and one number</li>');
            $("#next1").css("pointerEvents", "none");
            password.style.border = "1px solid red";
            password.style.borderRadius = "5px";
        } else {
            $("#errorResult1").empty();
            $("#errorResult1").css("display",'none');
            password.style.border = "1px solid green";
            password.style.borderRadius = "5px";
        }

    };
    confirmPassword.onkeyup = function() {

        if (password.value != confirmPassword.value) {
            password.style.border = "1px solid red";
            password.style.borderRadius = "5px";

            confirmPassword.style.border = "1px solid red";
            confirmPassword.style.borderRadius = "5px";
        } else if (password.value != confirmPassword.value && password.value.length <= 8 || confirmPassword.value.length <= 8) {
            password.style.border = "1px solid red";
            password.style.borderRadius = "5px";

            confirmPassword.style.border = "1px solid red";
            confirmPassword.style.borderRadius = "5px";


        } else {
            password.style.border = "1px solid green";
            password.style.borderRadius = "5px";

            confirmPassword.style.border = "1px solid green";
            confirmPassword.style.borderRadius = "5px";
        }
    };
    var phone = document.getElementById("phonenumber");
    phone.onkeyup = function() {
        if (phone.value.length > 15 || phone.value.length < 11) {
            $("#errorResult1").empty();
            $("#errorResult1").css("display",'block');
            $("#errorResult1").append('<li>Phone number must be  between 11 and 14 digits.</li>');
            $("#next1").css("pointerEvents", "none");
            phone.style.border = "1px solid red";
            phone.style.borderRadius = "5px";

        } else {
            $("#errorResult1").empty();
            $("#errorResult1").css("display",'none');
            phone.style.border = "1px solid green";
            phone.style.borderRadius = "5px";
        }
    };
    var birthdate = document.getElementById('birthdate');
    birthdate.onchange = function ()
    {
        //Check whether valid dd/MM/yyyy Date Format.
            var parts = birthdate.value.split("-");
            var dtDOB = new Date(parts[0] + "/" + parts[1] + "/" + parts[2]);
            var dtCurrent = new Date();
        console.log(dtCurrent.getFullYear()- dtDOB.getFullYear());
        if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
            $("#errorResult1").empty();
            $("#errorResult1").css("display",'block');
            $("#errorResult1").append('<li>Eligibility 18 years ONLY.</li>');
        }
        else{
            $("#errorResult1").empty();
            $("#errorResult1").css("display",'none');
        }

    };

    // var gradDate = document.getElementById('gradDate');
    // gradDate.onchange = function () {
    //     //Check whether valid dd/MM/yyyy Date Format.
    //     var parts = gradDate.value.split("-");
    //     var dtDOB = new Date(parts[0] + "/" + parts[1] + "/" + parts[2]);
    //     var dtCurrent = new Date();
    //     console.log(dtCurrent.getFullYear() - dtDOB.getFullYear());
    //     if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
    //         $("#errorResult1").empty();
    //         $("#errorResult1").css("display", 'block');
    //         $("#errorResult1").append('<li>Eligibility 18 years ONLY.</li>');
    //     } else {
    //         $("#errorResult1").empty();
    //         $("#errorResult1").css("display", 'none');
    //     }
    //
    // };
        var EduElement = '<div class="eduback">\
    <input type="text" placeholder="Degree" required>\
    <input type="text" placeholder="University" required>\
    <input type="date" placeholder="Gradutaion Year" required>\
    </div>';


    var eduelementfather = document.getElementById("eduback");

    $("#addedu").click(function() {
        eduelementfather.appendChild(EduElement);
    });

    $("[type=file]").on("change", function() {
        // Name of file and placeholder
        var file = this.files[0].name;
        var dflt = $(this).attr("placeholder");
        if ($(this).val() != "") {
            $(this).next().text(file);
        } else {
            $(this).next().text(dflt);
        }
    });

    function stepOne()
    {
        $('#errorResult1 ul').empty();
        var firstName = $("#Fname").val();
        var lastName = $("#Lname").val();
        var birthdate = $("#birthdate").val();
        var region = $("#region").val();
        var country = $("#country").val();
        var email = $("#Email").val();
        var password = $("#password").val();
        var phoneNo = $("#pnonenumber").val();
        var step = 1;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            data:{
                firstName : firstName,
                lastName: lastName,
                email: email,
                password:password,
                birthdate:birthdate,
                region:region,
                country:country,
                phoneNo: phoneNo,
                step: step,
            },

            url: "/steps",
            success: function(result){
                console.log(result);
                if($.isEmptyObject(result.error)){

                }else{
                    $("#errorResult1").css('display','block');
                    result.error.forEach(element => {
                        $('#errorResult1 ul').append('<li>' + element + '</li>')
                    });

                }
            }
        });
    }


    function stepTwo()
    {
        var work = $('#rec-work-experience').val();
        var jobTitle = $('#jobtitle').val();
        var yearExp = $('#yearExp:checked').val();

        var work_exp = [work,jobTitle,yearExp];
        var workExp = work_exp.join();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            data:{
                work_experience : workExp,
                step : 2
            },

            url: "/steps",
            success: function(result){
                console.log(result);
                if($.isEmptyObject(result.error)){

                }else{
                    $("#errorResult2").css('display','block');
                    result.error.forEach(element => {
                        $('#errorResult2 ul').append('<li>' + element + '</li>')
                    });

                }
            }
        });
    }
    function stepThree()
    {
        var degree = $("#degree-one").val();
        var uni = $("#university-one").val();
        var gradYear = $("#date-one").val();

        var edu = [degree,uni,gradYear];
        var education = edu.join();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            data:{
                education : education,
                step : 3
            },

            url: "/steps",
            success: function(result){
                console.log(result);
                if($.isEmptyObject(result.error)){

                }else{
                    $("#errorResult3").css('display','block');
                    result.error.forEach(element => {
                        $('#errorResult3 ul').append('<li>' + element + '</li>')
                    });

                }
            }
        });
    }

    function addLang(i) {
        var append = '<div id="langDiv ' + i + '" class="langDiv">\n' +
            '                <select name="langName" id="lang' + i + '">\n' +
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
            '                <select name="speaking" id="Speaking' + i + '">\n' +
            '                    <option value="">Speaking Level</option>\n' +
            '                    <option value="Beginner">Beginner</option>\n' +
            '                    <option value="Beginner">Elementary</option>\n' +
            '                    <option value="English">Intermediate</option>\n' +
            '                    <option value="English">Upper-intermediate</option>\n' +
            '                    <option value="French">Advanced</option>\n' +
            '                    <option value="Italian">Proficiency</option>\n' +
            '                </select>\n' +
            '                <select name="writting" id="Writting' + i + '">\n' +
            '                    <option value="">Writting Level</option>\n' +
            '                    <option value="Beginner">Beginner</option>\n' +
            '                    <option value="Beginner">Elementary</option>\n' +
            '                    <option value="English">Intermediate</option>\n' +
            '                    <option value="English">Upper-intermediate</option>\n' +
            '                    <option value="French">Advanced</option>\n' +
            '                    <option value="Italian">Proficiency</option>\n' +
            '                </select>\n' +
            '                <select name="comprehension" id="Comprehension' + i + '">\n' +
            '                    <option value="">Comprehension Level</option>\n' +
            '                    <option value="Beginner">Beginner</option>\n' +
            '                    <option value="Beginner">Elementary</option>\n' +
            '                    <option value="English">Intermediate</option>\n' +
            '                    <option value="English">Upper-intermediate</option>\n' +
            '                    <option value="French">Advanced</option>\n' +
            '                    <option value="Italian">Proficiency</option>\n' +
            '                </select>\n' +
            '            </div>'
        $("#langDiv").append(append);
    }
    var i = 1;
$("#addLang").click(function ()
{
    i++
    addLang(i);
});
    var langArray=[];
    function stepFour()
    {
        for (j=1;j<=i;j++)
        {
            var langName =$('#lang' + j).find(":selected").text();
            var speaking = $('#Speaking' + j).find(":selected").text();
            var writting = $("#Writting" + j).find(":selected").text();
            var comprehension = $("#Comprehension" + j).find(":selected").text();

            var lang = [langName,speaking,writting,comprehension];
            var langauges = lang.join();
            langArray.push(langauges);
        }
        console.log(langArray)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            data:{
                languages : langArray,
                step : 4
            },

            url: "/steps",
            success: function(result){
                console.log(result);
            }
        });
    }

    form1.onkeyup = function() {
        if (!$("#Fname").val() || !$("#Lname").val()  || !$("#region").val() || !$("#country").val() || !$("#phonenumber").val() || !$("#confirm-password").val() || !$("#password").val() || !$("#Email").val()) {
            $("#next1").css("pointerEvents", "none")
        } else {
            $("#next1").css("pointerEvents", "auto")
        }
    };

    $("#next1").click(function()
    {
        stepOne();
    });

    form2.onkeyup = function() {
        if (!$("#jobtitle").val()) {
            $("#next2").css("pointerEvents", "none")
        } else {
            $("#next2").css("pointerEvents", "auto")
        }
    };
    $("#next2").click(function()
    {
        stepTwo();
    });
    form3.onkeyup = function() {
        if (!$("#degree-one").val() || !$("#university-one").val()) {
            $("#next3").css("pointerEvents", "none")
        } else {
            $("#next3").css("pointerEvents", "auto")
        }
    };
    $("#next3").click(function()
    {
        stepThree();
    });
    form4.onkeyup = function() {
        if ($("#lang1").val() == "" || $("#Speaking1").val() == "" || $("#Writting1").val() == "" || $("#Comprehension1").val() == "") {
            $("#next4").css("pointerEvents", "none")
        } else {
            $("#next4").css("pointerEvents", "auto")
        }
    };

    $("#next4").click(function()
    {
        stepFour();
    });

    form5.onmouseover = function() {
        if (!$("#f02").val() || !$("#f03").val() || !$("#f04").val()) {
            $("#submit-all-forms").css("pointerEvents", "none")
        } else {
            $("#submit-all-forms").css("pointerEvents", "auto")
        }
    };


});
