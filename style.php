<?php
require_once 'inc/last_modified.php';

header("Cache-Control: public, max-age=1209600, s-maxage=1209600");
header('Content-type: text/css', true);
$filename	= dirname(__FILE__).'/style.min.css';

last_modified(filemtime($filename));

readfile($filename);