<?php 

require 'function.php';
$id = $_GET["id"];

// Call the transferData function
transferData($id);

// Since transferData doesn't return a value, the condition won't work as expected

// Check if there was an error during data transfer
if (isset($_SESSION['data_transfer_error'])) {
    echo "<script>alert('Data transfer failed');
          document.location.href = 'charts.php'</script>";
} else {
    echo "<script>alert('Data transferred successfully');
          document.location.href = 'charts.php  '</script>";
}
?>