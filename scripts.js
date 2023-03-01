function submitBtn() {
    console.log(getCookie("cookie_name"));
    if (getCookie("cookie_name") != "cookie_value") {
        setCookie();
        var data = getData();
        if (validateData(data)) {
            sendToServer(data);
        } else {
            alert("Заполните все поля!");
        }
    } else {
        alert("Вы уже бронировали ранее");
    }
}

function sendToServer(data) {
    // var data = new FormData();
    // data.append('name', data["name"]);
    // data.append('room', data["room"]);
    // data.append('time', data["time"]);
    // data.append('machines', data["machines"]);

    // var xhr = new XMLHttpRequest();
    // xhr.open('POST', '', true);
    // xhr.onload = function() {
    //     // do something to response
    //     console.log(this.responseText);
    // };
    // xhr.send(data);
    var url = "https://abduvoitov.uz/dormitory/add_book.php?name=" + data["name"] + "&room=" + data["name"] + "&time=" + data["time"] + "&machines=" + data["machines"];
    var encoded = encodeURI(url);
    location.href = encoded;
}

function validateData(data) {
    var machines = JSON.parse(data["machines"]);
    if (data["name"] != "" && data["room"] != "" && machines.length != 0 && machines.length <= 2) {
        return true;
    }
    return false;
}

function getData() {
    var name = $("#name").val();
    var room = $("#room").val();
    var data = {
        "name": name,
        "room": room,
        "time": selected_time,
        "machines": JSON.stringify(selected)
    }
    return data;
}

function setCookie() {
    document.cookie = 'cookie_name=cookie_value; max-age=3600; path=/';
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