<?php
    use FluxLocal\util\localLead as localLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    $localLead = localLead::initLead($_REQUEST);
    
    if(strlen($localLead->retrieveValue('_c')) <= 0) {
        $landing_page = '/apply';
        header('Location: ' . $landing_page);
        exit();
    }
    
    if(isset($_REQUEST['__agent'])) {
        $localLead->maxDataValue('max_page', 5);
        $localLead->saveDatabase(array(
            'max_page' => $localLead->retrieveDataValue('max_page'),
            'p6_view' => 5,
        ));
        $localLead->saveLocal();
        $next_page = '/p6';
        header('Location: ' . $next_page);
        exit();
    }
    
    $localLead->saveLocal();
    
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
<script>
$(function() {
    $('#agent_call_link').on('click', function() {
        var ajax_url = '/trackcall?page_call=main';
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
    <div class="wrapper middle">
        <div class="header">
            <?php
                $page_call = 5;
                require_once(LOCAL_LIB_PATH . '/header_bar.php');
            ?>
        </div>
        <div class="container">
            <form name="eligibility_check_form" autocomplete="off" class="form-horizontal">
                <div class="row">
                    <div class="col-xs-12">
                        <div>ELIGIBILITY STATUS CONFIRMED</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h4><strong>Your Information has been confirmed.</strong> One of our Student Loan Experts needs to speak with you to verify your identity and complete the process. Please click on the button below to speak to a specialist.</h4>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <a href="#" class="btn btn-lg btn-block btn-color-override-success" id="agent_call_link" role="button" data-number="tel:+18553150366">CLICK HERE TO SPEAK TO AN AGENT</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <img src="/assets/agent.jpg" class="img-responsive" style="margin:0 auto;" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <a href="/p5?__agent=1" class="btn btn-lg btn-block btn-color-override-cancel" role="button">PLEASE CALL ME LATER</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="wrapper footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
