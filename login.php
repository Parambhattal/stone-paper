<?php
// Hardcoded password for this assignment
$salt = 'XyZzy12*_';
$stored_hash = hash('md5', 'XyZzy12*_php123'); // md5 of salt+password

$failure = false;

if (isset($_POST['who']) && isset($_POST['pass'])) {
    if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt . $_POST['pass']);
        if ($check == $stored_hash) {
            // Correct password
            header("Location: game.php?name=" . urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Rima Hazra - Login Page</title>
</head>
<body>
  <h1>Please Log In</h1>
  <?php
  if ($failure !== false) {
      echo('<p style="color:red;">' . htmlentities($failure) . "</p>\n");
  }
  ?>
  <form method="POST">
    <label for="who">User Name</label>
    <input type="text" name="who" id="who"><br/>
    <label for="pass">Password</label>
    <input type="text" name="pass" id="pass"><br/>
    <input type="submit" value="Log In">
    <input type="submit" name="cancel" value="Cancel">
  </form>
  <p>Hint: The password is the three-letter programming language used in this course followed by 123.</p>
</body>
</html>
