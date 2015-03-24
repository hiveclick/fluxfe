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

<div class="jumbotron_faq">
	<div class="container">
		<div class="row">
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<h2>FAQ</h2>
					<li>
						<h3>Will my insurance cover my rehab cost?</h3>
						<p>Yes! Rehab Connect works with the majority of health insurance providers across the country.  If you currently have a PPO policy with your provider, chances are your expenses will be completely covered.  If you are unsure about the level of care your insurance provides, please contact us to provide you with our free insurance verification service.  Our goal is remove the road blocks that may have prevented you from enrolling in the best rehab center for your needs. We want to provide you with the best care possible, for as little as possible. </p>
					</li>
					<li>
						<h3>What types of addiction do you support?</h3>
						<p>We are able to accomodate individuals suffering from all types of addictions.  Our placement advisors will find the perfect rehab center bases on your needs.</p>
					</li>
					<li>
						<h3>I dont know what kind of help I need. What do i do?</h3>
						<p>No problem. We can help determine your needs and how to best address them.  Request an appointment or give us a call.</p>
					</li>

			</div>
			<div class="col-lg-6 col-md-6">
				<div class="well well-lg" style="background-color:#02509F;">
					<h3>Request a Call from an Agent:</h3>
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

<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Request an Appointment, or Speak with a Placement Advisor: 949 572 9621</h2><br>
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

<div class="section-c">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
				<img class="img-responsive" src="/img/girldr2.png" alt="Logo">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<h3>Sober Living</h3>
				<p>•         •    •    •    •    •</p>
				<p>We believe that with the right desire and treatment, people can get sober and stay sober.  For Life.  But that does not mean its easy to do.  Our goal is to provide those recovering from addictions to receive the skills and tools to help them stay on the path of sobriety and everything that comes after treatment.  Job hunting, career workshops and implementing life skills are all necessary to staying the course.  If you, or someone you love, could benefit from being placed in one of the best centers in the country, please contact us today.  We are here to help!</p>
				<br>
				<p>Can we connect you or a loved one with a placement advisor?</p>
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

