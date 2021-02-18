<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-body table-responsive">
				<table id="data_table" data-table-name="protemplate" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="1%">ID</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						<?php //echo $todo; 
						foreach ($todo as $row) {
						?>
						<tr class="tr_table" data-query="<?php  echo $row['id'] ?>" data-action="view">
							<td><?php  echo $row['id'] ?></td>
							<td><?php  echo $row['name'] ?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group col-sm-12 text-right">
	    <a class="btn btn-primary" id="btn-add-protemplate" href="/protemplate/new">Add Client</a>
	</div>
</div>