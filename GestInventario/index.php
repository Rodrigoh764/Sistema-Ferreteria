<?php session_start(); ?>

<head>
    <title>Productos: Administración</title>
    <link rel="icon" href="Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="Assets/css/index1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['exito'])) {
    ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['exito']; ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
        unset($_SESSION['exito']);
    }
    ?>
    <?php include 'Nav.php' ?>
 
</body>