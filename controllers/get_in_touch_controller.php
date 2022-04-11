<?php

  // $msg = "";
  if (isset($_POST['getInTouchSubmit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $tableSelection = $_POST['tableSelection'];

    $db = mysqli_connect("localhost", "root", "", "food_factory");

    $tableSelectionCheckQuery = "SELECT * FROM get_in_touch WHERE table_selection='$tableSelection'";
    $resultTableSelection = mysqli_query($db, $tableSelectionCheckQuery);
    $countTableSelection = mysqli_num_rows($resultTableSelection);

    if ($countTableSelection == 0) {
      $query = "INSERT INTO get_in_touch (name, email, contact_number, table_selection) VALUES ('$name', '$email', '$contactNumber', '$tableSelection')";
      mysqli_query($db, $query);
      // $msg = "<h6 class='text-success'>Your Researvation Successfully Accepted..</h6>";
      echo "Your Researvation Successfully Accepted..";
      // header('Location: ../index.php');
    }else{
      echo "Your Selected Table Already In Researved. Try Again with a new Table..!";
      // $msg = "<h6 class='text-danger'>!</h6>";
      // header('Location: ../index.php');
    }
  }

?>
