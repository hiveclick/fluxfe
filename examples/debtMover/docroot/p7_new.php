<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$localLead = \GunFE\Lead::getInstance();
$localLead->save(true);
\GunFE\Lead::debug();
?>
<?php
    
    require_once('header.php');
?>
    
</head>
<body>
    <div class="header">
        <?php
            $page_call = 7;
            require_once('header_bar.php');
        ?>
    </div>
    <div class="container middle">
        <div class="row">
            <div class="col-xs-12">
                <div>ELIGIBILITY STATUS CONFIRMED</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Thank you for submitting your information. One of our Student Loan Experts will call you to discuss your case in the next 24-48 hours.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Please make sure to have your loan details handy and accept our call.</h4>
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
