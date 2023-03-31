    <?php
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prayer_requests";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["name"]) && isset($_POST["request"])) {
      // Prepare SQL statement
      $stmt = $conn->prepare("INSERT INTO requests (name, request, date) VALUES (?, ?, NOW())");
      $stmt->bind_param("ss", $name, $request);

      // Set parameters and execute
      $name = $_POST["name"];
      $request = $_POST["request"];
      $stmt->execute();

      // Close connection
      $stmt->close();
      $conn->close();

      // Redirect back to the form
      header("Location: index.php");
      exit();
    } else {
      // Handle the case where the keys are not set
      echo "Error: Missing POST parameters";
    }
    ?>
