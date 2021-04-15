<?php 
    include('check_last_in_country.php');
    include('remove_country.php');
    include('remove_country_image.php');

    function removeContact($conn,$contact_id) {
        //if last in country, delete country as well
        $stmt = $conn->prepare('SELECT country_id FROM contact WHERE id = ?;');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
                            
        $stmt->bind_param('i',$contact_id);
        $stmt->execute();        
        
        $rs = $stmt->get_result();
        $data = $rs->fetch_assoc();

        if (lastInCountry($conn,$data['country_id'])) {
            removeCountryImage($conn,$data['country_id']);
            removeCountry($conn,$data['country_id']);
        }

        //delete contact
        $stmt = $conn->prepare('DELETE FROM contact WHERE id = ?');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
                    
        $stmt->bind_param('i',$contact_id);
        $stmt->execute();        
        $rs->free_result();
        return true;
    }
?>