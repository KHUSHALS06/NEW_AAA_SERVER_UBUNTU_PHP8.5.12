<?php

$name = $_GET['name'];
$mimes = array
    (
    'jpg' => 'image/jpg',
    'jpeg' => 'image/jpg',
    'gif' => 'image/gif',
    'png' => 'image/png'
);
$x = explode('.', $name);
$x = end($x);
$ext = strtolower($x);

$file = './' . $name;
header('content-type: ' . $mimes[$ext]);
header('content-disposition: inline; filename="' . $name . '";');
readfile($file);
?>