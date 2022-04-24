/** 
* On Signin Submit
* This Function Will Trigger And Check All Validation
* Return true if Validation is Success
* Return false if Validation is not True
*/
let url =  "ajax.php";

function signInValidation(errorElementId) {


    let result = "";
    let email = document.getElementById("signin-email");
    let password = document.getElementById("signin-password");
    let error = document.getElementById(errorElementId);
    let ok = true;
    if (!validateEmail(email.value, "signin-email-error")) {
        email.focus();
        ok = false;
    }
    else if (!validatePassword(password.value, "signin-password-error")) {
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
* On Signup Submit
* This Function Will Trigger And Check All Validation
* Return true if Validation is Success
* Return false if Validation is not True
*/
function signUpValidation() {
    let fullname = document.getElementById("signup-fullname");
    let password = document.getElementById("signup-password");
    let confirm_password = document.getElementById("signup-confirm-password");
    let email = document.getElementById("signup-email");
    let checkbox = document.getElementById("signup-check");
    let ok = true;
    if (!validateFullName(fullname.value, "signup-fullname-error")) {
        fullname.focus();
        ok = false;
    }
    if (!validateEmailAndAvailability(email.value, "signup-email-error")) {
        email.focus();
        ok = false;
    }
    if (!validatePassword(password.value, "signup-password-error")) {
        password.focus();
        ok = false;

    }
    if (!validateConfirmPassword(confirm_password.value, "signup-confirm-password-error", "signup-password")) {
        confirm_password.focus();
        ok = false;

    }
    if (checkbox.checked === false) {
        ok = false;
    }

    return ok;
}

/**
 * Return True If Email :
 * 1- Not Empty.
 * 2- No Special Character Except Underscore.
 * @param  value Element Which Need To Validate. 
 * @param  errorElementId Element ID To Put Error Message Inside It.
 */
function validateEmail(value, errorElementId) {
    let result = "";
    if (value.trim() === "") {
        result = "This Field Must Be Filled"

    }
    else if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ig.test(value.trim()) === false) {
        result = "Email Address Not valid";
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
 * Return True If Email :
 * 1- Not Empty
 * 2- At Least 8 Characters
 * 3- Email Not Exist In Database
 * @param  value Element Which Need To Validate. 
 * @param  errorElementId Element ID To Put Error Message Inside It.
 */
function validateEmailAndAvailability(value, errorElementId) {
    let error = document.getElementById(errorElementId);
    let notIcon = error.parentElement.querySelector("i");
    let result = "";

    if (validateEmail(value, errorElementId)) {
        /* Connect To Database Using AJAX To Check If Email Is Available */
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState = 4 && xhttp.status == 200) {
                if (xhttp.responseText === "true") {
                    result = "Email Not Available";
                }
            }
            else {
                ok = false;
            }
        };
        /* Use Post For More Secure */
        xhttp.open("POST", url, false);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send("action=is_email_exist&email=" + value);


        if (result.length > 0) {
            notIcon.classList.add("active");
            error.innerText = result;
        }
        else {
            notIcon.classList.remove("active");
            error.innerText = result;
        }
    }
    return (result.length == 0) ? true : false;
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

/**
 * Return True If Name :
 * 1- Not Empty.
 * 2- No Special Characters.
 * @param  value Element Which Need To Validate. 
 * @param  errorElementId Element ID To Put Error Message Inside It.
 */
function validateFullName(value, errorElementId) {

    let result = "";
    if (value.trim() === "") {
        result = "This Field Must Be Filled"

    }
    else if (/[^0-9a-zA-z ]/ig.test(value.trim())) {
        result = "Special Character Are Not Allowed";
    }
    else if (splitName(value)['firstname'].length === 0 || splitName(value)['lastname'].length === 0) {
        result = "Please Enter Full Name";
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

/**
 * Return True If Passwords Match And False OtherWise 
 * @param value Element Which Need To Validate. 
 * @param errorElementId Element ID To Put Error Message Inside It.  
 * @param PasswordElementId Password Element To Match With It. 
 */
function validateConfirmPassword(value, errorElementId, PasswordElementId) {

    let result = "";
    if (value.trim() === "") {
        result = "Must be Filled Out!";
    }
    else if (document.getElementById(PasswordElementId).value !== value.trim()) {
        result = "Passwords Not Matchs!";

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

/**  
 * Utility Function Split Fullname Into First Name And Last Name And Return Them As Object.
 * @param fullname The Entire Name.   
 **/
function splitName(fullname) {

    let firstname = fullname.substring(0, fullname.indexOf(" "));
    let lastname = fullname.substring(fullname.lastIndexOf(" ") + 1, fullname.length);
    return {
        'firstname': firstname,
        'lastname': lastname
    };
}