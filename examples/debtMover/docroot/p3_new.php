<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "================p3_new.php================");
$lead = \FluxFE\Lead::getInstance();
if (isset($_REQUEST['__submit']) && $_REQUEST['__submit'] == '1') {
    $lead->save();
    $next_page = '/p4_new';
    header('Location: ' . $next_page);
    exit();
}
\FluxFE\Lead::debug();

?>
<?php

    require_once('header.php');
?>
<style type="text/css">
    .noUi-connect {
        background-color:#33cc33;
    }
</style>
<script type="text/javascript">
$(function() {
    $('#debt_slider').noUiSlider({
        'start': [ <?php echo intval(str_replace(',', '', str_replace('$', '', $lead->getValue('debt_amount')))); ?> ],
        'connect': 'lower',
        'range': {
            'min': [ 0 ],
            'max': [ 100000 ]
        },
        'step': 100,
        'serialization': {
            'lower': [
                new SliderLink({
                    'target': $("#debt_amount")
                })
            ],
            'format': {
                'decimals': 0,
                'thousand': ',',
                'prefix': '$'
            }
        }
    });

    $('[name=eligibility_check_form]').bootstrapValidator();
});
</script>
</head>
<body>
    <div class="header">
        <?php
            $page_call = 3;
            require_once('header_bar.php');
        ?>
    </div>
    <div class="container middle" style="background: url('/assets/stars_bg.png') no-repeat top center">
        <form name="eligibility_check_form" class="form-horizontal" method="POST">
            <input type="hidden" name="__submit" value="1" />
            <div class="row">
                <div class="col-xs-12">
                    <div>YOUR ONLINE ELIGIBILITY CHECK</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4>How much is your Student Debt?</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div id="debt_slider"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" name="debt_amount" id="debt_amount" class="form-control" value="<?php echo $lead->getValueHtml('debt_amount'); ?>" required data-bv-trigger="blur" data-bv-notempty-message="Please enter a valid debt amount" title="" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" name="__submit_btn" class="btn btn-lg btn-block btn-color-override">NEXT</button>
                </div>
            </div>
        </form>

        <!-- Tracking pixel -->
        <img src="http://www.Fluxrt.local/p?_o=1&_c=1&partial=1&_id=<?php echo $lead->getId() ?>" border="0" />
    </div>
    <div class="footer">
        <?php require_once('footer_bar.php'); ?>
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
</body>
</html>
