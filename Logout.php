<?php
session_start();
session_unset();
session_destroy();
echo "YOU HAVE LOGGED OUT";
//echo var_export($_SESSION, true);
?>
