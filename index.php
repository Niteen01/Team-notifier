<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1 id="brand">TEAM-NOTIFIER</h1>
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

         <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          
        <label>Username</label>
        <input type="text"  name="uname" placeholder="User Name">

        <label>Password</label>
        <input type="password" name="password" placeholder="password">

        <button type="submit">Login</button>
        <a href="signup.php" class="ca">Create an account</a>
    </form>
    
</body>
</html>