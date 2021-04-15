<?php 
        function addCountry($conn,$alpha3Code) {
        //API data
        $country = file_get_contents('https://restcountries.eu/rest/v2/alpha/'.$alpha3Code.'/?fields=name;alpha2Code;alpha3Code;region');
        $country = json_decode($country);
        
        if (!$country) {
            $stmt = $conn->prepare('INSERT INTO country(three_id,flag_url) VALUES (?,?)');
            $flag_url = './static/images/flags/ERROR_FLAG.png';
            $stmt->bind_param('ss',$alpha3Code,$flag_url);
        }
        else {
        $stmt = $conn->prepare('INSERT INTO country(name,two_id,three_id,continent,flag_url) VALUES (?,?,?,?,?)');
        if (!$stmt) {
            echo $conn->errno.$conn->error;
            return false;
        }
    
        $country->flag_url = './static/images/flags/'.$country->alpha2Code.'.png';

        if (!file_exists($country->flag_url)) {
            if (!file_put_contents($country->flag_url, file_get_contents('https://www.countryflags.io/'.$country->alpha2Code.'/flat/32.png'))) {
                $country->flag_url = './static/images/flags/ERROR_FLAG.png';
            }
        };
        $stmt->bind_param('sssss',
            $country->name,
            $country->alpha2Code,
            $country->alpha3Code,
            $country->region,
            $country->flag_url
        );        
        }


        $stmt->execute();
        return true;
        }
?>