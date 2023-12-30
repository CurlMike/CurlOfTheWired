var followForm = document.getElementById("followForm");
var unfollowForm = document.getElementById("unfollowForm");

var followBtn = document.getElementById("followBtn");
var unfollowBtn = document.getElementById("unfollowBtn");

var followerCounter = document.getElementById("followerCount");
var followerCount = Number(followerCounter.innerHTML);

var isAuth = document.getElementById("isAuth");

if (isAuth.value < 1) {
    window.onload = function() {
        var userfollows = document.getElementById("followsVar").value;

        if (userfollows) {
            followForm.classList.toggle("hidden");
        }
        else unfollowForm.classList.toggle("hidden");
    };
}
else {
    followForm.parentElement.classList.add("hidden");
}

followBtn.addEventListener("click", function (e) {
    e.preventDefault();
    var account_name = followBtn.getAttribute("account-name");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/user/" + account_name + "/follow");

    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

    const body = JSON.stringify({
        account_name: account_name
    });

    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 201) {
            followForm.classList.toggle("hidden");
            unfollowForm.classList.toggle("hidden");
            followerCount += 1;
            followerCounter.innerHTML = followerCount;
        }
        else {
            console.log("error");
        }
    };

    xhr.send(body);
});

unfollowBtn.addEventListener("click", function (e) {
    e.preventDefault();
    var account_name = unfollowBtn.getAttribute("account-name");

    var xhr = new XMLHttpRequest();
    xhr.open("DELETE", "/user/" + account_name + "/unfollow");

    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

    const body = JSON.stringify({
        account_name: account_name
    });

    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 201) {
            followForm.classList.toggle("hidden");
            unfollowForm.classList.toggle("hidden");
            followerCount -= 1;
            followerCounter.innerHTML = followerCount;
        }
        else {
            console.log("error");
        }
    };

    xhr.send(body);
});