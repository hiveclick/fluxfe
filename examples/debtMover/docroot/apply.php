<?php
    use FluxLocal\util\localLead as localLead;
    
    if (file_exists(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php')) {
        require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
    }
    
    $localLead = localLead::initLead();
//     $last_flow = $localLead->lookupTest(FLOW);
    
    $last_flow = $localLead->lookupTest('debtmover_flow');
    if($last_flow === 2) {
        //we are going to start on page 3 with this flow
        $query_string = $_SERVER['QUERY_STRING'];
        if(strlen($query_string) > 0) {
            $query_string = '?' . $_SERVER['QUERY_STRING'];
        }
        header('Location: /contact' . $query_string);
        exit();
    } else {
        //we will use this page, so stay here
    }
    
    $localLead->maxDataValue('max_page', 0);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        //means we got here through some other method where we didn't have _c, possibly organic
        //normally we would set some default offer id here instead of just 1, or maybe 1 is the default offer value
        $default_organic_offer_id = DEFAULT_DEBTMOVER_CAMPAIGN_ID;
        $localLead->assignValue('_c', $default_organic_offer_id);
    }
    
    $saveData = array(
        'max_page' => $localLead->retrieveDataValue('max_page'),
        'flow1' => '7 pages',
        'p1_view' => 1
    );

    $saveResult = $localLead->saveDatabase($saveData);
    
    if(isset($_REQUEST['__submit'])) {
        $localLead->maxDataValue('max_page', 1);
        
        $saveData = array(
            'max_page' => $localLead->retrieveDataValue('max_page'),
            'p2_view' => 1
        );
        
        $saveResult = $localLead->saveDatabase($saveData);
        $localLead->saveLocal();
        $next_page = '/p2';
        header('Location: ' . $next_page);
        exit();
    }
    
    $localLead->saveLocal();
    
    $clear_query_string = true;
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
</head>
<body>
    <div class="header">
        <?php
            $page_call = 1;
            require_once(LOCAL_LIB_PATH . '/header_bar.php');
        ?>
    </div>
    <div class="container middle" style="background: url('/assets/stars_bg.png') no-repeat top center">
        <?php require_once(LOCAL_LIB_PATH . '/check_cookies.php'); ?>
        <div class="row">
            <div class="col-xs-12">
                <h2>Start your Online Eligibility Check</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>In certain situations, you can have your Student Loans forgiven, cancelled or even deferred. Find out whether you qualify due to your job, disability, school closure or other circumstance.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Click the "Check Eligibility" button below to get started</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="/apply?__submit=1" class="btn btn-lg btn-block btn-color-override" role="button">CHECK ELIGIBILITY</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div>
</body>
</html>
