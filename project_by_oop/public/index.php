<?php
session_start();
use Database\DatabaseManger;
use Database\MigrationManager;

require_once "../vendor/autoload.php";

DatabaseManger::initialize();

MigrationManager::runMigrations();



require_once "../routes/web.php";