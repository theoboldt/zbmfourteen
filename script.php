<?php
require_once 'inc/last_modified.php';

header("Cache-Control: public, max-age=90000, s-maxage=9000");
header('Content-type: application/javascript; charset=utf-8', true);
$filename	= 'script.min.js';

last_modified(filemtime($filename));

readfile($filename);