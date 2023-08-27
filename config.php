<?php
const PER_PAGE = 8;
define("path", dirname(realpath($_SERVER["DOCUMENT_ROOT"])));
define("path_public", realpath($_SERVER["DOCUMENT_ROOT"]));
define("page", intval($_GET['p'] ?? 1));


const mode_production = false;
const viewPath = __DIR__ . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views';
const cachePath = __DIR__ . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'cache';

date_default_timezone_set("Africa/Niamey");

/*
 * DB Connect Configuration
 */
const DB_HOST = 'localhost';
const DB_NAME = 'sx';
const DB_USERNAME = 'postgres';
const DB_PASSWORD = '1712';