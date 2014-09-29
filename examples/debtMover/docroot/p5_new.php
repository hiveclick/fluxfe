<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
if (isset($_REQUEST['__agent']) && $_REQUEST['__agent'] == '1') {
    $lead->save();
    $next_page = '/p6_new';
    header('Location: ' . $next_page);
    exit();
}
\FluxFE\Lead::debug();

?>
<?php

    require_once('header.php');
?>
<script>
$(function() {
    $('#agent_call_link').on('click', function() {
        var ajax_url = '/trackcall?page_call=main';
        var call_request = $.ajax({
            dataType: 'json',
            url: ajax_url
        });
        var sLink = $(this).data('number');
        setTimeout(function() {
            window.location.href = sLink;
        },300);
    });
});
</script>
</head>
<body>
    <div class="wrapper middle">
        <div class="header">
            <?php
                $page_call = 5;
                require_once('header_bar.php');
            ?>
        </div>
        <div class="container">
            <form name="eligibility_check_form" autocomplete="off" class="form-horizontal">
                <div class="row">
                    <div class="col-xs-12">
                        <div>ELIGIBILITY STATUS CONFIRMED</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h4><strong>Your Information has been confirmed.</strong> One of our Student Loan Experts needs to speak with you to verify your identity and complete the process. Please click on the button below to speak to a specialist.</h4>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <a href="#" class="btn btn-lg btn-block btn-color-override-success" id="agent_call_link" role="button" data-number="tel:+18553150366">CLICK HERE TO SPEAK TO AN AGENT</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <img src="/assets/agent.jpg" class="img-responsive" style="margin:0 auto;" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <a href="/p5_new?__agent=1" class="btn btn-lg btn-block btn-color-override-cancel" role="button">PLEASE CALL ME LATER</a>
                    </div>
                </div>
            </form>

            <!-- Tracking pixel -->
            <img src="http://www.Fluxrt.local/p?_o=1&_c=1&conversion=1&_id=<?php echo $lead->getId() ?>" border="0" />

        </div>
        <script>
	var _op = _op || [];
	_op.push(['_trackPageView']);

	(function() {
		var op = document.createElement('script');
		op.type = 'text/javascript';
		op.async = 'true';
		op.src = ('https:' == document.location.protocal ? 'https://www' : 'http://www') + '.Flux.local/scripts/op.js';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(op, s);
	})();
</script>
    </div>
    <div class="wrapper footer">
        <?php require_once('footer_bar.php'); ?>
    </div>
</body>
</html>
