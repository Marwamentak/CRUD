<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign UP</title>
  <link rel="stylesheet" href="./signup.css">
</head>
<body>
  <?php
      require('./conection.php');
      if(isset($_POST['signUP_button'])) {
        $name=$_POST['name'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confPassword=$_POST['confiPassword'];
        if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) ) {
          if($password == $confPassword) {
            $p=crud::conect()->prepare('INSERT INTO crudtable(name, lastName, email, pass) VALUES(:n, :l, :e, :p)');
            $p->bindValue(':n' , $name);
            $p->bindValue(':l' , $lastName);
            $p->bindValue(':e' , $email);
            $p->bindValue(':p' , $password);
            $p->execute();
            echo 'Successfully';
          } else {
            echo 'Password does not match!';
          }
        }
      }
  
  
  ?>
  <div class="form">
    <div class="title">
      <p>Sign UP form</p>
    </div>
    <form action="" method="post">
        <input type="text" name="name" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <input type="email" name="email"  placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confiPassword"  placeholder="Confirm password">
        <input type="submit" value="Sign UP" name="signUP_button">
    </form>
  </div>
</body>
</html>