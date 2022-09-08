<script>
	var PATH = '<?= base_url('') ?>';
</script>
<!-- Select2 js-->
<script src="<?= ASSETS; ?>plugins/select2/js/select2.min.js"></script>

<!--MutipleSelect js-->
<script src="<?= ASSETS; ?>plugins/multipleselect/multiple-select.js"></script>
<script src="<?= ASSETS; ?>plugins/multipleselect/multi-select.js"></script>
<script src="<?= ASSETS; ?>js/jquery.min.js"></script>
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