//admin
const createButton = document.querySelector(".btn-create.user");

const createpopup = document.querySelector(".form_create.popup");
const editButton = document.querySelector(".edit-button");
const editpopup = document.querySelector(".form_update.popup");


createButton.addEventListener("click", function () {

    createpopup.style.display = "flex";
});
editButton.addEventListener('click', (event) => {
    event.preventDefault();

    editpopup.style.display = "flex";
    username = editButton.getAttribute("data-user");
    document.querySelector(".form_update #username").setAttribute("value", username);
    email = editButton.getAttribute("data-email");
    document.querySelector(".form_update #email").setAttribute("value", email);
    pass = editButton.getAttribute("data-pass");
    document.querySelector(".form_update #password").setAttribute("value", pass);
    const role = editButton.getAttribute("data-role");
    const roleSelect = document.getElementById("role");
    for (let i = 0; i < roleSelect.options.length; i++) {
        if (roleSelect.options[i].value === role) {
            roleSelect.selectedIndex = i;
            break;

        }
    };
});


const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})
const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');
searchButton.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
})
if (window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}
window.addEventListener('resize', function () {
    if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
})
const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
})
// tab
const tabContents = document.querySelectorAll(".tab-content");
const tabLinks = document.querySelectorAll(".side-menu a");

tabLinks.forEach((link) => {
    link.addEventListener("click", () => {
        // Loại bỏ lớp "active" từ tất cả các tab
        tabContents.forEach((content) => content.classList.remove("active"));

        // Lấy id hoặc data attribute của tab tương ứng
        const tabId = link.getAttribute("data-tab");

        // Tìm tab với id tương ứng và thêm lớp "active"
        const tab = document.getElementById(tabId);
        if (tab) {
            tab.classList.add("active");
        }
    });
});
const popups = document.querySelectorAll(".popup");
const closepopups = document.querySelectorAll(".bg-popup");
const btnpopups = document.querySelectorAll(".btnpopup");
btnpopups.forEach(btnpopup => {
    btnpopup.addEventListener('click', () => {

        popups.forEach(popup => {
            const computedStyle = getComputedStyle(popup);
            if (computedStyle.display !== "none") {
                const bgPopup = document.createElement('div');
                bgPopup.classList.add('bg-popup');
                document.getElementById("content").parentNode.insertBefore(bgPopup, document.getElementById("content").nextSibling);

                // Gán sự kiện click cho phần tử bgPopup
                bgPopup.addEventListener('click', () => {
                    // Đóng popup khi người dùng nhấp vào bgPopup
                    popup.style.display = "none";
                    bgPopup.style.display = "none";
                });
            }
        });
    });
})

const deleteButtons = document.querySelectorAll(".delete-user");
deleteButtons.forEach(deleteButton => {
    deleteButton.addEventListener('click', (event) => {
        event.preventDefault();
        const userName = deleteButton.getAttribute("data-user");

        Swal.fire({
            title: `Do you want to delete ${userName}?`,
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            denyButtonText: `Cancel`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= URLROOT ?>/backend'; //php 

            } else if (result.isDenied) {
                Swal.fire('Deletion canceled', '', 'info')
            }
        });
    });
});
//frontend

function loadContent(url, event) {
    // alert("lll");
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
