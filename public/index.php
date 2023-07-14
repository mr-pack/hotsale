<?php

require_once '../classes/App.php';
require_once '../classes/UserStorage.php';
require_once '../classes/RegistrationForm.php';
require_once '../classes/Logger.php';
require_once '../classes/Response.php';

const LOG_PATH = '../logs/users/';

$logger = new Logger(LOG_PATH);
$app = new App($logger);
$app->Run();
