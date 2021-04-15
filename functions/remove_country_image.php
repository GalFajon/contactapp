<?php 
    function removeCountryImage($conn,$country_id) {        
        $stmt = $conn->prepare('SELECT flag_url FROM country WHERE id = ?;');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
            
        $stmt->bind_param('i',$country_id);
        $stmt->execute();

        $rs = $stmt->get_result();
        $data = $rs->fetch_assoc();

        print_r($data);

        if (file_exists($data['flag_url']) && $data['flag_url'] != './static/images/flags/ERROR_FLAG.png') {
            unlink($data['flag_url']);
        }

        $rs->free_result();
        return true;
    }
?>