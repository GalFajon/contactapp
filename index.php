<?php 
    include('./components/contacts/contact-display.php');
    include('./components/country_list.php');
    $conn = new Mysqli('localhost','root','','contacts');

    include('./functions/remove_country_image.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='uft8'>
    <link rel='stylesheet' href='static/css/chota/dist/chota.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class='container'>
    <!--Navbar-->
    <h1 class='text-center'>Contact app</h1>
    <nav class="nav">
        <div class="nav-left"></div>
        <div class="nav-center">
            <div class="tabs">
            <a href='index.php?show_images=1' class="<?php if($_GET['show_images'] || !isset($_GET['show_images'])) echo 'active'; ?>">Image display</a>
            <a href='index.php?show_images=0' class="<?php if(!$_GET['show_images'] && isset($_GET['show_images'])) echo 'active'; ?>">Text display</a>
            </div>
        </div>
        <div class="nav-right">
            <details class="dropdown" style="z-index:100;">
            <summary class="button outline">Add Contact</summary>
            <form class="card row" method="POST" action="actions.php?action=add_contact">
            <input name="nick" class="col-100" placeholder="Nickname" type="text">
            <input name="fname" class="col-100" placeholder="First Name" type="text">
            <input name="lname" class="col-100" placeholder="Last Name" type="text">
            <?php countryList($conn); ?>
            <input type="submit" value="Add" class="button primary" style="width:100%;">
            </form>
  </details>
        </div>
    </nav>
    <!--Display contacts-->
    <div style="margin-top:30px;">
    <?php 
        if (!isset($_GET['show_images']) || $_GET['show_images'] == true) contactDisplay($conn,0);
        else contactDisplay($conn,1);
    ?>
    </div>
    </div>
</body>
</html>
<?php
    $conn->close();
?>