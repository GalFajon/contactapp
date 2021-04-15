<?php 
    include('contact_delete.php');

    function cardImage($id,$nick,$fname,$lname,$flag_url) {
        echo '
        <div class="card">
        <div class="row">
        <div class="col"><h4>'.$id.'</h4></div>
        <div class="col"><h4>'.$nick.'</h4></div>
        <div class="col"><h4>'.$fname.'</h4></div>
        <div class="col"><h4>'.$lname.'</h4></div>
        <div class="col"><img width="32" height="32" src="'.$flag_url.'"></div>
        <div class="col">';
        deleteButton($id);
        echo '</div></div></div>';
    }
?>