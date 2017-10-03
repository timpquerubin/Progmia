<html>
<head>
	<title></title>
</head>
<body>

	<input type="text" name="val1" id="val1">
	<button onclick="pushtoarray()">push</button>

	<script type="text/javascript">
		$(document).ready(function() {

			var testArray = [];

			pushtoarray = function() {
				var val = document.getElementById("val1").value;
				testArray.push(val);

				console.log(testArray);
			}

			// console.log(JSON.parse('<?php echo $sample_json; ?>'));
		});
	</script>
</body>
</html>