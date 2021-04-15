<!DOCTYPE html>
<html>
<head>
    <meta charset='uft8'>
    <link rel='stylesheet' href='static/css/chota/dist/chota.css'>
</head>
<body>
<div class="hero is-full-screen">
    <div class="logo is-center is-vertical-align">
        <h1 class="bg-error" style="padding:20px; color:white;">
        <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
        ?>
        </h1>
    </div>
</div>
</body>
</html>