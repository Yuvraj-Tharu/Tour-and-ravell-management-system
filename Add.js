function openModal() {
    var model = document.getElementById("modal");
    if (model.style.display == "none") {
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

function openModal() {
  var update = document.getElementById("update");
  if (update.style.display == "none") {
    update.style.display = "block";
  } else {
    update.style.display = "none";
  }
}

// Get the modal
var update = document.getElementById("update");

// Get the button that opens the modal
var edit = document.getElementById("edit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
edit.onclick = function() {
  update.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  update.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == update) {
    update.style.display = "none";
  }
};

function openModal() {
  var cancel = document.getElementById("delete");
  if (cancelel.style.display == "none") {
    cancel.style.display = "block";
  } else {
    cancel.style.display = "none";
  }
}

// Get the modal
var cancel = document.getElementById("cancel");

// Get the button that opens the modal
var dlt = document.getElementById("delete");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
dlt.onclick = function() {
  cancel.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  cancel.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == cancel) {
    cancel.style.display = "none";
  }
};