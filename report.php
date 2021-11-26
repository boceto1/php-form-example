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
    $params = [
      "name" => $_POST["name"],
      "email" => $_POST["email"],
      "password" => $_POST["password"],
      "birthday" => $_POST["birthday"],
      "gender" => $_POST["gender"],
    ];
    $result = validateForm($params);
    function removeEmptyElements ($item) {
      return is_null($item) ? false : true;
    }
    $errors = array_filter($result, "removeEmptyElements");
  ?>
  <section class="container">
    <div class="payment-form">
      <div class="left-panel"></div>
      <div class="report right-panel">
        <h2>Validation Report</h2>
        <div class="validated-item">
          <h3>Full Name</h3>
          <ul>
            <li>Min 3 Characters</li>
            <li>Max 30 Characteres</li>
            <li>No numbers</li>
            <li>No special characters</li>
          </ul>
        </div>
        <div class="validated-item">
          <h3>Email</h3>
          <ul>
            <li>Institutional email</li>
          </ul>
        </div>
        <div class="validated-item">
          <h3>Password</h3>
          <ul>
            <li>Min 8 Characters</li>
            <li>Requiered at least 1 number</li>
            <li>Requiered at least 1 letter</li>
            <li>Requiered at least 1 character special</li>
          </ul>
        </div>
        <div class="validated-item">
          <h3>Birthday Date</h3>
          <ul>
            <li>Before today</li>
            <li>At leats 18 years old</li>
          </ul>
        </div>
      </div>
    </div>
    <?php
      if (sizeof($errors) > 0) {
        echo "<form id=\"myForm\" action=\"index.php\" method=\"post\">";
        foreach ($errors as $item) {
          $key = key($item);
          echo "<input type=\"hidden\" name=\"".$key."\" value=\"". $item[$key]. "\">";
        }
        while (list($key, $value)=each($params)) {
          echo "<input type=\"hidden\" name=\"".$key."\" value=\"". $value. "\">";
        }
        echo "</form>";

        echo "
          </form>
          <script type=\"text/javascript\">
            document.getElementById('myForm').submit();
          </script>
          ";
      }
    ?>
  </section>
</body>

</html>
