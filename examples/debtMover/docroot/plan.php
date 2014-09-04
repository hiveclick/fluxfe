<?php
    use gunLocal\util\localLead as localLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    if(array_key_exists('__nt', $_REQUEST)) {
        $localLead = localLead::initLead($_REQUEST, true);
    } else {
        $localLead = localLead::initLead($_REQUEST);
    }
    
    $localLead->maxDataValue('max_page', 0);
    $localLead->assignDataValue('debtmover_flow', 2);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        //means we got here through some other method where we didn't have _c, possibly organic
        //normally we would set some default offer id here instead of just 1, or maybe 1 is the default offer value
        $default_organic_offer_id = DEFAULT_DEBTMOVER_CAMPAIGN_ID;
        $localLead->assignValue('_c', $default_organic_offer_id);
    }
    
    $saveData = array(
        'max_page' => $localLead->retrieveDataValue('max_page'),
        'flow1' => '5 pages',
        'p1a_view' => 1
    );
    
    $saveResult = $localLead->saveDatabase($saveData);
    
    if(isset($_REQUEST['__submit'])) {
        $localLead->maxDataValue('max_page', 3);
        $saveData = array(
            'max_page' => $localLead->retrieveDataValue('max_page'),
            'p4_view' => 1,
            'debt_amount' => $localLead->retrieveDataValue('debt_amount')
        );

        $localLead->saveDatabase($saveData);
        $localLead->saveLocal();
        $next_page = '/p4';
        header('Location: ' . $next_page);
        exit();
    }
    
    $localLead->saveLocal();
    
    $clear_query_string = true;
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
<style type="text/css">
    .noUi-connect {
        background-color:#33cc33;
    }
</style>
<script type="text/javascript">
$(function() {
    $('#debt_slider').noUiSlider({
        'start': [ 20000 ],
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
            require_once(LOCAL_LIB_PATH . '/header_bar.php');
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
                    <input type="text" name="debt_amount" id="debt_amount" class="form-control" value="<?php echo $localLead->retrieveDataValueHtml('debt_amount'); ?>" required data-bv-trigger="blur" data-bv-notempty-message="Please enter a valid debt amount" title="" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" name="__submit_btn" class="btn btn-lg btn-block btn-color-override">NEXT</button>
                </div>
            </div>
        </form>
    </div>
    <div class="footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
