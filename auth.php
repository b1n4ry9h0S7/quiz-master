<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">

<head>
  <title>Auth</title>
</head>

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

    echo '<body id="bground">';
    echo '<div class="container">
<div  id="LT">
<div class="alert alert-info">You are already authorized!<br>
See a list of questions here: <a class="btn btn-primary" href="list_questions.php">Question list</a>
 </div>
</div>';
    echo '</body>';
    echo '<style type="text/css">
  #bground {
     background: linear-gradient(to right, #83a4d4, #b6fbff);
  }
  .jumbotron {
    text-align: center;
    background-color: white;
  }
</style>
';  
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
      text-align: center;
      color: white;
     background: linear-gradient(to right, #83a4d4, #b6fbff); 
  }

.card {
    border-radius: 8px;
  }
   /*  #bground {
   
   color: white;
    background: linear-gradient(to right, #83a4d4, #b6fbff);
     } */
</style>