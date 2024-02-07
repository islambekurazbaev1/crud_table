<?php 

    $title = "Create student";
    require "header.php";
    require "database.php";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $fname = $_POST['stud_name'];
        $adress = $_POST['adress'];
        $email = $_POST['email'];

        $sql = "INSERT INTO students (stud_name, adress, email) VALUES (:stud_name, :adress, :email)";
        $statement = $pdo->prepare($sql);
        $execute = $statement->execute([
            'stud_name' => $fname,
            'adress' => $adress,
            'email' => $email,
        ]);
        header('Location: index.php');
    }
    
    
?>

<main class="container mt-5">
    <div class="bg-light p-5 rounded">
        <form action="#" method="POST">
            <h1 class="text-center">Create STUDENT</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="stud_name" class="form-control" id="exampleFormControlInput1"
                    placeholder="Sebastian Bax">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="text" name="adress" class="form-control" id="exampleFormControlInput1"
                    placeholder="Germany, st.Djon Week">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com">
            </div>

            <input type="submit" class="btn btn-lg btn-success" value="Create">
            <a class="btn btn-lg btn-primary" href="index.php" role="button">Back &raquo;</a>
        </form>
    </div>
</main>