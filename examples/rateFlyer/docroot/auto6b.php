<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead($_REQUEST);
    $lead->maxDataValue('page', 6);
    $lead->saveLocal();
    if(isset($_POST['_is_submit'])) {
        header('Location: /auto7');
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
                        <div class="hc3">Your Address?</div>
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="address1">Address</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="address1" name="address1" class="form-control input-lg input-custom" type="text" value="<?php echo $lead->retrieveDataValue('address1', null, 'htmlspecialchars'); ?>" required placeholder="Address" />
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="city">City</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="city" name="city" class="form-control input-lg input-custom" type="text" value="<?php echo $lead->retrieveDataValue('city', null, 'htmlspecialchars'); ?>" required placeholder="City" />
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="state">State</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select id="state" name="state" required class="form-control input-lg input-custom">
                            <option value=""<?php echo $lead->retrieveDataValue('state') == '' ? ' selected' : ''; ?>>State</option>
                            <option value="AL"<?php echo $lead->retrieveDataValue('state') == 'AL' ? ' selected' : ''; ?>>AL</option>
                            <option value="AK"<?php echo $lead->retrieveDataValue('state') == 'AK' ? ' selected' : ''; ?>>AK</option>
                            <option value="AZ"<?php echo $lead->retrieveDataValue('state') == 'AZ' ? ' selected' : ''; ?>>AZ</option>
                            <option value="AR"<?php echo $lead->retrieveDataValue('state') == 'AR' ? ' selected' : ''; ?>>AR</option>
                            <option value="CA"<?php echo $lead->retrieveDataValue('state') == 'CA' ? ' selected' : ''; ?>>CA</option>
                            <option value="CO"<?php echo $lead->retrieveDataValue('state') == 'CO' ? ' selected' : ''; ?>>CO</option>
                            <option value="CT"<?php echo $lead->retrieveDataValue('state') == 'CT' ? ' selected' : ''; ?>>CT</option>
                            <option value="DE"<?php echo $lead->retrieveDataValue('state') == 'DE' ? ' selected' : ''; ?>>DE</option>
                            <option value="DC"<?php echo $lead->retrieveDataValue('state') == 'DC' ? ' selected' : ''; ?>>DC</option>
                            <option value="FL"<?php echo $lead->retrieveDataValue('state') == 'FL' ? ' selected' : ''; ?>>FL</option>
                            <option value="GA"<?php echo $lead->retrieveDataValue('state') == 'GA' ? ' selected' : ''; ?>>GA</option>
                            <option value="HI"<?php echo $lead->retrieveDataValue('state') == 'HI' ? ' selected' : ''; ?>>HI</option>
                            <option value="ID"<?php echo $lead->retrieveDataValue('state') == 'ID' ? ' selected' : ''; ?>>ID</option>
                            <option value="IL"<?php echo $lead->retrieveDataValue('state') == 'IL' ? ' selected' : ''; ?>>IL</option>
                            <option value="IN"<?php echo $lead->retrieveDataValue('state') == 'IN' ? ' selected' : ''; ?>>IN</option>
                            <option value="IA"<?php echo $lead->retrieveDataValue('state') == 'IA' ? ' selected' : ''; ?>>IA</option>
                            <option value="KS"<?php echo $lead->retrieveDataValue('state') == 'KS' ? ' selected' : ''; ?>>KS</option>
                            <option value="KY"<?php echo $lead->retrieveDataValue('state') == 'KY' ? ' selected' : ''; ?>>KY</option>
                            <option value="LA"<?php echo $lead->retrieveDataValue('state') == 'LA' ? ' selected' : ''; ?>>LA</option>
                            <option value="ME"<?php echo $lead->retrieveDataValue('state') == 'ME' ? ' selected' : ''; ?>>ME</option>
                            <option value="MD"<?php echo $lead->retrieveDataValue('state') == 'MD' ? ' selected' : ''; ?>>MD</option>
                            <option value="MA"<?php echo $lead->retrieveDataValue('state') == 'MA' ? ' selected' : ''; ?>>MA</option>
                            <option value="MI"<?php echo $lead->retrieveDataValue('state') == 'MI' ? ' selected' : ''; ?>>MI</option>
                            <option value="MN"<?php echo $lead->retrieveDataValue('state') == 'MN' ? ' selected' : ''; ?>>MN</option>
                            <option value="MS"<?php echo $lead->retrieveDataValue('state') == 'MS' ? ' selected' : ''; ?>>MS</option>
                            <option value="MO"<?php echo $lead->retrieveDataValue('state') == 'MO' ? ' selected' : ''; ?>>MO</option>
                            <option value="MT"<?php echo $lead->retrieveDataValue('state') == 'MT' ? ' selected' : ''; ?>>MT</option>
                            <option value="NE"<?php echo $lead->retrieveDataValue('state') == 'NE' ? ' selected' : ''; ?>>NE</option>
                            <option value="NV"<?php echo $lead->retrieveDataValue('state') == 'NV' ? ' selected' : ''; ?>>NV</option>
                            <option value="NH"<?php echo $lead->retrieveDataValue('state') == 'NH' ? ' selected' : ''; ?>>NH</option>
                            <option value="NJ"<?php echo $lead->retrieveDataValue('state') == 'NJ' ? ' selected' : ''; ?>>NJ</option>
                            <option value="NM"<?php echo $lead->retrieveDataValue('state') == 'NM' ? ' selected' : ''; ?>>NM</option>
                            <option value="NY"<?php echo $lead->retrieveDataValue('state') == 'NY' ? ' selected' : ''; ?>>NY</option>
                            <option value="NC"<?php echo $lead->retrieveDataValue('state') == 'NC' ? ' selected' : ''; ?>>NC</option>
                            <option value="ND"<?php echo $lead->retrieveDataValue('state') == 'ND' ? ' selected' : ''; ?>>ND</option>
                            <option value="OH"<?php echo $lead->retrieveDataValue('state') == 'OH' ? ' selected' : ''; ?>>OH</option>
                            <option value="OK"<?php echo $lead->retrieveDataValue('state') == 'OK' ? ' selected' : ''; ?>>OK</option>
                            <option value="OR"<?php echo $lead->retrieveDataValue('state') == 'OR' ? ' selected' : ''; ?>>OR</option>
                            <option value="PA"<?php echo $lead->retrieveDataValue('state') == 'PA' ? ' selected' : ''; ?>>PA</option>
                            <option value="RI"<?php echo $lead->retrieveDataValue('state') == 'RI' ? ' selected' : ''; ?>>RI</option>
                            <option value="SC"<?php echo $lead->retrieveDataValue('state') == 'SC' ? ' selected' : ''; ?>>SC</option>
                            <option value="SD"<?php echo $lead->retrieveDataValue('state') == 'SD' ? ' selected' : ''; ?>>SD</option>
                            <option value="TN"<?php echo $lead->retrieveDataValue('state') == 'TN' ? ' selected' : ''; ?>>TN</option>
                            <option value="TX"<?php echo $lead->retrieveDataValue('state') == 'TX' ? ' selected' : ''; ?>>TX</option>
                            <option value="UT"<?php echo $lead->retrieveDataValue('state') == 'UT' ? ' selected' : ''; ?>>UT</option>
                            <option value="VT"<?php echo $lead->retrieveDataValue('state') == 'VT' ? ' selected' : ''; ?>>VT</option>
                            <option value="VI"<?php echo $lead->retrieveDataValue('state') == 'VI' ? ' selected' : ''; ?>>VI</option>
                            <option value="VA"<?php echo $lead->retrieveDataValue('state') == 'VA' ? ' selected' : ''; ?>>VA</option>
                            <option value="WA"<?php echo $lead->retrieveDataValue('state') == 'WA' ? ' selected' : ''; ?>>WA</option>
                            <option value="WV"<?php echo $lead->retrieveDataValue('state') == 'WV' ? ' selected' : ''; ?>>WV</option>
                            <option value="WI"<?php echo $lead->retrieveDataValue('state') == 'WI' ? ' selected' : ''; ?>>WI</option>
                            <option value="WY"<?php echo $lead->retrieveDataValue('state') == 'WY' ? ' selected' : ''; ?>>WY</option>
                        </select>
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="zip">Zip Code</div>
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
