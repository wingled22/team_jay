
<?php
    
    
    require 'dbconnection.php';
    
    
    $sql = "DELETE FROM wishlist WHERE w_id='" . $_GET["p_id"] . "'";
    
    
    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Successfully Deleted from Wishlist!!');window.location.href = 'wishlist.php';</script>";
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($connection);

?>