console.log("js successfully loaded");

document.addEventListener('DOMContentLoaded', function() {
    checkForm();
});

function checkForm() {
    checkWords();
    checkPassword();
    checkPhoneNumber();
    checkEmailAddress();
    checkZipcode();
}
// https://regex101.com/
// https://regexr.com/

function checkWords() {
    var word = document.getElementById("name").value;
    var wordRegex = new RegExp(/(^(\w+\s).+$)/g);

    checkRegex(word, wordRegex, 'nameLabelID');
}

function checkPassword() {
    var password = document.getElementById("password").value;

    // "^$" whole string and needs to end with /gm, m means multiline, "?=.*" look for one or more of the following occourence, the ".*" means any char except line break
    var passwordRegex = new RegExp(/((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\w).[\S]{8,})/g);

    checkRegex(password, passwordRegex, 'passwordLabelID');
}

function checkPhoneNumber() {
    var phoneNumber = document.getElementById("phone").value;
    var phoneNumberRegex = new RegExp(/(?:\+)(?:[0-9]{8,30})/g);

    checkRegex(phoneNumber, phoneNumberRegex, 'phoneLabelID');
}

function checkEmailAddress() {
    var email = document.getElementById("email").value;
    var emailRegex = new RegExp(/(\b[\w\.-]+@[\w\.-]+\.\w{2,10}\b)/gi);

    checkRegex(email, emailRegex, 'emailLabelID');
}

// Use let as a attribute for the function, like private. 

function checkZipcode() {
    var zipcode = document.getElementById("zip").value;
    var zipcodeRegex = new RegExp(/^\d{4}$/gm);

    checkRegex(zipcode, zipcodeRegex, 'zipLabelID');
}

function checkRegex(element, regexObject, labelID) {

    if (regexObject.test(element)) {
        changeLabelColor(labelID, "green");
        return true;

    } else {
        changeLabelColor(labelID, "red");
        return false;
    }
}

function changeLabelColor(labelName, color) {
    return document.getElementById(labelName).style.color = color;
}