<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead($_REQUEST);
    $lead->maxDataValue('page', 4);
    $lead->saveLocal();
    if(isset($_POST['_is_submit'])) {
        //header('Location: /auto4');
        //we want to do a variant test here, so we ask what we should go to
        //@TODO: make this work
        $flow_row = $lead->selectFlowRow('auto_is_married');
        $next_page = $flow_row['url'];
        //in this hardcoded example, we actually get back another flo
        $final_flow_name = $flow_row['final_flow_request_name'];
        $lead->storePrivateData('married_flow', $final_flow_name);
        $lead->saveLocal();
        //$next_page = '/auto4b';
        header('Location: ' . $next_page);
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
                        <div class="hc3">Married?</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="submit" name="married" value="YES" class="btn-lg btn-block btn-custom" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="submit" name="married" value="NO" class="btn-lg btn-block btn-custom" />
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
