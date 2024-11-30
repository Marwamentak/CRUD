<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./table.css">
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require('./conection.php');
          $p=crud::Selectdata();
          if(isset($_GET['id'])) {
            $id=$_GET['id'];
            $e=crud::delete($id);
          }
          if(count( $p)>0) {
            for($i=0; $i < count( $p); $i++) {
              foreach ($p[$i] as $key => $value) {
                if($key != 'id') {
                  echo '<td>'.$value.'</td>';
                }
              }

              ?>

              <td><a href="users.php?id=<?php echo $p[$i]['id']?>"><img src="./trash.svg" alt=""></a></td>
              <td><a href="upDate.php"><img src="./edit.svg" alt=""></a></td>

              <?php
              echo '</tr>';
            }
          }
    
      ?>
    </tbody>
  </table>
</body>
</html>