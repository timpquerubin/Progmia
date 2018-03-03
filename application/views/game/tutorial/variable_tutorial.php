<div class="container-fluid">
	
				<div class="tutorial-content">
					<button id="close" data-dismiss="modal" data-target="#tutorial-modal"><i class="fa fa-times"></i></button>
					<div class="row">
						<h2>Declaring an Array</h2>
					</div>
					<div class="row">
						<div class="col-sm-offset-0 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
					<?php $ctr = 1;?>
<pre id="typewriter">
<h4 class="line-num"><?php echo $ctr;?></h4><span class="var-comment">// data types: integer(int), double, decimal, </span>
<?php $ctr++;?>
<h4 class="line-num"><?php echo $ctr;?></h4><span class="var-comment">// string(String), character(char), boolean(bool)</span>
<?php $ctr++;?>
<h4 class="line-num"><?php echo $ctr;?></h4><span class="var-highlight">int[]</span> myInt <span class="var-highlight">=</span> {<span class="string-highlight">1</span>,<span class="string-highlight">2</span>,<span class="string-highlight">3</span>,<span class="string-highlight">4</span>}; 
</pre>
						</div>
					</div>
					<div class="row">
						<button id="ok" onclick="exit()">OK</button>
					</div>

					<script type="text/javascript">
						function setupTypewriter(t) {
					        var HTML = t.innerHTML;

					        t.innerHTML = "";

					        var cursorPosition = 0,
					            tag = "",
					            writingTag = false,
					            tagOpen = false,
					            typeSpeed = 40,
					        tempTypeSpeed = 0;

					        var type = function() {
					        
					            if (writingTag === true) {
					                tag += HTML[cursorPosition];
					            }

					            if (HTML[cursorPosition] === "<") {
					                tempTypeSpeed = 0;
					                if (tagOpen) {
					                    tagOpen = false;
					                    writingTag = true;
					                } else {
					                    tag = "";
					                    tagOpen = true;
					                    writingTag = true;
					                    tag += HTML[cursorPosition];
					                }
					            }
					            if (!writingTag && tagOpen) {
					                tag.innerHTML += HTML[cursorPosition];
					            }
					            if (!writingTag && !tagOpen) {
					                if (HTML[cursorPosition] === " ") {
					                    tempTypeSpeed = 0;
					                }
					                else {
					                    tempTypeSpeed = (Math.random() * typeSpeed) + 50;
					                }
					                t.innerHTML += HTML[cursorPosition];
					            }
					            if (writingTag === true && HTML[cursorPosition] === ">") {
					                tempTypeSpeed = (Math.random() * typeSpeed) + 50;
					                writingTag = false;
					                if (tagOpen) {
					                    var newSpan = document.createElement("span");
					                    t.appendChild(newSpan);
					                    newSpan.innerHTML = tag;
					                    tag = newSpan.firstChild;
					                }
					            }

					            cursorPosition += 1;
					            if (cursorPosition < HTML.length - 1) {
					                setTimeout(type, tempTypeSpeed);
					            }

					        };

					        return {
					            type: type
					        };
					    }

					    var typer = document.getElementById('typewriter');

					    typewriter = setupTypewriter(typewriter);

					    typewriter.type();
					</script>
				</div>
				<style type="text/css">
				@keyframes glow{
					0%,100%{box-shadow: 0px 0px 10px #eaffff;}
					50%{box-shadow: 0px 0px 20px #eaffff;}
				}
				</style>

	<h1></h1>
	<p></p>
</div>