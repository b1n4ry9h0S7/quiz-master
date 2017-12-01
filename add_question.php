<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">
<script src="includes/js/jquery.min.js"></script>

<head>
  <title>Add Questions</title>
</head>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Add Questions</h1>
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
?>
	<div class="nav">
		<div class="nav-item">
			<a class="nav-link btn btn-success" href="list_questions.php">Questions</a>
		</div>
	</div>
	<h2>Add a question</h2>
	<form method="post">
		<div class="input-group">
			<label class="input-group-addon" for="question">Question: </label>
			<input class="form-control" id="question" type="text" name="question">
		</div>
		<br><br>
		<div id="optionsList">
			<div class="input-group">
				<label class="input-group-addon" for="option1">Option 1: </label>
				<input class="form-control" id="option1" type="text" name="option1">
			</div>
			<br><br>
			<div class="input-group">
				<label class="input-group-addon" for="option2">Option 2: </label>
				<input class="form-control" id="option2" type="text" name="option2">
			</div>
			<br><br>
			<div class="input-group">
				<label class="input-group-addon" for="option3">Option 3: </label>
				<input class="form-control" id="option3" type="text" name="option3">
			</div>
			<br><br>
			<div class="input-group">
				<label class="input-group-addon" for="option4">Option 4: </label>
				<input class="form-control" id="option4" type="text" name="option4">
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
		<input class="btn btn-primary" type="submit" name="submit" value="Submit">

		<script>
			$(function(){

				// Update the <option> tag dynamically as the input is filled
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


	if(isset($_POST['submit'])){

		$question = $_POST['question'];
		$option1 = $_POST['option1'];
		$option2 = $_POST['option2'];
		$option3 = $_POST['option3'];
		$option4 = $_POST['option4'];
		$answer = $_POST['answer'];

		// Check if the inputs are empty
		if(!empty($question) && !empty($option1) && !empty($option2) && !empty($option3) && !empty($option4) && !empty($answer)){


			//$query = "INSERT INTO questions VALUES(DEFAULT,'". $question . "','" .$option1."','" .$option2."',' ".$option3."','".$option4."','".$answer."')";
      $query = DB::query("INSERT INTO questions VALUES(DEFAULT, :question, :option1, :option2, :option3, :option4, :answer)",
        array(':question' => $question, ':option1' => $option1, ':option2' => $option2, ':option3' => $option3, ':option4' => $option4, ':answer' => $answer));
      header('Location: list_questions.php');
		  exit();

		}
		else{
			echo '<div class="alert alert-warning">Please fill all the fields in the form</div>';
		}

	}


?>
</div>
<style type="text/css">
   .jumbotron {
    text-align: center;
    color: white;
     background: linear-gradient(to right, #83a4d4, #b6fbff);
  }
</style>