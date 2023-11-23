<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
/* Alerta error */
if (isset($_SESSION['error'])) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $_SESSION['error']; ?>',
            footer: '<a href=""></a>'
        })
    </script>
<?php
    unset($_SESSION['error']);
}

/* Alerta Venta registrada */
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

/* Alerta eliminacion correcta */
if (isset($_SESSION['exitoDelete'])) {
?>
    <script>
        Swal.fire(
            'Éxito!',
            '<?php echo $_SESSION['exitoDelete']; ?>',
            'success'
        )
    </script>
<?php
    unset($_SESSION['exitoDelete']);
}