<?php
    $title = 'Edit';
    require 'database.php';
    require 'header.php';
    if($_SERVER['REQUEST_METHOD'] == "GET"){
      
        $student_id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $execute = $statement->execute([
            'id' => $student_id
        ]);

        $student = $statement->fetch();
        

    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $stud_name = $_POST['stud_name'];
        $adress = $_POST['adress'];
        $email = $_POST['email'];
        $stud_id = $_POST['id'];

        $sql = "UPDATE students SET stud_name=:stud_name, adress=:adress, email=:email WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $execute = $statement->execute([
            'stud_name' => $stud_name,
            'email' => $email,
            'adress' => $adress,
            'id' => $stud_id
        ]);

        header('Location: index.php');
    }

?>

<main class="container mt-5">
    <div class="bg-light p-5 rounded">
        <form action="#" method="POST">
            <h1 class="text-center">Edit STUDENT</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="stud_name" value="<?= $student['stud_name']?>" class="form-control" id="exampleFormControlInput1"
                    placeholder="Sebastian Bax">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="text" name="adress" value="<?= $student['adress'] ?>"class="form-control" id="exampleFormControlInput1"
                    placeholder="Germany, st.Djon Week">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" name="email" value="<?= $student['email'] ?>" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com">
            </div>
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            
            <input type="submit" class="btn btn-lg btn-success" value="Update">
            <a class="btn btn-lg btn-primary" href="index.php" role="button">Back &raquo;</a>

        </form>
    </div>
</main>


