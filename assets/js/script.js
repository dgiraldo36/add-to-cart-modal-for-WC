var atcw_wc_modal = document.getElementById("atcw-modal");

// Get the elements that closes the modal
var atcw_wc_span = document.getElementsByClassName("atcw-close")[0];
var atcw_wc_link = document.getElementsByClassName("atcw-close-link")[0];

// When the user clicks on <span> (x), close the modal
atcw_wc_span.onclick = function() {
  atcw_wc_modal_close();
}

// When the user clicks on <span> (x), close the modal
atcw_wc_link.onclick = function() {
  atcw_wc_modal_close();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == atcw_wc_modal) {
    atcw_wc_modal_close();
  }
}

function atcw_wc_modal_close() {
	atcw_wc_modal.style.display = "none";
	document.getElementsByClassName("woocommerce-notices-wrapper")[0].style.display = "none";
}