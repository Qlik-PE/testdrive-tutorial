{% raw %}
<?php
session_start();
$userinfo = $_SERVER['DOCUMENT_ROOT'] . "/../userinfo.php"; 
include_once $userinfo;

if (defined('SNOWFLAKE')) {
   $sfcreds = json_decode(SNOWFLAKE, true);
} else {
   $sfcreds = [
              'account' => "your-snowflake-account",
              'host' => "yourcompany.snowflakecomputing.com",
              'port' => 443,
              'username' => "your-Snowflake-user-name",
              'password' => "your-Snowflake-password",
              'dbname' => "your-database",
              'warehouse' => "your-warehouse",
              'role' => "your-snowflake-role",
              'schemaname' => "your-snowflake-schema"
              ];
}

// check to see if the user is logged in
if ($_SESSION['loggedin']) {
    // user is logged in
} else {
    // user is not logged in, send the user to the login page
    header('Location: /login.html');
}
?>
{% endraw %}
