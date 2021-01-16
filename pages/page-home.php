<?php

$db = connectDatabase();

/* MAIN */
if (!isset($_GET['read'])) {
    $sql = "SELECT * FROM car ORDER BY id DESC";

    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $record) {
        $id = $record['id'];
        $make = $record['make'];
        $model = $record['model'];
        $year = $record['year'];

        echo '<div class="home-link">
                <a class="home-link" href="index.php?read='. $id .'">
                    <h3>'. $make .' '. $model .'</h3>
                    <p>'. $year .'</p>
                </a>
            </div>';
    }
}
/* CAR-PAGE */
elseif (isset($_GET['read'])) {
    $read = $_GET['read'];

    $sql = "SELECT * FROM car, review WHERE car.id=:car_id AND car.id=car_id";

    $query = $db->prepare($sql);
    $query->execute(['car_id' => $read]);
    $record = $query->fetch(PDO::FETCH_ASSOC);

    if ($record) {
        printCarDetails($record);

        printReviews($read);
    }
    else {
        $sql = "SELECT * FROM car WHERE id=:id";

        $query = $db->prepare($sql);
        $query->execute(['id' => $read]);
        $record = $query->fetch(PDO::FETCH_ASSOC);

        if ($record) {
            printCarDetails($record);

            printReviews($read);
        }
        else {
            echo '<h1>Nincs ilyen</h1>
                <p>A keresett oldal nem található</p>';
        }
    }
}

?>