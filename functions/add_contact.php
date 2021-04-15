<?php 
    require('add_country.php');
    require('check_country.php');

    function addContact($conn, $nick,$fname,$lname,$country_code) {        
        //if country exists continue, otherwise add new country
        if (strlen($country_code) != 3) return false;

        if (!countryExists($conn,$country_code)) {
            if (!addCountry($conn,$country_code)) {
                return false;
            };
        }

        //insert into db
        $stmt = $conn->prepare('INSERT INTO contact(nick,fname,lname,country_id) VALUES (?,?,?,(SELECT id FROM country WHERE three_id = ?))');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
            
        $stmt->bind_param('ssss',
            $nick,
            $fname,
            $lname,
            $country_code
        );

        $stmt->execute();
        return true;
    }
?>