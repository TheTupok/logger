<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/logLevel.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/loggerInterface.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/abstractLogger.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/logger.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/route.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/fileRoute.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/logger/databaseRoute.php');

$DBHost = "localhost";
$DBLogin = "bitrix0";
$DBPass = "Bay=IbJlv%!TrUr}LI2B";
$DBName = "sitemanager";
$tableName = "log_test";

/**
 * CREATE TABLE log_test (
 *      id integer PRIMARY KEY AUTO_INCREMENT,
 *      date DATETIME,
 *      level varchar(16),
 *      message text,
 *      context text
 * );
 */

$logger = new \Logger\Logger();

$logger
    ->addRoute(
        'file', new Logger\Routes\FileRoute($_SERVER["DOCUMENT_ROOT"] . '/logger/log.txt')
    )
    ->addRoute(
        'file2', new Logger\Routes\FileRoute($_SERVER["DOCUMENT_ROOT"] . '/logger/log2.txt')
    )
    ->addRoute(
        'db', new Logger\Routes\DatabaseRoute($DBHost, $DBLogin, $DBPass, $DBName, $tableName)
    );

$logger->info('Info log');
$logger->error('Error log');

$logger->warning('warning log with context', ['test' => '1', 'test2' => '2']);

$logger
    ->removeRoute('file');

$logger->info('Delete file1 Route');