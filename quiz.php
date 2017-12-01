<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">

<head>
  <title>Meteor Mash</title>
</head>

<body id="bground">
<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/jquery.plugin.min.js"></script>
<script src="includes/js/jquery.countdown.min.js"></script>
<div class="badge badge-pill" id="timer"></div>


<div class="container">
<?php
session_start();
include('includes/DB.php');

if(!isset($_SESSION['team'])) {
      echo '<body id="bground">';
    echo '<div class="container">
<div class="card" id="LT">
<h4>Team name is not set!</h4>
 <a href="index.php" class="btn btn-primary">Team</a>
 </div>
</div>';
    echo '</body>';
    echo '<style type="text/css">
  #bground {
     background: linear-gradient(to right, #83a4d4, #b6fbff); 
  }
</style>
';
  exit();
}


$_SESSION['pageLoaded']++;
if($_SESSION['pageLoaded'] > 1) {
         echo '<body id="bground">';
    echo '<div class="container">
    <div class="card">
<div class="alert alert-warning">Page reloaded. Please re enter team name</div>
 <a href="index.php" class="btn btn-primary">Team</a>
</div>
</div>';
    echo '</body>';
    echo '<style type="text/css">
  #bground {
     background: linear-gradient(to right, #83a4d4, #b6fbff); 
  }
</style>
';

  exit();
}

if(!isset($_COOKIE['team_name'])) {
     echo'
    <div id="TPlace" class="card text-center">
    <h3>Do Well!</h3>
</div>';
} else {
     echo'
    <div id="TPlace" class="card text-center">
    <h1><span id="TName">Team '. $_COOKIE['team_name'] .'</span></h1>
</div>';
}


$questions = DB::query("SELECT * FROM questions");
if($questions)
{
  foreach($questions as $i=>$r):
?>
    <div class="question card">
      <!-- Question number -->
      <h2><?php echo $i+1 . '. ' . ucfirst($r['question']); ?></h2>
      <hr>
      <div class="list-group">
        <div class="row">
          <div class="col">
        <label class="list-group-item">
          <input type="radio" name="<?php echo $r['id']; ?>" value="<?php echo strtolower($r['option1']); ?>" />
          <?php echo ucwords($r['option1']); ?>
        </label><br>
      </div>
      <div class="col">
        <label class="list-group-item">
          <input type="radio" name="<?php echo $r['id']; ?>" value="<?php echo strtolower($r['option2']); ?>"/>
          <?php echo ucwords($r['option2']); ?>
        </label><br>
      </div>
    </div>
      <div class="row">
        <div class="col">
        <label class="list-group-item">
          <input type="radio" name="<?php echo $r['id']; ?>" value="<?php echo strtolower($r['option3']); ?>"/>
          <?php echo ucwords($r['option3']); ?>
        </label><br>
      </div>
      <div class="col">
        <label class="list-group-item">
          <input type="radio" name="<?php echo $r['id']; ?>" value="<?php echo strtolower($r['option4']); ?>"/>
          <?php echo ucwords($r['option4']); ?>
        </label><br>
      </div>
    </div>
      </div>
      <hr>
      <!-- Load different submit buttons with question id for different questions -->
        <!-- <input class="btn btn-info submitAnswer" type="submit" name="<?php echo $r['id']; ?>" value="Submit"> -->
    </div>
<?php
  endforeach;
}
else
{
  echo 'No questions';
}
?>
</div>
<script>
  $(function() {
    $('.question :input[type="radio"]').click(function(evt){
      console.log($(this).attr('name'));
      $(this).attr('disabled', 'disabled');
      $(this).closest('.list-group').find('input').attr('disabled', 'disabled');
      $.ajax({
        method: "POST",
        cache: false,
        data: "q=" + $(this).attr('name') + '&ans=' + $("input[name="+$(this).attr('name')+"]:checked").val() + '&team=<?php echo $_SESSION['team']; ?>',
        url: "evaluate.php",
        success: function(response){
          console.log('Success');

        },
        error: function(response){
          console.log('Error');
        }
      });

    });

    // The timer until: +seconds
	$("#timer").countdown({until: +1200, compact: true, format: 'MS', onExpiry: timeup});

	// Do something when the time is up
	function timeup(){
		alert('Time up!');
    window.location.href = "result.php";
	}
  });
</script>


<!-- Finish Button-->
<div class="container">
<div class="card" id="LT">
<h3>If your finished then hit this button!</h3>
 <a href="result.php" id="Finish" class="btn btn-primary btn-block">Finish</a>
 </div>
</div>
</body>
<style type="text/css">


h2,label,h3 {
  font-family: "Times New Roman", san-serif;
}

h2 {
  font-size: 25px;
}
label {
  font-size: 18px;
}
  #bground {
     background: linear-gradient(to right, #83a4d4, #b6fbff);
  }
  #LT {
    background-color: white;
    align-items: center;
  }
  .card {
    border-radius: 5px;
  }

  .list-group-item:hover {
    background:  #b6d8fc;
}

.list-group-item {
    border-radius: 5px;
}

#timer {
      background: white;
    border-style: solid;
    border-color: black;
    border-width: 5px;
    opacity: 0.7;
}

  #TPlace {
    font-family: "Times New Roman", Times, serif;
        background: linear-gradient(to right,#232526, #414345);

  }

  #TName {
        text-align: center;
        color: transparent;
        text-transform: uppercase;
        background-image: linear-gradient(to right,#f00,#ff0,#0ff,#0f0,#00f);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        /* -webkit-background-clip:text; */
        animation: animate 15s linear infinite;
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