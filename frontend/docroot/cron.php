<?php
// +---------------------------------------------------------------------------+
// | An absolute filesystem path to our webapp/config.php script.              |
// +---------------------------------------------------------------------------+
require_once(dirname(__FILE__) . '/../webapp/config.php');

// +---------------------------------------------------------------------------+
// | An absolute filesystem path to the mojavi/mojavi.php script.              |
// +---------------------------------------------------------------------------+
require_once(MO_APP_DIR . '/mojavi.php');

// +---------------------------------------------------------------------------+
// | Create our controller. For this file we're going to use a front           |
// | controller pattern. This pattern allows us to specify module and action   |
// | GET/POST parameters and it automatically detects them and finds the       |
// | expected action.                                                          |
// +---------------------------------------------------------------------------+
$controller = Controller::newInstance('BasicConsoleController');

// +---------------------------------------------------------------------------+
// | Dispatch our request.                                                     |
// +---------------------------------------------------------------------------+
$arg_options = Array();
$req_args = Array();

$arg_options["-i"] = "id";
$arg_options["--id"] = "id";
$arg_options["-t"] = "test_mode";
$arg_options["--test_mode"] = "test_mode";
$arg_options["-s"] = "start_date";
$arg_options["--start_date"] = "start_date";
$arg_options["-e"] = "end_date";
$arg_options["--end_date"] = "end_date";

$controller->dispatch($arg_options, $req_args);

?>