<?php

global $wpdb;

return [
    'database_type' => 'mysql',
    'database_name' => $wpdb->dbname,
    'server' => $wpdb->dbhost,
    'username' => $wpdb->dbuser,
    'password' => $wpdb->dbpassword,
    'charset' => $wpdb->charset
];
