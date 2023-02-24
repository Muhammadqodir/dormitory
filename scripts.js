function submitBtn() {
    console.log(getCookie("cookie_name"));
    if (getCookie("cookie_name") != "cookie_value") {
        setCookie();
        alert("ok");
    } else {
        alert("already booked");
    }
}

function setCookie() {
    document.cookie = 'cookie_name=cookie_value; max-age=20; path=/';
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}