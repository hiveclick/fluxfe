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

<div class="jumbotron_tre">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<h1 text-align="left">Treatment Programs</h1>
			<h4>Treating the person, not just the addiction, is at the core of everything we do.</h4><br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="hidden-sm hidden-xs">
				<h2 style="text-align:left">Treatments:</h2>
					<li>
						<h3>Treatment for Men</h3>
					</li>
					<li>
						<h3>Treatment for Woman</h3>
					</li>
					<li>
						<h3>Self Assessment</h3>
					</li>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="well well-lg" style="background-color:#02509F;">
					<h3>Connect With a Placement Expert</h3>
					<form method="POST" action="" id="myform">
						<input type="hidden" name="__submit" value="1" />
						<input type="hidden" name="partial" value="1" />
						<div class="form-group"><input type="text" class="form-control input-md" id="name" name="name" value="" placeholder="Name"></div>
						<div class="form-group"><input type="tel" class="form-control input-md" id="phone" name="phone"  value="" placeholder="Phone"></div>
						<div class="form-group"><input type="tel" class="form-control input-md" id="zip" name="zip" maxlength="5" value="" placeholder="ZipCode"></div>
						<div class="form-group"><input type="email" id="email" name="email" value="" class="form-control" required="" data-parsley-error-message="Please enter a valid email" data-parsley-id="1823" placeholder="Email"><div class="help-block help-error" role="alert" id="parsley-id-1823"></div></div>
						<input type="submit" name="rehab_home" value="Get Help Now" class="btn btn-danger btn-lg" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<a href="/pages/assessment.php">
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2> <span class="glyphicon glyphicon-list-alt"> </span> Click Here to Take our Self Assessment Quiz </h2><br>
			</div>

		</div>
	</div>
</div>
</a>

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
		<div class="row">
			<center>
				<br><div class="col-md-12"><h5>Don't see your health care provider? Contact us for a free provider verification.</h5></div>
			</center>
		</div>
	</div>
</div>

<a href="/v1/page1.php">
<div class="form">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h2>Find Out If You Qualify For Free Rehab Treatment</h2><br>
			</div>
			<div class="col-lg-4"><br>
				<input type="" name="" value="START NOW" class="btn btn-danger btn-md" /><br><br>
			</div>
		</div>
	</div>
</div>
</a>

<div id="hr">
<hr>	
</div>

<div class="section-treatment">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<h3>Facilities & Treatments</h3>
				<p>•         •    •    •    •    •</p>
				<p>Rehab-Connect is a national placement service that works with most insurance companies and can facilitate placement in the best rehab centers in the country, regardless of addiction, financial situation or location.  Our placement advisors will work with you or your loved one to determine the right facility and treatment for recovery.  Our mission is for everyone to experience the joys of sobriety.  We want you and your loved ones to live life. Live Sober. 
				<p>To learn more about how we can help you locate the best center for you, request and appointment with one of our placement advisors, or call now: <span style="color:red"><strong>949 572 9621</strong></span>.
			</div>
			<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
				<img class="img-responsive" src="/img/america.jpg" alt="Logo">
			</div>
		</div>
	</div>
</div>
		




	
<a href="#">
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>To Request an Appointment, Complete The Form Above, <br>or Speak with a Placement Advisor: 949 572 9621</h2><br>
			</div>

		</div>
	</div>
</div>
</a>
	



<?php include("footer.php") ?>

