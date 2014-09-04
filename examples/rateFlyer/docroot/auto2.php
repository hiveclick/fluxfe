<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead($_REQUEST);
    $lead->maxDataValue('page', 2);
    $lead->saveLocal();
    if(isset($_POST['_is_submit'])) {
        header('Location: /auto3');
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
                        <div class="hc3">Current Insurer?</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select class="form-control input-lg input-custom" name="insurer" required="required">
                            <option value=""<?php echo $lead->retrieveDataValue('insurer') == '' ? ' selected' : ''; ?>>&nbsp;</option>
                            <option value="AIG"<?php echo $lead->retrieveDataValue('insurer') == '' ? ' selected' : ''; ?>>21st Century</option>
                            <option value="Allstate"<?php echo $lead->retrieveDataValue('insurer') == 'Allstate' ? ' selected' : ''; ?>>Allstate</option>
                            <option value="Country Financial"<?php echo $lead->retrieveDataValue('insurer') == 'Country Financial' ? ' selected' : ''; ?>>Country Financial</option>
                            <option value="Esurance"<?php echo $lead->retrieveDataValue('insurer') == 'Esurance' ? ' selected' : ''; ?>>Esurance</option>
                            <option value="Farmers"<?php echo $lead->retrieveDataValue('insurer') == 'Farmers' ? ' selected' : ''; ?>>Farmers</option>
                            <option value="Geico"<?php echo $lead->retrieveDataValue('insurer') == 'Geico' ? ' selected' : ''; ?>>Geico</option>
                            <option value="Liberty Mutual"<?php echo $lead->retrieveDataValue('insurer') == 'Liberty Mutual' ? ' selected' : ''; ?>>Liberty Mutual</option>
                            <option value="MetLife"<?php echo $lead->retrieveDataValue('insurer') == 'MetLife' ? ' selected' : ''; ?>>MetLife</option>
                            <option value="Nationwide"<?php echo $lead->retrieveDataValue('insurer') == 'Nationwide' ? ' selected' : ''; ?>>Nationwide</option>
                            <option value="Progressive Casualty"<?php echo $lead->retrieveDataValue('insurer') == 'Progressive Casualty' ? ' selected' : ''; ?>>Progressive</option>
                            <option value="State Farm"<?php echo $lead->retrieveDataValue('insurer') == 'State Farm' ? ' selected' : ''; ?>>State Farm</option>
                            <option value="Other"<?php echo $lead->retrieveDataValue('insurer') == 'Other' ? ' selected' : ''; ?>>Other / Company not listed</option>
                            <option value="None"<?php echo $lead->retrieveDataValue('insurer') == 'None' ? ' selected' : ''; ?>>Not currently insured</option>
                        </select>
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
