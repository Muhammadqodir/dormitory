function submitBtn() {
    console.log(getCookie("cookie_name"));
    if (getCookie("cookie_name") != "cookie_value") {
        setCookie();
        var name = $("#name").val();
        var room = $("#room").val();
        var data = {
            "name": name,
            "room": room,
            "time": selected_time,
            "machines": JSON.stringify(selected)
        }
        console.log(data);
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

var selected = [];

function machineSelected(e, name) {
    if (selected.includes(name)) {
        removeItemOnce(selected, name);
    } else {
        if (selected.length >= 2) {
            var checkbox = $(e);

            // Ensures this code runs AFTER the browser handles click however it wants.
            setTimeout(function() {
                checkbox.removeAttr('checked');
            }, 0);
            alert("Можно выбрать максимум 2 машинки");
        } else {
            selected.push(name);
        }
    }
    console.log(selected);
}

function removeItemOnce(arr, value) {
    var index = arr.indexOf(value);
    if (index > -1) {
        arr.splice(index, 1);
    }
    return arr;
}