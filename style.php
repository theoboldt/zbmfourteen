<?php
require_once 'inc/last_modified.php';

header('Content-type: text/css', true);
$filename	= 'style.min.css';

last_modified(filemtime($filename));
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
	ob_start('ob_gzhandler');
}


readfile($filename);