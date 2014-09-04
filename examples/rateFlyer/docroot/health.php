<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead();
    if(isset($_POST['is_submit'])) {
        header('Location: /health2');
        exit();
    }
    require_once(LIB_PATH . '/header.php');
?>
</head>
<body class="health-theme">
    <div class="wrapper middle">
        <div class="header">
            <?php require_once(LIB_PATH . '/header_bar.php'); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hc2"><span class="glyphicon glyphicon-user"></span> Health Coverage</div>
            </div>
        </div>
        <div class="container">
            <form name="mainForm" method="POST" class="form-horizontal">
                <input type="hidden" name="is_submit" value="1" />
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="hc3">Your Zip?</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="zip" name="zip" maxlength="5" class="form-control input-lg input-custom" type="text" value="" required placeholder="Zip Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="submit" name="submit" value="NEXT" class="btn-lg btn-block btn-custom" />
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
