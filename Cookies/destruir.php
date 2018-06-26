<?php

//destruyendo la $_COOKIE
//Para destruír la cookie lo que se hace es establecer un tiempo de vigencia en el pasado (en este caso -1)

setcookie('count', null, time() - 1);

echo "cookie destruída";


 ?>
