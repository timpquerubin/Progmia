<html>
<head>
	<title></title>
</head>
<body>
	<script type="text/javascript">
		
		$(document).ready(function() {

			var promise = new Promise(function(resolve, reject) {
				$.ajax({
					type: 'get',
					url: 'https://jsonplaceholder.typicode.com/posts',
					dataType: 'json',
					success: function(res) {
						resolve(res);
					},
					error: function() {
						console.log("error");
					}
				});
			});

			promise.then(function(res) {
				console.log(res);
			});

		});

	</script>
</body>
</html>