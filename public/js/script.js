//admin

const createButtons = document.querySelectorAll(".btn-create");
const editButtons = document.querySelectorAll(".edit-button");
console.log(createButtons);
createButtons.forEach(createButton => {
    createButton.addEventListener("click", function () {
        const formId = createButton.getAttribute("data-form");
        const createpopup = document.querySelector(`.${formId}`);
        createpopup.style.display = "flex";
    });
});
editButtons.forEach(editButton => {
    editButton.addEventListener('click', (event) => {
        event.preventDefault();

        const formId = editButton.getAttribute("data-form");
        const editpopup = document.querySelector(`.${formId}`);
        editpopup.style.display = "flex";

        const formUpdate = document.querySelector(".form_update");

        // Lấy tất cả các thuộc tính data-* của nút chỉnh sửa
        const dataAttributes = editButton.dataset;

        // Duyệt qua tất cả thuộc tính data-* và đặt giá trị cho các trường trong biểu mẫu chỉnh sửa
        for (let key in dataAttributes) {
            if (dataAttributes.hasOwnProperty(key)) {
                const value = dataAttributes[key];
                console.log(value);
                const inputField = formUpdate.querySelector(`[data-field="${key}"]`);
                if (inputField) {
                    if (inputField.tagName === 'SELECT') {
                        const selectOptions = inputField.options;
                        for (let i = 0; i < selectOptions.length; i++) {
                            if (selectOptions[i].value === value) {
                                selectOptions[i].selected = true;
                                break;
                            }
                        }
                    } else {

                        inputField.value = value;
                    }
                }
            }
        }
    });
});


const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
const activenav = document.querySelector(".activenav");

allSideMenu.forEach(item => {
    const li = item.parentElement;

    if (item.textContent.trim() === activenav.textContent) {

        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    }
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
// const activenav = document.querySelector(".activenav");

// const tabContents = document.querySelectorAll(".tab-content");
// const tabLinks = document.querySelectorAll(".side-menu a");

// tabLinks.forEach((link) => {
//     console.log(activenav.textContent)
//     if (link.textContent === activenav.textContent) {
//         // Loại bỏ lớp "active" từ tất cả các tab
//         tabContents.forEach((content) => content.classList.remove("active"));

//         // Lấy id hoặc data attribute của tab tương ứng
//         const tabId = link.getAttribute("data-tab");

//         // Tìm tab với id tương ứng và thêm lớp "active"
//         const tab = document.getElementById(tabId);
//         if (tab) {
//             tab.classList.add("active");
//         }
//     }
// });

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
// upfile
var fileInputs = document.querySelectorAll('.form-input-file');
fileInputs.forEach(fileInput => {
    fileInput.addEventListener('change', function (e) {
        console.log(fileInput.className);
        const fileInputText = document.querySelector('.file_update >.form-input--file-text');
        console.log(fileInputText);
        var value = e.target.value.length > 0 ? e.target.value : fileInputTextContent;
        fileInputText.value = value.replace('C:\\fakepath\\', '');

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
