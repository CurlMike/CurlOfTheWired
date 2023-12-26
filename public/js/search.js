var searchbtn = document.getElementById("searchBtn");
var searchInputField = document.getElementById("searchInput");

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
        }
        else document.getElementById("searchResults").innerHTML = "<p class='text-white text-center mt-4 text-xl'>Nothing found that matches the query.</p>";
    })
    .catch(error => {
        console.error(error);   
        document.getElementById("searchResults").innerHTML = "<p class='text-red-500 text-center mt-4 text-xl'>You can't leave the search query empty!</p>";
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