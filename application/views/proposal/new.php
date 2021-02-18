<div class="row bg-light mt-0 py-2">
	<div class="col-auto mr-auto content-header">
		<h1><?php echo $page_header ?></h1>
	</div>
	<div class="col-auto">
		<!--<a class="btn btn-primary btn-lg text-white" id="btn-proposal-form"><i class="fa fa-save"></i><i id="preloader"></i></a>-->
		<a class="btn btn-default btn-lg" href="/proposal/viewall"><i class="fa fa-times"></i></a>
	</div>
</div>
<?php if (isset($stage_perc[$stage])) : ?>
<div class="row pt-2">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="progress">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="<?php echo $stage_perc[$stage] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $stage_perc[$stage] ?>%">
						<span class=""><?php echo $stage_perc[$stage] . '% Complete ' ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif ?>
<!-- Stage 1 -->
<?php if ($stage == 'settings') : ?>
	<div class="container">
		<div class="min-height-500">
			<!-- Box header -->
			<div class="box-header with-border">
				<h2 class="box-title">STEP 1: </h2>
				<h3 class="box-title">Enter some basic details</h3>
				<a class="btn btn-sm btn-success pull-right" id="btn-proposal-template-stage">Template <i class="fa fa-angle-right"></i></a>
			</div>
			<!-- Box body -->
			<div class="box box-primary">
				<div class="box-body">
					<div class="" id="new-proposal-settings">
								<div class="row">
									<div class="form-group col-sm-6">
										<label for="name">What is the name of your proposal?</label>
										<input type="text" class="form-control" id="proposal-name" placeholder="Name" required value="">
									</div>
									<div class="form-group col-sm-6">
										<label for="">Who is the client you're proposing?</label>
										<select class="form-control" id="select-client" name="">
											<option value=""></option>
											<option value="add" class="divider" data-toggle="modal" data-target="#modal-add-client">+ Add Client</option>
											<option disabled>------</option>
											<?php foreach ($clients as $client) : ?>
												<option value="<?php echo ($client['id']) ?>"> <?php echo ($client['name'] . ' ' . $client['lastname']) ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-sm-6">
										<label>Due date:</label>
										<div class="input-group date">
											<div class="input-group-addon p-2">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="prop-due-date" value="<?php echo date('Y-m-d', strtotime("+30 days")); ?>" readonly="true">
										</div>
										<!-- /.input group -->
									</div>
									<div class="form-group col-sm-6"></div>
								</div>
								<div class="box-header bg-light-gray disabled pad-20-left-right mar-20-top-botom">
									<h3 class="box-title"><i class="fa fa-plus"></i> Aditional Information</h3>
								</div>
								<div class="row form-horizontal">
									<div class="col-md-7">
										<div class="form-group">
											<label for="name" class="control-label">Notes</label>
											<textarea class="form-control" rows="3" placeholder="Notes for internal purposes only" id="prop-notes"></textarea>
										</div>
									</div>
									<div class="col-md-5 text-center">
										<label for="name" class="control-label">How likely do you think this deal will close?</label>
										<div class="range">
											<input type="range" name="range" id="prob_range" min="1" max="100" value="50" onchange="range.value=value + '%'">
											<div><output id="range" class="text-center">50%</output></div>
										</div>
									</div>
								</div>
								<input type="hidden" class="stage-name" data-stage-name="<?php echo $stage ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<!-- Stage 2 -->
<?php if ($stage == 'template') : ?>
	<div class="container pb-2">
		<div class="min-height-500" id="new-proposal-template">
			
				<div class="box-header with-border">
					<h2 class="box-title">STEP 2: </h2>
					<h3 class="box-title"  id="choose-template-error-msg">Choose a template</h3>
					<a class="btn btn-sm btn-success pull-right" id="btn-proposal-offer-stage">Offer <i class="fa fa-angle-right"></i></a>
				</div>
				<div class="box box-primary">
				<div class="box-body">
					
					<?php
					?>
					<?php for ($i = 0; $i < count($protemplate); $i) { ?>
						<div class="row">
							<?php for ($j = 0; $j < 3; $j++) { ?>
								<div class="col-md-4 col-sm1 text-center">
									<div class="thumbnail-protemplate" tabindex="-1" id="<?php echo $protemplate[$i]['id']; ?>">
										<?php echo (!empty($protemplate[$i]['name'])) ? '<i class="fa fa-picture-o fa-3x"></i><p>' . $protemplate[$i]['name'] . '<span id="protemplate-id-' . $protemplate[$i]['id'] . '"></span></p>' : ''; ?>
									</div>
								</div>
								<?php
								$i++;
							}
							$j = 0;
							?>
						</div>
					<?php } ?>
				</div>

			</div>
			<input type="hidden" id="template-id">
			<input type="hidden" class="stage-name" data-stage-name="<?php echo $stage ?>">
		</div>
	</div>
<?php endif ?>
<!-- Stage 3 -->
<?php if ($stage == 'offer') : ?>
	<div class="container pb-2">
		<div class="" id="new-proposal-preview">
			<div class="min-height-500">
				<div class="box-header with-border">
					<h2 class="box-title">STEP 3: </h2>
					<h3 class="box-title">Project Costs</h3>
					<a class="btn btn-sm btn-success pull-right" id="btn-proposal-preview-stage">Preview <i class="fa fa-angle-right"></i></a>
				</div>
				<div class="box box-primary">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									<label for="select-product-breakdown" class="control-label">What is the product you're offering?</label>
								</div>
								<div class="col-md-6">	
									<select class="form-control" id="select-product-breakdown" name="product">
										<option value=""></option>
										<option value="add" class="divider" data-toggle="modal" data-target="#modal-add-product">+ Add Product</option>
										<option disabled>------</option>
										<?php foreach ($products as $product) : ?>
											<option value="<?php echo ($product['id']) ?>" data-price="<?php echo ($product['price']) ?>"> <?php echo ($product['name']) ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<p id="choose-product-error-msg"></p>
							</div>
						</div>
						<div class="box-header bg-light-gray disabled pad-20-left-right mar-20-top-botom">
							<h3 class="box-title"><i class="fa fa-plus"></i> Costs Breakdown</h3>
						</div>
						<div class="pad-10-perc-left pad-10-perc-right" id="costs-breakdown-table">
							<table class="table">
								<tr>
									<th>Stage</th>
									<th>Price</th>
									<th class="text-center">Qty</th>
									<th>Subtotal</th>
								</tr>
								<tr>
									<td>Initial Invoice</td>
									<td><input type="text" id="proposal-initial-invoice" class="text-right" readonly=""></td>
									<td class="text-center"><input type="text" id="proposal-qty-initial-invoice" class="text-right width-50-perc" value="1" readonly=""></td>
									<td><input type="text" id="proposal-subtotal-initial-invoice" readonly="" class="text-right"></td>
								</tr>
								<tr>
									<td>Approved Design Invoice</td>
									<td><input type="text" id="proposal-approved-design-invoice" class="text-right" readonly=""></td>
									<td class="text-center"><input type="text" id="proposal-qty-approved-design-invoice" class="text-right width-50-perc" value="1" readonly=""></td>
									<td><input type="text" id="proposal-subtotal-approved-design-invoice" readonly="" class="text-right"></td>
								</tr>
								<tr>
									<td>Final Invoice</td>
									<td><input type="text" id="proposal-final-invoice" class="text-right" readonly=""></td>
									<td class="text-center"><input type="text" id="proposal-qty-final-invoice" class="text-right width-50-perc" value="1" readonly=""></td>
									<td><input type="text" id="proposal-subtotal-final-invoice" readonly="" class="text-right"></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-right">
										<h4>Total</h4>
									</td>
									<td><input type="text" id="proposal-total-cost" readonly="" class="text-right"></td>
								</tr>
							</table>
						</div>

					</div>
					</div>
				<input type="hidden" class="stage-name" data-stage-name="<?php echo $stage ?>">
			</div>
		</div>
	</div>
<?php endif ?>
<!-- Stage 4 -->
<?php if ($stage == 'preview') : ?>
	<!--<div class="pad-10-perc-left pad-10-perc-right" id="new-proposal-preview">-->
	<div class="" id="new-proposal-preview">
		<div class="min-height-500">
			<div class="box-header with-border">
				<h2 class="box-title">STEP 4: </h2>
				<h3 class="box-title">Proposal preview</h3>
				<a href="/proposal/new/send" class="btn btn-sm btn-success pull-right">Send <i class="fa fa-angle-right"></i></a>
			</div>
			<div class="box-body">
				<?php echo $_SESSION['proposal']['template']['content']; ?>
			</div>
			<input type="hidden" class="stage-name" data-stage-name="<?php echo $stage ?>">
		</div>
	</div>
<?php endif ?>
<!-- Stage 5 -->
<?php if ($stage == 'send') : ?>
	<div class="pb-2" id="new-proposal-send">
		<div class="min-height-500">
			<div class="box-header with-border">
				<h2 class="box-title">STEP 5: </h2>
				<h3 class="box-title">Send proposal</h3>
				<a href="/proposal/new/complete" class="btn btn-sm btn-success pull-right" id="btn-proposal-send-stage">Send and Finish<i class="fa fa-angle-right"></i></a>
			</div>
			<div class="box box-primary">
				<div class="box-body">
					<div class="row">
						<div class="col-md-5">
							<div class="box box-default">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $_SESSION['proposal']['settings']['proposal_name'] ?></h3>
								</div>
								<div class="box-body">
									<div class="form-group">
										<label for="subject">To:</label>
										<input class="form-control" placeholder="To:" value="<?php echo $_SESSION['proposal']['settings']['client_email'] ?>" id="send-proposal-to">
									</div>
									<div class="form-group">
										<label for="subject">From:</label>
										<input class="form-control" placeholder="From:" value="<?php echo $_SESSION['email'] ?>" id="send-proposal-from">
									</div>
									<div class="form-group">
										<label for="subject">Subject</label>
										<input class="form-control" placeholder="{Proposal Name} - {Company Name}" value="<?php echo  $_SESSION['proposal']['settings']['proposal_name'] . ' - ' . Application::getConfig('company.name') ?>" id="send-proposal-subject">
									</div>
									<div>
										<form>
											<textarea id="editor1" name="editor1" rows="8" cols="80" style="visibility: hidden; display: none;">
																		Hi <?php echo $_SESSION['proposal']['settings']['client_name'] . " " . $_SESSION['proposal']['settings']['client_lastname']; ?>, <br> <p>Take a look at our proposal and let me know 
																		if you have any questions.</p> <br> <a href="#" class="btn btn-success">Click to view proposal</a>
																	</textarea>
										</form>
									</div>
									<!--<div class="form-group">
												<label for="send-email-template">Select Send Email Template</label>
												<select class="form-control" id="send-email-template" placeholder="Send Email Template">
													<option value=""></option>
												</select>
										</div>-->
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="row">
								<div class="col-sm12 col-md-10">
									<h4>Send Email preview</h4>
								</div>
								<div class="col-sm12 col-md-2 text-right"><button type="button" class="btn btn-sm btn-default">
										<li class="fa fa-repeat"></li>
									</button></div>
							</div>
							<div class="box">
								<div class="pad-5-left bg-gray">
									<li class="fa fa-circle text-red"></li>
									<li class="fa fa-circle text-yellow"></li>
									<li class="fa fa-circle text-green"></li>
								</div>
								<div class="bg-white">
									<div class="row pad-10-left">
										<div class="col-md-2 pad-10-top"><b class="text-muted">To:</b></div>
										<div class="col-md-10 pad-10-top" id="preview-send-proposal-to"><?php echo $_SESSION['proposal']['settings']['client_email'] ?></div>
										<div class="col-md-2 pad-10-top"><b class="text-muted">Subject:</b></div>
										<div class="col-md-10 pad-10-top" id="preview-send-proposal-subject"><?php echo  $_SESSION['proposal']['settings']['proposal_name'] . ' - ' . Application::getConfig('company.name') ?></div>
										<div class="col-md-2 pad-10-top"><b class="text-muted">From:</b></div>
										<div class="col-md-10 pad-10-top pad-10-bottom" id="preview-send-proposal-from"><?php echo $_SESSION['fullname'] . ' &lt;' . $_SESSION['email'] . '&gt;' ?></div>
									</div>
								</div>
								<div class="box-body pad-5-perc bg-light-gray">
									<div class="bg-white pad-5-perc" id="preview-send-proposal-message">
										<p>Hi <?php echo $_SESSION['proposal']['settings']['client_name'] . " " . $_SESSION['proposal']['settings']['client_lastname']; ?>,</p>
										<p>Take a look at our proposal and let me know
											if you have any questions.</p> <br> <a href="#" class="btn btn-success">Click to view proposal</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			<input type="hidden" class="stage-name" data-stage-name="<?php echo $stage ?>">
		</div>
	</div>
<?php endif ?>
<!-- Stage 6 -->
<?php if ($stage == 'complete') : ?>
	<div class="" id="new-proposal-send">
		<div class="min-height-500">
			<div class="box-header with-border">
				<h2 class="box-title">STEP 6: </h2>
				<h3 class="box-title">Proposal sent</h3>
			</div>
			<div class="box-body">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $_SESSION['proposal']['settings']['proposal_name'] ?></h3>
					</div>
					<div class="box-body min-height-300 text-center pt-4">
							<div class="pb-3"><h4>Your proposal has been sent</h4></div>
							<div><a class="btn btn-success btn-lg text-white" href="/proposal/new" title="Add new">Add a new Proposal<i id="preloader"></i></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Modal Add Client -->
<div class="modal fade" id="modal-add-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-left" id="myModalLabel">Add new Client</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<form id="form-new-client" class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="name" placeholder="Name" required value="">
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="lastname" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" placeholder="Email" required value="">
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-5">
								<input type="phone" class="form-control" id="phone" placeholder="Phone" required value="">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-10">
								<input type="address" class="form-control" id="address" placeholder="Address" required value="">
							</div>
						</div>
						<div class="form-group">
							<label for="country" class="col-sm-2 control-label">Country</label>
							<div class="col-sm-5">
								<select id="country" class="form-control" id="country" name="">
									<option value="">Select Country</option>
									<?php foreach ($countries as $country) : ?>
										<option value="<?php echo ($country) ?>"> <?php echo ($country) ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<input type="hidden" id="modal_source" name="modal_source" value="true">
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btn-new-client">Save Client</button>
			</div>
		</div>
	</div>
</div>