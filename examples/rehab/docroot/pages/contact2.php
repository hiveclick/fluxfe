<?php include("header.php") ?>

       <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                    	<div class="well well-lg" style="background-color: rgba(0, 0, 0, 0.2);">
							<div class="visible-lg visible-md">
								<h1>Your responses make you a likely candidate to receive financial compensation.</h1>
								<hr class="intro-divider" />
							</div>
							<p> <span style="color:white">Congrats! Please enter your information below, and a member of our legal team will contact your to discuss your case.</span> </p>
							<form method="POST" action="" id="myform">
							<input type="hidden" name="__submit" value="1" />
							<input type="hidden" name="partial" value="1" />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="text" class="form-control input-lg" id="name" name="Name" value="" placeholder="Name"></div>
							</div><br /><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="tel" class="form-control input-lg" maxlength="10" id="phone1" name="phone1" value="" placeholder="Phone"></div>
							</div><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="text" class="form-control input-lg" id="address" name="address" value="" placeholder="Address"></div>
							</div><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="tel" class="form-control input-lg" maxlength="5" id="zipcode" name="zipcode" value="" placeholder="Zip Code"></div>
							</div><br /><br />
							<div class="form-group">
								<div class="col-xs-12 col-md-12"><input type="submit" name="contact" value="SUBMIT" class="btn btn-danger btn-lg btn-block" /></div>
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
$(document).ready(function() {
	$('#progressbar').prop('aria-valuenow', '99');
	$('#progressbar').css('width', '99%');

	$('#zipcode,#address,#name,#phone1').blur(function() {
		$.post('/pages/save.php', $('#myform').serialize(), function(data) {
			return true;
		}, 'json');
	});
});
//-->
</script>
<?php include("footer.php") ?>    
