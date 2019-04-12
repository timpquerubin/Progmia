	</body>
	<footer>
		<nav id="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="avatar">
								<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avatar['AVTR_THUMBNAIL_FILENAME']?>">
								<svg height="0">
								    <filter id="drop-shadow">
								        <feGaussianBlur in="SourceAlpha" stdDeviation="4"/>
								        <feOffset dx="4" dy="4" result="offsetblur"/>
								        <feFlood flood-color="rgba(0,0,0,0.5)"/>
								        <feComposite in2="offsetblur" operator="in"/>
								        <feMerge>
								            <feMergeNode/>
								            <feMergeNode in="SourceGraphic"/>
								        </feMerge>
								    </filter>
								</svg>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="row">
								<div class="username"><?php echo $this->session->userdata('username');?></div>
							</div>
							<div class="row">
								<button id="logout">Log Out</button>							
								<script type="text/javascript">
								  document.getElementById("logout").onclick = function () { 
								  	window.location = "<?php echo base_url();?>users/logout";}
								</script>
							</div>
					    </div>
					</div>
				</div>
			</div>
		</nav>
	</footer>
</html>