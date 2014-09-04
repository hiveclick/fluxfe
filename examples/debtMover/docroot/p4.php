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
        $localLead->maxDataValue('max_page', 4);
        $localLead->saveDatabase(array(
            'max_page' => $localLead->retrieveDataValue('max_page'),
            'p5_view' => 1,
        ));
        $localLead->saveLocal();
        $next_page = '/p5';
        header('Location: ' . $next_page);
        exit();
    }
    
    $localLead->saveLocal();
    $refresh_page = '/p4?__submit=1';
    header('Refresh: 3;' . $refresh_page);
    
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
<script type="text/javascript" src="/assets/spin.min.js"></script>
<script type="text/javascript">
$(function() {
    var opts = {
      lines: 11, // The number of lines to draw
      length: 20, // The length of each line
      width: 20, // The line thickness
      radius: 80, // The radius of the inner circle
      corners: 1, // Corner roundness (0..1)
      rotate: 22, // The rotation offset
      direction: 1, // 1: clockwise, -1: counterclockwise
      color: '#000', // #rgb or #rrggbb or array of colors
      speed: 1, // Rounds per second
      trail: 50, // Afterglow percentage
      shadow: false, // Whether to render a shadow
      hwaccel: false, // Whether to use hardware acceleration
      className: 'spinner', // The CSS class to assign to the spinner
      zIndex: 2e9, // The z-index (defaults to 2000000000)
      top: '50%', // Top position relative to parent in px
      left: '50%' // Left position relative to parent in px
    };
    var target = document.getElementById('spinner_loading');
    var spinner = new Spinner(opts).spin(target);
    //var spinner = new Spinner(opts).spin($('#spinner_loading'));
});
</script>
</head>
<body>
    <div class="header">
        <?php
            $page_call = 4;
            require_once(LOCAL_LIB_PATH . '/header_bar.php');
        ?>
    </div>
    <div class="container middle">
        <div class="row" style="margin-top:80px;">
            <div class="col-xs-12">
                <div id="spinner_loading"><h3>Processing<br/>Info</h3></div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
    <div class="footer">
        <?php require_once(LOCAL_LIB_PATH . '/footer_bar.php'); ?>
    </div> 
</body>
</html>
