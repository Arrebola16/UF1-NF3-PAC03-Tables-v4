<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS gamesite';
mysqli_query($db,$query) or die(mysqli_error($db));

//make sure our recently created database is the active one
mysqli_select_db($db,'gamesite') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE game (
        game_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        game_name      VARCHAR(255)      NOT NULL, 
        game_type      TINYINT           NOT NULL DEFAULT 0, 
        game_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        game_leadactor INTEGER UNSIGNED  NOT NULL DEFAULT 0, 
        game_director  INTEGER UNSIGNED  NOT NULL DEFAULT 0, 

        PRIMARY KEY (game_id),
        KEY movie_type (game_type, game_year) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the movietype table
$query = 'CREATE TABLE gametype ( 
        gametype_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        gametype_label VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (gametype_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the people table
$query = 'CREATE TABLE student (
student_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
student_fullname VARCHAR(255) NOT NULL,
student_isactor TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
student_isdirector TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
PRIMARY KEY (student_id)
) ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'game database successfully created!'; 

?>