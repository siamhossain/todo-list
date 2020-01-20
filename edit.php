<?php
    include "db.inc.php";

    if (isset($_GET['edit-todo'])) {
        $e_id = $_GET['edit-todo'];
    } 

    if (isset($_POST['edit_todo'])) {
        $edit_todo = $_POST['todo'];

        $query = "UPDATE todo SET t_name = '$edit_todo' WHERE t_id = $e_id";
        $run = mysqli_query($connection, $query);

        if (!$run) {
            die("Failed");
        }else{
            header("Location: index.php?updated");
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
        <h3>Add anew todo</h3>
        <form action="" method="POST">
            <?php
            $sql = "SELECT * FROM todo WHERE t_id = $e_id";
            $result = mysqli_query($connection, $sql);
            $data = mysqli_fetch_array($result);
            
            ?>
            <div class="form-group">
                <input class="form-control" type="text" name="todo" placeholder="Todo Name" value="<?php echo $data['t_name']; ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" value="Add a New todo Task List" type="submit" name="edit_todo">
            </div>
        </form>
    </div>

</div>

    
</body>
</html>