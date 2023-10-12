
function loadContent(url, event) {
    event.preventDefault();
    var xhr = new XMLHttpRequest();

    xhr.open("GET", url, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var mainContent = document.getElementById("mainContent");
            mainContent.innerHTML = xhr.responseText;
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };

    xhr.onerror = function () {
        console.error("Request failed");
    };

    xhr.send();
}
