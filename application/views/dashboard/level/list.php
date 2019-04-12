
			
			<div class="panel-heading"><i class="fa fa-list-ol" aria-hidden="true"></i>Level List</div>
			<div class="row" style="padding-bottom: 20px;">
				<a href="<?php echo base_url(); ?>Dashboard/add_level" class="btn btn-default" >Add Level</a>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<th></th>
							<th><strong>Actions</strong></th>
							<!-- <th><strong>#</strong></th> -->
							<th><strong>Stage Name</strong></th>
							<th><strong>Level #</strong></th>
							<th><strong>Level Name</strong></th>
							<th><strong>Start Point</strong></th>
							<th><strong>Columns</strong></th>
							<th><strong>Created On</strong></th>
							<th><strong>Recent Update</strong></th>
						</thead>
						<tbody>
							<?php if(sizeof($levels) > 0) { ?>
								<?php $ctr = 1; ?>
								<?php foreach($levels as $lvl) { ?>
									<tr>
										<td><input type="checkbox" name=""></td>
										<td>
											<ul class="actions">
												<li><a href="<?php echo base_url(); ?>dashboard/edit_level/<?php echo $lvl['LVL_ID'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
												<li><a onclick="deleteLevel('<?php echo $lvl['LVL_ID'] ?>')"><i class="fa fa-eraser" aria-hidden="true"></i></a></li>
											</ul>
										</td>
										<!--<td><?php //echo $ctr; ?></td>-->
										<?php foreach($stages as $stg) {?>
											<?php if($stg['STG_ID'] == $lvl['STG_ID']) { ?>
												<td><?php echo $stg['STG_NAME']; ?></td>
											<?php } ?>
										<?php } ?>

										<td><?php echo $lvl['LVL_NUM']; ?></td>
										<td><?php echo $lvl['LVL_NAME']; ?></td>
										<td><?php echo $lvl['LVL_STARTPOINT']; ?></td>
										<td><?php echo $lvl['LVL_NUMCOLS']; ?></td>
										<td><?php echo $lvl['LVL_CREATEDAT']; ?></td>
										<td><?php echo $lvl['LVL_UPDATEDAT']; ?></td>
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
	

		var lvlId = "<?php echo isset($lvlId) ? $lvlId : '' ?>"
		deleteLevel = function(objNum) {
			var data = {};
			data['lvlId'] = objNum;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>" + "dashboard/delete_level",
				data: data,
				success: function(res) {
					alert('Successfully deleted level!');
					window.location = "<?php echo base_url(); ?>dashboard/level_list/";
				},
				error: function(err) {
					console.log("cannot delete level");
				}
			})

		}

</script>