<?php
    session_start();
    require_once(__DIR__ . '/../lib/global_common.class.php');
    $lead = lead::initLead();
    $lead->populateTracking($_REQUEST);
    $lead->saveLocal();
    header('Location: /apply');
    exit();