<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "================INDEX.php================");
if (isset($_REQUEST['__submit']) && $_REQUEST['__submit'] == '1') {
    $lead = \GunFE\Lead::getInstance();
    $lead->save(true);
    $next_page = '/p2_new';
    header('Location: ' . $next_page);
    exit();
} else {
    $lead = \GunFE\Lead::getInstance();
    // Save the lead initially
    $lead->save(true);
    #\GunFE\Lead::debug();
}
?>

<?php include_once('header.php') ?>

<body>
    <div class="header">
        <?php
            $page_call = 1;
            require_once('header_bar.php');
        ?>
    </div>
    <div class="container middle" style="background: url('/assets/stars_bg.png') no-repeat top center">
        <div class="row">
            <div class="col-xs-12">
                <h2>Start your Online Eligibility Check</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>In certain situations, you can have your Student Loans forgiven, cancelled or even deferred. Find out whether you qualify due to your job, disability, school closure or other circumstance.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Click the "Check Eligibility" button below to get started</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="/index.php?__submit=1" class="btn btn-lg btn-block btn-color-override" role="button">CHECK ELIGIBILITY</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php require_once('footer_bar.php'); ?>
    </div>
</body>
</html>
<script>
	var _op = _op || [];
	_op.push(['_trackPageView']);

	(function() {
		var op = document.createElement('script');
		op.type = 'text/javascript';
		op.async = 'true';
		op.src = ('https:' == document.location.protocal ? 'https://www' : 'http://www') + '.gun.local/scripts/op.js';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(op, s);
	})();
</script>