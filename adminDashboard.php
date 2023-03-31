<?php
// Connect to database
include 'connection.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve prayer requests from database
$sql = "SELECT * FROM requests";
$result = $conn->query($sql);

// Display prayer requests in a table
if ($result->num_rows > 0) {
  echo "<table><tr><th>Name</th><th>Request</th><th>Date</th><th>Response</th><th>Response Type</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["request"] . "</td><td>" . $row["date"] . "</td><td><form action='respond.php' method='post'><textarea name='response'></textarea><input type='hidden' name='id' value='" . $row["id"] . "'><br><input type='radio' name='response_type' value='text' checked> Text <input type='radio' name='response_type' value='voice'> Voice <input
    submit' value='Submit'></form></td><td>" . $row["response_type"] . "</td></tr>";
}
echo "</table>";
} else {
echo "No prayer requests.";
}

// Close connection
$conn->close();
?>

<!-- respond.php -->
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

// Prepare SQL statement
$stmt = $conn->prepare("UPDATE requests SET response=?, response_type=? WHERE id=?");
$stmt->bind_param("ssi", $response, $response_type, $id);

// Set parameters and execute
$response = $_POST["response"];
$response_type = $_POST["response_type"];
$id = $_POST["id"];
$stmt->execute();

// Close connection
$stmt->close();
$conn->close();

// Redirect back to the dashboard
header("Location: dashboard.php");
exit();
?>
