function RedirectionTo(url) {
    window.location.href = url;
}

function SaveCookie(field, value) {
    document.cookie = field+"=" + value;
}

function DeleteCookie(field) {
    document.cookie = field+"=";
}

/**
 * @return {string}
 * @return {string}
 */
function GetCookie(field) {
    var name = field + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/**
 * @return {boolean}
 * @return {boolean}
 */
function IsLogged() {
    return GetCookie("user").length > 0;
}

function VerifyLogged() {
    if (window.location.href!=GetBaseURL()+"login" && !IsLogged()) {
        RedirectionTo(GetBaseURL()+"login");
    }
    else if (window.location.href==GetBaseURL()+"login" && IsLogged()) {
        RedirectionTo(GetBaseURL());
    }
}

$(document).ready(function() {
    VerifyLogged();
});