<?php

  define("NAME_ERROR", "name_error");
  define("EMAIL_ERROR", "email_error");
  define("PASSWORD_ERROR", "password_error");
  define("BIRTHDAY_ERROR", "birthday_error");

  function validateName($name) {
    if (strlen($name) < 3) {
      return [NAME_ERROR =>"Name must have at least 3 charactres"];
    }
    if (strlen($name) >= 30) {
      return [NAME_ERROR => "Name must have less than 30 charactres"];
    }
    if (preg_match("/([0-9])\w+/im", $name)) {
      return [NAME_ERROR => "Name cannot have numers"];
    }
    if (preg_match("/[\[\\\^\$\.\|\?\*\+\(\)\{\}]/im", $name)) {
      return [NAME_ERROR => "Name cannot have special characters"];
    }
    return null;
  };

  function validateEmail($email) {
    if (!preg_match("/unir/im", $email)) {
      return [EMAIL_ERROR => "Email it is not a valid UNIR email"];
    }
    return null;
  }

  function validatePassword($password) {
    // At least 8 characters, 1 number, 1 letter, 1 special character
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/im", $password)) {
      return [
        PASSWORD_ERROR => "Password is not valid"
      ];
    }
    return null;
  }

  function validateBirthdayDate($birthday) {
    // No dates after today
    $today = new DateTime();
    $birthdayDate = new DateTime($birthday);

    if ($birthdayDate > $today) {
      return [
        BIRTHDAY_ERROR => "Birthday must be before today",
      ];
    }
    // older than 18 years old
    $age = $today->diff($birthdayDate)->y;
   
    if ($age < 18) {
      return [
        BIRTHDAY_ERROR => "User must be older than 18 years old",
      ];
    }

    return null;
  }

  function validateForm($params) {
    $errors = [];
    
    $name = $params["name"];
    $email = $params["email"];
    $password = $params["password"];
    $birthday = $params["birthday"];

    array_push($errors, validateName($name));
    array_push($errors, validateEmail($email));
    array_push($errors, validatePassword($password));
    array_push($errors, validateBirthdayDate($birthday));

    return $errors;
  }

?>
