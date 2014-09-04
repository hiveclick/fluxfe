<?php
    use GunLocal\Util\LocalLead as LocalLead;
    use Gun\Util\Common as Common;

    require_once(__DIR__ . '/../lib/init.php');
    
    //this call can be used on the first page, where the user is not set to have cookies enabled yet
    if(array_key_exists('key', $_REQUEST)) {
        ini_set('session.use_only_cookies', 0);
        ini_set('session.use_strict_mode', 1);
    }
    
    session_start();
    $LocalLead = LocalLead::initLead($_REQUEST);

    
    if(isset($_REQUEST['conversion'])) {
        if(strlen($LocalLead->retrieveDataValue('uid')) > 0) {
            $ap_url = "http://api.airpush.com/track/?guid=" . $LocalLead->retrieveDataValueUrl('uid');
            Common::doCurl($ap_url, 3);
        } else {
            error_log("no guid to attach conversion to");
        }
    }

    
    $update_array = array();
    if(isset($_REQUEST['partial'])) {
        $update_array['partial'] = 1;
    }
    if(isset($_REQUEST['conversion'])) {
        $update_array['conversion'] = 1;
    }
    if(isset($_REQUEST['page_view_time'])) {
        $update_array['__max'] = array('page_view_time' => (int) $_REQUEST['page_view_time']);
    }
    
    if(count($update_array) > 0) {
        $result = $LocalLead->saveDatabase(
            $update_array
        );
    }
    
    $result_array = $LocalLead->saveLocal();

    header('Content-type: application/json');
    echo json_encode($result);
    exit();
