<?php
include('includes/DB.php');

if(isset($_POST['q']))
{
  if(isset($_POST['ans']) && $_POST['ans'] != 'undefined')
  {
    $question_id = $_POST['q'];
    $user_answer = $_POST['ans'];
    $team = $_POST['team'];
    $question = DB::query("SELECT question, ans FROM questions WHERE id=:qid", array(':qid' => $_POST['q']));
    if(strcasecmp($question[0]['ans'],$user_answer) == 0)
    {
      DB::query("UPDATE teams SET points = points + 1 WHERE name=:teamName", array(':teamName' => $team));
      echo 'Correct!';
    }
    else
    {
      echo 'Wrong!';
    }

  } else
  {
    echo 'No answer';
  }
}
else if(isset($_GET['live_score']))
{
  $result = DB::query("SELECT * FROM teams ORDER BY points DESC");

  foreach($result as $i=>$r)
  {
    $leaderboard[$i]["team"] = $r["name"];
    $leaderboard[$i]["points"] = $r["points"];
  }
  print_r(json_encode($leaderboard));
}
else
{
  echo 'Question id is not set';
}



?>
