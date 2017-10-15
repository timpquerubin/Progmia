<div class="container">

	<div class="levels-button-container" style="margin-bottom: 20px;">
		<a href="<?php echo base_url(); ?>Dashboard/add_level" class="btn btn-default" >Add Level</a>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Map List</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<th><strong>#</strong></th>
					<th><strong>Stage</strong></th>
					<th><strong>Level</strong></th>
					<th><strong>Level Name</strong></th>
					<th><strong>Start Point</strong></th>
					<th><strong>Columns</strong></th>
					<th><strong>Created At</strong></th>
					<th><strong>Updated At</strong></th>
				</thead>
				<tbody>
					<?php if(sizeof($levels) > 0) { ?>
						<?php $ctr = 1; ?>
						<?php foreach($levels as $lvl) { ?>
							<tr>
								<td><?php echo $ctr; ?></td>
								<td><?php echo $lvl['STAGE'] ?></td>
								<td><?php echo $lvl['LVL_NUM'] ?></td>
								<td><?php echo $lvl['LVL_NAME'] ?></td>
								<td><?php echo $lvl['LVL_STARTPOINT'] ?></td>
								<td><?php echo $lvl['LVL_NUMCOLS'] ?></td>
								<td><?php echo $lvl['LVL_CREATEDAT'] ?></td>
								<td><?php echo $lvl['LVL_UPDATEDAT'] ?></td>
							</tr>
							<?php $ctr++; ?>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>

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