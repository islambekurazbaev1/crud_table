<?php 
    $title = 'View students';
    require 'header.php';
    require 'database.php';

    $sql = "SELECT * FROM students";
    $statement = $pdo->prepare($sql);
    $execute = $statement->execute();
    $students = $statement->fetchAll();
    $i = 1;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $search = $_POST['search'];
        $search1 = '%'.$search.'%';

        $sql = "SELECT * FROM students WHERE stud_name LIKE :search";
        $statement=$pdo->prepare($sql);
        $execute = $statement->execute([
            'search' => $search1
        ]);

        $result = $statement->fetchAll();
        
    }
?>

<div class="container mt-5">
    <a type="submit" href="create.php" class="btn btn-primary btn-lg mb-3 right">Add student</a>
    <form class="form-inline"   action="#" method="POST">
        <input name = "search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <table class="table text-center table-bordered border-primary table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Adress</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $key => $student ): ?>
            <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <th scope="row"><?= $student['id'] ?></th>
                <td><?= $student['stud_name']?></td>
                <td><?= $student['adress'] ?></td>
                <td><?= $student['email']?></td>
                <td><?= $student['created_at']?></td>
                <td>
                    <div role="group" aria-label="Basic mixed styles example">
                        <a type="submit" href="delete-student.php?id=<?= $student['id'] ?>"
                            class="btn btn-danger">Delete</a>
                        <a type="submit" href="edit-student.php?id=<?= $student['id'] ?>"
                            class="btn btn-success">Edit</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>