<?php include("header.php") ?>




<div id="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="hidden-xs hidden-sm"><h1 style="color:yellow">You Could Qualify for Rehabilitation Treatment at No cost to You.</h1></div>
				<div class="hidden-lg hidden-md"><h3 style="color:yellow">You Could Qualify for Rehabilitation Treatment at No cost to You.</h3></div>
				<h3 style="text-align:center">Question 2 of 12</h3>
				<div class="well well-lg" style="background-color: rgba(0, 0, 0, 0.6);">
					<form method="POST" action="" id="myform">
						<input type="hidden" name="__submit" value="1" />
						<h2>What types of addictions has this individual suffered from?</h2><br />
						<div class="row text-center">
							<form class="col-md-6 col-md-offset-3">
							<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
							<select multiple size="4" class="form-control input-lg" name="type_of_addiction[]" value="" title="time">
							<option value="alcohol">Alcohol</option>
							<option value="illegal drugs">Illegal Drugs</option>
							<option value="prescription drugs">Prescription Drugs</option>
							<option value="other">Other</option>
							</select>
							</div>
						</div>
						
						<div class="col-xs-12 ">
							<br><input type="submit" name="btn_submit" value="NEXT" class="btn btn-danger btn-lg" />
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
//<!--
$('#myform').bootstrapValidator({
	feedbackIcons: {
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
	fields: {
		
		type_of_addiction: {
			validators: {
				notEmpty: {
					message: 'Please select which apply'
				}
			}
		},
	},
});
//-->
</script>

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

<div id="hr">
<hr>	
</div>

<div class="section-a">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<img class="img-responsive" src="/img/bandaid1.png" alt="">
			</div>
			<div class="col-lg-6">
				<h3>Recovery Programs</h3>
				<p>•         •    •    •    •    •</p>
				<p>If you or a loved one has been struggling from a drug addiction, Rehab-Connect can help.  Drug abuse is more common that most people realize.  It effects people of all ages, all genders, those of every financial situation, and is not isolated to illegal drugs like heroine or cocaine, but also effects those suffering from prescription drugs and painkillers as well.  If you or a loved one have been wanting to make a change for a better life, now is that time.  Our goals is to provide a path to rehabilitation to the 23 million americans suffering from addiction.  Let us help.
			</div>
		</div>
	</div>
</div>
		


<div class="section-b">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3>Facilities & Treatments</h3>
				<p>•         •    •    •    •    •</p>
				<p>Rehab-Connect is a national placement service that works with most insurance companies and can facilitate placement in the best rehab centers in the country, regardless of addiction, financial situation or location.  Our placement advisors will work with you or your loved one to determine the right facility and treatment for recovery.  Our mission is for everyone to experience the joys of sobriety.  We want you and your loved ones to live life. Live Sober. 
				<p>To learn more about how we can help you locate the best center for you, request and appointment with one of our placement advisors, or call now: <span style="color:red"><strong>949 572 9621</strong></span>.
			</div>
			<div class="col-lg-6">
				<img class="img-responsive" src="/img/america.jpg" alt="Logo">
			</div>
		</div>
	</div>
</div>



<div class="section-c">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<img class="img-responsive" src="/img/girldr2.png" alt="Logo">
			</div>
			<div class="col-lg-6">
				<h3>Sober Living</h3>
				<p>•         •    •    •    •    •</p>
				<p>We believe that with the right desire and treatment, people can get sober and stay sober.  For Life.  But that does not mean its easy to do.  Our goal is to provide those recovering from addictions to receive the skills and tools to help them stay on the path of sobriety and everything that comes after treatment.  Job hunting, career workshops and implementing life skills are all necessary to staying the course.  If you, or someone you love, could benefit from being placed in one of the best centers in the country, please contact us today.  We are here to help!</p>
				<br>
				<p>Can we connect you or a loved one with a placement advisor?</p>
			</div>
		</div>
	</div>
</div>




<!-- /.container -->
<script>
//<!--
$(document).ready(function() {
	$('#progressbar').prop('aria-valuenow', '0');
	$('#progressbar').css('width', '0%');
});
//-->
</script>
<?php include("footer.php") ?>    