<?php
    include "db.inc.php";

    $query = "SELECT * FROM todo";
    $result = mysqli_query($connection, $query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $todo = $_POST['todo'];
        $date = date('l dS F\, Y');
        $sql = "INSERT INTO todo(t_name,t_date) VALUES('$todo', '$date')";
        $results = mysqli_query($connection, $sql);

        if (!$results) {
            die("Failed");
        }
        else{
            header("Location:index.php?todo-added");
        }
    }

    if (isset($_GET['delete_todo'])) {
        $dlt_todo = $_GET['delete_todo'];
        $sqli = "DELETE FROM todo WHERE t_id = $dlt_todo";
        $res = mysqli_query($connection, $sqli);
        if (!$res) {
            die("Failed");
        }
        else{
            header("Location:index.php?todo-deleted");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" >
</head>
<body>

<div class="container">
    <div class="todo">
        <h1>TODO App With PHP and MYSQL</h1>
        <h3>Add a New Todo</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <input class="form-control" type="text" name="todo" placeholder="Todo Name">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" value="Add a New todo Task List" type="submit">
            </div>
        </form>
    </div>
    <div class="col-lg-4 search">
        <form action="search.php" method="POST">
            <input class="form-control" type="text" name="search" placeholder="Search Todo">
        
        </form>
    </div>
    <div class="table-responsive col-lg-12">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>Todo</th>
                <th>Date Added</th>
                <th>Edit Todo</th>
                <th>Delete Todo</th>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                        $t_id = $row['t_id'];
                        $t_name = $row['t_name'];
                        $t_date = $row['t_date'];

                        ?>

                <tr>
                    <td><?php echo $t_id; ?></td>
                    <td><?php echo $t_name; ?></td>
                    <td><?php echo $t_date; ?></td>
                    <td><a href="edit.php?edit-todo=<?php echo $t_id; ?>" class="btn btn-primary">Edit Todo</a></td>
                    <td><a href="index.php?delete_todo=<?php echo $t_id; ?>" class="btn btn-danger">Delete Todo</a></td>
                </tr>

                <?php    }
                ?>
               
            </tbody>
        </table>
    </div>
</div>

    
</body>
</html>