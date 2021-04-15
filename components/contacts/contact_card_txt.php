<?php 
    include('contact_delete.php');

    function cardText($id,$nick,$fname,$lname,$three_id,$two_id,$name,$continent) {
        echo '
        <div class="card">
        <div class="row">
        <div class="col"><h4>'.$id.'</h4></div>
        <div class="col"><h4>'.$nick.'</h4></div>
        <div class="col"><h4>'.$fname.'</h4></div>
        <div class="col"><h4>'.$lname.'</h4></div>
        <div class="col"><h4>'.$three_id.'</h4></div>
        <div class="col"><h4>'.$two_id.'</h4></div>
        <div class="col"><h4>'.$name.'</h4></div>
        <div class="col"><h4>'.$continent.'</h4></div>
        <div class="col">';
        deleteButton($id);
        echo '</div></div></div>';
    }
?>