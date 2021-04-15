<?php
    function countryExists($conn,$country_code) {
        $stmt = $conn->prepare('SELECT COUNT(1) FROM country WHERE three_id = ?');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
            
        $stmt->bind_param('s',$country_code);
        $stmt->execute();

        $rs = $stmt->get_result();
        $data = $rs->fetch_assoc();


        if ($data['COUNT(1)'] == 1) return true;
        else if($data['COUNT(1)'] == 0) return false;
        
        $rs->free_result();
        return false;
    }
?>