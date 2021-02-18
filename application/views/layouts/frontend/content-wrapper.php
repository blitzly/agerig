	<main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
	  <?php if ($doNotRenderContentHeader == 0) { ?>
		<div class="jumbotron mb-5 hero">
			<div class="container">
		    	<div class="row">
					<div class="col-8">
						<div class="row">
							<div>
								<h3>Hi, I'm Adrian</h3>
								<h4>I am a Web Developer based in Indianapolis, Indiana. I like to build elegant, maintainable, and performant websites with a modern tech stack.</h4>
							</div>
						</div>
						
					</div>
					<div class="col-4 text-center">
						<img src="https://via.placeholder.com/200" />
					</div>
				</div>
		    </div>
		</div>
	  <?php } ?>

	  	<?php 
	  		/* Render content */
	  		$this->renderContentInline();  
	  	?>
		
	    <div class="container-fluid mb-5 py-3 cta-1 text-white">
	      <div class="row">
	      	<div class="container">
	      		<div class="row py-5">
					<div class="col-md-7">
						<h1 class="">Want to <strong>Join</strong><span class="d-block"> to my space?</span></h1>
					</div>
					<div class="col-md-5">
						<form>
						  <div class="row pb-2">
						    <div class="col">
						      <input type="text" class="form-control form-control-lg" placeholder="Email">
						    </div>
						  </div>
						  <div class="row">
						    <div class="col">
						      <button type="submit" class="btn btn-primary btn-lg btn-block">Request Access</button>
						    </div>
						  </div>
						</form>
					</div>
	          </div>
	      	</div>
	      </div>
	    </div>

	

        