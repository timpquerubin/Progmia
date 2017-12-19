
			
			<div class="panel-heading"><i class="fa fa-list-ol" aria-hidden="true"></i>Level List</div>
			<div class="row">
				<a href="<?php echo base_url(); ?>Dashboard/add_level" class="btn btn-default" >Add Level</a>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<th></th>
							<th><strong>Actions</strong></th>
							<!-- <th><strong>#</strong></th> -->
							<th><strong>Avatar ID</strong></th>
							<th><strong>Avatar Name</strong></th>
							<th><strong>Avatar Sprite Filename</strong></th>
							<th><strong>Avatar Thumbnail Filename</strong></th>
							<th><strong>Avatar Frontview Filename</strong></th>
							<th><strong>Avatar Sprite Height<br>(In Pixels)</strong></th>
							<th><strong>Avatar Sprite Width<br>(In Pixels)</strong></th>
						</thead>
						<tbody>
							<?php if(sizeof($avatars) > 0) { ?>
								<?php $ctr = 1; ?>
								<?php foreach($avatars as $avtr) { ?>
									<tr>
										<td><input type="checkbox" name=""></td>
										<td>
											<ul class="actions">
												<li><a href="<?php echo base_url(); ?>dashboard/edit_avatar/<?php echo $avtr['AVTR_ID'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
												<li><a onclick="deleteAvatar('<?php echo $avtr['AVTR_ID'] ?>')"><i class="fa fa-eraser" aria-hidden="true"></i></a></li>
											</ul>
										</td>

										<td><?php echo $avtr['AVTR_ID']; ?></td>
										<td><?php echo $avtr['AVTR_NAME']; ?></td>
										<td><?php echo $avtr['AVTR_SPRT_FILENAME']; ?></td>
										<td><?php echo $avtr['AVTR_THUMBNAIL_FILENAME']; ?></td>
										<td><?php echo $avtr['AVTR_FRONTVIEW_FILENAME']; ?></td>
										<td><?php echo $avtr['AVTR_SPRT_HEIGHT']; ?></td>
										<td><?php echo $avtr['AVTR_SPRT_WIDTH']; ?></td>
									</tr>
									<?php $ctr++; ?>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<input type="checkbox" id="checkAll" name=""/>Check All<input type="button" name="" value="Delete">
				<script type="text/javascript">
					 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
				</script>
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


<script type="text/javascript">
	

		var lvlId = "<?php echo isset($avtrId) ? $avtrId : '' ?>"
		deleteLevel = function(objNum) {
			var data = {};
			data['avtrId'] = objNum;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>" + "dashboard/delete_avatar",
				data: data,
				success: function(res) {
					alert('Successfully deleted avatar!');
					window.location = "<?php echo base_url(); ?>dashboard/avatar_list/";
				},
				error: function(err) {
					console.log("cannot delete avatar");
				}
			})

		}

</script>