<?php
    use gunLocal\util\localLead as localLead;
    use gun\util\common as common;

    require_once(__DIR__ . '/../lib/init.php');
    
    //this call can be used on the first page, where the user is not set to have cookies enabled yet
    if(array_key_exists('key', $_REQUEST)) {
        ini_set('session.use_only_cookies', 0);
        ini_set('session.use_strict_mode', 1);
    }
    
    session_start();
    $localLead = localLead::initLead();
    
    $return_json = array('result' => 0);
    if(strlen($localLead->retrieveDataValue('uid')) > 0) {
        $ap_url = "http://api.airpush.com/track/?guid=" . $localLead->retrieveDataValueUrl('uid');
        common::doCurl($ap_url, 3);
    } else {
        error_log("no guid to attach call to");
    }
    
    if(isset($_REQUEST['page_call'])) {
        $page_call = $_REQUEST['page_call'];
        error_log('going to track ' . $page_call);
        $result = $localLead->saveDatabase(
            array(
                'page_call_' . $page_call => 1
            ),
            DEFAULT_CALL_CAMPAIGN_ID
        );
        
        $localLead->saveLocal();
        $return_json['result'] = 1;
    }
    
    header('Content-type: application/json');
    echo json_encode($return_json);
    exit();
