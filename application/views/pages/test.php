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

		getConditions = function(statement, terminator1, terminator2) {

			var startIndex = 0;
			var lastIndex = 0;

			// console.log(statement.indexOf(terminator, startIndex));

			do {
				
				if(statement.indexOf(terminator2, startIndex) != -1) {
					lastIndex = statement.indexOf(terminator2, startIndex);
				}

				startIndex = statement.indexOf(terminator2, startIndex) + 1;

			} while(startIndex != 0);

			// console.log(terminator1);
			return statement.substr(statement.indexOf(terminator1) + 1, lastIndex - (statement.indexOf(terminator1) + 1));
			// lastIndex - (statement.indexOf(terminator2) + 1)
		}

		runCommand = function() {
			var code = code_area.value.split("\n");
			var code_structured = [];
			var code_stack = [];
			
			for(var key in code) {

				code[key] = code[key].trim();

				console.log("COMMAND: " + code[key]);

				if(/^student\.moveRight\(\);$/g.test(code[key])) {
					console.log("valid: CHARACTER MOVES RIGHT");
				} else if(/^student\.moveUp\(\);$/g.test(code[key])) {
					console.log("valid: CHARACTER MOVES UP");
				} else if(/^student\.moveDown\(\);$/g.test(code[key])) {
					console.log("valid: CHARACTER MOVES DOWN");
				} else if(/^student\.moveLeft\(\);$/g.test(code[key])) {
					console.log("valid: CHARACTER MOVES LEFT");
				} else if(/^student\.throw/g.test(code[key])) {
					console.log("valid: CHARACTER THROWS PROJECTILE");
				} else if(/^var\s[A-Za-z0-9_]*;$/g.test(code[key])) {
					variables.push(code[key].replace(/(var|\s|;)/g, ""));
					console.log("valid: NEW VARIABLE CREATED");
					console.log(variables);
				} else if(/^if\([A-Za-z0-9=<>()\s]*\)\s*{$/g.test(code[key])) {

					// var startIndex = 0;
					// var lastIndex = 0;

					// do {

					// 	if(code[key].indexOf(")", startIndex) != -1) {
					// 		lastIndex = code[key].indexOf(")", startIndex);
					// 	}

					// 	startIndex = code[key].indexOf(")", startIndex) + 1;

					// } while(startIndex != 0);
					console.log(getConditions(code[key], "(", ")"));
					// console.log(code[key].substr((code[key].indexOf("(") + 1), lastIndex - (code[key].indexOf("(") + 1)));
					console.log("valid: IF STATEMENT");
					code_stack.push("if");
					console.log(code_stack);
				} else if(/^while\([A-Za-z0-9=<>()\s]*\)\s*{$/g.test(code[key])) {
					console.log("valid: WHILE STATEMENT");
					code_stack.push("while");
					console.log(code_stack);
				} else if(/^}$/g.test(code[key])) {
					console.log("POP: " + code_stack[code_stack.length-1]);
					code_stack.pop();
				} else {
					console.log("INVALID COMMAND");
				}

			}
		}

		readCode = function(start, code) {
			
			if(/^if\([A-Za-z0-9=<>()\s]*\)/g.test(code[start])) {
				code.push(code[start]);
				readCode(start++, code)
			} else {
				code.push(code[start]);
			}
		}


	</script>
</body>
</html>