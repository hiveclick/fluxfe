<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$localLead = \FluxFE\Lead::getInstance();
if (isset($_REQUEST['__submit']) && $_REQUEST['__submit'] == '1') {
    $localLead->save(true);
    $next_page = '/p7_new';
    header('Location: ' . $next_page);
    exit();
}
\FluxFE\Lead::debug();
?>
<?php
    
    require_once('header.php');
?>
<script type="text/javascript">
$(function() {
    $.fn.bootstrapValidator.validators.customPhone = {
        html5Attributes: {
            message: 'message',
            country: 'country'
        },
        validate: function(validator, $field, options) {
            var value = $field.val();
            if (value == '') {
                return true;
            }

            var country = (options.country || 'US').toUpperCase();
            switch (country) {
                case 'US':
                default:
                    // Make sure US phone numbers have 10 digits
                    value = value.replace(/[^0-9]+/g, '');
                    return (/^(?:1\-?)?(\d{3})[\-\.]?(\d{3})[\-\.]?(\d{4})$/).test(value) && (value.length == 10);
            }
        }
    };
    $('[name=eligibility_check_form]').bootstrapValidator();
});
</script>
</head>
<body>
    <div class="header">
        <?php
            $page_call = 6;
            require_once('header_bar.php');
        ?>
    </div>
    <div class="container middle">
        <form name="eligibility_check_form" class="form-horizontal" method="POST">
            <input type="hidden" name="__submit" value="1" />
            <input type="hidden" name="conversion" value="1" />
            <div class="row">
                <div class="col-xs-12">
                    <div>ELIGIBILITY STATUS CONFIRMED</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4>To have a Student Loan Expert contact you regarding your forgiveness application, please complete the information below.</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" name="first_name" class="form-control" value="<?php echo $localLead->getValueHtml('first_name'); ?>" placeholder="First Name" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your first name" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" name="last_name" class="form-control" value="<?php echo $localLead->getValueHtml('last_name'); ?>" placeholder="Last Name" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your last name" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="email" name="email" class="form-control" value="<?php echo $localLead->getValueHtml('email'); ?>" placeholder="Email" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your email" data-bv-emailaddress-message="Please enter a valid email" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="tel" name="phone" class="form-control" value="<?php echo $localLead->getValueHtml('phone'); ?>" placeholder="Phone" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your phone" data-bv-customPhone="true" data-bv-customPhone-message="Please enter a valid 10-digit phone" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" name="__submit_btn" class="btn btn-lg btn-block btn-color-override">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
    <div class="wrapper footer">
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
		op.src = ('https:' == document.location.protocal ? 'https://www' : 'http://www') + '.Flux.local/scripts/op.js';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(op, s);
	})();
</script>
