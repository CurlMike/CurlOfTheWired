var settingsModal = document.getElementById("settingsModal");
var deletebtn = document.getElementById("deleteAccountbtn");
var confirmedDeletebtn = document.getElementById("confirmedDeleteAccountbtn");
var closeModal = document.getElementById("closeModal");
var inputDelete = document.getElementById("deleteConfirm");
var sadText = document.getElementById("sadText");

deletebtn.addEventListener("click", function () {
    settingsModal.style.display = "block";

    inputDelete.addEventListener("input", function() {
        if (inputDelete.value === "I understand") {
            confirmedDeletebtn.classList.remove("bg-red-300", "border-red-500", "text-gray-400");
            confirmedDeletebtn.classList.add("bg-red-600", "border-white", "text-white");
            confirmedDeletebtn.removeAttribute("disabled");

            sadText.classList.remove("hidden");
        } else {
            confirmedDeletebtn.classList.add("bg-red-300", "border-red-500", "text-gray-400");
            confirmedDeletebtn.classList.remove("bg-red-600", "border-white", "text-white");
            confirmedDeletebtn.setAttribute("disabled", "disabled");

            sadText.classList.add("hidden");
        }
    });
});

closeModal.addEventListener("click", function() {
    settingsModal.style.display = "none";
});
