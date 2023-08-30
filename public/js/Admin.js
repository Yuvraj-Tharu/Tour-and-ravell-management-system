let list = document.querySelectorAll(".navigation li");

function activelink(){
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovererd");
}

list.forEach((item) => item.addEventListener("mouseover", activelink));

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};

// PROFILE DROPDOWN
const profile = document.querySelector(".profile");
const imgProfile = profile.querySelector("img");
const dropdownProfile = profile.querySelector(".profile-link");

imgProfile.addEventListener("click", function () {
    dropdownProfile.classList.toggle("show");
});

window.addEventListener("click", function (e) {
    if (e.target !== imgProfile) {
        if (e.target !== dropdownProfile) {
            if (dropdownProfile.classList.contains("show")) {
                dropdownProfile.classList.remove("show");
            }
        }
    }
});

