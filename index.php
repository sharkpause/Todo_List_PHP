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
      $id = $row['id'];

      $done;
      if($row['done'] === 0) $done = 'FALSE';
      else $done = 'TRUE';

      $doneStatus;
      if($row['done'] === '0') {
        $doneStatus = 'False';
      } else {
        $doneStatus = 'True';
      }

      $doneStatusButton;
      if($doneStatus === 'False') {
        $doneStatusButton = '<button class="btn btn-success mark-done-button" id="' . $id . '"> Mark done </button>';
      } else if($doneStatus === 'True') {
        $doneStatusButton = '<button class="btn btn-warning mark-not-done-button" id="' . $id . '"> Mark not done </button>';
      }

      echo '<tr>
              <th scope="row" id=' . $id . '>' . $id . '</th>
              <td>' . $row['name'] . '</td>
              <td>' . $doneStatus . '</td> <td>'
              . $doneStatusButton .
              '</td>
              <td>
                <button class="btn btn-primary edit-task-button" data-toggle="modal" data-target="#editModal" id="' . $id . '"> Edit  </button>
              </td>
              <td> <button class="btn btn-danger delete-button" id="' . $id . '">  Delete  </button> </td>
            </tr>';
    }
  ?>

  </tbody>
  </table>

  <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          New task: <input type="text" class="new-task-input">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary submit-edit-button">Submit edit</button>
        </div>
      </div>
    </div>
  </div>

	<form id="form" method="POST" action="./addTask.php">
    Task: <input type="text" name="task">
    <input type="submit">
  </form>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="./script.js"></script> 

</body>

</html>