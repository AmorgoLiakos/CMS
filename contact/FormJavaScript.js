function checkName(){
    var pattern = /^[A-Za-z\s\u0391-\u03C9\u03CC\u03CE\u038F\u03CD\u0388\u038A\u038E\u0389\u0386\u038C]+$/;

    var text = document.getElementById("name").value;

    if (text == "" || text == " ") {
        document.getElementById("name").style.borderColor = "red";
    } else {
        if (pattern.test(text) == true) {
            document.getElementById("name").style.borderColor = "green";
        } else {
            document.getElementById("name").style.borderColor = "red";
        }
    }

}

function checkSurname() {
    var pattern = /^[A-Za-z\s\u0391-\u03C9\u03CC\u03CE\u038F\u03CD\u0388\u038A\u038E\u0389\u0386\u038C]+$/;

    var text = document.getElementById("surname").value;

    if (text == "" || text == " ") {
        document.getElementById("surname").style.borderColor = "red";
    } else {
        if (pattern.test(text) == true) {
            document.getElementById("surname").style.borderColor = "green";
        } else {
            document.getElementById("surname").style.borderColor = "red";
        }
    }



}

function checkTel() {
    var tel = document.getElementById("tel").value;
    var pattern = /^[0-9]{10}$/;

    if (tel == " " || tel == "") {
        document.getElementById("tel").style.borderColor = "red";
    } else {
        if (pattern.test(tel) == true) {
            document.getElementById("tel").style.borderColor = "green";
        } else {
            document.getElementById("tel").style.borderColor = "red";
        }
    }
}

function checkEmail() {

    var mail = document.getElementById("email").value;
    var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (mail == "" || mail == " ") {
        document.getElementById("email").style.borderColor = "red";
    } else {
        if (pattern.test(mail) == true) {
            document.getElementById("email").style.borderColor = "green";
        } else {
            document.getElementById("email").style.borderColor = "red";
        }
    }

}


function checkAll() {

    var colorOne = document.getElementById("name").style.borderColor;

    var colorTwo = document.getElementById("surname").style.borderColor;

    var colorThree = document.getElementById("tel").style.borderColor;

    var colorFour = document.getElementById("email").style.borderColor;

    if (colorOne == "green" && colorTwo == "green" && colorThree == "green" && colorFour == "green") {
        document.getElementById("result").style.backgroundColor = "#416c00";
        document.getElementById("result").innerHTML = "Thank You For Contacting";

        return true;
    } else {
        document.getElementById("result").style.backgroundColor = "#416c00";
        document.getElementById("result").innerHTML = "Fill The Form Right";

        return false;
    }

}
