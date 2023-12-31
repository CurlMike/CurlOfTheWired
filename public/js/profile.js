let entriesBtn = document.getElementById("entriesBtn");
let likesBtn = document.getElementById("likesBtn");

entriesBtn.addEventListener("click", function() {
    entriesBtn.style.borderBottom = "4px solid #0000FF";
    entriesBtn.style.borderTop = "4px solid #0000FF";

    likesBtn.style.borderBottom = "none";
    likesBtn.style.borderTop = "none";
});

likesBtn.addEventListener("click", function() {
    likesBtn.style.borderBottom = "4px solid #0000FF";
    likesBtn.style.borderTop = "4px solid #0000FF";

    entriesBtn.style.borderBottom = "none";
    entriesBtn.style.borderTop = "none";
});