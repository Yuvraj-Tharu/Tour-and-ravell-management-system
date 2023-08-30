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

// Get the modal
var modal = document.getElementById("modal");

// Get the button that opens the modal
var btn = document.getElementById("Btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
  modal.style.display = "none";
}
};