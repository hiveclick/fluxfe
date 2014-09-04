<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead();
    if(isset($_POST['redirectLead'])) {
        header('Location: ' . $_POST['url']);
        exit();
    } else if(isset($_POST['resetLead'])) {
        $lead->clearLead();
        //don't need below line since we are refreshing
        //$lead = lead::initLead();
        header('Location: /test_offer');
        exit();
    }
    $lead->saveLocal();
    require_once(LIB_PATH . '/header.php');
?>
<script type="text/javascript">
$(function() {
    $('.btn-redirect').on('click', function(e) {
        e.preventDefault();
        var url = $('form input[name=url]').val();
        window.open(url, '_blank');
    });
});
</script>
</head>
<body>
    <div class="container">
        <h1>From this page, we can test various functions in the example path</h1>
        <form name="mainForm" method="POST" class="form-horizontal">
            <div class="panel panel-primary">
                <div class="panel-heading">Lead Information</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <pre><?php print_r($lead->exportLead()); ?></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Lead Redirect - redirect to following url</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" name="url" value="/track?_o=1" class="form-control" placeholder="url" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="button" name="redirectLead" value="Redirect Lead" class="btn btn-primary btn-redirect" /> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">Lead Reset - unset cookie and session</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="submit" name="resetLead" value="Reset Lead" class="btn btn-danger" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
