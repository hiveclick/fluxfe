<?php include("header.php") ?>


<div id="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h1 style="color:yellow">. . . . </h1><br><br><br>
				<div class="well well-lg" style="background-color: rgba(0, 0, 0, 0.6);">
					<center>
						<h2 style="color:white">Thank You!</h2>
						<p />
						<h4>
						You have been pre-qualified to speak with a placement specialist.  Please call us now with your confirmation code.</h2><p />
						</h4>
						<h1>(888) 708-9875</h1>
						<h2>Confirmation Code: RC-<?php echo rand(10000,80000) ?></h2>
						<h2> - or -</h2>
						<div class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-callme" id="callme">Please call me</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	$('#modal-callme').on('show.bs.modal', function (e) {
		$.post('https://callpixels.com/calls/new/for_number/3754982.json', {dial:'<?php echo $lead->getValue('phone') ?>', "policy": "<?php echo $lead->getValue('policy') ?>", "name": "<?php echo $lead->getValue('name') ?>"}, function(data) {});
	})
});
</script>

<div class="modal fade" id="modal-callme" tabindex="-1" role="modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content text-center">
			<div class="modal-body">
				<h4>We are calling you now at</h4>
				<h2><?php echo sprintf("%s-%s-%s",
							substr($lead->getValue('phone'), 0, 3),
							substr($lead->getValue('phone'), 3, 3),
							substr($lead->getValue('phone'), 6)) ?></h2>
				<h4>Your phone should ring in the next minute.</h4>
				<p />
				<i class="fa fa-spinner fa-3x fa-spin"></i>
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

<div id="hr">
<hr>	
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
<!-- Facebook Conversion Code for lead -->

<script>(function() {

var _fbq = window._fbq || (window._fbq = []);

if (!_fbq.loaded) {

var fbds = document.createElement('script');

fbds.async = true;

fbds.src = '//connect.facebook.net/en_US/fbds.js';

var s = document.getElementsByTagName('script')[0];

s.parentNode.insertBefore(fbds, s);

_fbq.loaded = true;

}

})();

window._fbq = window._fbq || [];

window._fbq.push(['track', '6024600691518', {'value':'0.01','currency':'USD'}]);

</script>

<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6024600691518&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>

<!-- Google Code for RehabForm Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 969573613;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "YPj3CKS5xlgQ7YmqzgM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/969573613/?label=YPj3CKS5xlgQ7YmqzgM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<script type="application/javascript" src="https://s.yimg.com/wi/ytc.js"></script><script type="application/javascript">YAHOO.ywa.I13N.fireBeacon([{"projectId" : "1000322189789","coloId" : "SP","properties" : {/*"documentName" : "",*/"pixelId" : "22199","qstrings" : {}}}]);</script>
<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/2e4de69f-f06d-46d9-8ed1-443712d13cb4/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"3269597",type:"1",actionid:"268312"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/2e4de69f-f06d-46d9-8ed1-443712d13cb4/analytics.html?dedup=1&domainId=3269597&type=1&actionid=268312" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>
<?php include("footer.php") ?>    
