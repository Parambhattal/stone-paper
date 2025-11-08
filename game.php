<?php
// Redirect if user not logged in
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die("Name parameter missing");
}

// If user clicked logout
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

$names = array('Rock', 'Paper', 'Scissors');

function check($computer, $human) {
    if ($human == $computer) return "Tie";
    if ($human == 0 && $computer == 2) return "You Win";
    if ($human == 1 && $computer == 0) return "You Win";
    if ($human == 2 && $computer == 1) return "You Win";
    return "You Lose";
}

$result = false;

if (isset($_POST['human'])) {
    $human = $_POST['human'] + 0;
    $computer = rand(0, 2);
    $result = check($computer, $human);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Rima Hazra - Rock Paper Scissors Game</title>
</head>
<body>
  <h1>Rock Paper Scissors</h1>
  <p>Welcome: <?= htmlentities($_GET['name']) ?></p>

  <form method="post">
    <select name="human">
      <option value="-1">Select</option>
      <option value="0">Rock</option>
      <option value="1">Paper</option>
      <option value="2">Scissors</option>
    </select>
    <input type="submit" value="Play">
    <input type="submit" name="logout" value="Logout">
  </form>

  <pre>
<?php
if ($result === false) {
    echo "Please select a strategy and press Play.\n";
} else {
    echo "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}
?>
  </pre>
</body>
</html>
