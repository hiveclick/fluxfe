

<div id="hr">
<hr>	
</div>

<div id="ftr">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4>Rehab-Connect</h4>
				<p>Rehab-Connect is a network of drug rehab centers, using a bio-psycho-social treatment to correct addictive behaviors.</p>
				<p>We want you to see yourself for the unique, courageous and valuable individual we know you to be!</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4>Locations</h4>
				<p>We have the ability to provide rehab center placement service anywhere in the country.  We have drug rehab placement advisor who are able to find the best suited treatment plan and facility for you.</p>
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4>Links</h4>
				<ul>
					<a href="/pages/assessment.php"><li>Addiction Assessment Quiz</li></a><br>
					<a href="/v1/page1.php"><li>Addiction Survey</li></a><br>
					<a href="/pages/recovery.php"><li>Recovery Programs</li></a><br>
					<a href="/pages/treatment.php"><li>Treatment Programs</li></a><br>
					<a href="/pages/faq.php"><li>FAQ</li></a><br>
					<a href="/pages/contact.php" target="_blank">Contact Us</a><br>
				</ul>
			</div>
		</div>
	</div>
</div>




<div id="bottom">
	<div class="container">
		<div class="row">
			<center>
			 <img class="img-responsive" src="/img/dr_logo1.png" alt="Drug Rehab Logo">
			 <div class="col-md-12">180 La Pata Suite 100 • San Clemente CA 92673 • 949 572 9621</div><br />				
			 <div class="col-md-12">Copyright © 2014 Rehab-Connect.com • All Rights Reserved</div><br />		
			 <div class="col-md-12"><a href="/pages/toc.php" target="_blank">Terms & Conditions</a> | <a href="/pages/privacy.php" target="_blank">Privacy Policy</a></div>
			 <div class="col-md-12">
			 <ul class="footer-socials list-inline">
                    <li>
                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </li> 
                    <li>
                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                </ul>
			 </div>
			 </center>
		</div>
	</div>
</div>

<!--
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h3>Treatment for trauma, addiction, mental health and dual diagnosis.</h3>
			<p>The PURE LiFE facility in Los Angeles provides mental and behavioral health treatment exclusively to adults, specializing in cases involving trauma and abuse. Undergoing treatment at a residential rehabilitation program can be an unnerving experience, especially for victims of current or past trauma. At our California-based center, we provide a specialized trauma track in addition to dual diagnosis treatment, addressing the co-occurring mental and substance abuse issues that often accompany it.</p>
		</div>            
		<div class="col-md-3 btn-buy">
			<a href="tel:+18556529045" class="btn btn-u btn-u-lg" role="button"><span class="fa fa-phone"></span> (855) 652-9045</a>
		</div>
	</div>
</div>
-->

</body>
</html>


<script>
//<!--

$(document).ready(function() {
	$('#phone1').keyup(function(e) {
		if (e.which >= 48 && e.which <= 90) {
			$old_phone = $(this).val();
			$new_phone = $old_phone.replace(/[^\d]/g, '').replace(/(\d{0,3})(\d{0,3})(\d{0,4})(\d?)/, '($1) $2-$3');
			$(this).val($new_phone);
		}
	});
});
//-->
</script>
<script>
$('#myform').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
	fields: {
		
		email: {
			validators: {
				notEmpty: {
					message: 'Please enter a valid email address'
				}
			}
		},
		fname: {
			validators: {
				notEmpty: {
					message: 'Please enter your first and last name'
				}
			}
		},
		zip: {
			validators: {
				notEmpty: {
					message: 'Please enter your zipcode'
				}
			}
		},
		phone1: {
			validators: {
				notEmpty: {
					message: 'Please enter a valid phone number'
				}
			}
		},
		message: {
			validators: {
				notEmpty: {
					message: 'Please enter a brief message'
				}
			}
		},
	},
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52085538-6', 'auto');
  ga('send', 'pageview');

</script>
<script>
	var _op = _op || [];
	_op.push(['_trackPageView']);

	(function() {
		// Save the lead to the localStorage
		localStorage.setItem('flux_data', '<?php echo json_encode(\FluxFE\Lead::getInstance()->getD()) ?>');
		
		var op = document.createElement('script');
		op.type = 'text/javascript';
		op.async = 'true';
		op.src = ('https:' == document.location.protocal ? 'https://www' : 'http://www') + '.flux.dev/op?l=<?php echo \FluxFE\Lead::getInstance()->getId() ?>';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(op, s);
	})();
</script>