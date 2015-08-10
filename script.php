<?php
require_once 'inc/last_modified.php';

header('Content-type: application/javascript; charset=utf-8', true);
$filename	= 'script.min.js';

last_modified(filemtime($filename));
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
	ob_start('ob_gzhandler');
}


readfile($filename);