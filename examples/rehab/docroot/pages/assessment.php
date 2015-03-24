<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['_submit'])) {
	$lead->save(true);
	$next_page = '/pages/thankyou.php';
	header('Location: ' . $next_page);
	exit;
}

#\FluxFE\Lead::debug();
?>

<?php include("header.php") ?>

<!-- WHAT IS THIS??

<script type="text/javascript">
window.ParsleyConfig = {
    errorsWrapper: '<div class="help-block help-error" role="alert"></div>',
    errorTemplate: '<div></div>',
    validators: {
        usphone: {
            fn: function (value, requirements) {
                var digits = value.replace(/[^0-9]/g,"");
                var digits_count = digits.length;
                if(digits_count > 9) {
                    var areacode = digits.substring(0, 3);
                    var valid_phone = digits.match(/^[2-9][0-8][0-9][2-9][0-9][0-9][0-9][0-9][0-9][0-9]$/);
                    if(valid_phone == null) {
                        return false;
                    } else if ($.inArray(areacode, ['555', '800', '866', '877', '888']) >= 0) {
                        return false
                    }
                    
                    return true;
                }
                return false;
            },
            priority: 32
        },
        uszip: {
            fn: function (value, requirements) {
                var digits = value.replace(/[^0-9]/g,"");
                var digits_count = digits.length;
                if(digits_count > 4) {
                    return true;
                }
                return false;
            },
            priority: 32
        }
    }
};
</script>
<script type="text/javascript" src="/assets/js/parsley.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#assessment_form').parsley();
});
</script>

-->

<div id="assessment">
	<div class="container">
		<div class="row">
			<form name="assessment_form" id="assessment_form" method="POST" action="" class="form-horizontal panel-assessment" novalidate="">
				<div class="panel panel-primary">
					<div class="panel-heading">Personal Information</div>
					<div class="panel-body">
						<input type="hidden" name="_submit" value="1">
						<div class="form-group">
							<div class="col-xs-6">
								<label for="first_name">First Name<span>*</span></label>
								<input type="text" id="first_name" name="first_name" value="" class="form-control" required="" data-parsley-error-message="Please enter your first name" data-parsley-id="5590" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;"><div class="help-block help-error" role="alert" id="parsley-id-5590"></div>
							</div>
							<div class="col-xs-6">
								<label for="last_name">Last Name<span>*</span></label>
								<input type="text" id="last_name" name="last_name" value="" class="form-control" required="" data-parsley-error-message="Please enter your last name" data-parsley-id="6881"><div class="help-block help-error" role="alert" id="parsley-id-6881"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6">
								<label for="phone">Phone<span>*</span></label>
								<input type="tel" id="phone1" name="phone1" value="" class="form-control" required="" data-parsley-usphone="1" data-parsley-error-message="Please enter a valid phone" data-parsley-id="5219"><div class="help-block help-error" role="alert" id="parsley-id-5219"></div>
							</div>
							<div class="col-xs-6">
								<label for="email">Email<span>*</span></label>
								<input type="email" id="email" name="email" value="" class="form-control" required="" data-parsley-error-message="Please enter a valid email" data-parsley-id="1823"><div class="help-block help-error" role="alert" id="parsley-id-1823"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6">
								<label for="email">Date of Birth<span>*</span></label>
								<input type="text" id="dob" name="dob" value="" class="form-control" required="" data-parsley-error-message="Please enter a valid Date of Birth" data-parsley-id="0106"><div class="help-block help-error" role="alert" id="parsley-id-0106"></div>
							</div>
							<div class="col-xs-6">
								<label for="email">Who is the rehab service for?<span>*</span></label>
								<select name="behalf_of" class="form-control" required="" data-parsley-required-message="Please select who you are helping" data-parsley-id="3644">
									<option value="self">Myself</option>
									<option value="friend">A loved one</option>
									<option value="client">A patient/client</option>
									<option value="employee">An employee</option>
								</select><div class="help-block help-error" role="alert" id="parsley-id-3644"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Drug History</div>
					<div class="panel-body">
						<input type="hidden" name="_submit" value="1">
						<div class="form-group">
							<div class="col-xs-6">
								<label for="patient_age_first_druguse">Age individual first took drugs</label>
								<input type="text" id="patient_age_first_druguse" name="patient_age_first_druguse" value="" class="form-control" data-parsley-id="6597"><div class="help-block help-error" role="alert" id="parsley-id-6597"></div>
							</div>
							<div class="col-xs-6">
								<label for="patient_age">Age of individual</label>
								<input type="text" id="patient_age" name="patient_age" value="" class="form-control" data-parsley-id="0624"><div class="help-block help-error" role="alert" id="parsley-id-0624"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<label>Does the individual admit to having a problem?</label>
								<div>
									<label style="padding-right:10px;"><input type="radio" name="admit_problem" value="yes" data-parsley-multiple="admit_problem" data-parsley-id="9498"> Yes</label><div class="help-block help-error" role="alert" id="parsley-id-multiple-admit_problem"></div>
									<label><input type="radio" name="admit_problem" value="no" data-parsley-multiple="admit_problem" data-parsley-id="9498"> No</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Treatment History</div>
					<div class="panel-body">
						<input type="hidden" name="_submit" value="1">
						<div class="form-group">
							<div class="col-xs-6">
								<label for="times_attended_treatment">Number of times individual has been to addiction treatment?</label>
								<input type="text" id="times_attended_treatment" name="times_attended_treatment" value="" class="form-control" data-parsley-id="4429"><div class="help-block help-error" role="alert" id="parsley-id-4429"></div>
							</div>
							<div class="col-xs-6">
								<label for="sobriety_length">Length of sobriety before relapse (in days)</label>
								<input type="text" id="sobriety_length" name="sobriety_length" value="" class="form-control" data-parsley-id="4720"><div class="help-block help-error" role="alert" id="parsley-id-4720"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<label>Did these addiction treatments involve a 12-step (AA/NA model)?</label>
								<div>
									<label style="padding-right:10px;"><input type="radio" name="12_step_program" value="yes" data-parsley-multiple="12_step_program" data-parsley-id="9815"> Yes</label><div class="help-block help-error" role="alert" id="parsley-id-multiple-12_step_program"></div>
									<label style="padding-right:10px;"><input type="radio" name="12_step_program" value="no" data-parsley-multiple="12_step_program" data-parsley-id="9815"> No</label>
									<label><input type="radio" name="12_step_program" value="some" data-parsley-multiple="12_step_program" data-parsley-id="9815"> Some</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Medical History</div>
					<div class="panel-body">
						<input type="hidden" name="_submit" value="1">
						<div class="form-group">
							<div class="col-xs-6">
								<label>Does individual have any known medical conditions?</label>
								<div>
									<label style="padding-right:10px;"><input type="radio" name="known_medical_conditions" value="yes" data-parsley-multiple="known_medical_conditions" data-parsley-id="2732"> Yes</label><div class="help-block help-error" role="alert" id="parsley-id-multiple-known_medical_conditions"></div>
									<label><input type="radio" name="known_medical_conditions" value="no" data-parsley-multiple="known_medical_conditions" data-parsley-id="2732"> No</label>
								</div>
							</div>
							<div class="col-xs-6">
								<label>If so, does this individual take medication for psychiatric disorder?</label>
								<div>
									<label style="padding-right:10px;"><input type="radio" name="psychiatric_disorder" value="yes" data-parsley-multiple="psychiatric_disorder" data-parsley-id="1982"> Yes</label><div class="help-block help-error" role="alert" id="parsley-id-multiple-psychiatric_disorder"></div>
									<label><input type="radio" name="psychiatric_disorder" value="no" data-parsley-multiple="psychiatric_disorder" data-parsley-id="1982"> No</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<label>Does individual have legal trouble?</label>
								<div>
									<label style="padding-right:10px;"><input type="radio" name="legal_trouble" value="yes" data-parsley-multiple="legal_trouble" data-parsley-id="9021"> Yes</label><div class="help-block help-error" role="alert" id="parsley-id-multiple-legal_trouble"></div>
									<label><input type="radio" name="legal_trouble" value="no" data-parsley-multiple="legal_trouble" data-parsley-id="9021"> No</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-body">
						<input type="hidden" name="_submit" value="1">
						<div class="form-group">
							<div class="col-xs-12">
								<label>Please provide any other information or questions you may have.</label>
								<div>
									<textarea rows="4" name="other" class="form-control" data-parsley-id="4477"></textarea><div class="help-block help-error" role="alert" id="parsley-id-4477"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<button type="submit" name="btn_submit" id="submit" class="btn btn-u btn-u-lg btn-page1 btn-primary">Submit Assessment</button>
					</div>
				</div>
			</form>
		
		
		
		</div>
	</div>
</div>

<script>
//<!--
$('#assessment_form').bootstrapValidator({
	feedbackIcons: {
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
	fields: {
		
		phone1: {
			validators: {
				notEmpty: {
					message: 'Please enter a valid phone number'
				}
			}
		},
		first_name: {
			validators: {
				notEmpty: {
					message: 'Please enter your first name'
				}
			}
		},
		last_name: {
			validators: {
				notEmpty: {
					message: 'Please enter last name'
				}
			}
		},
		email: {
			validators: {
				notEmpty: {
					message: 'Please enter the your email'
				}
			}
		},
		dob: {
			validators: {
				notEmpty: {
					message: 'Please type the date of birth (MM/DD/YYYY)'
				}
			}
		},
		patient_age_first_druguse: {
			validators: {
				notEmpty: {
					message: 'Please type age'
				}
			}
		},
	},
});
//-->
</script>

<?php include("footer.php") ?>

