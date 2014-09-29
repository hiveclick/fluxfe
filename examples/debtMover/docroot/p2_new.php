<?php
    require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
    \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "================p2_new.php================");

    $localLead = \FluxFE\Lead::getInstance();
    if (isset($_REQUEST['__submit']) && $_REQUEST['__submit'] == '1') {
        $localLead->save(true);
        $next_page = '/p3_new';
        header('Location: ' . $next_page);
        exit();
    }
    \FluxFE\Lead::debug();
?>
<?php
    require_once('header.php');
?>

<script type="text/javascript">
    $(function() {
        $('[name=eligibility_check_form]').bootstrapValidator();
    });
</script>
</head>
<body>
    <div class="header">
        <?php
            $page_call = 2;
            require_once('header_bar.php');
        ?>
    </div>
    <div class="container middle" style="background: url('/assets/stars_bg.png') no-repeat top center">
        <form id="eligibility_check_form" name="eligibility_check_form" class="form-horizontal" action="" method="POST">
            <input type="hidden" name="__submit" value="1" />
            <div class="row">
                <div class="col-xs-12">
                    <div>YOUR ONLINE ELIGIBILITY CHECK</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h2>Please answer the questions below to continue your Eligibility Check</h2>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="zip" name="zip" class="form-control" value="<?php echo $localLead->getValueHtml('zip'); ?>" placeholder="Zip Code" required pattern="\d*" maxlength="5" data-bv-trigger="blur" data-bv-notempty-message="Please enter your zip code" data-bv-zipcode="true" data-bv-zipcode-country="US" data-bv-zipcode-message="Please enter a valid zip code" title="Enter your Zip Code" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <select name="loan_type[]" class="form-control" required title="Select a Loan Type" multiple data-bv-notempty-message="Please select a loan type">
                        <option value="">&mdash; Select a Loan Type &mdash;</option>
                        <option value="Federal"<?php echo ($localLead->getValue('loan_type') === 'Federal') ? ' selected' : ''; ?>>Federal</option>
                        <option value="Private"<?php echo ($localLead->getValue('loan_type') === 'Private') ? ' selected' : ''; ?>>Private</option>
                        <option value="Both"<?php echo ($localLead->getValue('loan_type') === 'Both') ? ' selected' : ''; ?>>Both</option>
                        <option value="Unsure"<?php echo ($localLead->getValue('loan_type') === 'Unsure') ? ' selected' : ''; ?>>I Don't Know</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <select name="occupation" class="form-control" required title="Select an Occupation" data-bv-notempty-message="Please select an occupation">
                        <option value="">&mdash; Select an Occupation &mdash;</option>
                        <option value="Architecture and Engineering"<?php echo ($localLead->getValue('occupation') === 'Architecture and Engineering') ? ' selected' : ''; ?>>Architecture and Engineering</option>
                        <option value="Arts, Design, Entertainment, Sports, and Media"<?php echo ($localLead->getValue('occupation') === 'Arts, Design, Entertainment, Sports, and Media') ? ' selected' : ''; ?>>Arts, Design, Entertainment, Sports, and Media</option>
                        <option value="Building and Grounds Cleaning and Maintenance"<?php echo ($localLead->getValue('occupation') === 'Building and Grounds Cleaning and Maintenance') ? ' selected' : ''; ?>>Building and Grounds Cleaning and Maintenance</option>
                        <option value="Business and Financial Operations"<?php echo ($localLead->getValue('occupation') === 'Business and Financial Operations') ? ' selected' : ''; ?>>Business and Financial Operations</option>
                        <option value="Community and Social Service"<?php echo ($localLead->getValue('occupation') === 'Community and Social Service') ? ' selected' : ''; ?>>Community and Social Service</option>
                        <option value="Computer and Mathematical"<?php echo ($localLead->getValue('occupation') === 'Computer and Mathematical') ? ' selected' : ''; ?>>Computer and Mathematical</option>
                        <option value="Construction and Extraction"<?php echo ($localLead->getValue('occupation') === 'Construction and Extraction') ? ' selected' : ''; ?>>Construction and Extraction</option>
                        <option value="Education, Training, and Library"<?php echo ($localLead->getValue('occupation') === 'Education, Training, and Library') ? ' selected' : ''; ?>>Education, Training, and Library</option>
                        <option value="Farming, Fishing, and Forestry"<?php echo ($localLead->getValue('occupation') === 'Farming, Fishing, and Forestry') ? ' selected' : ''; ?>>Farming, Fishing, and Forestry</option>
                        <option value="Food Preparation and Serving"<?php echo ($localLead->getValue('occupation') === 'Food Preparation and Serving') ? ' selected' : ''; ?>>Food Preparation and Serving</option>
                        <option value="Healthcare Practitioners and Technical"<?php echo ($localLead->getValue('occupation') === 'Healthcare Practitioners and Technical') ? ' selected' : ''; ?>>Healthcare Practitioners and Technical</option>
                        <option value="Healthcare Support"<?php echo ($localLead->getValue('occupation') === 'Healthcare Support') ? ' selected' : ''; ?>>Healthcare Support</option>
                        <option value="Installation, Maintenance, and Repair"<?php echo ($localLead->getValue('occupation') === 'Installation, Maintenance, and Repair') ? ' selected' : ''; ?>>Installation, Maintenance, and Repair</option>
                        <option value="Legal"<?php echo ($localLead->getValue('occupation') === 'Legal') ? ' selected' : ''; ?>>Legal</option>
                        <option value="Life, Physical, and Social Science"<?php echo ($localLead->getValue('occupation') === 'Life, Physical, and Social Science') ? ' selected' : ''; ?>>Life, Physical, and Social Science</option>
                        <option value="Management"<?php echo ($localLead->getValue('occupation') === 'Management') ? ' selected' : ''; ?>>Management</option>
                        <option value="Military Specific"<?php echo ($localLead->getValue('occupation') === 'Military Specific') ? ' selected' : ''; ?>>Military Specific</option>
                        <option value="Office and Administrative Support"<?php echo ($localLead->getValue('occupation') === 'Office and Administrative Support') ? ' selected' : ''; ?>>Office and Administrative Support</option>
                        <option value="Personal Care and Service"<?php echo ($localLead->getValue('occupation') === 'Personal Care and Service') ? ' selected' : ''; ?>>Personal Care and Service</option>
                        <option value="Production/Manufacturing"<?php echo ($localLead->getValue('occupation') === 'Production/Manufacturing') ? ' selected' : ''; ?>>Production/Manufacturing</option>
                        <option value="Protective Service"<?php echo ($localLead->getValue('occupation') === 'Protective Service') ? ' selected' : ''; ?>>Protective Service</option>
                        <option value="Sales and Related"<?php echo ($localLead->getValue('occupation') === 'Sales and Related') ? ' selected' : ''; ?>>Sales and Related</option>
                        <option value="Transportation and Material Moving"<?php echo ($localLead->getValue('occupation') === 'Transportation and Material Moving') ? ' selected' : ''; ?>>Transportation and Material Moving</option>
                        <option value="Other"<?php echo ($localLead->getValue('occupation') === 'Other') ? ' selected' : ''; ?>>Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" name="__submit_btn" class="btn btn-lg btn-block btn-color-override">NEXT</button>
                </div>
            </div>
        </form>
    </div>
    <div class="footer">
        <?php require_once('footer_bar.php'); ?>
    </div>
</body>
</html>
<script>
//<!--
$('#zip').blur(function() {
	$.post('save.php', $('#eligibility_check_form').serialize(), function(data) {
		return true;
	}, 'json');
});
//-->
</script>
<script>
	var _op = _op || [];
	_op.push(['_trackPageView']);

	(function() {
		var op = document.createElement('script');
		op.type = 'text/javascript';
		op.async = 'true';
		op.src = ('https:' == document.location.protocal ? 'https://www' : 'http://www') + '.flux.local/scripts/op.js';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(op, s);
	})();
</script>
