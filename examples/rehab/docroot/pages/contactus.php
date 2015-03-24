<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['contactus'])) {
	$lead->save(true);
	$next_page = '/thankyou.php';
	header('Location: ' . $next_page);
	exit;
}

#\FluxFE\Lead::debug();
?>
<?php include("header.php") ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                    	<div class="well well-lg" style="background-color: rgba(245, 245, 245, 0.4);">
								<h1>Contact Us.</h1>
								<h3>Please fill out the information below to send us a question or to request additional feedback. <br> We'd love to hear from you!</h3>
							<form method="POST" action="" id="myform">
							<input type="hidden" name="__submit" value="1" />
							<input type="hidden" name="partial" value="1" />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="text" class="form-control input-lg" name="fname" value="" placeholder="Name"></div>
							</div><br /><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="tel" class="form-control input-lg" maxlength="12" name="phone1" value="" placeholder="Phone"></div>
							</div><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="tel" class="form-control input-lg" maxlength="5" id="zipcode" name="zipcode" value="" placeholder="Zip Code"></div>
							</div><br /><br />
							<div class="form-group">
							<div class="col-xs-12 col-md-12"><input type="text" class="form-control input-lg" name="email" value="<?php echo $lead->getValue('email') ?>" placeholder="Email"></div>
							</div><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><textarea rows="5" class="form-control input-lg" name="message" value="" placeholder="Your Message"></textarea></div><br>
							</div><br /><br /><br /><br /><br /><br /><br>
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="submit" name="contactus" value="SUBMIT" class="btn btn-danger btn-lg btn-block" /></div>
							</div><br />
							</form>
						</div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

<script>
//<!--
$('#myform').bootstrapValidator({
	feedbackIcons: {
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
	fields: {
		
		fname: {
			validators: {
				notEmpty: {
					message: 'This is required and cannot be empty'
				}
			}
		},
		phone1: {
			validators: {
				notEmpty: {
					message: 'The phone is required and cannot be empty'
				}
			}
		},
		address: {
			validators: {
				notEmpty: {
					message: 'The phone is required and cannot be empty'
				}
			}
		},
		city: {
			validators: {
				notEmpty: {
					message: 'The phone is required and cannot be empty'
				}
			}
		},
		state: {
			validators: {
				notEmpty: {
					message: 'The phone is required and cannot be empty'
				}
			}
		},
		zipcode: {
			validators: {
				notEmpty: {
					message: 'The zip code is required and cannot be empty'
				}
			}
		},
		email: {
			validators: {
				notEmpty: {
					message: 'The email is required and cannot be empty'
				}
			}
		},
	}
});
//-->
</script>
<?php include("footer.php") ?>  


