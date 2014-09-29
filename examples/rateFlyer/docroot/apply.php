<?php
    use FluxLocal\util\localLead as localLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    if(array_key_exists('__nt', $_REQUEST)) {
        $localLead = localLead::initLead($_REQUEST, true);
    } else {
        $localLead = localLead::initLead($_REQUEST);
    }
    
    $localLead->maxDataValue('max_page', 0);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        //means we got here through some other method where we didn't have _c, possibly organic
        //normally we would set some default offer id here instead of just 1, or maybe 1 is the default offer value
        $default_organic_offer_id = DEFAULT_RATEFLYER_CAMPAIGN_ID;
        $localLead->assignValue('_c', $default_organic_offer_id);
    }
    
    $saveData = array(
        'max_page' => $localLead->retrieveDataValue('max_page'),
        'flow1' => '7 pages',
        'p1_view' => 1
    );
    
    $saveResult = $localLead->saveDatabase($saveData);
    
    $localLead->saveLocal();
    
    $clear_query_string = true;
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
</head>
<body>
    <div class="header">
        <?php require_once(LOCAL_LIB_PATH . '/header_bar.php'); ?>
    </div>
    <div class="container middle">
        <div class="row">
            <div class="col-xs-12 hc1">Get Instant Quotes</div>
        </div>
        <div class="row">
            <div class="col-xs-12 hc2">AT TODAY'S LOWEST RATES</div>
        </div>
        <div class="row">
            <div class="col-xs-12 hc3">Select To Start Now!</div>
        </div>
        <div class="main_buttons">
            <a href="/home" class="icon home"><div class="glyphicon glyphicon-home"></div><h4>HOME</h4></a>
            <a href="/auto" class="icon auto"><span class="glyphicon glyphicon-road"></span><br/><h4>AUTO</h4></a>
            <a href="/health" class="icon health"><span class="glyphicon glyphicon-user"></span><br/><h4>HEALTH</h4></a>
            <a href="/life" class="icon life"><span class="glyphicon glyphicon-heart"></span><br/><h4>LIFE</h4></a>
        </div>
    </div>
    <div class="footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div>
</body>
</html>
