<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead($_REQUEST);
    $lead->maxDataValue('page', 1);
    $lead->saveLocal();
    
    //$lead->saveDatabase();
    if(isset($_POST['_is_submit'])) {
        header('Location: /auto2');
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
                        <div class="hc3">Your Zip?</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                       <input id="zip" name="zip" maxlength="5" class="form-control input-lg input-custom" type="text" value="<?php echo $lead->retrieveDataValue('zip', null, 'htmlspecialchars'); ?>" required placeholder="Zip Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="submit" name="_submit" value="NEXT" class="btn-lg btn-block btn-custom" />
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
