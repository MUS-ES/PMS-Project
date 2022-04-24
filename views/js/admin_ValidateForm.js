

function validate(){
    let result = "";
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let error = document.getElementById(errorElementId);
    let ok = true;

    if (!validateUserName(username.value, "username-error")) {
        username.focus();
        ok = false;
    }
    if (!validatePassword(password.value, "password-error")) {
        password.focus();
        ok = false;

    }
    if (result.length !== 0) {
        error.innerText = result;
        error.classList.add("active");
    }
    else {
        error.classList.remove("active");
    }

    return ok;
}


/**
 * Return True If Username :
 * 1- Not Empty.
 * 2- No Special Character Except Underscore.
 * @param  value Element Which Need To Validate. 
 * @param  errorElementId Element ID To Put Error Message Inside It.
 */
function validateUserName(value, errorElementId) {
    let result = "";
    if (value.trim() === "") {
        result = "This Field Must Be Filled";

    }
   
    else if (/\W/ig.test(value.trim())) {
        result = "Only Under Score Is Allowed";

    }
    let error = document.getElementById(errorElementId);
    let notIcon = error.parentElement.querySelector("i");
    if (result.length > 0) {

        notIcon.classList.add("active");
        error.innerText = result;
    }
    else {

        notIcon.classList.remove("active");
        error.innerText = "";

    }
    return (result.length === 0) ? true : false;
}


/**
 * Return True If Password :
 * 1- Not Empty
 * 2- At Least 8 Characters
 * 3- No Spaces
 * @param  value Element Which Need To Validate. 
 * @param  errorElementId Element ID To Put Error Message Inside It.
 */
function validatePassword(value, errorElementId) {
    let result = "";

    //Empty Value Validate
    if (value.trim() === "") {
        result = "This Field Must Be Filled";
    }
    else if (/\s/.test(value.trim())) {

        result = "Spaces is Not Allowed!";
    }
    else if (value.length < 8) {
        result = "At Least 8 Characters!";

    }
    else {
        result = "";
    }
    let error = document.getElementById(errorElementId);
    let notIcon = error.parentElement.querySelector("i");
    if (result.length > 0) {

        notIcon.classList.add("active");
        error.innerText = result;
    }
    else {

        notIcon.classList.remove("active");
        error.innerText = "";

    }
    return (result.length == 0) ? true : false;
}