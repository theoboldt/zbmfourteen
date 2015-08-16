<?php
require_once 'inc/last_modified.php';

header("Cache-Control: public, max-age=90000, s-maxage=9000");
header('Content-type: text/css', true);
$filename	= 'style.min.css';

last_modified(filemtime($filename));

readfile($filename);