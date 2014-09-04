<?php
    use GunLocal\Util\LocalLead as LocalLead;
    
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
    
    if(isset($_REQUEST['__submit'])) {
        $LocalLead->maxDataValue('max_page', 1);
        
        $saveData = array(
            'max_page' => $LocalLead->retrieveDataValue('max_page'),
            'p2_view' => 1
        );
        
        $saveResult = $LocalLead->saveDatabase($saveData);
        $LocalLead->saveLocal();
        $next_page = '/thankyou';
        header('Location: ' . $next_page);
        exit();
    }
    
    $saveData = array(
        'p1_view' => 1,
        'max_page' => $LocalLead->retrieveDataValue('max_page')
    );
    $saveResult = $LocalLead->saveDatabase($saveData);
    
    $LocalLead->saveLocal();
    
    $clear_query_string = true;
    require_once(LOCAL_LIB_PATH . '/header.php');
    
    $call_phone = '(877) 978-1408';
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
<aside id="phone" class="one_third last">Free Quote. Click to Call - No Holding, Instant Connect <a href="tel://(866)3318007" title="Free Quote. Click to Call - No Holding, Instant Connect"><?php echo $call_phone; ?></a></aside>
<!--End of Phone-->
</div>
</div><!--End of Landing Header-->
<div class="banner" id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div><font size="5">Student Debt Relief</font><br><font size="4">Call Now:</font><font size="5"> <?php echo $call_phone; ?></font></div>
                <br/>
                <p>During a period of economic hardship the Department of Education offers a payment deferment for up to 3-years. Learn more about your options- Call Now.</p>

                <ul class="ticks">
                    <li>Consolidate Into 1 Lower Monthly Payment</li>
                    <li>Loan Forgiveness, Deferment, and Discharge</li>
                    <li>Guaranteed Service</li>
                </ul>
                
                <div>
                Save Money, Save Time, Save Thousands
                </div>
            </div>
            <div class="col-md-6">
                <img src="/assets/edudebthelp-2.jpg" alt="Student Loans Forgiven" />
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="buttons buttons_big buttons_position">
            <a href="#check_eligibility" class="button_buy_big gradient action_button_1">Check Eligibility</a>
        </div>
    </div>
</div>
        <article role="main">
            <!--Start of Features-->
<div class="row">
    <section id="section_features_1" class="section_features block">
    <!--Start of Features Title-->
    <hgroup>
        <h2>Student Loan Relief Options- Call Now <?php echo $call_phone; ?></h2>
        <h3>No Holding, or Long Wait Time During Business Hours</h3>
    </hgroup>
    <!--End of Features Title-->

    <!--Start of Features List-->
    <ul>
        <li class="one_third">
            <div class="feature_text">
            <h4><a href="#">Don't procrastinate any longer!</a></h4>
            <p>Counselors are AVAILABLE NOW and waiting to provide you a FREE Consultation. Your inital consultation will take literally less than 15 minutes... CALL NOW <?php echo $call_phone; ?>. We pride ourselves on our responsiveness. When you call, a trained and professional Counselor will provide you with the most beneficial options... all it takes is you making a call <?php echo $call_phone; ?>... no wait times, counselors are available to speak to you now!</p></div>
        </li>
        <li class="one_third">
            <div class="feature_text">
            <h4><a href="#">Reduce Payments by 50% - 75%</a></h4> <p>If your student loan payments are piling up and causing a financial burden... call us now for your Free Consultation <?php echo $call_phone; ?> and hear about what the most beneficial solutions are for you and your family. Stop paying high interest when you can Get Financial Relief now!!!</p></div>
        </li>
        <li class="one_third last">
            <div class="feature_text">
            <h4><a href="#">Qualify for Loan Forgiveness</a></h4> <p>If you are currently employed the City, State, County, Federal Government, Non Profit or Tribal entity... you may qualify for Loan Forgiveness. Minimize your total loan payments down to 10 years and potentially eliminate up to 100% of the interest on your Federal Student Loans. Call us today to see if you qualify for Student Loan Forgiveness. <?php echo $call_phone; ?></p></div>
        </li>
    </ul>
    <!--End of Features List-->
</section>
 </div><!--End of Features--><!--Start of Widgets Row Block 1-->
    <div class="row" id="check_eligibility">
    <section id="landing-page-widgets-row-1-area" class="block">
        <div id="landing-page-widgets-row-1" class="widgets-row block">
            <ul class="sid sid-widgets-row">
                <div class="fs_wp_sidebar">
<div class="fsBody fsEmbed">
    <link rel="stylesheet" type="text/css" href="/assets/reset.css">
    <link rel="stylesheet" type="text/css" href="/assets/default.css">
    <style type="text/css">
        
    .fsBody .fsForm, .fsForm .fsSpacerRow .fsRowBody {
        background-color: #FFFFFF;
    }
    .fsBody .fsForm .fsSectionHeader {
        background-color: #CCCCCC;
    }
    .fsBody .fsForm .fsSectionHeading {
        color: #006699;
        font-size: 30px;
        line-height:35px;
    }
    .fsBody .fsForm .fsSectionText {
        color: #006699;
    }
.fsBody .fsForm .fsLabel, .fsBody .fsForm .fsOptionLabel, .fsBody .fsForm .fsMatrix th, .fsBody .fsForm .fsMatrixLabel {
    color: #000000;
}
    .fsBody .fsForm .fsRequiredLabel {
        color: #000000;
    }
.fsBody .fsForm input[type=text].fsField, 
.fsBody .fsForm input[type=file].fsField, 
.fsBody .fsForm input[type=number].fsField,
.fsBody .fsForm input[type=email].fsField,
.fsBody .fsForm input[type=tel].fsField,
.fsBody .fsForm textarea.fsField, 
.fsBody .fsForm select.fsField {
    
        
        
}
.fsBody .fsForm input[type=text].fsRequired, 
.fsBody .fsForm input[type=file].fsRequired, 
.fsBody .fsForm input[type=number].fsRequired, 
.fsBody .fsForm input[type=email].fsRequired, 
.fsBody .fsForm input[type=tel].fsRequired, 
.fsBody .fsForm textarea.fsRequired, 
.fsBody .fsForm select.fsRequired {
        
        
}
    .fsBody .fsForm .fsSupporting {
        color: #000000;
    }
    
.fsBody .fsRowTop, .fsBody .fsRowBottom, .fsBody .fsRowOpen, .fsBody .fsRowClose { display: none; }
    </style>
<form method="post" accept-charset="UTF-8" novalidate="" action="" class="fsForm fsSingleColumn" id="fsForm1653350">
<input type="hidden" name="__submit" value="1" />
<div role="alert" id="requiredFieldsError" style="display:none;">Please fill in a valid value for all required fields</div>
<div role="alert" id="invalidFormatError" style="display:none;">Please ensure all values are in a proper format.</div>
<div role="alert" id="resumeConfirm" style="display:none;">Are you sure you want to leave this form and resume later?</div>
<div role="alert" id="fileTypeAlert" style="display:none;">You must upload one of the following file types for the selected field:</div>
<div role="alert" id="embedError" style="display:none;">There was an error displaying the form. Please copy and paste the embed code again.</div>
<div role="alert" id="applyDiscountButton" style="display:none;">Apply Discount</div>
<div role="alert" id="dcmYouSaved" style="display:none;">You saved</div>
<div role="alert" id="dcmWithCode" style="display:none;">with code</div>
<div role="alert" id="submitButtonText" style="display:none;">Get Free Quote!</div>
<div role="alert" id="submittingText" style="display:none;">Submitting</div>
<div class="fsPage" id="fsPage1653350-1">
            <div class="fsSection fs1Col" id="fsSection23291940">
            <div class="fsSectionHeader">
            <h2 class="fsSectionHeading">Online Eligibility Check</h2>
            <div class="fsSectionText"><p><span style="font-family: arial,helvetica,sans-serif; font-size: small;"><span><span style="font-family: arial,helvetica,sans-serif; font-size: small;">Please fill out the brief online survey &amp; we will instantly match you with a private member within our network that will help you determine your options.&nbsp; All decisions subject to Department of Education (DOE) approval. Programs may be free through the DOE, our network services are private &amp; fee based.&nbsp; *This is not a government eligibility check.</span></span></span></p>
<p>&nbsp;</p></div>
    </div>
            <div id="fsRow1653350-2" class="fsRow fsFieldRow fsLastRow">
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291941" aria-describedby="fsSupporting23291941" lang="en">
                <label id="label23291941" class="fsLabel fsRequiredLabel" for="field23291941">Student Debt Amount<span class="fsRequiredMarker">*</span>                                            </label>
                
                <select id="field23291941" name="debt_amount" size="1" required="" class="fsField fsRequired" aria-required="true">
        <option value="10000">10000</option>
        <option value="15000">15000</option>
        <option value="20000">20000</option>
        <option value="25000">25000</option>
        <option value="30000" selected="selected">30000</option>
        <option value="35000">35000</option>
        <option value="40000">40000</option>
        <option value="45000">45000</option>
        <option value="50000">50000</option>
        <option value="55000">55000</option>
        <option value="60000">60000</option>
        <option value="65000">65000</option>
        <option value="70000">70000</option>
        <option value="75000">75000</option>
        <option value="80000">80000</option>
        <option value="85000">85000</option>
        <option value="90000">90000</option>
        <option value="95000">95000</option>
        <option value="100000">100000</option>
</select>
    <div id="fsSupporting23291941" class="fsSupporting">Please list your "estimated" student debt amount.</div>
    </div>
    </div>    
                <div id="fsRow1653350-4" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291943" lang="en">
                                    <label id="label23291943" class="fsLabel fsRequiredLabel" for="field23291943">Zip<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                    
    <input type="number" id="field23291943" name="zip" size="5" required="" value="<?php echo $LocalLead->retrieveValueHtml('zip'); ?>" class="fsField fsFormatNumber fsNumberDecimals-0 fsRequired" aria-required="true">
                                                    
                
                
                
                
            </div>
                            </div>
            
                <div id="fsRow1653350-5" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291944" lang="en">
                                    <label id="label23291944" class="fsLabel fsRequiredLabel" for="field23291944">First Name<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                <input type="text" id="field23291944" name="first_name" size="15" required="" value="<?php echo $LocalLead->retrieveValueHtml('first_name'); ?>" class="fsField fsRequired" aria-required="true">
                                                    
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-6" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291945" lang="en">
                                    <label id="label23291945" class="fsLabel fsRequiredLabel" for="field23291945">Last Name<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                <input type="text" id="field23291945" name="last_name" size="15" required="<?php echo $LocalLead->retrieveValueHtml('last_name'); ?>" value="" class="fsField fsRequired" aria-required="true">
                                                    
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-7" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291946" lang="en">
                                    <label id="label23291946" class="fsLabel fsRequiredLabel" for="field23291946">Day Phone<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                <input type="tel" id="field23291946" name="phone" size="15" required="" value="<?php echo $LocalLead->retrieveValueHtml('phone'); ?>" class="fsField fsFormatPhoneUS fsRequired" aria-required="true">
                                                    
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-8" class="fsRow fsFieldRow fsLastRow fsHidden">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical fsHidden fsSpan100 fsHiddenByFieldSetting" id="fsCell23291947" lang="en">
                                    <label id="label23291947" class="fsLabel" for="field23291947">Evening Phone                                            </label>
                
                
                <input type="tel" id="field23291947" name="phone2" size="15" value="<?php echo $LocalLead->retrieveValueHtml('phone2'); ?>" class="fsField fsFormatPhoneUS ">
                                                    
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-9" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291948" lang="en">
                                    <label id="label23291948" class="fsLabel fsRequiredLabel" for="field23291948">Email<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                <input type="email" id="field23291948" name="email" size="15" required="required" value="<?php echo $LocalLead->retrieveValueHtml('email'); ?>" class="fsField fsFormatEmail fsRequired" aria-required="true">
                                                    
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-10" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291949" aria-describedby="fsSupporting23291949" lang="en">
                                    <label id="label23291949" class="fsLabel fsRequiredLabel" for="field23291949">Loan Type<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                <select id="field23291949" name="loan_type" size="1" required="" class="fsField fsRequired" aria-required="true">
        <option value="" selected="selected">&nbsp;</option>
        <option value="Federal">Federal</option>
        <option value="Private">Private</option>
        <option value="Both">Both</option>
        <option value="I Don’t Know">I Don’t Know</option>
</select>
                                                                                        <div id="fsSupporting23291949" class="fsSupporting">Are Your Loans Government backed or Private Loans?</div>
                                                            
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-11" class="fsRow fsFieldRow fsLastRow">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291950" aria-describedby="fsSupporting23291950" lang="en">
                                    <label id="label23291950" class="fsLabel fsRequiredLabel" for="field23291950">Other Debt<span class="fsRequiredMarker">*</span>                                            </label>
                
                
                <select id="field23291950" name="other_debt" size="1" required="" class="fsField fsRequired" aria-required="true">
        <option value="">&nbsp;</option>
        <option value="Yes">Yes</option>
        <option value="No" selected="selected">No</option>
        <option value="Not Interested">Not Interested</option>
</select>
                                                                                        <div id="fsSupporting23291950" class="fsSupporting">Do You have at least $10,000 in credit card or medical debts you would also like free information about consolidating?</div>
                                                            
                
                
                
                
            </div>
                            </div>
            
        
        
        
        
            
            
            
            
                                        
                                        
                                        
            
                                                
                <div id="fsRow1653350-12" class="fsRow fsFieldRow fsLastRow fsHidden">
            
                                        
            
            
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical fsHidden fsSpan100 fsHiddenByFieldSetting" id="fsCell24442498" aria-describedby="fsSupporting24442498" lang="en">
                                    <label id="label24442498" class="fsLabel" for="field24442498">Do you have any unfiled tax returns?                                            </label>
                
                
                <select id="field24442498" name="field24442498" size="1" class="fsField ">
        <option value="" selected="selected">&nbsp;</option>
        <option value="No">No</option>
        <option value="Yes">Yes</option>
</select>
                <div id="fsSupporting24442498" class="fsSupporting">As an added service, we can match you with our tax partners that can help you get your taxes in order along with your student loans.</div>
            </div>
                            </div>
            
                <div id="fsRow1653350-13" class="fsRow fsFieldRow fsLastRow">
            
                                        
                        
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell23291951" lang="en">
                                    <fieldset id="label23291951">
                        <legend class="fsLabel fsRequiredLabel fsLabelVertical hidden"><span>I Agree<span class="fsRequiredMarker">*</span></span></legend>
                        <div class="fieldset-content">
                
                        
        <label class="fsOptionLabel vertical" for="field23291951_1"><input type="checkbox" id="field23291951_1" name="field23291951[]" value="I Agree" class="fsField fsRequired vertical" aria-required="true">I Agree</label>
        
                                        </div></fieldset>
                
            </div>
                            </div>
                 
                <div id="fsRow1653350-14" class="fsRow fsFieldRow fsLastRow">
            
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell24186673" lang="en">
                
                
                <p>*By checking the above box, you consent and request to be contacted by <a href="http://financialeligibility.com/network-partners/" target="blank"> members of our network </a> by phone, email, text/SMS, and through the use of pre-recorded messages at the number(s) listed above even if your number provided on the form above is on a National or State Do Not Call List. In some cases, automated technology may be used to contact you including on your cellular telephone for promotional messages. Your consent does not require you to purchase any goods and/or services &amp; you have clicked, read &amp; agree to the privacy terms located at the bottom of this page. Standard carrier and messaging rates will apply. Reply "Help" for help or "Stop".</p>
                
                
            </div>
                            </div>
            
    </div>
    
    
</div>
<div id="fsSubmit1653350" class="fsSubmit fsPagination">
    
    <button type="button" id="fsPreviousButton1653350" class="fsPreviousButton" value="Previous Page" style="display:none; background:#FF9900;color:#FFFFFF;background-image: -moz-linear-gradient(top, #ffcd80, #FF9900);
                    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(#ffcd80), color-stop(#FF9900));
                    background-image: -webkit-linear-gradient(top, #ffcd80, #FF9900);
                    background-image: -o-linear-gradient(top, #ffcd80, #FF9900);
                    background-image: -ms-linear-gradient(top, #ffcd80, #FF9900);
                    background-image: linear-gradient(to bottom, #ffcd80, #FF9900);font-weight:bold;border-radius:50px;-moz-border-radius:50px;-webkit-border-radius:50px;padding-top: 6px; padding-bottom: 6px;padding-left: 45px; padding-right: 45px;"><span class="fsFull">Previous</span><span class="fsSlim">←</span></button>
    <button type="button" id="fsNextButton1653350" class="fsNextButton" value="Next Page" style="display: none; color: rgb(255, 255, 255); font-weight: bold; border-top-left-radius: 50px; border-top-right-radius: 50px; border-bottom-right-radius: 50px; border-bottom-left-radius: 50px; padding: 6px 45px; background: linear-gradient(rgb(255, 205, 128), rgb(255, 153, 0)) rgb(255, 153, 0);"><span class="fsFull">Next</span><span class="fsSlim">→</span></button>
            <input id="fsSubmitButton1653350" class="fsSubmitButton nice" style="color: rgb(255, 255, 255); font-weight: bold; border-top-left-radius: 50px; border-top-right-radius: 50px; border-bottom-right-radius: 50px; border-bottom-left-radius: 50px; padding: 6px 45px; background: linear-gradient(rgb(255, 205, 128), rgb(255, 153, 0)) rgb(255, 153, 0);" type="submit" value="Get Free Quote!">
    
    
    
    <div class="clear"></div>
</div>
</form>
</div>
        </div>            </ul>
        </div>
    </section>
    </div>    <!--End of Widgets Row Block 1-->        </article>
    <!--End of Main Content-->
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