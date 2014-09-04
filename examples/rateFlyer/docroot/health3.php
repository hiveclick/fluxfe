<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead();
    if(isset($_POST['is_submit'])) {
        header('Location: /health5');
        exit();
    }
    require_once(LIB_PATH . '/header.php');
?>
</head>
<body class="health-theme">
    <div class="wrapper middle">
        <div class="header">
            <?php require_once(LIB_PATH . '/header_bar.php'); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hc2"><span class="glyphicon glyphicon-user"></span> Health Coverage</div>
            </div>
        </div>
        <div class="container">
            <form name="mainForm" method="POST" class="form-horizontal">
                <input type="hidden" name="is_submit" value="1" />
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="hc3">How Many People in Your Family?</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select class="form-control input-lg input-custom">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="submit" name="submit" value="NEXT" class="btn-lg btn-block btn-custom" />
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
