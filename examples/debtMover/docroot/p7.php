<?php
    use FluxLocal\util\localLead as localLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    $localLead = localLead::initLead($_REQUEST);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        $landing_page = '/apply';
        header('Location: ' . $landing_page);
        exit();
    }
    
    $localLead->saveLocal();
    
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
    
</head>
<body>
    <div class="header">
        <?php
            $page_call = 7;
            require_once(LOCAL_LIB_PATH . '/header_bar.php');
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
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
