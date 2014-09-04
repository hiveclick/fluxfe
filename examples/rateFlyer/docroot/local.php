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
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        //means we got here through some other method where we didn't have _c, possibly organic
        //normally we would set some default offer id here instead of just 1, or maybe 1 is the default offer value
        $default_organic_offer_id = DEFAULT_RATEFLYER_CAMPAIGN_ID;
        $localLead->assignValue('_c', $default_organic_offer_id);
    }
    
    $saveData = array(
        'max_page' => $localLead->retrieveDataValue('max_page'),
        'flow1' => 'surehits1',
        'p1_view' => 1
    );
    
    $saveResult = $localLead->saveDatabase($saveData);
    
    $localLead->saveLocal();
    
    $clear_query_string = true;
    require_once(LOCAL_LIB_PATH . '/header.php');
    
    $external_state = $localLead->retrieveGunLeadValue('e_state', '');
?>
<style type="text/css">
    #sh_results_div a {
        color:#fff;
    }
    #sh_results_div .mAdCallBtnText {
        font-size:9px;
    }
    #mFilterResultsFrmWrapper {
        display:none;
    }
</style>
<script type="text/javascript">
var ni_ad_client = '603189';
var ni_res_id = 2;
var ni_alt_url = 'https://www.shmktpl.com/search.asp';
var ni_zc = '';
var ni_str_state_code = '';
var ni_var1 = '';
var ni_display_width = 650;
var ni_display_height = 1000;
var ni_color_border = '';
var ni_color_bg = '';
var ni_color_link = '';
var ni_color_url = '';
var ni_color_text = '';
var m_customOnload = true;
$(function() {
    $('form[name=search_form]').on('submit', function() {
        $(this).find('[name=search]').prop('disabled', true);
        $(this).find('.form-submit-group').hide();
        //ni_zc = $('form[name=search_form] [name=zip]').val();
        ni_str_state_code = $('form[name=search_form] [name=state]').val();
        var script_tag = document.createElement('script');
        script_tag.type = 'text/javascript';
        script_tag.src = 'http://www.nextinsure.com/ListingDisplay/Retrieve/?cat=1&src=603189';
        var sh_results_div = document.getElementById('sh_results_div');
        sh_results_div.innerHTML = '<div id="mSH"></div><div id="SHlistings"></div>';
        sh_results_div.appendChild(script_tag);
        //$('#sh_results_div').append(script_tag);
        $(this).find('[name=search]').prop('disabled', false);
        return false;
    });
    $('form[name=search_form] [name=state]').on('change', function() {
        $('form[name=search_form]').trigger('submit');
    });
    <?php if(strlen($external_state) > 0) { ?>
    $('form[name=search_form]').trigger('submit');
    <?php } ?>
});
function SHClientFn(){
    alert('done loading');
}
</script>
</head>
<body>
    <div class="header">
        <?php require_once(LOCAL_LIB_PATH . '/header_bar.php'); ?>
    </div>
    <div class="container middle">
        <?php require_once(LOCAL_LIB_PATH . '/check_cookies.php'); ?>
        <div class="row">
            <div class="col-xs-12 hc1">Get Instant Auto Quotes</div>
        </div>
        <div class="row">
            <div class="col-xs-12 hc2">AT TODAY'S LOWEST RATES</div>
        </div>
        <div class="row">
            <div class="col-xs-12 hc3">Select your state to Start Now!</div>
        </div>
        <br/><br/>
        <form name="search_form" action="" method="get" class="form-horizontal">
            <input type="hidden" name="__submit" value="1" />
            <div class="form-group">
                <div class="col-xs-12">
                    <select name="state" class="form-control">
                        <option value=""<?php echo $external_state == '' ? ' selected' : ''; ?>>&ndash; Select State &ndash;</option>
                        <option value="AL"<?php echo $external_state == 'AL' ? ' selected' : ''; ?>>Alabama</option>
                        <option value="AK"<?php echo $external_state == 'AK' ? ' selected' : ''; ?>>Alaska</option>
                        <option value="AZ"<?php echo $external_state == 'AZ' ? ' selected' : ''; ?>>Arizona</option>
                        <option value="AR"<?php echo $external_state == 'AR' ? ' selected' : ''; ?>>Arkansas</option>
                        <option value="CA"<?php echo $external_state == 'CA' ? ' selected' : ''; ?>>California</option>
                        <option value="CO"<?php echo $external_state == 'CO' ? ' selected' : ''; ?>>Colorado</option>
                        <option value="CT"<?php echo $external_state == 'CT' ? ' selected' : ''; ?>>Connecticut</option>
                        <option value="DE"<?php echo $external_state == 'DE' ? ' selected' : ''; ?>>Delaware</option>
                        <option value="DC"<?php echo $external_state == 'DC' ? ' selected' : ''; ?>>District of Colombia</option>
                        <option value="FL"<?php echo $external_state == 'FL' ? ' selected' : ''; ?>>Florida</option>
                        <option value="GA"<?php echo $external_state == 'GA' ? ' selected' : ''; ?>>Georgia</option>
                        <option value="HI"<?php echo $external_state == 'HI' ? ' selected' : ''; ?>>Hawaii</option>
                        <option value="ID"<?php echo $external_state == 'ID' ? ' selected' : ''; ?>>Idaho</option>
                        <option value="IL"<?php echo $external_state == 'IL' ? ' selected' : ''; ?>>Illinois</option>
                        <option value="IN"<?php echo $external_state == 'IN' ? ' selected' : ''; ?>>Indiana</option>
                        <option value="IA"<?php echo $external_state == 'IA' ? ' selected' : ''; ?>>Iowa</option>
                        <option value="KS"<?php echo $external_state == 'KS' ? ' selected' : ''; ?>>Kansas</option>
                        <option value="KY"<?php echo $external_state == 'KY' ? ' selected' : ''; ?>>Kentucky</option>
                        <option value="LA"<?php echo $external_state == 'LA' ? ' selected' : ''; ?>>Louisiana</option>
                        <option value="ME"<?php echo $external_state == 'ME' ? ' selected' : ''; ?>>Maine</option>
                        <option value="MD"<?php echo $external_state == 'MD' ? ' selected' : ''; ?>>Maryland</option>
                        <option value="MA"<?php echo $external_state == 'MA' ? ' selected' : ''; ?>>Massachusetts</option>
                        <option value="MI"<?php echo $external_state == 'MI' ? ' selected' : ''; ?>>Michigan</option>
                        <option value="MN"<?php echo $external_state == 'MN' ? ' selected' : ''; ?>>Minnesota</option>
                        <option value="MS"<?php echo $external_state == 'MS' ? ' selected' : ''; ?>>Mississippi</option>
                        <option value="MO"<?php echo $external_state == 'MO' ? ' selected' : ''; ?>>Missouri</option>
                        <option value="MT"<?php echo $external_state == 'MT' ? ' selected' : ''; ?>>Montana</option>
                        <option value="NE"<?php echo $external_state == 'NE' ? ' selected' : ''; ?>>Nebraska</option>
                        <option value="NV"<?php echo $external_state == 'NV' ? ' selected' : ''; ?>>Nevada</option>
                        <option value="NH"<?php echo $external_state == 'NH' ? ' selected' : ''; ?>>New Hampshire</option>
                        <option value="NJ"<?php echo $external_state == 'NJ' ? ' selected' : ''; ?>>New Jersey</option>
                        <option value="NM"<?php echo $external_state == 'NM' ? ' selected' : ''; ?>>New Mexico</option>
                        <option value="NY"<?php echo $external_state == 'NY' ? ' selected' : ''; ?>>New York</option>
                        <option value="NC"<?php echo $external_state == 'NC' ? ' selected' : ''; ?>>North Carolina</option>
                        <option value="ND"<?php echo $external_state == 'ND' ? ' selected' : ''; ?>>North Dakota</option>
                        <option value="OH"<?php echo $external_state == 'OH' ? ' selected' : ''; ?>>Ohio</option>
                        <option value="OK"<?php echo $external_state == 'OK' ? ' selected' : ''; ?>>Oklahoma</option>
                        <option value="OR"<?php echo $external_state == 'OR' ? ' selected' : ''; ?>>Oregon</option>
                        <option value="PA"<?php echo $external_state == 'PA' ? ' selected' : ''; ?>>Pennsylvania</option>
                        <option value="RI"<?php echo $external_state == 'RI' ? ' selected' : ''; ?>>Rhode Island</option>
                        <option value="SC"<?php echo $external_state == 'SC' ? ' selected' : ''; ?>>South Carolina</option>
                        <option value="SD"<?php echo $external_state == 'SD' ? ' selected' : ''; ?>>South Dakota</option>
                        <option value="TN"<?php echo $external_state == 'TN' ? ' selected' : ''; ?>>Tennessee</option>
                        <option value="TX"<?php echo $external_state == 'TX' ? ' selected' : ''; ?>>Texas</option>
                        <option value="UT"<?php echo $external_state == 'UT' ? ' selected' : ''; ?>>Utah</option>
                        <option value="VT"<?php echo $external_state == 'VT' ? ' selected' : ''; ?>>Vermont</option>
                        <option value="VA"<?php echo $external_state == 'VA' ? ' selected' : ''; ?>>Virginia</option>
                        <option value="WA"<?php echo $external_state == 'WA' ? ' selected' : ''; ?>>Washington</option>
                        <option value="WV"<?php echo $external_state == 'WV' ? ' selected' : ''; ?>>West Virginia</option>
                        <option value="WI"<?php echo $external_state == 'WI' ? ' selected' : ''; ?>>Wisconsin</option>
                        <option value="WY"<?php echo $external_state == 'WY' ? ' selected' : ''; ?>>Wyoming</option>
                    </select>
                </div>
            </div>
            <div class="form-group form-submit-group" style="display:none;">
                <div class="col-xs-12">
                    <input type="submit" name="search" value="Get Quotes" class="btn btn-success btn-lg" />
                </div>
            </div>
        </form>
    </div>
    <div id="sh_results_div">
        <?php if(strlen($external_state) > 0) { ?>
        <div class="container middle">
        Please wait...
        </div>
        <?php } ?>
    </div>
    <div class="footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
