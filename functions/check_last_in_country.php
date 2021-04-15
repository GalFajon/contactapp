<?php
    function lastInCountry ($conn,$country_id) {
        //check
        $stmt = $conn->prepare('SELECT COUNT(country_id) AS people_left FROM contact WHERE country_id = ?;');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
                    
        $stmt->bind_param('i',$country_id);
        $stmt->execute();

        $rs = $stmt->get_result();
        $data = $rs->fetch_assoc();
        
        if ($data['people_left'] <= 1) {
            return true;
        } 
        else return false;

        $rs->free_result();
    }
?>