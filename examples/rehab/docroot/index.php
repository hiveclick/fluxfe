<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['_submit'])) {
	$lead->save(true);
	$next_page = '/pages/thankyou.php';
	header('Location: ' . $next_page);
	exit;
}

\FluxFE\Lead::debug();
?>


<?php include("pages/header.php") ?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<h1 text-align="left">Find The Best Rehab Facilities to Restore Your Life.</h1>
			<h4>Find the Best Treatments at the Best Centers to Fit Your Needs.</h4><br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="hidden-sm hidden-xs">
				<h2>Why Rehab-Connect?</h2>
					<li>
						<h3><span style="background-color:#02509F"><span class="glyphicon glyphicon-ok-circle"> </span> Nationwide Rehab Network</span></h3>
					</li>
					<li>
						<h3><span style="background-color:#02509F"><span class="glyphicon glyphicon-ok-circle"> </span> Pre-screened Rehab Facilities</span></h3>
					</li>
					<li>
						<h3><span style="background-color:#02509F"><span class="glyphicon glyphicon-ok-circle"> </span> Most Insurance Benefits Accepted</span></h3>
					</li>
					<li>
						<h3><span style="background-color:#02509F"><span class="glyphicon glyphicon-ok-circle"> </span> Treatment Programs: Body & Mind</span></h3>
					</li>
					<li>
						<h3><span style="background-color:#02509F"><span class="glyphicon glyphicon-ok-circle"> </span> Private & Secure</span></h3>
					</li>
					</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="well well-lg" style="background-color:#02509F;">
					<h3>Connect With a Rehab Placement Expert</h3>
					<form method="POST" action="" id="myform">
						<input type="hidden" name="__submit" value="1" />
						<input type="hidden" name="partial" value="1" />
						<div class="form-group"><input type="text" class="form-control input-md" id="fname" name="fname" value="" placeholder="Name"></div>
						<div class="form-group"><input type="tel" class="form-control input-md" id="phone1" name="phone1"  value="" placeholder="Phone"></div>
						<div class="form-group"><input type="tel" class="form-control input-md" id="zip" name="zip" maxlength="5" value="" placeholder="ZipCode"></div>
						<div class="form-group"><input type="email" id="email" name="email" value="" class="form-control" required="" data-parsley-error-message="Please enter a valid email" data-parsley-id="1823" placeholder="Email"><div class="help-block help-error" role="alert" id="parsley-id-1823"></div></div>
						<input type="submit" name="_submit" value="Get Help Now" class="btn btn-danger btn-lg" />
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
				<h2>Request an Appointment, or Speak with a Specialist: 949 572 9621</h2><br>
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
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/aetna.png" alt="aetna Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/anthem.png" alt="anthem Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/blue.png" alt="blue Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/cigna.png" alt="cignaLogo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/hnet.png" alt="hnetLogo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/well.png" alt="wellLogo"></div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/united.png" alt="unitedLogo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/humana.png" alt="humana Logo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/multi.png" alt="multiLogo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/tufts.png" alt="tuftsLogo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/ameri.png" alt="ameriLogo"></div>
			<div class="col-lg-2 col-sm-4 col-xs-6"><img class="img-responsive" src="/img/value.png" alt="valueLogo"></div>
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

<div class="section-a">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
				<img class="img-responsive" src="/img/bandaid1.png" alt="bandaid patch">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<h3>Recovery Programs</h3>
				<p>•         •    •    •    •    •</p>
				<p>If you or a loved one has been struggling from a drug addiction, Rehab-Connect can help.  Drug abuse is more common that most people realize.  It effects people of all ages, all genders, those of every financial situation, and is not isolated to illegal drugs like heroine or cocaine, but also effects those suffering from prescription drugs and painkillers as well.  If you or a loved one have been wanting to make a change for a better life, now is that time.  Our goals is to provide a path toward rehabilitation for the 23 million americans who suffer from addiction.  Let us help.
			</div>
		</div>
	</div>
</div>
		


<div class="section-b">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<h3>Facilities & Treatments</h3>
				<p>•         •    •    •    •    •</p>
				<p>Rehab-Connect is a national placement service that works with most insurance companies and can facilitate placement in the best rehab centers in the country, regardless of addiction, financial situation or location.  Our placement advisors will work with you or your loved one to determine the right facility and treatment for recovery.  Our mission is for everyone to experience the joys of sobriety.  We want you and your loved ones to live life. Live Sober. 
				<p>To learn more about how we can help you locate the best center for you, request and appointment with one of our placement advisors, or call now: <span style="color:red"><strong>949 572 9621</strong></span>.
			</div>
			<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
				<center><img class="img-responsive" src="/img/america.jpg" alt="america"></center>
			</div>
		</div>
	</div>
</div>



<div class="section-c">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
				<img class="img-responsive" src="/img/girldr2.png" alt="feeling the joy of life">
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
	


<?php include("pages/footer.php") ?>




