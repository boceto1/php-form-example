<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php 
    require 'utils.php';
  ?>
  <section class="container">
    <div class="payment-form">
      <div class="left-panel"></div>
      <form action="report.php" method="post">
        <h2>Personal Information</h2>
        <div class="name">
          <label for="name">Full Name</label>
          <?php 
            echo "<input type=\"text\" name=\"name\" value=\"".$_POST["name"]."\" required>";
            if (isset($_POST[NAME_ERROR])) {
              echo "<label for=\"name\" class=\"error\">".$_POST[NAME_ERROR]."</label>";
            }
          ?>
        </div>
        <div class="email">
          <label for="email">University Email</label>
          <?php 
            echo "<input type=\"email\" name=\"email\" value=\"".$_POST["email"]."\" required>";
            if (isset($_POST[EMAIL_ERROR])) {
              echo "<label for=\"email\" class=\"error\">".$_POST[EMAIL_ERROR]."</label>";
            }
          ?>
        </div>
        <div class="password">
          <label for="password">Password</label>
          <?php 
            echo "<input type=\"password\" name=\"password\" value=\"".$_POST["password"]."\" required>";
            if (isset($_POST[PASSWORD_ERROR])) {
              echo "<label for=\"password\" class=\"error\">".$_POST[PASSWORD_ERROR]."</label>";
            }
          ?>
        </div>
        <div class="birthday">
          <label for="birthday">Birthday</label>
          <?php
            echo "<input type=\"date\" name=\"birthday\" value=\"".$_POST["birthday"]."\" required>";
            if (isset($_POST[BIRTHDAY_ERROR])) {
              echo "<label for=\"birthday\" class=\"error\">".$_POST[BIRTHDAY_ERROR]."</label>";
            }
          ?>
        </div>
        <div>
          <label for="gender">Gender</label>
          <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="prefer-not-say">Prefer not say</option>
          </select>
        </div>
        <input type="submit" value="Enviar">
      </form>
    </div>
  </section>
</body>
</html>
