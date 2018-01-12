<div class="container-fluid">
	<div class="game-header">
		<nav>
			<ul>
				<li>
					<div class="logo">
						<a class="navbar-brand" href="<?php echo base_url(); ?>">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/finalest_logo2.png">
						</a>
					</div>
				</li>
				<li class="bg-volume">
					<h1><button id="obj_modal_btn" style="border: 1px solid #000; border-radius: 50%; width: 30px; height: 30px; background-color: #000; font-size: 20px; color: #fff"><span class="fa fa-question"></span></button></h1>
				</li>
				<li>
					
				</li>
			</ul>
		</nav>
	</div>

	<div class="code-area-container">
		<div class="row code_area">
			<div class="line-number col-md-1 col-sm-1 col-xs-1">
				<textarea rows="10" id="textarea1" disabled></textarea>
			</div>
			<div class="code-area-container col-md-11 col-sm-11 col-xs-11">
				<textarea class="code_area" id="code_area" name="code_area" rows="10" onscroll="document.getElementById('textarea1').scrollTop = this.scrollTop;"></textarea>
			</div>
		</div>
		<div class="row button-run-container">
			<div class="button-run col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
				<button class="btn btn-basic btn-block" onclick="executeCommand(0);">RUN</button>
			</div>
		</div>
		<!-- <textarea onscroll="this.form.elements.textarea1.scrollTop = this.scrollTop;" name="textarea2" ></textarea> -->
	</div>
</div>

<script type="text/javascript">
	
	code_area = document.getElementById("code_area");

	var vrbls = {};

	document.getElementById('textarea1').value = '1';

	$("#code_area").keyup(function(event) {
        var code = code_area.value.split("\n");
        document.getElementById('textarea1').value = '';
        for(var i = 0; i < code.length; i++)
        {
        	document.getElementById('textarea1').value += (i+1) + "\n";
        }
        event.preventDefault();
	});

	function enableTab(id) {
    	var el = document.getElementById(id);
	    el.onkeydown = function(e) {
	        if (e.keyCode === 9) { // tab was pressed

	            // get caret position/selection
	            var val = this.value,
	                start = this.selectionStart,
	                end = this.selectionEnd;

	            // set textarea value to: text before caret + tab + text after caret
	            this.value = val.substring(0, start) + '\t' + val.substring(end);

	            // put caret at right position again
	            this.selectionStart = this.selectionEnd = start + 1;

	            // prevent the focus lose
	            return false;

	        }
	    };
	}
	
	enableTab('code_area');

	executeCommand = function(commandNum) {

		var code_whole = code_area.value;
		var code = code_whole.split('\n');

		if(commandNum < code.length) {

			cmdLine = code[commandNum].trim();

			if(/^(int|double|char|String|bool)\s[A-Za-z0-9]*;$/g.test(cmdLine)) {
				console.log("variable created");
			} else {
				console.log("error");
			}
		}
	}
</script>