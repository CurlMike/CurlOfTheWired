function likeDislikeEntry(entry_id, action) {
    
    let method = action === 'like' ? 'POST' : 'DELETE';
    let likebtn = document.getElementById("likeBtn-" + entry_id);
    let likeCounter = document.getElementById("likeCounter-" + entry_id);
    let likeIcon = document.getElementById("likeIcon-" + entry_id);
    
    let xhr = new XMLHttpRequest();
    xhr.open(method, "/entry/" + entry_id + "/" + action);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

    const body = JSON.stringify({
        entry_id: entry_id
    });

    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 201) {
            if (action === 'like') {
                likebtn.setAttribute("onclick", "likeDislikeEntry(" + entry_id + ", 'dislike')");
                likeIcon.classList.remove("fa-regular");
                likebtn.classList.remove("hover:text-red-500");
                likebtn.classList.remove("text-gray-500");
                likebtn.classList.add("text-red-500");
                likebtn.classList.add("hover:text-gray-500");
                likeIcon.classList.add("fa-solid");
                likeCounter.innerHTML = Number(likeCounter.innerHTML) + 1; 
            }
            else {
                likebtn.setAttribute("onclick", "likeDislikeEntry(" + entry_id + ", 'like')");
                likeIcon.classList.add("fa-regular");
                likebtn.classList.add("hover:text-red-500");
                likebtn.classList.add("text-gray-500");
                likebtn.classList.remove("text-red-500");
                likebtn.classList.remove("hover:text-gray-500");
                likeIcon.classList.remove("fa-solid");
                likeCounter.innerHTML = Number(likeCounter.innerHTML) - 1; 
            }
        }
        else {
            console.log("error");
        }
    }

    xhr.send(body);
}

function copyToClipboard(entry_id) {
    let ctcModal = document.getElementById("copied-to-clipboard"); 
    let url = "localhost:8000/entry/" + entry_id;
    navigator.clipboard.writeText(url)
    .then (() => {
        console.log("copied to clipboard?");
        ctcModal.style.display = "flex";
        setTimeout(function () {
            ctcModal.style.display = "none";
        }, 3000);
    })
    .catch(err => {
        console.log("bruh");
    });
}