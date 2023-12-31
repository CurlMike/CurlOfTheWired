var searchbtn = document.getElementById("searchBtn");
var searchInputField = document.getElementById("searchInput");
var searchImage = document.getElementById("searchImage");

function searchUsers() {
    var searchInput = searchInputField.value;

    fetch('search/user?username=' + encodeURIComponent(searchInput), {
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
    })
    .then(response => {
        if (!response.ok && response.status === 422) {
            throw new Error("Search query left empty.");
        }
        return response.json();
    })
    .then(data => {
        if (data.html != "") {
            document.getElementById("searchResults").innerHTML = data.html;
            searchImage.classList.add("hidden");
        }
        else {
            document.getElementById("searchResults").innerHTML = "<p class='text-white font-semibold text-center mt-4 text-xl'>Nothing found that matches the query.</p>";
            searchImage.classList.remove("hidden");
        } 
    })
    .catch(error => {
        console.error(error);   
        document.getElementById("searchResults").innerHTML = "<p class='text-red-500 font-semibold text-center mt-4 text-xl'>You can't leave the search query empty!</p>";
        searchImage.classList.remove("hidden");
    });
}

searchInputField.addEventListener("focus", function () {
    searchInputField.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            searchUsers();
        }
    })
});

searchbtn.addEventListener("click", function (e) {
    e.preventDefault();
    searchUsers();
});

function copyUserLink(account_name) {
    let ctcModal = document.getElementById("copied-to-clipboard");
    let url = "localhost:8000/user/" + account_name;
    navigator.clipboard.writeText(url)
    .then(() => {
        console.log("copied to clipboard?");
        ctcModal.style.display = "flex";
        setTimeout(function () {
            ctcModal.style.display = "none";
        }, 3000);
    }).catch(err => {
        console.log("bruh");
    })
}