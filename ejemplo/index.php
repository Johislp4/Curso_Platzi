<?php


require './vendor/autoload.php';

use Carbon\Carbon;
use Doctrine\Common\Inflector\Inflector;


echo "hoy es:" . Carbon::now()->toDateTimeString();

echo PHP_EOL;

 echo Inflector::pluralize('casa'); 
