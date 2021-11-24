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
        if (password.value < 5) {
            password.style.border = "1px solid green";
            password.style.borderRadius = "5px";
        } else {
            password.style.border = "1px solid red";
            password.style.borderRadius = "5px";
        }

    }

    confirmPassword.onkeyup = function() {
        if (password.value != confirmPassword.value) {
            password.style.border = "1px solid red";
            password.style.borderRadius = "5px";

            confirmPassword.style.border = "1px solid red";
            confirmPassword.style.borderRadius = "5px";
        } else if (password.value == confirmPassword.value && password.value < 5 || confirmPassword.value < 5) {
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
                // if($.isEmptyObject(result.error)){

                //     $("#next1").css("pointerEvents", "auto");


                // }else{
                //     // $("#next1").css("pointerEvents", "none");
                //     // $("#errorResult").css('display','block');
                //     // result.error.forEach(element => {
                //     //     $('#errorResult ul').append('<li>' + element + '</li>')
                //     // });

                // }
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

            }
        });
    }


    


    form1.onkeyup = function() {
        if (!$("#Fname").val() || !$("#Lname").val() || !$("#birthdate").val() || !$("#region").val() || !$("#country").val() || !$("#pnonenumber").val() || !$("#confirm-password").val() || !$("#password").val() || !$("#Email").val()) {
            $("#next1").css("pointerEvents", "none")
        } else {
            $("#next1").css("pointerEvents", "auto");
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
            }
        });
    }
    $("#next3").click(function()
            {
                stepThree();
            });

    form4.onmouseover = function() {

        if ($('#lang1').find(":selected").text() == "" || $('#Speaking1').find(":selected").text() == "" || $("#Writting1").find(":selected").text() == "" || $("#Comprehension1").find(":selected").text() == "") {
            $("#next4").css("pointerEvents", "none")
        } else {
            $("#next4").css("pointerEvents", "auto")
        }
    };


    function stepFour()
    {
        var langName =$('#lang1').find(":selected").text();
        var speaking = $('#Speaking1').find(":selected").text();
        var writting = $("#Writting1").find(":selected").text();
        var comprehension = $("#Comprehension1").find(":selected").text();

        

        var lang = [langName,speaking,writting,comprehension];
        var langauges = lang.join();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            data:{
                langauges : langauges,
                step : 4
            },
            
            url: "/steps", 
            success: function(result){
               console.log(result)
            }
        });
    }
    $("#next4").click(function()
            {
                stepFour();
            });

    form5.onmouseover = function() {
        if (!$("#f01").files.length == 0 ||$("#f02").files.length == 0 || !$("#f03").files.length == 0 || !$("#f04").files.length == 0 || !$("#f05").files.length == 0()) {
            $("#submit-all-forms").css("pointerEvents", "none")
        } else {
            $("#submit-all-forms").css("pointerEvents", "auto")
        }
    };


});