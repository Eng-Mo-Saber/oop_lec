<?php

use Database\MigrationManager;
use Database\DatabaseManger;


require_once "../vendor/autoload.php";
require_once "../routes/web.php";

DatabaseManger::initialize();

MigrationManager::getMigration();