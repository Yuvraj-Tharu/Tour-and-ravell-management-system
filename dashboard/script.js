let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");

let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");

let menu = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");
let videoBtn = document.querySelectorAll(".vid-btn");

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
  loginForm.classList.remove("active");
};

menu.addEventListener("click", () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
});

searchBtn.addEventListener("click", () => {
  searchBtn.classList.toggle("fa-times");
  searchBar.classList.toggle("active");
});

formBtn.addEventListener("click", () => {
  loginForm.classList.add("active");
});

formClose.addEventListener("click", () => {
  loginForm.classList.remove("active");
});

videoBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".controls .active").classList.remove("active");
    btn.classList.add("active");
    let src = btn.getAttribute("data-src");
    document.querySelector("#video-slider").src = src;
  });
});

//settings buttons

var settingBtn = document.getElementById("setting-btn");
var settingMenu = document.getElementById("setting-menu");

settingBtn.addEventListener("mouseenter", function () {
  settingMenu.classList.add("show");
});

settingMenu.addEventListener("mouseleave", function () {
  settingMenu.classList.remove("show");
});

// profile settings

function goToProfileSettings() {
  window.location.href = "profile-settings.html"; // Replace with the URL of your profile settings page
}

//logout settings
function showLogoutConfirmation() {
  document.getElementById("logout-confirmation").style.display = "block";
}

function hideLogoutConfirmation() {
  document.getElementById("logout-confirmation").style.display = "none";
}

function logout() {
  // Perform logout action here
  console.log("Logout successful.");
  hideLogoutConfirmation();
}
