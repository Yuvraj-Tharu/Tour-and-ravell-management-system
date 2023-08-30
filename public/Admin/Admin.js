var list = document.querySelectorAll(".navigation li");

function activelink(){
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovererd");
}

list.forEach((item) => item.addEventListener("mouseover", activelink));

var toggle = document.querySelector(".toggle");
var navigation = document.querySelector(".navigation");
var main = document.querySelector(".main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};

//logout settings
function showLogoutConfirmation() {
  document.getElementById("logout-confirmation").style.display = "block";
}

function hideLogoutConfirmation() {
  document.getElementById("logout-confirmation").style.display = "none";
}

function logout() {
  hideLogoutConfirmation();
}

window.onresize = function() {
  var modal = document.getElementById("modal");
  var top = (window.innerHeight - modal.offsetHeight) / 2;
  var left = (window.innerWidth - modal.offsetWidth) / 2;
  modal. style.top = top + "px";
  modal. style. left = left + "px";
};

function openModal() {
  var model = document.getElementById("modal");
  if (model.style.display === "none") {
    model.style.display = "block";
  } else {
    model.style.display = "none";
  }
}