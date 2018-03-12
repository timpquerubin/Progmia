
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/multi-step-modal.js"></script>
<!-- <script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script> -->

<script type="text/javascript">
		$(document).ready(function() {
			
			var tabActive = document.getElementById("tab-active").value;

			switch(tabActive) {
				case 'home':
					$("#nav-pill-home").addClass("active");
					break;
				case 'levels':
					$("#nav-pill-levels").addClass("active");
					break;
				case 'stages':
					$("#nav-pill-stages").addClass("active");
					break;
			}
		});
</script>