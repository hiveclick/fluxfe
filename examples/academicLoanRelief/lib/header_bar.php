<?php
if(! isset($page_call)) {
    $page_call = 1;
}
?>
<div class="container">
    <div class="row" style="padding-top:10px;padding-bottom:10px;">
        <div class="col-xs-6">
            <div class="logo-left"><img src="assets/dm_logo.png"/></div>
        </div>
        <div class="col-xs-6">
            <div class="logo-right">
                <a href="#" class="btn btn-color-override" id="header_call_link" role="button" data-number="tel:+18553150377"><span class="glyphicon glyphicon-earphone"></span> Call Now</a>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $('#header_call_link').on('click', function() {
        var ajax_url = '/trackcall?page_call=' + <?php echo json_encode((int) $page_call); ?>;
        if(site_cookies_enabled === false) {
            ajax_url += '&key=' + <?php echo json_encode(session_id()); ?>;
        }
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
