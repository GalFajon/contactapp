<?php 
    function deleteButton($contact_id) {
        echo '
        <a class="button error" href="actions.php?action=delete_contact&contact_id='.$contact_id.'">Delete Contact</a>
    ';
    }
?>