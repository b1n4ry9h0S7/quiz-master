<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">
<body id="bground">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Admin Login</h1>
  </div>
</div>
<div class="container">
<?php
  session_start();
  const SECRET_KEY = "1337";
  if(isset($_SESSION['auth']))
  {
    echo '<div class="alert alert-info">You are already authorized!<br>';
    echo 'See a list of questions here: <a href="list_questions.php">Question list</a></div>';
    exit();
  }
  if(isset($_POST['submit']))
  {
    if(isset($_POST['key']))
    {
      if(SECRET_KEY == $_POST['key'])
      {
        $_SESSION['auth'] = 1;
        header('Location: list_questions.php');
        exit();
      }
      else
      {
        echo '<div class="alert alert-danger">Wrong key!</div>';
      }
    }
  }
?>
<div class="card" id="auth">
  <div class="container">
    <div class="card-body">
      <form method="post">
        <input class="form-control" type="text" name="key" placeholder="Enter the secret key...">
        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
</div>
</body>
<style type="text/css">
  .jumbotron {

    color: white;
     background: linear-gradient(to right, #83a4d4, #b6fbff); /* Standard syntax */
  }

   /*  #bground {
   
   color: white;
    background: linear-gradient(to right, #83a4d4, #b6fbff); Standard syntax
     } */
</style>