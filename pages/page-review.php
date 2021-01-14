<?php

$db = connectDatabase();

$valEmail = "";
$valGrade = "";
$valMessage = "";

if (isset($_POST['send'])) {
    $email = trim($_POST['email']);
    $grade = trim($_POST['grade']);
    $message = trim($_POST['message']);
    $carId = $_GET['read'];

    $error = false;

    if (strlen($email) < 1) {
        $error = "Email megadása kötelező!";
    }
    
    if ($error) {
        $valEmail = $email;
        $valGrade = $grade;
        $valMessage = $message;

        echo '<p>Hiba! '. $error .'</p>';
    }
    else {
        $sql = "INSERT INTO review VALUES (NULL, :email, :grade, :message, :car_id)";

        $values = [
            'email' => $email,
            'grade' => $grade,
            'message' => $message,
            'car_id' => $carId
        ];

        $query = $db->prepare($sql);
        $query->execute($values);

        echo '<p>Az értékelés rögzítésre került!</p>';
    }
}

?>

<form method="post">

    <div>
        <h4>Email cím</h4>
        <input name="email" type="email">
    </div>

    <div>
        <h4>Mennyire elégedett?</h4>
        <select name="grade">
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </div>

    <div>
        <h4>Szöveges értékelés</h4>
        <input name="message" type="text">
    </div>

    <input type="submit" name="send" value="Küldés">

</form>