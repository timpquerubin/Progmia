


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.steps.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.steps.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/tutorial.js"></script>
	<!-- JAVA if...else -->
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tutorialTitle">Java Variables</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-close"></i>
						</button>
				</div>
				<div class="modal-body">
					<div id="steps">
					    <h3></h3>
					    <section>
							<div class="tutorialDescription">
							    <h2>Java do...while Loop</h2>
								<p>The <span class="sample">do...while</span> loop is similar to <span class="sample">while</span> loop with one key difference. The body of <span class="sample">do...while</span> loop is executed for once before the test expression is checked.</p>
								<p>The syntax of <span class="sample">do..while</span> loop is:</p>
<pre><samp>do {
   // codes inside body of do while loop
} while (testExpression);</samp></pre>
							</div>
					    </section>
					    <h3></h3>
					    <section>
					    	<div class="tutorialDescription">
					    		<h2>How do...while loop works?</h2>
					    		<p>The body of <strong>do...while</strong> loop is executed once (before checking the test expression). Only then, the test expression is checked.</p>
					    		<p>If the test expression is evaluated to <strong>true</strong>, codes inside the body of the loop are executed, and the test expression is evaluated again. This process goes on until the test expression is evaluated to <strong>false</strong>.</p>
					    		<p>When the test expression is false, the do..while loop terminates.</p>
					    	</div>
					    </section>
					    <h3></h3>
					    <section>
					    	<div class="tutorialDescription">
					    		<h2>do...while Loop example code</h2>
					    	</div>
							<div id="clone-container">
								<button id="restart-code-animation"><i class="fa fa-repeat"></i></button>
								<div id="code-animation">
								    <h4 class="line-num">1</h4><p class="var-highlight-1">int </p><p>counter</p><p> = </p><p class="var-highlight-2">5</p><span>;</span><br>
								    <h4 class="line-num">2</h4><p class="var-highlight-1">do</p><span> {</span><br>
								    <h4 class="line-num">3</h4><p style="color:#450084;margin:0px 0px 0px .5em; overflow-wrap: none;">System</p><p>.out.println(counter);</p><br>
								    <h4 class="line-num">4</h4><p>counter = counter - 1;</p><br>
								    <h4 class="line-num">5</h4><p>}</p><p class="var-highlight-1">while</p><p>(counter > 0);</p>
								</div>
							</div>
							<div class="tutorialDescription">
								<p>When you run the program, the output will be:</p>
<pre><samp>5
4
3
2
1</samp></pre>
							</div>
					    </section>

					</div>
					<!-- <div id="steps">
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
					</div> -->
			</div>
		</div>
	</div>