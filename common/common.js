var SYMMETRIC_KEY = "hKGYOgnTVR8bOP0ViW7FFmX0q1x6ag6B";
var DIR_RESOURCE = "./../resource/profile/";

function populateTableData(data){
    return "<td>"+data+"</td>";
}

function addCookie(key, value){
    $.cookie(key,value);
}

function removeCookie(key, value){
    $.removeCookie(key,value);
}

function removeCookieKey(key){
    $.removeCookie(key);
}

function getCookie(key){
    $.cookie(key);
}

function encrypt(value){
    return CryptoJS.AES.encrypt(value, SYMMETRIC_KEY).toString();
}

function decrypt(value){
    var bytes = CryptoJS.AES.decrypt(value, SYMMETRIC_KEY);
    return bytes.toString(CryptoJS.enc.Utf8);
}