function CookiesSave(field, value) {
    document.cookie = field+"=" + value;
}

function CookiesDelete(field) {
    document.cookie = field+"=";
}

function RedirecticnTo(url) {
    window.location.href = url;
}