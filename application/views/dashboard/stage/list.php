
			
			<div class="panel-heading"><i class="fa fa-list-ol" aria-hidden="true"></i>Stage List</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<th><strong>Stage ID</strong></th>
							<th><strong>Name</strong></th>
							<th><strong>Description</strong></th>
							<th><strong>Image</strong></th>
						</thead>
						<tbody>
							<?php $ctr = 0; ?>
								<?php foreach($stages as $stg) { ?>
									<tr>
										<td><?php echo $stg['STG_ID'] ?></td>
										<td><?php echo $stg['STG_NAME'] ?></td>
										<td><?php echo $stg['STG_DESCRIPTION'] ?></td>
										<td><img id="myImg<?php echo $ctr;?>" class="img-responsive" style="height:100px;" src="<?php echo base_url();?>assets/images/<?php echo $stg['STG_FILENAME'] ?>" alt="">

										<!-- The Modal -->
										<div id="myModal<?php echo $ctr;?>" class="modal">
										  <span id="close<?php echo $ctr;?>" class="close">&times;</span>
										  <img class="modal-content" id="img<?php echo $ctr;?>">
										  <div id="caption<?php echo $ctr;?>"></div>
										</div>
										<script>
											// Get the modal
											var modal = document.getElementById('myModal<?php echo $ctr;?>');

											// Get the image and insert it inside the modal - use its "alt" text as a caption
											var img = document.getElementById('myImg<?php echo $ctr; ?>');
											var modalImg = document.getElementById("img<?php echo $ctr; ?>");
											var captionText = document.getElementById("caption<?php echo $ctr; ?>");
											img.onclick = function(){
											    modal.style.display = "block";
											    modalImg.src = this.src;
											    captionText.innerHTML = this.alt;
											}

											// Get the <span> element that closes the modal
											var span = document.getElementById("close<?php echo $ctr;?>");

											// When the user clicks on <span> (x), close the modal
											span.onclick = function() { 
											    modal.style.display = "none";
											}
											modalImg.onclick = function() { 
											    modal.style.display = "none";
											}
											modal.onclick = function() { 
											    modal.style.display = "none";
											}
											</script>

										</td>
										<td>
											<ul class="actions">
												<li><a href="<?php echo base_url(); ?>dashboard/edit_stage/<?php echo $stg['STG_ID'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
												<li><a href=""><i class="fa fa-eraser" aria-hidden="true"></i></a></li>
											</ul> </td>
									</tr>
									<?php $ctr++;?>
								<?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>