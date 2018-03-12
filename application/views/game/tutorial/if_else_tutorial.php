
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.steps.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.steps.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/tutorial.js"></script>
	<!-- JAVA if...else -->
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tutorialTitle">Java if...else (if-then-else) Statement</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-close"></i>
						</button>
				</div>
				<div class="modal-body">
						<div id="steps">
						    <h3></h3>
						    <section>
								<div class="tutorialDescription">
									<p>The <strong>if statement</strong> executes a certain section of code if the test expression is evaluated to true. The if statement can have optional else statement. Codes inside the body of else statement are executed if the test expression is false.</p>
								</div>
						    </section>
						    <h3></h3>
						    <section>
						    	<div class="tutorialDescription">
									<p>The syntax of if-then-else statement is:</p>
								</div>
								<div id="clone-container">
									<button id="restart-code-animation"><i class="fa fa-repeat"></i></button>
									<div id="code-animation">
									    <h4 class="line-num">1</h4><p class="var-highlight-1">int </p><p>test</p><p> = </p><p class="var-highlight-2">5</p><p>;</p><br>
									    <h4 class="line-num">2</h4><p class="var-highlight-3">if</p><p> (test </p><p class="var-highlight-3"><</p><p> 10)</p><br>
									    <h4 class="line-num">3</h4><p>{</p><br>
									    <h4 class="line-num">4</h4><p class="comment">// body of if ;</p><br>
									    <h4 class="line-num">5</h4><p>}</p><br>
									    <h4 class="line-num">6</h4><p class="var-highlight-3">else</p><br>
									    <h4 class="line-num">7</h4><p>{</p><br>
									    <h4 class="line-num">8</h4><p class="comment">// body of else ;</p><br>
									    <h4 class="line-num">9</h4><p>}</p>
									</div>
								</div>
						    </section>
						    <h3></h3>
						    <section>
						        <p>The next and previous buttons help you to navigate through your content.</p>
						    </section>
						</div>
	<style type="text/css">
		div#code-animation{font-weight:400;}
		.modal-body{position: relative;}
		.wizard > .actions > ul > li.disabled {display: none;}
		#steps a{text-decoration: none;outline: 0;}
		#steps .steps ul{list-style: none;padding:0px;text-align: center;margin:0 auto;}
		#steps .steps ul li {margin:0 auto;}
		#steps .steps li.done,#steps .steps li.disabled {display: none !important;}
		/*.current-info{display: none;}*/
		#steps .steps li a{color:#eaffff;font-family: 'ArcadeClassic';font-size: 2.5vw;}
		#steps .actions ul {list-style: none;display:flex;justify-content: space-around;width: 100%;padding:0px;margin:0 auto;}
		#steps .actions ul li a{border:solid 3px #eaffff;padding:2px 5px;}
		#steps .actions ul li:first-child{position:absolute;top:15px;left: 20px;}
		#steps .actions ul li:not(:first-child){position:absolute;top:15px;right: 20px;}
		#steps .title{display: none;}
		#steps .current{display: block;}
		#steps .actions ul li a{color:#eaffff;font-family: 'ArcadeClassic';font-size: 2.5vw;}
	</style>
						<!-- <div class="tutorialDescription">
							<p>The <strong>if</strong> statement executes a certain section of code if the test expression is evaluated to <strong>true</strong>. The if statement can have optional else statement. Codes inside the body of else statement are executed if the test expression is <strong>false</strong>.</p>
						</div>
						<div class="tutorialDescription">
							<p>The syntax of if-then-else statement is:</p></div>
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
							</div> -->
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="repeat();">Save changes</button>
			</div> -->
		</div>
	</div>
	<!-- JAVA if...else -->

	<!-- JAVA VARIABLES -->
	<!-- <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tutorialTitle">Java Variables</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<?php $ctr = 1; ?>
			<div class="modal-body">
				<?php $pages = 0;?>
				<div id="page-1">
					<?php $pages++;?>
					<h1>BANANA-1</h1>
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
				<div id="page-2" style="display: none;">
					<?php $pages++;?>
					<h1>BANANA-2</h1>
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
				<div id="page-3" style="display: none;">
					<?php $pages++;?>
					<h1>BANANA-3</h1>
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
				<div id="page-4" style="display: none;">
					<?php $pages++;?>
					<h1>BANANA-4</h1>
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
				<?php $totalPages = $pages; ?>
			</div>
			<div class="modal-footer">
				<ul>
						<li>
							<button type="button" id="btn-1" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>
						</li>
					
					<li>
						<button type="button" id="btn-2" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
					</li>
				</ul>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){

				});
			</script>
		</div>
	</div> -->

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