<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
\FluxFE\Lead::getInstance()->clear();
$lead = \FluxFE\Lead::getInstance();

// Save the lead initially
$lead->save(true);
if (isset($_REQUEST['__submit']) && $_REQUEST['__submit'] == '1') {
	$lead->save(true);
	$next_page = '/p2_new';
	header('Location: ' . $next_page);
	exit();
}
\FluxFE\Lead::debug();
?>
<link rel='stylesheet' id='ig-pb-bootstrap-css'  href='http://spacemanwalking.com/wp-content/plugins/ig-pagebuilder/assets/3rd-party/bootstrap3/css/bootstrap_frontend.min.css?ver=3.0.2' type='text/css' media='all' />
<div class="entry-content clearfix">
    			<p></p><div class="jsn-bootstrap3"><div class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;"><div class="col-md-6 col-sm-9"><div class="jsn-bootstrap3 ig-element-container ig-element-image" style="margin-top:10px; margin-bottom:10px "><img src="http://spacemanwalking.com/wp-content/uploads/2014/05/Genworth_Financial_logo.png" alt="Logo" style="margin-top:10px;margin-bottom:10px"></div></div><div class="col-md-6 col-sm-9"><div class="jsn-bootstrap3 ig-element-container ig-element-progressbar" style="margin-top:10px; margin-bottom:10px "><div class="progress-info"><span class="progress-title"><i class="icon-dashboard"></i>Progress</span><span class="progress-percentage">5%</span></div><div class="progress progress-striped"><div class="progress-bar  progress-bar-info" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div><span class="sr-only">5%</span></div><script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			$(".ig-element-progressbar .progress-bar" ).each(function () {
				bar_width = $(this).attr("aria-valuenow");
				$(this).width(bar_width + "%");
			});
		});
	})(jQuery);
</script></div></div></div></div><div class="jsn-bootstrap3"><div class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;"><div class="col-md-12 col-sm-18"><div class="jsn-bootstrap3 ig-element-container ig-element-divider" style="margin-top:10px; margin-bottom:10px "><div style="border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#E0DEDE;margin-top:10px;margin-bottom:10px"></div></div><div class="jsn-bootstrap3 ig-element-container ig-element-heading" style="margin-top:10px; margin-bottom:10px "><h1 style="text-align:center;">Is this coverage for you, or a loved one?</h1></div></div></div></div><div class="jsn-bootstrap3"><div class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;"><div class="col-md-12 col-sm-18"><div class="jsn-bootstrap3 ig-element-container ig-element-buttonbar" style="margin-top:10px; margin-bottom:10px "><div class="btn-toolbar text-center"><a class="btn btn-lg btn-warning " href="http://">Myself</a><a class="btn btn-lg btn-warning " href="http://">Loved one</a><a class="btn btn-lg btn-warning " href="http://">Both</a></div></div></div></div></div><div class="jsn-bootstrap3"><div class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;"><div class="col-md-12 col-sm-18"><div class="jsn-bootstrap3 ig-element-container ig-element-divider" style="margin-top:10px; margin-bottom:10px "><div style="border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#E0DEDE;margin-top:10px;margin-bottom:10px"></div></div></div></div></div><div class="jsn-bootstrap3"><div class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;"><div class="col-md-4 col-sm-6"><div class="jsn-bootstrap3 ig-element-container ig-element-image" style="margin-top:10px; margin-bottom:10px "><img src="http://spacemanwalking.com/wp-content/uploads/2014/05/couple-300x300.png" style="margin-top:10px;margin-bottom:10px"></div></div><div class="col-md-4 col-sm-6"><div class="jsn-bootstrap3 ig-element-container ig-element-text" style="margin-top:10px; margin-bottom:10px "><div class="ig_text"><p>Nursing-home costs can climb above $87,000 a year, and home care can cost even more. ÒYour financial plan is not complete unless you have some kind of protection for long-term care built into it.Ó&nbsp; </p>
<p align="center">- Peter DÕArruda, President of Capital Financial Advisory Group, Cary, N.C.</p>
</div></div></div><div class="col-md-4 col-sm-6"><div class="jsn-bootstrap3 ig-element-container ig-element-promobox" style="margin-top:10px; margin-bottom:10px "><div class="ig-promobox"><section class="promo-box-shadow" style="background-color:#e8c890;border-top-width:5px;border-top-style: solid;border-left-width:5px;border-left-style: solid;border-bottom-width:5px;border-bottom-style: solid;border-right-width:5px;border-right-style: solid;border-color:#4ea0cc"><h2>Six Reasons to Transfer Risk to LTCi</h2><p>
</p><ul>
<li>Freedom of Choices</li>
<li>Maintain Independence</li>
<li>Help Protect Assets</li>
<li>Avoid Relying on Medicaid</li>
<li>Peace of Mind</li>
<li>Potential High Costs</li>
</ul>
</section></div></div></div></div></div><div class="jsn-bootstrap3"><div class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;"><div class="col-md-12 col-sm-18"><div class="jsn-bootstrap3 ig-element-container ig-element-divider" style="margin-top:10px; margin-bottom:10px "><div style="border-bottom-width:53px;border-bottom-style:solid;border-bottom-color:#22b5bd;margin-top:10px;margin-bottom:10px"></div></div></div></div></div><p></p>
    			  			</div>