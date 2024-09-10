<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <title>To-do List</title>

  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <meta name="description" content="" />

  <link rel="icon" href="favicon.png">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Task Name</th>
      <th scope="col">Done</th>
    </tr>
  </thead>
  <tbody>

  <?php

    require './connect.php';
  
    $sql = "SELECT * FROM tasks";
    $tasks = mysqli_query($conn , $sql);
  
    while($row = mysqli_fetch_assoc($tasks)) {
      $done;
      
      if($row['done'] === 0) $done = 'FALSE';
      else $done = 'TRUE';
  
      echo '<tr>
              <th scope="row" id=' . $row['id'] . '>' . $row['id'] . '</th>
              <td>' . $row['name'] . '</td>
              <td>' . $row['done'] . '</td>
              <td> <button class="btn btn-primary"> Edit  </button> </td>
              <td> <button class="btn btn-danger delete-button" id="' . $row['id'] . '">  Delete  </button> </td>
            </tr>';
    }
  ?>

  </tbody>
  </table>

	<form id="form" method="POST" action="./addTask.php">
    Task: <input type="text" name="task">
    <input type="submit">
  </form>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="./script.js"></script> 

</body>

</html>