
<?php


require 'dbconnection.php';


$sql = "DELETE FROM product WHERE p_id='" . $_GET["p_id"] . "'";


if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";
    header("Location: admin.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($connection);

?>