<?php include("header.php") ?>

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                    	<div class="well well-lg" style="background-color: rgba(0, 0, 0, 0.3);">
							<div class="visible-lg visible-md">
							</div>
								<form method="POST" action="">
								<input type="hidden" name="__submit" value="1" />
								<h2>Is a lawyer currently assigned to this case?</h2><br />
								<div class="row text-center">
									<div class="col-xs-6 ">
										<input type="submit" name="lawyer" value="YES" class="btn btn-danger btn-lg" />
									</div>
									<div class="col-xs-6">
										<input type="submit" name="lawyer" value="NO" class="btn btn-danger btn-lg" />
									</div>
								</div>
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
	$('#progressbar').prop('aria-valuenow', '80');
	$('#progressbar').css('width', '80%');
});
//-->
</script>
<?php include("footer.php") ?>    
