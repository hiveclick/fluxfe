<?php
    use gunLocal\util\localLead as localLead;
    use gun\util\common as common;
    
    $return_json = array('result' => 0);
    
    require_once(__DIR__ . '/../lib/init.php');
    
    if(array_key_exists('key', $_REQUEST)) {
        ini_set('session.use_only_cookies', 0);
        ini_set('session.use_strict_mode', 1);
        session_start();
        $localLead = localLead::initLead();
        
        error_log('no cookies for ' . $_REQUEST['key']);
        $result = $localLead->saveDatabase(
            array(
                'no_cookies' => 1
            )
        );
        
        $localLead->saveLocal();
        $return_json['result'] = 1;
    }
    
    header('Content-type: application/json');
    echo json_encode($return_json);
    exit();
