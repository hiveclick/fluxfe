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
    $localLead->assignDataValue('debtmover_flow', 3);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        //means we got here through some other method where we didn't have _c, possibly organic
        //normally we would set some default offer id here instead of just 1, or maybe 1 is the default offer value
        $default_organic_offer_id = DEFAULT_DEBTMOVER_CAMPAIGN_ID;
        $localLead->assignValue('_c', $default_organic_offer_id);
    }
    
    $saveData = array(
        'max_page' => $localLead->retrieveDataValue('max_page'),
        'flow1' => 'spec',
        'p1_view' => 1
    );
    $saveResult = $localLead->saveDatabase($saveData);
    
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
        'start': [ 0 ],
        'connect': 'lower',
        'range': {
            'min': [ 0 ],
            'max': [ 30000 ]
        },
        'step': 500,
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
    }).on({
        'slide' : function(){
            var debt_amount = $("#debt_amount").val();
            debt_amount = debt_amount.replace(/\D/g, '');
            if(debt_amount > 20000) {
                $('#program_please_select').hide();
                $('#program_listing1').show();
                $('#program_listing3').show();
                $('#program_listing4').show();
                $('#program_listing5').show();
                $('#number_of_programs').html('5');
            } else if(debt_amount > 15000) {
                $('#program_please_select').hide();
                $('#program_listing1').show();
                $('#program_listing3').show();
                $('#program_listing4').show();
                $('#program_listing5').hide();
                $('#number_of_programs').html('4');
            } else if(debt_amount > 10000) {
                $('#program_please_select').hide();
                $('#program_listing1').show();
                $('#program_listing3').show();
                $('#program_listing4').hide();
                $('#program_listing5').hide();
                $('#number_of_programs').html('3');
            } else if(debt_amount > 1000) {
                $('#program_please_select').hide();
                $('#program_listing1').show();
                $('#program_listing3').hide();
                $('#program_listing4').hide();
                $('#program_listing5').hide();
                $('#number_of_programs').html('2');
            } else {
                $('#program_please_select').show();
                $('#program_listing1').hide();
                $('#program_listing3').hide();
                $('#program_listing4').hide();
                $('#program_listing5').hide();
                $('#number_of_programs').html('');
            }
        }
    });
    $('[name=eligibility_check_form]').bootstrapValidator();
    
    $('.agent_call_link').on('click', function() {
        var ajax_url = '/trackcall?page_call=main';
        if(site_cookies_enabled === false) {
            ajax_url += '&key=' + <?php echo json_encode(session_id()); ?>;
        }
        var call_request = $.ajax({
            dataType: 'json',
            url: ajax_url
        });
        var sLink = $(this).data('number');
        setTimeout(function() {
            window.location.href = sLink;
        },300);
    });
});
</script>
</head>
<body>
    <div class="header">
        <?php
            require_once(LOCAL_LIB_PATH . '/header_bar_alt.php');
        ?>
    </div>
    <div class="container middle" style="background: url('/assets/stars_bg.png') no-repeat top center">
        <?php require_once(LOCAL_LIB_PATH . '/check_cookies.php'); ?>
        <form name="eligibility_check_form" class="form-horizontal" method="POST" onsubmit="return false;">
            <div class="row">
                <div class="col-xs-12">
                    <div>PROGRAM ELIGIBILITY CHECK</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4>How much is your Student Debt?</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12" style="padding-left:20px;padding-right:20px;">
                    <div id="debt_slider"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" name="debt_amount" id="debt_amount" class="form-control input-lg" value="<?php echo $localLead->retrieveDataValueHtml('debt_amount'); ?>" required data-bv-trigger="blur" data-bv-notempty-message="Please enter a valid debt amount" title="" />
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading"><span id="number_of_programs"></span> Eligible Programs</div>
                <div class="panel-body">
                    <div class="row" id="program_please_select">
                        <h4>Please indicate your Student Debt above to see Eligible Programs</h4>
                        <h6>Total Debt Amounts under $1,000 not eligible <script src="https://callpixels.com/callpixels.js?key=cb2bfc45ffa44260bb3ba2e2e8405fb1&default_number=" type="text/javascript"></script></h6>
                    </div>
                    <div id="program_listing1" style="display:none;">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="/assets/company1.png" class="img-responsive" style="margin:0 auto;" />
                            </div>
                            <div class="col-xs-4">
                                1st month deferred
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-primary agent_call_link" role="button" data-number="tel:+19494410268"><span class="glyphicon glyphicon-earphone"></span> Call</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="/assets/company2.png" class="img-responsive" style="margin:0 auto;" />
                            </div>
                            <div class="col-xs-4">
                                Discharge specialist
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-primary agent_call_link" role="button" data-number="tel:+19494410268"><span class="glyphicon glyphicon-earphone"></span> Call</a>
                            </div>
                        </div>
                    </div>
                    <div id="program_listing3" style="display:none;">
                        <hr/>
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="/assets/company3.png" class="img-responsive" style="margin:0 auto;" />
                            </div>
                            <div class="col-xs-4">
                                Forgiveness specialist
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-primary agent_call_link" role="button" data-number="tel:+19494410268"><span class="glyphicon glyphicon-earphone"></span> Call</a>
                            </div>
                        </div>
                    </div>
                    <div id="program_listing4" style="display:none;">
                        <hr/>
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="/assets/company4.png" class="img-responsive" style="margin:0 auto;" />
                            </div>
                            <div class="col-xs-4">
                                Discharge specialist
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-primary agent_call_link" role="button" data-number="tel:+19494410268"><span class="glyphicon glyphicon-earphone"></span> Call</a>
                            </div>
                        </div>
                    </div>
                    <div id="program_listing5" style="display:none;">
                        <hr/>
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="/assets/company5.png" class="img-responsive" style="margin:0 auto;" />
                            </div>
                            <div class="col-xs-4">
                                Emergency specialist
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-primary agent_call_link" role="button" data-number="tel:+19494410268"><span class="glyphicon glyphicon-earphone"></span> Call</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
