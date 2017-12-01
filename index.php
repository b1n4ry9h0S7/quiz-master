<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">
<link rel="stylesheet" href="includes/css/animate.css">  

<head>
  <title>Meteor Mash</title>
</head>
<body id="bground" >

  <div class="jumbotron jumbotron-fluid">
    <h1 class="display-4 animated flipInY header
">Welcome to <span id="Mmash">Meteor Mash</span></h1>      
    <h3><span class="ityped"></span></h3>
    <hr>
  </div>  
</div>

<script src="includes/js/ityped.js"></script>
  <script>
    window.ityped.init(document.querySelector('.ityped'), {
            strings : ['We hope you will enjoy the quiz!', 'Have fun! All the best!'],
            loop : true
        });
  </script>


<div  class="container">
<?php
session_start();
include('includes/DB.php');

if(isset($_POST['submit'])) {
  if(isset($_POST['team']) && !empty($_POST['team']))
  {
    $_SESSION['team'] = $_POST['team'];
    $team_name = $_POST['team'];
    if(!DB::query("SELECT name FROM teams WHERE name=:name", array(':name' => $team_name)))
    {
      DB::query("INSERT INTO teams VALUES(DEFAULT, :team, 0)", array(':team' => $team_name));
      setcookie("team_name", $team_name);
      $_SESSION['pageLoaded'] = 0;
      header('Location: quiz.php');
    }
    else
    {
      echo '<div class="alert alert-warning">Duplicate team name found!</div>';
    }
  }
  else
  {
    echo '<div class="alert alert-warning">Team name cannot be empty!</div>';
  }
}

?>
  <div class="card text-center" id="team-entry">
    <div class="container">
      <div clas="card-body">
        <h4 class="card-title">
          Enter the team name:
        </h4>
        <form method="post">
          <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">Team</span>
            <input class="form-control" type="text" name="team" placeholder="Type the team name...">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<div class="card">
  <div class="card-header">
    <b>Rules:</b>
  </div>
  <div class="card-block">
    <p>
      <pre>  1. There is 20 minutes time limit.
  2. Candidates must try to answer all 30 questions.
  3. All participants must enter proper team name.
  4. Quiz masters decision is final.</pre></p>
  </div>
</div>


</div>
</body>
<style type="text/css">
  #bground {
     background: linear-gradient(to right, #83a4d4, #b6fbff); 
  }

  .jumbotron {
    text-align: center;
    background-color: white;
  }
  pre {
    font-family: "Times New Roman" , Times, sans-serif;
    font-size: 20px;
  }

  .card-header {
      font-family: "Times New Roman" , Times, sans-serif;
    font-size: 20px;
  }

  .card {
    border-radius: 8px;
  }
    #Mmash {
        margin: 0;
        padding: 0;
        text-align: center;
        color: transparent;
        background-image: linear-gradient(to right,#f00,#ff0,#0ff,#0f0,#00f);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        /* -webkit-background-clip:text; */
        animation: animate 10s linear infinite;
        background-size: 1000%;
    }
    @keyframes animate
    {
        0%
        {
            background-position: 0% 100%;
        }
        50%
        {
            background-position: 100% 0%;
        }
        100%
        {
            background-position: 0% 100%;
        }
    }
</style>