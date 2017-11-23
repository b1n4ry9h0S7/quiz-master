<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">List Questions</h1>
  </div>
</div>

<div class="container">
<?php
  session_start();
  include('includes/DB.php');

  if(!isset($_SESSION['auth']))
  {
   echo '<body id="bground">';
    echo '<div class="container">
<div class="card" id="LT">
<h4>You are not authorized to view this page. Login to continue</h4>
 <a href="auth.php" class="btn btn-primary btn-block">Login</a>
 </div>
</div>';
    echo '</body>';
    echo '<style type="text/css">
  #bground {
     background: linear-gradient(to right, #83a4d4, #b6fbff); /* Standard syntax */
  }
</style>
';
    exit();
  }
  /*Delete Questions*/
  if(isset($_GET['delete-id']))
  {
    $delete_id = $_GET['delete-id'];
    if(DB::query("SELECT question FROM questions WHERE id=:id", array(':id' => $delete_id)))
    {
      DB::query("DELETE FROM questions WHERE id=:id", array(':id' => $delete_id));
    }
    else
    {
      echo '<div class="alert alert-danger">Question does not exist!</div><br>';
    }
  } 
  $result = DB::query("SELECT id, question FROM questions");
?>
<div class="nav">
  <div class="nav-item">
    <a class="nav-link btn btn-success" href="add_question.php">Add a question</a>
  </div>
</div>
<h2>Questions</h2>
<?php if($result): ?>
<div class="questions list-group">
  <?php foreach($result as $i=>$r): ?>
          <div class="question">
            <h3 class="question-title list-group-item">
              <a href="edit_question.php?id=<?php echo $r['id']; ?>">
                <?php echo $i+1 . '. ' . $r['question']; ?>
              </a>
              &nbsp;&nbsp;
              <span class="question-delete"><a class="btn btn-danger" href="list_questions.php?delete-id=<?php echo $r['id']; ?>">Delete</a></span>
            </h3>
          </div>
  <?php endforeach; ?>
</div>
<?php else: ?>
  <p class="alert alert-info">No questions yet</p>
<?php endif; ?>
</div>
<style type="text/css">
  .jumbotron {
    text-align: center;
    color: white;
     background: linear-gradient(to right, #83a4d4, #b6fbff);
  }
  </style>