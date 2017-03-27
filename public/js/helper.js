function RedirectionTo(url) {
    window.location.href = url;
}

function SaveCookie(field, value) {
    document.cookie = field+"=" + value;
}

function DeleteCookie(field) {
    document.cookie = field+"=";
}

function GetBaseURL() {
    var url = window.location.href.split("/public")[0];
    if (!(url[url.length-1] == '/')) url += "/";
    url += "public/";
    return url;
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
 * @return {null}
 */
function GetUser() {
    if (IsLogged()) {
        return JSON.parse(GetCookie("user"));
    }
    return null;
}

/**
 * @return {boolean}
 * @return {boolean}
 */
function IsLogged() {
    return GetCookie("user").length > 0;
}

function VerifyLogged() {

    if(window.location.href != GetBaseURL() + "forgotPassword"){


        if (window.location.href != GetBaseURL() + "login" && !IsLogged()) {
            RedirectionTo(GetBaseURL() + "login");
        }
        else if (window.location.href == GetBaseURL() + "login" && IsLogged()) {
            RedirectionTo(GetBaseURL());
        }
    }

}

function MyUser() {
    if( GetUser() != null )
    {
        //$('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
        $('#userInfo').html(GetUser().name + ' <i class="fa fa-angle-down"></i>');

        if(GetUser().photo == 1){
            var photoRoute = "images/profiles/";
            var namePhoto = GetUser().namePhoto;
            var res = photoRoute.concat(namePhoto);
            // console.log(res);
            $('#userPhoto').attr("src",res);
        }

    }
    
}
$(document).ready(function() {
    VerifyLogged();
});


//Index
