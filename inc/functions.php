<?php

function printMenu() {
    echo '<li><a href="index.php?page=home">Főoldal</a></li>
        <li><a href="index.php?page=about">Rólunk</a></li>
        <li><a onclick="toggleDarkMode()">Sötét téma</a></li>';
}

function connectDatabase() {
    $dsn = "mysql:host=localhost;dbname=szalon;charset=utf8mb4";
    $user = "admin";
    $pass = "admin";

    $db = new PDO($dsn, $user, $pass);

    return $db;
}

function printReviews($readId) {
    $db = connectDatabase();
    $sql = "SELECT * FROM review WHERE car_id=:id ORDER BY grade DESC";

    $query = $db->prepare($sql);
    $query->execute(['id' => $readId]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo '<a href="index.php?page=review&read='. $readId .'">Értékelés írása</a>';

        foreach ($result as $record) {
            $id = $record['review_id'];
            $email = $record['email'];
            $grade = $record['grade'];
            $message = $record['message'];

            echo '<div>
                    <h4>Értékelés: '. $grade .'</h4>
                    <p>'. $message .'</p>
                </div>';
        }
    }
    else {
        echo '<p>Még nincs értékelés</p>
            <a href="/page-review.php">Legyél te az első!</a>';
    }
}

function printCarDetails($record) {
    $make = $record['make'];
    $model = $record['model'];
    $year = $record['year'];

    echo '<h3>'. $make .' '. $model .'</h3>
        <p>'. $year .'</p>';
}

?>