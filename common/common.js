var SYMMETRIC_KEY = "hKGYOgnTVR8bOP0ViW7FFmX0q1x6ag6B";
var DIR_RESOURCE = "./../resource/profile/";

// class ErrorMessage {
//     static EXISTING_USERNAME = "This username was already been used!";
//     static INCORRECT_CREDENTIAL = "Incorrect Email Address or Password!";
//     static EMAIL_FAILED = "Unable to send en email, please try again later!";
//     static SCAN_FAILED = "Unable to scan the QR code, please try again later!";
//     static EXISTING_STUDENT_ID = "This student id was already been used!";
//     static EXISTING_EMAIL = "This email was already been used!";
// }

// class InvalidMessage {
//     static PASSWORD = "Invalid Password!";
//     static EMAIL_FORMAT = "Invalid email format, please us your BULSU email";
//     static EMAIL = "Invalid Email Address!";
// }

function populateTableData(data) {
    return "<td>" + data + "</td>";
}

function addCookie(key, value) {
    $.cookie(key, value);
}

function removeCookie(key, value) {
    $.removeCookie(key, value);
}

function removeCookieKey(key) {
    $.removeCookie(key);
}

function getCookie(key) {
    $.cookie(key);
}

function encrypt(value) {
    return CryptoJS.AES.encrypt(value, SYMMETRIC_KEY).toString();
}

function decrypt(value) {
    var bytes = CryptoJS.AES.decrypt(value, SYMMETRIC_KEY);
    return bytes.toString(CryptoJS.enc.Utf8);
}