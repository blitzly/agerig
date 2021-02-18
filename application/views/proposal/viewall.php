<div class="row bg-light mt-0 py-2">
  	<div class="col-auto mr-auto content-header">
      <h1><?php echo $page_header ?></h1>
    </div>
    <div class="col-auto">
        <a class="btn btn-success btn-lg text-white" href="/proposal/new" title="Add new"><i class="fa fa-plus"></i><i id="preloader"></i></a>
        <a class="btn btn-default btn-lg" href="/dashboard"><i class="fa fa-times"></i></a>
    </div>
  </div>
	<div class="content">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="box">
					<div class="box-body table-responsive">
						<table id="data_table" data-table-name="proposal" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="1%">ID</th>
									<th>Name</th>
									<th>Client</th>
								</tr>
							</thead>
							<tbody>
								<?php //echo $todo; 
								foreach ($todo as $row) {
								?>
								<tr class="tr_table" data-query="<?php  echo $row['id'] ?>" data-action="view">
									<td><?php  echo $row['id'] ?></td>
									<td><?php  echo $row['name'] ?></td>
									<td><?php  echo $row['client'] ?></td>
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
			    <a class="btn btn-primary" id="btn-add-proposal" href="/proposal/new">Add proposal</a>
			</div>
		</div>
	</div>