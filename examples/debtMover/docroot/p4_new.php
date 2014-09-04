<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \GunFE\Lead::getInstance();
$next_page = '/p5_new';
header('Refresh: 3;' . $next_page);

\GunFE\Lead::debug();

?>
<?php
    
    require_once('header.php');
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
            require_once('header_bar.php');
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
        <?php require_once('footer_bar.php'); ?>
    </div>
    <script>
	var _op = _op || [];
	_op.push(['_trackPageView']);

	(function() {
		var op = document.createElement('script');
		op.type = 'text/javascript';
		op.async = 'true';
		op.src = ('https:' == document.location.protocal ? 'https://www' : 'http://www') + '.gun.local/scripts/op.js';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(op, s);
	})();
</script>
</body>
</html>
