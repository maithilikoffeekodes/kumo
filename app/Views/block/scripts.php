<script>
	var PATH = '<?= base_url('') ?>';
</script>

<script src="<?= ASSETS; ?>js/jquery.min.js"></script>
<!-- Select2 js-->
<script src="<?= ASSETS; ?>plugins/select2/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="<?= ASSETS; ?>js/popper.min.js"></script>
<script src="<?= ASSETS; ?>js/bootstrap.min.js"></script>
<script src="<?= ASSETS; ?>js/ion.rangeSlider.min.js"></script>
<script src="<?= ASSETS; ?>js/slick.js"></script>
<script src="<?= ASSETS; ?>js/slider-bg.js"></script>
<script src="<?= ASSETS; ?>js/lightbox.js"></script>
<script src="<?= ASSETS; ?>js/smoothproducts.js"></script>
<script src="<?= ASSETS; ?>js/snackbar.min.js"></script>
<script src="<?= ASSETS; ?>js/jQuery.style.switcher.js"></script>
<script src="<?= ASSETS; ?>js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?= ASSETS ?>plugins/dropzone/dropzone.min.js"></script>
<script src="<?= ASSETS ?>plugins/fileuploads/js/fileupload.js"></script>
<script src="<?= ASSETS ?>plugins/fileuploads/js/file-upload.js"></script>
<script src="<?= ASSETS ?>plugins/datatable/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/jszip.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/pdfmake.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/vfs_fonts.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/buttons.colVis.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/buttons.print.min.js" type="text/javascript"></script>
<script src="<?= ASSETS ?>plugins/datatable/fileexport/buttons.bootstrap4.min.js" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!--MutipleSelect js-->
<!-- <script src="<?= ASSETS; ?>plugins/multipleselect/multiple-select.js"></script> -->
<!-- <script src="<?= ASSETS; ?>plugins/multipleselect/multi-select.js"></script> -->

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

<script>
	function openWishlist() {
		document.getElementById("Wishlist").style.display = "block";
	}

	function closeWishlist() {
		document.getElementById("Wishlist").style.display = "none";
	}
</script>

<script>
	function openCart() {
		document.getElementById("Cart").style.display = "block";
	}

	function closeCart() {
		document.getElementById("Cart").style.display = "none";
	}
</script>

<script>
	function openSearch() {
		document.getElementById("Search").style.display = "block";
	}

	function closeSearch() {
		document.getElementById("Search").style.display = "none";
	}
</script>