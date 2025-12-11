<?php
function clean($v){
  return htmlspecialchars(trim($v), ENT_QUOTES, 'UTF-8');
}

$fullname = isset($_POST['fullname']) ? clean($_POST['fullname']) : '';
$email    = isset($_POST['email']) ? clean($_POST['email']) : '';
$phone    = isset($_POST['phone']) ? clean($_POST['phone']) : '';
$dob      = isset($_POST['dob']) ? clean($_POST['dob']) : '';
$gender   = isset($_POST['gender']) ? clean($_POST['gender']) : '';
$course   = isset($_POST['course']) ? clean($_POST['course']) : '';
$address  = isset($_POST['address']) ? nl2br(clean($_POST['address'])) : '';

$errors = [];
if($fullname === '') $errors[] = "Full name is required.";
if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
?>
<!doctype html>
<html>
<head>
<title>Application Received</title>
<style>
body{font-family:Arial;padding:20px;background:#eef3ff}
.container{max-width:700px;margin:auto;background:white;padding:20px;border-radius:10px}
.label{font-weight:bold;margin-top:10px}
.ok{background:#e7ffe7;padding:10px;border:1px solid #7ad67a;margin-bottom:10px}
.errorBox{background:#ffe7e7;padding:10px;border:1px solid #d67a7a;margin-bottom:10px}
</style>
</head>
<body>
<div class="container">
<?php if(!empty($errors)): ?>
  <div class="errorBox">
    <h3>Submission failed:</h3>
    <ul>
      <?php foreach($errors as $er) echo "<li>$er</li>"; ?>
    </ul>
    <p><a href="index.html">Go back</a></p>
  </div>
<?php else: ?>
  <div class="ok"><h3>Success! Your application was received.</h3></div>

  <p class="label">Full name:</p> <?= $fullname ?>
  <p class="label">Email:</p> <?= $email ?>
  <p class="label">Phone:</p> <?= $phone ?>
  <p class="label">DOB:</p> <?= $dob ?>
  <p class="label">Gender:</p> <?= $gender ?>
  <p class="label">Course:</p> <?= $course ?>
  <p class="label">Address:</p> <?= $address ?>

  <br><br>
  <a href="index.html">Submit another</a>
<?php endif; ?>
</div>
</body>
</html>