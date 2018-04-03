<?php

session_start();
session_destroy();
clearstatcache();
session_cache_expire();
header("location:index.php");
?>