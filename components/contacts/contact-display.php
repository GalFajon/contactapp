<?php 
    function contactDisplay($conn,$txtonly) {
        $stmt = $conn->prepare('SELECT contact.id,nick,fname,lname,three_id,flag_url,country.name,country.two_id,country.continent FROM contact INNER JOIN country ON contact.country_id = country.id');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            die('sql error'); /* TODO - error page */
        }
        
        $stmt->execute();
        $rs = $stmt->get_result();

        if ($txtonly) {
            include('contact_card_txt.php');
            while ($data = $rs->fetch_assoc()) {
                cardText(
                    $data['id'],
                    $data['nick'],
                    $data['fname'],
                    $data['lname'],
                    $data['three_id'],
                    $data['two_id'],
                    $data['name'],
                    $data['continent']
                );
            }
        }

        if (!$txtonly) {
            include('contact_card_img.php');
            while ($data = $rs->fetch_assoc()) {
                cardImage(
                    $data['id'],
                    $data['nick'],
                    $data['fname'],
                    $data['lname'],
                    $data['flag_url']
                );
            }
        }

        $rs->free_result();
    }
?>