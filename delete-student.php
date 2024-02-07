<?php
    require "database.php";

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $student_id = $_GET['id'];
        $sql = "DELETE FROM students WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $execute = $statement->execute([
            'id' => $student_id,
    ]);

    header('Location: index.php');

    }
    
?>