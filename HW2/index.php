<?php

use autoloader\ClassLoader;
use routes\Route;

require_once("autoloader/ClassLoader.php");

ClassLoader::getInstance()->init();

Route::getInstance()->route();