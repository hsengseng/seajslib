<?php

# This file passes the content of the Readme.md file in the same directory
# through the Markdown filter. You can adapt this sample code in any way
# you like.

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\Markdown;

$name = isset($_GET['name']) ? $_GET['name'] : 'Readme';
if( $name !== 'Readme' && $name !== 'use'  && $name !== 'changelog'  ){
	$name = 'libs';
}

# Read file and pass content through the Markdown praser
$text = file_get_contents("../docs/$name.md");
echo Markdown::defaultTransform($text);

