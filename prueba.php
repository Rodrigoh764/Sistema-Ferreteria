<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    // Set session variables
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";

    $respuesta = $_SESSION["favcolor"];

    echo "Session variables:::" . $respuesta;
    $respuesta = $_SESSION["favanimal"];
    echo "Session variables:::" . $respuesta;
    ?>

</body>

</html>