<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">
<script src="includes/js/jquery.min.js"></script>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Edit Questions</h1>
  </div>
</div>

<body id="bground">
<div class="container">
<?php
  session_start();
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
?>

<div class="nav">
		<div class="nav-item">
			<a class="nav-link btn btn-success" href="list_questions.php">Questions</a>
		</div>
</div>
<h2>Edit the question</h2>  
<?php
  include('includes/DB.php');

  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $question_id = $_GET['id'];
    $result = DB::query('SELECT * FROM questions WHERE id=:id', array(':id' => $question_id));
    if(!$result) {
      echo '<div class="alert alert-danger">Invalid question id</div>';
    }
    foreach($result as $r):
?>
      <form method="post">
        <div class="input-group">
          <label class="input-group-addon" for="question">Question: </label>
          <input class="form-control" id="question" type="text" name="question" value="<?php echo $r['question']; ?>">
        </div>
        <br><br>
        <div id="optionsList">
          <div class="input-group">
            <label class="input-group-addon" for="option1">Option 1: </label>
            <input class="form-control" id="option1" type="text" name="option1" value="<?php echo $r['option1']; ?>">
          </div>
          <br><br>
          <div class="input-group">
            <label class="input-group-addon" for="option2">Option 2: </label>
            <input class="form-control" id="option2" type="text" name="option2" value="<?php echo $r['option2']; ?>">
          </div>
          <br><br>
          <div class="input-group">
            <label class="input-group-addon" for="option3">Option 3: </label>
            <input class="form-control" id="option3" type="text" name="option3" value="<?php echo $r['option3']; ?>">
          </div>
          <br><br>
          <div class="input-group">
            <label class="input-group-addon" for="option4">Option 4: </label>
            <input class="form-control" id="option4" type="text" name="option4" value="<?php echo $r['option4']; ?>">
          </div>
          <br><br>
        </div>
        <div class="input-group">
          <label class="input-group-addon" for="answer">Answer: </label>

          <select class="form-control" id="answer" name="answer">
            <option id='select-op1' value=""></option>
            <option id='select-op2' value=""></option>
            <option id='select-op3' value=""></option>
            <option id='select-op4' value=""></option>
          </select>
        </div>
        <br><br>
        <input class="btn btn-primary" type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;
        <a class="btn btn-danger" href="list_questions.php?delete-id=<?php echo $question_id; ?>">Delete</a>
        <script>
          $(function(){
            // Set the values in the <option> tag
            $('#select-op1').text($('#option1').val());
            $('#select-op1').attr("value",$('#option1').val());
            $('#select-op2').text($('#option2').val());
            $('#select-op2').attr("value",$('#option2').val());
            $('#select-op3').text($('#option3').val());
            $('#select-op3').attr("value",$('#option3').val());
            $('#select-op4').text($('#option4').val());
            $('#select-op4').attr("value",$('#option4').val());

            // Set the answer in the option list
            $("#answer > option").each(function(){
              // Check if any of the <option> tag has the value as the $r['ans'] in php
              // If the value matches then make it as selected in the options list
              if(this.value == "<?php echo $r['ans']; ?>"){
                $(this).attr('selected', true);
              }
            });

            $("#optionsList").change(function(){
    					$('#select-op1').text($('#option1').val());
    					$('#select-op1').attr("value",$('#option1').val());
    					$('#select-op2').text($('#option2').val());
    					$('#select-op2').attr("value",$('#option2').val());
    					$('#select-op3').text($('#option3').val());
    					$('#select-op3').attr("value",$('#option3').val());
    					$('#select-op4').text($('#option4').val());
    					$('#select-op4').attr("value",$('#option4').val());

    				});

          });
        </script>
      </form>
<?php
    endforeach;

    if(isset($_POST['submit'])){

			$question = $_POST['question'];
			$option1 = $_POST['option1'];
			$option2 = $_POST['option2'];
			$option3 = $_POST['option3'];
			$option4 = $_POST['option4'];
			$answer = $_POST['answer'];

      $query = DB::query("UPDATE questions SET question=:question, option1=:option1, option2=:option2, option3=:option3, option4=:option4, ans=:answer WHERE id=:qid",
        array(':question' => $question, ':option1' => $option1, ':option2' => $option2, ':option3' => $option3, ':option4' => $option4, ':answer' => $answer, ':qid'=>$question_id));
			header('Location: '.$_SERVER['REQUEST_URI']);
			exit();

		}
  } else {
      echo '<div class="alert alert-danger">Invalid question ID</div>';
  }
?>
</div>
</body>

<style type="text/css">
   .jumbotron {
    text-align: center;
    color: white;
     background: linear-gradient(to right, #83a4d4, #b6fbff);
  }
</style>