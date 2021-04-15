<?php 
    include('./functions/get_countries.php');

    function countryList($conn) {
        $countries = getCountries($conn);
        echo '
        <input class="col-100" list="countries" name="country" placeholder="USA, COL..." type="text">
        <datalist id="countries">';
        foreach ($countries as $country) {
            echo '<option value="'.$country['three_id'].'">';
        }
        echo '</datalist>';
    }
?>