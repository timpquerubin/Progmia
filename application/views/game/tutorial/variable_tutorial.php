
	<!-- JAVA if...else -->
	<!-- <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tutorialTitle">Java if...else (if-then-else) Statement</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="tutorialDescription">
					<p>The <strong>if</strong> statement executes a certain section of code if the test expression is evaluated to <strong>true</strong>. The if statement can have optional else statement. Codes inside the body of else statement are executed if the test expression is <strong>false</strong>.</p>
					<p>The syntax of if-then-else statement is:</p>
				</div>
				<div id="code-animation">
				    <h4 class="line-num">1</h4><p class="var-highlight-1">int </p><p>test</p><p> = </p><p class="var-highlight-2">5</p><p>;</p><br>
				    <h4 class="line-num">2</h4><p class="var-highlight-1">if</p><p> (test </p><p class="var-highlight-1">&lt;</p><p> 10)</p><br>
				    <h4 class="line-num">3</h4><p>{</p><br>
				    <h4 class="line-num">4</h4><p class="comment">// body of if ;</p><br>
				    <h4 class="line-num">5</h4><p>}</p><br>
				    <h4 class="line-num">2</h4><p class="var-highlight-1">else</p><br>
				    <h4 class="line-num">3</h4><p>{</p><br>
				    <h4 class="line-num">4</h4><p class="comment">// body of else ;</p><br>
				    <h4 class="line-num">5</h4><p>}</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="repeat();">Save changes</button>
			</div>
		</div>
	</div> -->
	<!-- JAVA if...else -->

	<!-- JAVA VARIABLES -->
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tutorialTitle">Java Variables</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="tutorialDescription">
					<p>A <strong>variable</strong> is a location in memory (storage area) to hold data.</p>
					<p>To indicate the storage area, each <strong>variable</strong> should be given a unique name (identifier)</p>
				</div>
				<div id="code-animation">
				    <h4 class="line-num">1</h4><p class="var-highlight-1">int </p><p>score</p><p> = </p><p class="var-highlight-2">5</p><p>;</p>
				</div>
				<div class="tutorialDescription">
				<p>On the example code above:</p><p>We declared a variable that has a data type of <strong>int</strong> (integer), having a unique name (identifier) <strong>score</strong> and a value of <strong>5</strong>.</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="repeat();">Save changes</button>
			</div>
		</div>
	</div>

	<!-- JAVA VARIABLES -->
	<!-- <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tutorialTitle">Java Variables</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="tutorialDescription">
					<p>The <strong>if</strong> statement executes a certain section of code if the test expression is evaluated to true. The if statement can have optional else statement. Codes inside the body of else statement are executed if the test expression is false.</p>
					<p>The syntax of if-then-else statement is:</p>
				</div>
				<div id="code-animation">
				    <h4 class="line-num">1</h4><p class="var-highlight-1">int </p><p>score</p><p> = </p><p class="var-highlight-2">5</p><p>;</p>
				</div>
				<div class="tutorialDescription">
				<p>On the example code above:</p><p>We declared a variable that has a data type of <strong style="color:#ffce12;">int</strong> (integer), having a unique name (identifier) <strong style="color:#ffce12;">score</strong> and a value = (equal) to <strong style="color:#ffce12;">5</strong>.</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="repeat();">Save changes</button>
			</div>
		</div>
	</div> -->

					<script type="text/javascript">
						function animate(elements, callback) {
						/* get: array with hidden elements to be displayed, callback function */
						    var i = 0;
						    (function iterate() {
						        if (i < elements.length) {
						            elements[i].style.display = "inline-flex"; // show
						            animateNode(elements[i], iterate); 
						            i++;
						        } else
						        {
						            callback();
						        }
						    })();
						    function animateNode(element, callback) {
						        var pieces = [];
						        if (element.nodeType==1) {
						            while (element.hasChildNodes())
						                pieces.push(element.removeChild(element.firstChild));
						            setTimeout(function childStep() {
						                if (pieces.length) {
						                    animateNode(pieces[0], childStep); 
						                    element.appendChild(pieces.shift());
						                } else
						                {
						                    callback();
						                }
						            }, 1000/10);
						        } else if (element.nodeType==3) {
						            pieces = element.data.match(/.{0,2}/g); // 2: Number of chars per frame
						            element.data = "";
						            (function addText(){
						                element.data += pieces.shift();
						                setTimeout(pieces.length
						                    ? addText
						                    : callback,
						                  1000/10);
						            })();
						        }
						    }
						}
							animate($("#code-animation").children());	
					</script>
					<style type="text/css">
@font-face {
    font-family: 'FontAwesome';
    src: url('../fonts/fontawesome-webfont.eot?v=4.7.0');
    src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
					</style>