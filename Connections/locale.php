<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_locale = "localhost";
$database_locale = "wordpresspc";
$username_locale = "root";
$password_locale = "root";
$locale = mysql_pconnect($hostname_locale, $username_locale, $password_locale) or trigger_error(mysql_error(),E_USER_ERROR); 
?>