<?php
session_start();
session_unset();
session_destroy();
session_end();
die();
//header('');
exit;
?>