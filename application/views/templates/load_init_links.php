<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script>

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