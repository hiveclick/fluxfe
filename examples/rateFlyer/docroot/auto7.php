<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead($_REQUEST);
    $lead->maxDataValue('page', 7);
    $lead->saveLocal();
    if(isset($_POST['_is_submit'])) {
        header('Location: /thanks');
        exit();
    }
    require_once(LIB_PATH . '/header.php');
?>
</head>
<body class="auto-theme">
    <div class="wrapper middle">
        <div class="header">
            <?php require_once(LIB_PATH . '/header_bar.php'); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hc2"><span class="glyphicon glyphicon-road"></span> Auto Coverage</div>
            </div>
        </div>
        <div class="container">
            <form name="mainForm" method="POST" class="form-horizontal">
                <input type="hidden" name="_is_submit" value="1" />
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="hc3">Your Information</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 label-lg hidden-sm hidden-xs">
                        First Name
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="first_name" name="first_name" class="form-control input-lg input-custom" type="text" value="<?php echo $lead->retrieveDataValue('first_name', null, 'htmlspecialchars'); ?>" required placeholder="First Name" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 label-lg hidden-sm hidden-xs">
                        Last Name
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="last_name" name="last_name" class="form-control input-lg input-custom" type="text" value="<?php echo $lead->retrieveDataValue('last_name', null, 'htmlspecialchars'); ?>" required placeholder="Last Name" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 label-lg hidden-sm hidden-xs">
                        Email
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="email" name="email" class="form-control input-lg input-custom" type="email" value="<?php echo $lead->retrieveDataValue('email', null, 'htmlspecialchars'); ?>" required placeholder="Email" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 label-lg hidden-sm hidden-xs">
                        Primary Phone
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="mobile_phone" name="mobile_phone" class="form-control input-lg input-custom" type="text" value="<?php echo $lead->retrieveDataValue('mobile_phone', null, 'htmlspecialchars'); ?>" required placeholder="Primary Phone" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="submit" name="_submit" value="VIEW MY RATES!" class="btn-lg btn-block btn-custom" />
                    </div>
                </div>
            </form>
        </div>
        <div class="footer-push"></div>
    </div>
    <div class="wrapper footer">
        <?php require_once(LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
