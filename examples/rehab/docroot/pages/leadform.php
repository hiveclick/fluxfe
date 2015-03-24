<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['__submit'])) {
	$lead->save(true);
	$next_page = '/pages/thankyou.php';
	header('Location: ' . $next_page);
	exit;
}

#\FluxFE\Lead::debug();
?>

<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['__submit'])) {
	$lead->save(true);
	$next_page = '/pages/thankyou.php';
	header('Location: ' . $next_page);
	exit;
}

#\FluxFE\Lead::debug();
?>

<?php include("header.php") ?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<h1 text-align="left">We are reviewing your answers!</h1>
			<h4>May we contact you to discuss your free rehab location and treatment options?</h4><br>
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
				<div class="well well-lg" style="background-color: rgba(0, 0, 0, 0.6);">
					<form method="POST" action="" id="myform">
						<input type="hidden" name="__submit" value="1" />
						<input type="hidden" name="partial" value="1" />
						<div class="form-group"><input type="text" class="form-control input-md" id="fname" name="fname" value="" placeholder="Name"></div>
						<div class="form-group"><input type="tel" class="form-control input-md" id="phone1" name="phone1"  value="" placeholder="Phone"></div>
						<div class="form-group"><input type="tel" class="form-control input-md" id="zip" name="zip" maxlength="5" value="" placeholder="ZipCode"></div>
						<div class="form-group"><input type="email" id="email" name="email" value="" class="form-control" required="" data-parsley-error-message="Please enter a valid email" data-parsley-id="1823" placeholder="Email"><div class="help-block help-error" role="alert" id="parsley-id-1823"></div></div>
						<div class="form-group"><textarea rows="5" class="form-control input-md" id="message" name="message" value="" placeholder="Tell Us About Your Situation"></textarea></div>
						<input type="submit" name="btn_submit" value="Get Help Now" class="btn btn-danger btn-lg" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

			



<div class="partners">
	<div class="container">
		<div class="col-lg-12">
			<center><h2>Chances Are, Your Insurance Benefits Will Qualify.</h2></center><br>
		</div>
		<div class="row">
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/aetna.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/anthem.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/blue.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/cigna.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/hnet.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/well.png" alt="Logo"></div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/united.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/humana.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/multi.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/tufts.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/ameri.png" alt="Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/value.png" alt="Logo"></div>
		</div>
	</div>
</div>





	

<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Don't see your health provider above? <br>Call for a free insurance verification: 949 572 9621</h2><br>
			</div>

		</div>
	</div>
</div>


<a href="/pages/assessment.php">
<div class="form">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>To Take our Free Addiction Self Assessment, Click Here.</h2><br>
			</div>

		</div>
	</div>
</div>
</a>
	


<?php include("footer.php") ?>

