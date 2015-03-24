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

<div class="jumbotron_rec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<h1>Which Recovery Program is Right For You? </h1>
			<h4>The path to recovery starts with the right programs, in the right atmosphere.</h4><br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="hidden-sm hidden-xs">
				<h2 style="text-align:left">Recovery Programs:</h2>
					<li>
						<h3><span class="glyphicon glyphicon-ok-circle"> </span> Alcohol Addiction</h3>
					</li>
					<li>
						<h3><span class="glyphicon glyphicon-ok-circle"> </span> Drug Addiction</h3>
					</li>
					<li>
						<h3><span class="glyphicon glyphicon-ok-circle"> </span> Mental Health</h3>
					</li>
					<li>
						<h3><span class="glyphicon glyphicon-ok-circle"> </span> Sober Living</h3>
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

<div class="section-a">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
				<img class="img-responsive" src="/img/bandaid1.png" alt="">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<h3>Recovery Programs</h3>
				<p>•         •    •    •    •    •</p>
				<p>If you or a loved one has been struggling from a drug addiction, Rehab-Connect can help.  Drug abuse is more common that most people realize.  It effects people of all ages, all genders, those of every financial situation, and is not isolated to illegal drugs like heroine or cocaine, but also effects those suffering from prescription drugs and painkillers as well.  If you or a loved one have been wanting to make a change for a better life, now is that time.  Our goals is to provide a path to rehabilitation to the 23 million americans suffering from addiction.  Let us help.
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