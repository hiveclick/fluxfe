<?php
    use FluxLocal\Util\LocalLead as LocalLead;
    
    require_once(__DIR__ . '/../lib/init.php');
    session_start();
    if(array_key_exists('__nt', $_REQUEST)) {
        $LocalLead = LocalLead::initLead($_REQUEST, true);
    } else {
        $LocalLead = LocalLead::initLead($_REQUEST);
    }
    
    $LocalLead->maxDataValue('max_page', 0);
    $LocalLead->assignDataValue('debtmover_flow', 3);
    
    if(strlen($LocalLead->retrieveValue('_c')) <= 0) {
        //means we got here through some other method where we didn't have _c, possibly organic
        //normally we would set some default offer id here instead of just 1, or maybe 1 is the default offer value
        $default_organic_offer_id = '6e8d88e7f0f64bcccb6b2ceb22faa919fee7049b';
        $LocalLead->assignValue('_c', $default_organic_offer_id);
    }
    
    $saveData = array(
        'max_page' => $LocalLead->retrieveDataValue('max_page')
    );
    $saveResult = $LocalLead->saveDatabase($saveData);
    
    $LocalLead->saveLocal();
    
    $clear_query_string = true;
    require_once(LOCAL_LIB_PATH . '/header.php');
?>
<title>Student Loan Forgiveness Help | Student Loan Forgiveness Help</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/assets/style.css">
<link rel="stylesheet" type="text/css" href="/assets/idangerous.swiper.css">
<link rel="shortcut icon" href="/assets/favicon.png">
<style type="text/css" media="screen">
@import url(http://fonts.googleapis.com/css?family=Lato:900);
@import url(http://fonts.googleapis.com/css?family=Merriweather:regular,700);


body {
background:#ffffff;
}

a, #phone a {
color: #166599;
}

a:hover {
color: #00406a;
}

#banner {
background: #2985c6;
background: -moz-linear-gradient(top, #2985c6 0%, #003e65 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2985c6), color-stop(100%,#003e65));
background: -webkit-linear-gradient(top, #2985c6 0%,#003e65 100%);
background: -o-linear-gradient(top, #2985c6 0%,#003e65 100%);
background: -ms-linear-gradient(top, #2985c6 0%,#003e65 100%);
background: linear-gradient(to bottom, #2985c6 0%,#003e65 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2985c6', endColorstr='#003e65',GradientType=0 );
}

#logo h1 span {
display:none !important;
}


/* Global Font Styles */
body {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 0.8em;
color: #333333;
}

#logo h1, #logo a { /* Logo */
font-family: 'Lato', sans-serif;
font-size: 1.5em;
font-weight: 900;
color: #166599;
}

#logo h2 { /* Logo Tagline */
font-family: 'Merriweather', sans-serif;
font-size: 1.25em;
color: #999999;
}

/* Blog Font Styles */
h1 {
font-family: 'Merriweather', sans-serif;
font-size: 2.35em;
color: #333333;
}

h2 {
font-family: 'Merriweather', sans-serif;
font-size: 2em;
color: #333333;
}

h3 {
font-family: 'Merriweather', sans-serif;
font-size: 1.6em;
color: #333333;
}

h4 {
font-family: 'Merriweather', sans-serif;
font-size: 1.2em;
color: #333333;
}

h5 {
font-family: 'Merriweather', sans-serif;
font-size: 1.125em;
color: #333333;
}

h6 {
font-family: 'Merriweather', sans-serif;
font-size: 1em;
color: #333333;
}

/* Single Page Title */
h1.page-title, .type-page h1.entry-title {
font-family: 'Merriweather', sans-serif;
font-size: 1.8em;
color: #333333;
}

/* Banner Heading */

#banner h1 {
font-family: 'Merriweather', sans-serif;
font-size: 3em;
font-weight: 700;
color: #ffffff;
}

#banner h2, #banner h3, #banner h4, #banner h5, #banner h6, #banner h7 {
color: #ffffff;
}

#banner, #banner p {
color: #ffffff}

/* Section Title */

.page-template-landingpage-php h2 {
    font-family: 'Merriweather', sans-serif;
    font-size: 2.2em;
    color: #166599;
}

/* Section Subtitle */

.page-template-landingpage-php h3 {
    font-family: 'Merriweather', sans-serif;
    font-size: 1.45em;
    color: #999999;
}

.swiper-container, .swiper-slide {
	/* Specify Swiper's Size: */

	width:200px;
	height: 100px;
}
.banner {
    background: #2985C6;
    background: -moz-linear-gradient(top, #2985C6 0%, #003E65 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2985C6), color-stop(100%, #003E65));
    background: -webkit-linear-gradient(top, #2985C6 0%, #003E65 100%);
    background: -o-linear-gradient(top, #2985C6 0%, #003E65 100%);
    background: -ms-linear-gradient(top, #2985C6 0%, #003E65 100%);
    background: linear-gradient(to bottom, #2985C6 0%, #003E65 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2985C6', endColorstr='#003E65', GradientType=0);
    color: #fff;
    clear: both;
    height: 400px;
    padding: 35px 0 30px 0;
    linear-gradient(to bottom, #2985C6 0%, #003E65 100%) repeat scroll 0 0 rgba(0, 0, 0, 0)
}
.buttons_position {
    margin-top:-30px;
}
</style>
</head>
<body class="home page page-id-2 page-template page-template-landingpage-php">
<div id="wrapper" class="hfeed">
<div id="landing_header" class="row">
<div id="landing_header_inner">
<div id="logo" class="two_thirds">
<a href="/assets/index.php" title="Student Loan Forgiveness Help" rel="home"><img src="/assets/600edudebt1copy1.png" alt="Student Loan Forgiveness Help" title="Student Loan Forgiveness Help"></a>
</div><!--End of Header Logo-->
<!--Start of Phone-->
<aside id="phone" class="one_third last">Free Quote. Click to Call - No Holding, Instant Connect <a href="tel://(866)3318007" title="Free Quote. Click to Call - No Holding, Instant Connect">(866) 331-8007</a></aside>
<!--End of Phone-->
</div>
</div><!--End of Landing Header-->


<div class="no-title" id="container"><article id="content">
<div class="post-21 page type-page status-publish hentry" id="post-21">


<div class="entry-content">
<noscript>&lt;img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6013715107995&amp;#038;value=0&amp;#038;currency=USD" /&gt;</noscript>
<p style="text-align: center;">Thank you! We have received your information.</p>
<h1 style="text-align: center;"><strong>(866) 331-8007</strong></h1>
<p style="text-align: center;"><strong><span style="font-size: 230%;">Please Call Now&nbsp;to learn your options instantly.</span></strong></p>
<p style="text-align: center;"><img width="400" height="266" src="/assets/call-rep-1024x6821.jpg" alt="call-rep-1024x682" class="alignnone size-full wp-image-160 aligncenter"></p>
</div>
</div>
</article>
<div class="clear"></div>
</div>






<div class="row">
<footer role="contentinfo">
<div id="page_footer">
<p>
Copyright 2014 | All Rights Reserved | <a href="http://edudebthelp.com/privacy-policy-and-terms-of-use/">Privacy Policy &amp; Terms</a>

</p><p align="justify">DISCLAIMER: This is a paid attorney/advocate advertisement.  This website is a group advertisement and a fee is paid for by participating attorneys and advocates.  The site is not an attorney referral service or prepaid legal services plan. The site is privately owned and is not affiliated with or endorsed by the Social Security Administration, Department of Education, or any other government agency.  The promotion of this website is sponsored exclusively by Attorneys and Advocacy Groups who provide services applicable to this website for the public.  Any information you submit to this website may not be protected by attorney-client privilege. An automated matching system will match each request with a member attorney/advocate representing the specific geography.  This website, it’s owners, affiliates, and partners do not claim to be affiliated with any Local, State, or Federal Government agencies, and our advertising materials, or methods are not affiliated or approved by the U.S. Government.  This website assists people in obtaining services applicable to the content of this website by pre-qualifying our clients. We then match our clients with the applicable service provider or company within our company’s network of attorneys, and advocates.  Depending on the product or services offered, you may be able to obtain this service on your own without the help of one of our 3rd party members of our network. Be sure you read your contract in full and seek legal advice if you have any questions about your contract. Results are not guaranteed and may vary. 
</p><p></p>
</div>
</footer>
</div>
</div>
<a href="#" class="scrollup">Scroll up</a>
<script type="text/javascript">
        // slider initialization
        (function ($, window, undefined) {
            $(document).ready(function() {
                $('#banner_slider').flexslider({
                    animation: 'fade',
                    slideshowSpeed: 7000,
                    animationSpeed: 600,
                    randomize: false,
                    controlNav: false,
                    directionNav: false
                });
                var mySwiper = $('.swiper-container').swiper({
                    mode:'horizontal',
                    loop: true
                });
                

            // provide a link to jump to the top quickly
            // credit: http://gazpo.com/2012/02/scrolltop/
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });
            $('.scrollup').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });

                

                jQuery('a[href*=".jpg"], a[href*="jpeg"], a[href*=".png"], a[href*=".gif"], a.screenshot').touchTouch();
                $('.section_block_gallery a').touchTouch();

            });
        })(jQuery, this);
        </script>
        
<script type="text/javascript" src="/assets/touchtouch.jquery.js"></script>
<script type="text/javascript" src="/assets/jquery.flexslider.js"></script>
<script type="text/javascript" src="/assets/idangerous.swiper.min.js"></script>



<div id="galleryOverlay" style="display: none;"><div id="gallerySlider"></div><div id="imageTitle"></div></div></body></html>