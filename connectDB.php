<?php
  $con = mysqli_connect('fit5120demo2.mysql.database.azure.com', 'sqladmin', 'Fit5120*', 'demo');
  if (mysqli_connect_errno()) {
    echo "1: Connection failed";
    exit();
  }

  $energyconsumption = "SELECT * FROM Suburb";
  $check = mysqli_query($con, $energyconsumption) or die("2: query failed");

  // Create an array to store all the rows
  $rows = array();

  // Loop through each row and fetch the data
  while ($row = mysqli_fetch_assoc($check)) {
    // Add each row to the array
    $rows[] = $row;
  }

  // Check if any rows were found
  if (count($rows) > 0) {
    // Create an associative array to store the result
    $result = array("status" => "success", "data" => $rows);
  } else {
    // No rows found, still return an empty data array
    $result = array("status" => "error", "message" => "No data found in the 'Suburb' table.", "data" => $rows);
  }

  // Convert the result array to JSON and echo it
  echo json_encode($result);
?>
