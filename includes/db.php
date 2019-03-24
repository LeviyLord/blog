<?php


    $connection = mysqli_connect(
        $config['db']['server'],
        $config['db']['username'],
        $config['db']['password'],
        $config['db']['name']);

mysqli_query($connection, "SET NAMES 'utf8'");
mysqli_query($connection, "SET CHARACTER SET 'utf8'");
mysqli_query($connection, "SET SESSION collation_connection = 'utf8_general_ci'");


if ($connection == false) {
     echo mysqli_connect_error();
     exit();
}