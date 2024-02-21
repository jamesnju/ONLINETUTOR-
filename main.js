var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasScrolling'));
offcanvas.show();

// Close the offcanvas when the close button is clicked
document.getElementById('closeOffcanvas').addEventListener('click', function () {
    offcanvas.hide();
});