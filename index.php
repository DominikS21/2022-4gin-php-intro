<?php
$content = file_get_contents('http://loripsum.net/api');
$array = explode(' ',$content);
var_dump($array);
?>