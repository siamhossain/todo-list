<?php
    include "db.inc.php";

    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM todo WHERE t_name LIKE '%$search%'";
        $result = mysqli_query($connection, $query);
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
        <h1><a href="index.php">TODO App With PHP and MYSQL</a></h1>
        <h3>Add anew todo</h3>
        
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
                    if (mysqli_num_rows($result) === 0) {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td><h2>No Result Found!</h2></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                    }
                    else{
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

                <?php    }}

                ?>
               
            </tbody>
        </table>
    </div>
</div>

    
</body>
</html>