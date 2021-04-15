<?php 
    include('functions\add_contact.php');
    include('functions\remove_contact.php');

    $conn = new Mysqli('localhost','root','','contacts');
    $success = false;
    $msg = 'Error page.';

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'add_contact') {
            $success = addContact(
                $conn,
                $_POST['nick'],
                $_POST['fname'],
                $_POST['lname'],
                $_POST['country'],
            );
            $msg = 'Adding failed.';
        }

        if ($_GET['action'] == 'delete_contact') {
            $success = removeContact($conn,$_GET['contact_id']);
            $msg = 'Deleting failed.';
        };

        $conn->close();

        if ($success) header("Location:index.php");
        else header("Location:error.php?msg=".$msg);
    }
    else 
        header('Location:index.php');
?>