<script type="text/javascript">
    if(! (Modernizr.cookies)) {
        site_cookies_enabled = false;
        document.write('<div class="alert alert-danger">Cookies are not enabled on your browser. Please enable cookies in your browser preferences to continue.</div>');
        var ajax_url = '/tracknocookies?key=' + <?php echo json_encode(session_id()); ?>;
        var call_request = $.ajax({
            dataType: 'json',
            url: ajax_url
        });
    }
</script>