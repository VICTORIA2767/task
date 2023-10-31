<!DOCTYPE html>
<html>
<head>
   <title>Task Management System</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>
<body>
    <div class = "container">
   <h1 style="text-align: center">Task Management System</h1>

   <!-- Add a new task form -->
   <form action="add_task.php" method="POST">
       <label>Task Name:</label>
       <input type="text" name="task_name">
       <label>Status:</label>
       <select name="status">
           <option value="Pending">Pending</option>
           <option value="In Progress">In Progress</option>
           <option value="Completed">Completed</option>
       </select>
       <input type="submit" value="Add Task">
   </form>

   <!-- View all tasks -->
   <h2>All Tasks:</h2>
   <table>
       <tr>
           <th>Task Name</th>
           <th>Status</th>
           <th>Created At</th>
           <th>Updated At</th>
           <th>Actions</th>
       </tr>
       <?php
       $tasks = getAllTasks();
       foreach ($tasks as $task) {
           echo "<tr>";
           echo "<td>{$task['task_name']}</td>";
           echo "<td>{$task['status']}</td>";
           echo "<td>{$task['created_at']}</td>";
           echo "<td>{$task['updated_at']}</td>";
           echo "<td>";
           echo "<a href='edit_task.php?id={$task['id']}'>Edit</a> | ";
           echo "<a href='delete_task.php?id={$task['id']}'>Delete</a>";
           echo "</td>";
           echo "</tr>";
       }
       ?>
   </table>
    </div>

   <!-- Edit and Delete options for each task can be implemented in separate PHP scripts -->

</body>
</html>
