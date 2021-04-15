<?php 
    function getCountries($conn) {
        $countries = [];

        $stmt = $conn->prepare('SELECT * FROM country;');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
        $stmt->execute();

        $rs = $stmt->get_result();
        while ($data = $rs->fetch_assoc()) {
            array_push($countries,$data);
        };

        $rs->free_result();
        return $countries;
    }
?>