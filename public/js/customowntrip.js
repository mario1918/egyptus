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
        back4 = document.getElementById("back4"),
        Email = document.getElementById("email"),
        submitAllForms = document.getElementById("submit-all-forms"),
        progress = document.getElementById("progress"),
        birthdate = document.getElementById("birthdate"),
        dateflight = document.getElementById("dateflight"),
        yesradio = document.getElementById("yesradio"),
        noradio = document.getElementById("noradio"),
        flight = document.getElementById("flight"),
        timeflight = document.getElementById("timeflight"),
        yesradioadress = document.getElementById("yesradioadress"),
        noradioadress = document.getElementById("noradioadress"),
        adress = document.getElementById("adress"),
        yesradioassist = document.getElementById("yesradioassist"),
        noradioassist = document.getElementById("noradioassist"),
        bookingassistwarning = document.getElementById("bookingassistwarning"),
        bookinginfo = document.getElementById("bookinginfo"),
        bookingassist = document.getElementById("bookingassist");




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


    birthdate.onfocus = function() {
        birthdate.setAttribute("type", "date")

    }

    birthdate.onblur = function() {
        birthdate.setAttribute("type", "text")

    }
    dateflight.onfocus = function() {
        dateflight.setAttribute("type", "date")

    }
    dateflight.onblur = function() {
        dateflight.setAttribute("type", "text")

    }

    timeflight.onfocus = function() {
        timeflight.setAttribute("type", "time")

    }

    timeflight.onblur = function() {
        timeflight.setAttribute("type", "text")

    }
    yesradio.onclick = function() {
        yesradio.setAttribute("checked", "");
        if (noradio.hasAttribute("checked", "")) {
            noradio.removeAttribute("checked", "");
        }
        flight.style.display = ("block");
        $("#next2").css("pointerEvents", "none")



    }
    noradio.onclick = function() {
        noradio.setAttribute("checked", "");
        yesradio.removeAttribute("checked", "");
        flight.style.display = ("none");
        $("#next2").css("pointerEvents", "auto");
    }

    yesradioadress.onclick = function() {
        yesradioadress.setAttribute("checked", "");
        if (noradioadress.hasAttribute("checked", "")) {
            noradioadress.removeAttribute("checked", "");

        }
        $("#next3").css("pointerEvents", "none");
        adress.style.display = ("block");
        bookingassist.style.display = ("none");
        bookinginfo.style.display = ("none");
        bookingassistwarning.style.display = ("none");


    }
    noradioadress.onclick = function() {
        noradioadress.setAttribute("checked", "");
        yesradioadress.removeAttribute("checked", "");
        adress.style.display = ("none");
        bookingassist.style.display = ("block");

    }

    yesradioassist.onclick = function() {
        yesradioassist.setAttribute("checked", "");
        if (noradioassist.hasAttribute("checked", "")) {
            noradioassist.removeAttribute("checked", "");
        }
        bookingassistwarning.style.display = ("none");
        bookinginfo.style.display = ("block");
        $("#next3").css("pointerEvents", "none");

    }
    noradioassist.onclick = function() {
        noradioassist.setAttribute("checked", "");
        yesradioassist.removeAttribute("checked", "");
        bookingassistwarning.style.display = ("block");
        bookinginfo.style.display = ("none");
        $("#next3").css("pointerEvents", "auto");
    }

    form1.onkeyup = function() {
        if (!$("#Fname").val() || !$("#Lname").val() || !$("#birthdate").val() || !$("#country").val() || !$("#city").val() || !$("#email").val() || !$("#phonenumber").val()) {
            $("#next1").css("pointerEvents", "none")
        } else {
            $("#next1").css("pointerEvents", "auto")
        }
    };

    form2.onkeyup = function() {
        if (!$("#dateflight").val() || !$("#timeflight").val() || !$("#flightnumber").val()) {
            $("#next2").css("pointerEvents", "none")
        } else {
            $("#next2").css("pointerEvents", "auto")
        }
    };



    form3.onkeyup = function() {
        if (!$("#personsNumber").val() || !$("#roomsNumber").val() || !$("#budget").val() || !$("#stay").val() || !$("#preferedTown").val()) {
            $("#next3").css("pointerEvents", "none")
        } else {
            $("#next3").css("pointerEvents", "auto")
        }

        if (!$("#adressstay").val()) {

        } else {
            $("#next3").css("pointerEvents", "auto")
        }
    };










});