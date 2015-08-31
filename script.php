<?php
require_once 'inc/last_modified.php';

header("Cache-Control: public, max-age=1209600, s-maxage=1209600");
header('Content-type: application/javascript; charset=utf-8', true);
$filename	= dirname(__FILE__).'/script.min.js';

last_modified(filemtime($filename));

readfile($filename);