<?php
    use gunLocal\util\localLead as localLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    $localLead = localLead::initLead($_REQUEST);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        $landing_page = '/apply';
        header('Location: ' . $landing_page);
        exit();
    }
    
    if(isset($_REQUEST['__submit'])) {
        $localLead->maxDataValue('max_page', 6);
        $localLead->saveDatabase(array(
            'max_page' => $localLead->retrieveDataValue('max_page'),
            'p7_view' => 1,
            'first_name' => $localLead->retrieveDataValue('first_name'),
            'last_name' => $localLead->retrieveDataValue('last_name'),
            'email' => $localLead->retrieveDataValue('email'),
            'phone' => $localLead->retrieveDataValue('phone')
        ));
        $localLead->saveLocal();
        $next_page = '/p7';
        header('Location: ' . $next_page);
        exit();
    }
    
    $localLead->saveLocal();
    
    require_once(LOCAL_LIB_PATH . '/header.php');
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
            require_once(LOCAL_LIB_PATH . '/header_bar.php');
        ?>
    </div>
    <div class="container middle">
        <form name="eligibility_check_form" class="form-horizontal" method="POST">
            <input type="hidden" name="__submit" value="1" />
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
                    <input type="text" name="first_name" class="form-control" value="<?php echo $localLead->retrieveDataValueHtml('first_name'); ?>" placeholder="First Name" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your first name" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" name="last_name" class="form-control" value="<?php echo $localLead->retrieveDataValueHtml('last_name'); ?>" placeholder="Last Name" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your last name" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="email" name="email" class="form-control" value="<?php echo $localLead->retrieveDataValueHtml('email'); ?>" placeholder="Email" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your email" data-bv-emailaddress-message="Please enter a valid email" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="tel" name="phone" class="form-control" value="<?php echo $localLead->retrieveDataValueHtml('phone'); ?>" placeholder="Phone" required data-bv-trigger="blur" data-bv-notempty-message="Please enter your phone" data-bv-customPhone="true" data-bv-customPhone-message="Please enter a valid 10-digit phone" />
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
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
