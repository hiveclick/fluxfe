<?php
    require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/lib/init.php');
    $localLead = \GunFE\Lead::getInstance();
    $localLead->save(true);
    $response = array('result' => 'success',
    				  'record' => $localLead->toArray());
    echo json_encode($response);
?>