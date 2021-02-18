	<!-- alert  TODO: include this in a HTML helper-->
	<div class="alert alert-success text-center hidden" id="alert-dismiss" role="alert" >
	  <strong>Done!</strong> Post updated successfully!&nbsp;
	</div>

	<div class="row">
		<div class="col-md-9">
			<div class="row pad-10-bottom">
				<div class="col-sm-12">
					<input type="text" class="form-control input-lg" id="post-title" placeholder="Title" required value="<?php echo $post['title'] ?>" autofocus="" data-placement="bottom">
				</div>
			</div>
			<!-- Editor  -->
			<div class="row">
				<div class="col-sm-12">
					<div class="summernote"><?php echo $post['content'] ?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box box-solid bg-dark-gray color-white">
				<div class="box-header"><i class="fa fa-gear"></i> <h4 class="box-title">Options</h4></div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">Active</div>
						<div class="col-sm-4 text-center pull-right">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-left">
							<a class="btn btn-primary" id="btn-save-post"><i class="fa fa-save"></i> Save <i id="preloader"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="post-id" value="<?php echo $post['id'] ?>">
	</div>