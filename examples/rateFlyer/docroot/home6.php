<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead();
    if(isset($_POST['is_submit'])) {
        header('Location: /home7');
        exit();
    }
    require_once(LIB_PATH . '/header.php');
?>
</head>
<body class="home-theme">
    <div class="wrapper middle">
        <div class="header">
            <?php require_once(LIB_PATH . '/header_bar.php'); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hc2"><span class="glyphicon glyphicon-home"></span> Home Coverage</div>
            </div>
        </div>
        <div class="container">
            <form name="mainForm" method="POST" class="form-horizontal">
                <input type="hidden" name="is_submit" value="1" />
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="hc3">Property Address?</div>
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="address1">Address</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="address1" name="address1" class="form-control input-lg input-custom" type="text" value="" required placeholder="Address" />
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="address1">City</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="city" name="city" class="form-control input-lg input-custom" type="text" value="" required placeholder="City" />
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="address1">State</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select id="state" name="state" required class="form-control input-lg input-custom">
                            <option value="">State</option>
                            <option value="AL">AL</option>
                            <option value="AK">AK</option>
                            <option value="AZ">AZ</option>
                            <option value="AR">AR</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DE">DE</option>
                            <option value="DC">DC</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="IA">IA</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="ME">ME</option>
                            <option value="MD">MD</option>
                            <option value="MA">MA</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MS">MS</option>
                            <option value="MO">MO</option>
                            <option value="MT">MT</option>
                            <option value="NE">NE</option>
                            <option value="NV">NV</option>
                            <option value="NH">NH</option>
                            <option value="NJ">NJ</option>
                            <option value="NM">NM</option>
                            <option value="NY">NY</option>
                            <option value="NC">NC</option>
                            <option value="ND">ND</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VT">VT</option>
                            <option value="VI">VI</option>
                            <option value="VA">VA</option>
                            <option value="WA">WA</option>
                            <option value="WV">WV</option>
                            <option value="WI">WI</option>
                            <option value="WY">WY</option>
                        </select>
                    </div>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <div class="col-xs-12 label-lg" for="address1">Zip Code</div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="zip" name="zip" maxlength="5" class="form-control input-lg input-custom" type="text" value="" required placeholder="Zip Code">
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
