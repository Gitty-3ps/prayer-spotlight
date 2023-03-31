<?php
// Connect to database
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Prayer Requests</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Add your CSS styles here */
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>Prayer Requests</h1>
  
  <?php


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve prayer requests and anonymous responses from database
$sql = "SELECT requests.id, requests.request, requests.date, anonymous_responses.response, anonymous_responses.response_type FROM requests LEFT JOIN anonymous_responses ON requests.id=anonymous_responses.request_id";
$result = $conn->query($sql);

// Display prayer requests and anonymous responses in a table
if ($result->num_rows > 0) {
  echo "<table><tr><th>Request</th><th>Date</th><th>Response</th><th>Response Type</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["request"] . "</td><td>" . $row["date"] . "</td><td>" . ($row["response"] ? $row["response"] : "-") . "</td><td>" . ($row["response_type"] ? $row["response_type"] : "-") . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No prayer requests.";
}

// Close connection
$conn->close();
?>

  
</body>
</html>



