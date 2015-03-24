<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->setValue("conv", 1);
$lead->save(true);
if (isset($_POST['__submit'])) {
	$lead->save(true);
	$next_page = '/v1/page12.php';
	header('Location: ' . $next_page);
	exit;
}

#\FluxFE\Lead::debug();
?>
<?php if ($lead->getValue('policy') == 'PPO') { ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/pages/thankyou-callppo.php'); ?>
<?php } else if ($lead->getValue('policy') == 'HMO') { ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/pages/thankyou-call.php'); ?>
<?php } else { ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/pages/thankyou.php'); ?>
<?php } ?>
