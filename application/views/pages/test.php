<html>
<head>
	<title></title>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>

	<!-- <link href="<?php// echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
	<script type="text/javascript" src="<?php// echo base_url();?>assets/js/bootstrap.min.js""></script> -->
</head>
<body>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div style="width: 100%; margin: 0px; padding: 0px;">
				<textarea id="code_area" style="resize: none; width: 100%;" rows="20"></textarea>
			</div>
			<div>
				<button onclick="runCommand();">RUN</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var code_area = document.getElementById("code_area");

		var variables = [];

		runCommand = function() {
			var code = code_area.value.split("\n");
			
			for(var key in code) {

				if(/^var\s[A-Za-z0-9_]*/g.test(code[key])) {
					console.log("valid: NEW VARIABLE CREATED");
					variables.push(code[key]);
					console.log(variables);
				} else if(/^if\([A-Za-z0-9=<>()\s]*\)/g.test(code[key])) {
					console.log("valid: IF STATEMENT");
				} else if(/^while\([A-Za-z0-9=<>()\s]*\)/g.test(code[key])) {
					console.log("valid: WHILE STATEMENT");
				} else {
					console.log("INVALID COMMAND");
				}

			}
		}


	</script>
</body>
</html>