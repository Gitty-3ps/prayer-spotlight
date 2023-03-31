<?php
// Connect to database
include 'connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Simple Shopping Cart</title>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap CSS Framework -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!--Bootstrap JavaScript Library-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body>
      <div>
      <form action="submit.php" method="post">
      <label for="name">Name (optional):</label>
      <input type="text" name="name" id="name"><br>
      <label for="request">Prayer Request:</label>
      <textarea name="request" id="request"></textarea><br>
      <input type="submit" value="Submit Request">
</form>
      </div>
    </body>
</html>

