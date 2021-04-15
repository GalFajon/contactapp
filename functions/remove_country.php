<?php 
    function removeCountry($conn,$country_id) {        
        $stmt = $conn->prepare('DELETE FROM country WHERE id = ?;');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
            
        $stmt->bind_param('i',$country_id);
        $stmt->execute();
        return true;
    }
?>