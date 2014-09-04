<?php
    use gunLocal\util\localLead as localLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    $localLead = localLead::initLead($_REQUEST);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        $landing_page = '/apply';
        header('Location: ' . $landing_page);
        exit();
    }
    
    if(isset($_REQUEST['__submit'])) {
        $localLead->maxDataValue('max_page', 2);
        $localLead->saveDatabase(array(
            'max_page' => $localLead->retrieveDataValue('max_page'),
            'p3_view' => 1,
            'zip' => $localLead->retrieveDataValue('zip'),
            'loan_type' => $localLead->retrieveDataValue('loan_type'),
            'occupation' => $localLead->retrieveDataValue('occupation')
        ));
        $localLead->saveLocal();
        $next_page = '/p3';
        header('Location: ' . $next_page);
        exit();
    }
    
    $localLead->saveLocal();
    
    require_once(LOCAL_LIB_PATH . '/header.php');
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
            require_once(LOCAL_LIB_PATH . '/header_bar.php');
        ?>
    </div>
    <div class="container middle" style="background: url('/assets/stars_bg.png') no-repeat top center">
        <form name="eligibility_check_form" class="form-horizontal" action="" method="POST">
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
                    <input type="text" name="zip" class="form-control" value="<?php echo $localLead->retrieveDataValueHtml('zip'); ?>" placeholder="Zip Code" required pattern="\d*" maxlength="5" data-bv-trigger="blur" data-bv-notempty-message="Please enter your zip code" data-bv-zipcode="true" data-bv-zipcode-country="US" data-bv-zipcode-message="Please enter a valid zip code" title="Enter your Zip Code" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <select name="loan_type" class="form-control" required title="Select a Loan Type" data-bv-notempty-message="Please select a loan type">
                        <option value="">&mdash; Select a Loan Type &mdash;</option>
                        <option value="Federal"<?php echo ($localLead->retrieveDataValue('loan_type') === 'Federal') ? ' selected' : ''; ?>>Federal</option>
                        <option value="Private"<?php echo ($localLead->retrieveDataValue('loan_type') === 'Private') ? ' selected' : ''; ?>>Private</option>
                        <option value="Both"<?php echo ($localLead->retrieveDataValue('loan_type') === 'Both') ? ' selected' : ''; ?>>Both</option>
                        <option value="Unsure"<?php echo ($localLead->retrieveDataValue('loan_type') === 'Unsure') ? ' selected' : ''; ?>>I Don't Know</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <select name="occupation" class="form-control" required title="Select an Occupation" data-bv-notempty-message="Please select an occupation">
                        <option value="">&mdash; Select an Occupation &mdash;</option>
                        <option value="Architecture and Engineering"<?php echo ($localLead->retrieveDataValue('occupation') === 'Architecture and Engineering') ? ' selected' : ''; ?>>Architecture and Engineering</option>
                        <option value="Arts, Design, Entertainment, Sports, and Media"<?php echo ($localLead->retrieveDataValue('occupation') === 'Arts, Design, Entertainment, Sports, and Media') ? ' selected' : ''; ?>>Arts, Design, Entertainment, Sports, and Media</option>
                        <option value="Building and Grounds Cleaning and Maintenance"<?php echo ($localLead->retrieveDataValue('occupation') === 'Building and Grounds Cleaning and Maintenance') ? ' selected' : ''; ?>>Building and Grounds Cleaning and Maintenance</option>
                        <option value="Business and Financial Operations"<?php echo ($localLead->retrieveDataValue('occupation') === 'Business and Financial Operations') ? ' selected' : ''; ?>>Business and Financial Operations</option>
                        <option value="Community and Social Service"<?php echo ($localLead->retrieveDataValue('occupation') === 'Community and Social Service') ? ' selected' : ''; ?>>Community and Social Service</option>
                        <option value="Computer and Mathematical"<?php echo ($localLead->retrieveDataValue('occupation') === 'Computer and Mathematical') ? ' selected' : ''; ?>>Computer and Mathematical</option>
                        <option value="Construction and Extraction"<?php echo ($localLead->retrieveDataValue('occupation') === 'Construction and Extraction') ? ' selected' : ''; ?>>Construction and Extraction</option>
                        <option value="Education, Training, and Library"<?php echo ($localLead->retrieveDataValue('occupation') === 'Education, Training, and Library') ? ' selected' : ''; ?>>Education, Training, and Library</option>
                        <option value="Farming, Fishing, and Forestry"<?php echo ($localLead->retrieveDataValue('occupation') === 'Farming, Fishing, and Forestry') ? ' selected' : ''; ?>>Farming, Fishing, and Forestry</option>
                        <option value="Food Preparation and Serving"<?php echo ($localLead->retrieveDataValue('occupation') === 'Food Preparation and Serving') ? ' selected' : ''; ?>>Food Preparation and Serving</option>
                        <option value="Healthcare Practitioners and Technical"<?php echo ($localLead->retrieveDataValue('occupation') === 'Healthcare Practitioners and Technical') ? ' selected' : ''; ?>>Healthcare Practitioners and Technical</option>
                        <option value="Healthcare Support"<?php echo ($localLead->retrieveDataValue('occupation') === 'Healthcare Support') ? ' selected' : ''; ?>>Healthcare Support</option>
                        <option value="Installation, Maintenance, and Repair"<?php echo ($localLead->retrieveDataValue('occupation') === 'Installation, Maintenance, and Repair') ? ' selected' : ''; ?>>Installation, Maintenance, and Repair</option>
                        <option value="Legal"<?php echo ($localLead->retrieveDataValue('occupation') === 'Legal') ? ' selected' : ''; ?>>Legal</option>
                        <option value="Life, Physical, and Social Science"<?php echo ($localLead->retrieveDataValue('occupation') === 'Life, Physical, and Social Science') ? ' selected' : ''; ?>>Life, Physical, and Social Science</option>
                        <option value="Management"<?php echo ($localLead->retrieveDataValue('occupation') === 'Management') ? ' selected' : ''; ?>>Management</option>
                        <option value="Military Specific"<?php echo ($localLead->retrieveDataValue('occupation') === 'Military Specific') ? ' selected' : ''; ?>>Military Specific</option>
                        <option value="Office and Administrative Support"<?php echo ($localLead->retrieveDataValue('occupation') === 'Office and Administrative Support') ? ' selected' : ''; ?>>Office and Administrative Support</option>
                        <option value="Personal Care and Service"<?php echo ($localLead->retrieveDataValue('occupation') === 'Personal Care and Service') ? ' selected' : ''; ?>>Personal Care and Service</option>
                        <option value="Production/Manufacturing"<?php echo ($localLead->retrieveDataValue('occupation') === 'Production/Manufacturing') ? ' selected' : ''; ?>>Production/Manufacturing</option>
                        <option value="Protective Service"<?php echo ($localLead->retrieveDataValue('occupation') === 'Protective Service') ? ' selected' : ''; ?>>Protective Service</option>
                        <option value="Sales and Related"<?php echo ($localLead->retrieveDataValue('occupation') === 'Sales and Related') ? ' selected' : ''; ?>>Sales and Related</option>
                        <option value="Transportation and Material Moving"<?php echo ($localLead->retrieveDataValue('occupation') === 'Transportation and Material Moving') ? ' selected' : ''; ?>>Transportation and Material Moving</option>
                        <option value="Other"<?php echo ($localLead->retrieveDataValue('occupation') === 'Other') ? ' selected' : ''; ?>>Other</option>
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
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
