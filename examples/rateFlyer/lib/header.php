<?php
    if(! isset($page_title)) {
        $page_title = 'Debt Mover';
    }
    if(! isset($clear_query_string)) {
        $clear_query_string = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=yes, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>RateFlyer</title>

<script type="text/javascript" src="/assets/modernizr.min.js"></script>
<script type="text/javascript">
var site_cookies_enabled = true;
<?php if($clear_query_string === true) { ?>
    if(Modernizr.history) {
        history.replaceState({}, '', window.location.pathname);
    }
<?php } ?>
</script>

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:300,400,700' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />
<link href='/assets/style.css' rel='stylesheet' type='text/css' />
<link href='/assets/animate.css' rel='stylesheet' type='text/css' />
<style type="text/css">
.animated{
    -webkit-animation-duration:0.5s;
    animation-duration:0.5s;
    -webkit-timing-function:ease;
    animation-timing-function:ease;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
