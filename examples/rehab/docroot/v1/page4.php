<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
$lead = \FluxFE\Lead::getInstance();
$lead->save(true);
if (isset($_POST['__submit'])) {
	$lead->save(true);
	$next_page = '/v1/page5.php';
	header('Location: ' . $next_page);
	exit;
}

#\FluxFE\Lead::debug();
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/pages/coverage.php'); ?>