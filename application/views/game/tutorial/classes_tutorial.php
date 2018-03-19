


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.steps.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.steps.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/tutorial.js"></script>
	<!-- JAVA if...else -->
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tutorialTitle">Java Class and Objects</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-close"></i>
						</button>
				</div>
				<div class="modal-body">
					<div id="steps">
						<h3></h3>
					    <section>
							<div class="tutorialDescription">
							    <h2>Java Class</h2>
								<p>Before you create objects in Java, you need to define a <strong>class</strong>.</p>
								<p>A class is a blueprint for the object.</p>
								<p>We can think of class as a sketch (prototype) of a house. It contains all the details about the floors, doors, windows etc. Based on these descriptions we build the house. House is the object.</p>
								<p>Since, many houses can be made from the same description, we can create many objects from a class.</p>
							</div>
						</section>
					    <h3></h3>
					    <section>
							<div class="tutorialDescription">
							    <h2>How to define a class in Java?</h2>
								<p>Here's how a class is defined in Java:</p>
<pre><samp>class <span style="color:#2b91af;">ClassName</span>{
// variables
// methods
}</samp></pre>
							</div>
					    </section>
					    <h3></h3>
					    <section>
							<div class="tutorialDescription">
							    <h2>Java Objects</h2>
								<p>When class is defined, only the specification for the object is defined; no memory or storage is allocated.</p>
							</div>
							<div class="tutorialDescription">
								<p>Here, <span class="sample">int</span> is a keyword. It indicates that the variable score is of integer type (32-bit signed two's complement integer).</p>
								<p>You cannot use keywords like <span class="sample">int</span>,<span class="sample">for</span>, <span class="sample">class</span> etc as variable name (or identifiers) as they are part of the Java programming language syntax.</p>
							</div>
						</section>
					    <h3></h3>
					    <section>
							<div class="tutorialDescription">
								<p>To access members defined within the class, you need to create objects. Let's create objects of Lamp class.</p>
							</div>
							<div id="clone-container">
								<button id="restart-code-animation"><i class="fa fa-repeat"></i></button>
								<div id="code-animation">
								    <h4 class="line-num">1</h4><p class="var-highlight-1">class </p><p style="color:#2b91af;">Character</p><span>{</span><br>
								    <h4 class="line-num">2</h4><p class="var-highlight-1">		boolean </p><p>isOn</p><span>;</span><br>
								    <h4 class="line-num">3</h4><p class="var-highlight-1">		void </p><p>moveLeft <span>(){</span></p><br>
								    <h4 class="line-num">4</h4><p class="comment">			// algorithm for moving character to Left</p><br>
								    <h4 class="line-num">5</h4><p>}</p><br>
								    <h4 class="line-num">6</h4><p class="var-highlight-1">		void </p><p>moveRight</p><p><span>	(){</span></p><br>
								    <h4 class="line-num">7</h4><p class="comment">			// algorithm for moving character to Right</p><br>
								    <h4 class="line-num">8</h4><p>}</p><br>

								    <h4 class="line-num">9</h4><p class="var-highlight-1">		void </p><p>moveUp</p><p><span>	(){</span></p><br>
								    <h4 class="line-num">10</h4><p class="comment">			// algorithm for moving character to Up</p><br>
								    <h4 class="line-num">11</h4><p>}</p><br>

								    <h4 class="line-num">12</h4><p class="var-highlight-1">		void </p><p>moveDown</p><p><span>	(){</span></p><br>
								    <h4 class="line-num">13</h4><p class="comment">			// algorithm for moving character to Down</p><br>
								    <h4 class="line-num">15</h4><p>		}</p><br>
									<h4 class="line-num">16</h4><p>}</p><br>

								    <h4 class="line-num">17</h4><p class="var-highlight-1">class </p><p style="color:#2b91af;">GameArea</p><span>{</span><br>
								    <h4 class="line-num">18</h4><p class="var-highlight-1">		public static void main</p><span>(</span><p style="color: #2b91af;">String[]</p><p> args) { </p><br>
								    <h4 class="line-num">19</h4><p class="var-highlight-1">		int </p><p>posX = 0</p><span>;</span><br>
								    <h4 class="line-num">20</h4><p class="var-highlight-1">		int </p><p>posY = 0</p><span>;</span><br>
								    <h4 class="line-num">21</h4><p class="var-highlight-1">		while</p><p>(Student.checkCollision() == </p><p class="var-highlight-1">true</p><span>){</span><br>
									<h4 class="line-num">22</h4><p>			Student.moveRight(posX,posY);</p><br>
								    <h4 class="line-num">23</h4><p>		}</p><br>
								    <h4 class="line-num">24</h4><p>	}</p><br>
								    <h4 class="line-num">25</h4><p>}</p>
								</div>
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