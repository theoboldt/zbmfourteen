<?php
require_once 'inc/last_modified.php';

header('Content-type: text/css', true);
$filename	= 'style.min.css';

last_modified(filemtime($filename));

readfile($filename);