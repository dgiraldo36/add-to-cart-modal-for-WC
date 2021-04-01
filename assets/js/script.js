var atcw_wc_modal = document.getElementById("atcw-modal");
var atcw_wc_modal_onload = atcw_wc_modal.getAttribute("data-onload");

if (atcw_wc_modal_onload) {
  var atcw_wc_onload_callback = window[atcw_wc_modal_onload];
  if (typeof atcw_wc_onload_callback === "function") atcw_wc_onload_callback();
}

// Get the elements that closes the modal
var atcw_wc_span = document.getElementsByClassName("atcw-close")[0];
var atcw_wc_link = document.getElementsByClassName("atcw-close-link")[0];

// When the user clicks on <span> (x), close the modal
atcw_wc_span.onclick = function () {
  atcw_wc_modal_close();
};

// When the user clicks on <span> (x), close the modal
atcw_wc_link.onclick = function () {
  atcw_wc_modal_close();
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == atcw_wc_modal) {
    atcw_wc_modal_close();
  }
};

function atcw_wc_modal_close() {
  atcw_wc_modal.classList.toggle("ModalOpen");
  atcw_wc_modal.classList.toggle("ModalClosed");
  setTimeout(function () {
    document.getElementsByClassName(
      "woocommerce-notices-wrapper"
    )[0].style.display = "none";
  }, 400);
}

function atcw_open_modal() {
  atcw_wc_modal.classList.remove("ModalClosed");
  atcw_wc_modal.classList.add("ModalOpen");
  atcw_wc_modal.style.display = "block";
}
