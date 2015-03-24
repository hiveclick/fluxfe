<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['__submit'])) {
	$lead->setValue('phone', ($_POST['phone1'] . '-' . $_POST['phone2'] . '-' . $_POST['phone3']));
	$lead->save(true);
	$next_page = '/v1/page11.php';
	header('Location: ' . $next_page);
	exit;
}

#\FLuxFE\Lead::debug();
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/pages/phone.php'); ?>