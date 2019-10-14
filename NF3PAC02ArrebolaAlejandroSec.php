<?php


$db = mysqli_connect('localhost', 'root') or die ('Unable to connect.
Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'gamesite') or die(mysqli_error($db));



// insert data into the movie table
$query = 'INSERT INTO game
(game_id, game_name, game_type, game_year, game_leadactor,
game_director)
VALUES
(2, "league of legends", 1, 2019, 1, 2),
(3, "metin2", 1, 2006, 5, 6),
(4, "call of duty", 1, 2019, 4, 3)';
mysqli_query($db,$query) or die(mysqli_error($db));
//create the gametype table


$query = 'INSERT INTO gametype
(gametype_id, gametype_label)
VALUES
(1, "mmo"),
(2, "shooter"),
(3, "War");
mysqli_query($db,$query) or die(mysqli_error($db));


$query = 'INSERT INTO student
(student_id, student_fullname, student_isactor, student_isdirector)
VALUES
(1, "alejandro", 1, 0),
(2, "fabricio", 0, 1),
(3, "cristian", 0, 1),
(4, "andy", 1, 0),
(5, "javi", 1, 0),
(6, "omar", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'Data inserted successfully!';

*/

// ejercicio 2 
$query = 'SELECT
        game_name, gametype_label
    FROM
        game LEFT JOIN gametype ON game_type = gametype_id
    WHERE
        game.game_type = gametype.gametype_id AND
        game_year > 2006
    ORDER BY
        game_type';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

 
?>
