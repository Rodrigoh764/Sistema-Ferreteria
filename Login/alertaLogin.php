<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
/* Alerta sesion iniciada */
if (isset($_SESSION['inicioSesion'])) {
?>
    <script>
        Swal.fire(
            'Sesión iniciada!',
            'Bienvenido: <?php echo $_SESSION['inicioSesion']; ?>',
            'success'
        )
    </script>
<?php
    unset($_SESSION['inicioSesion']);
}

/* Alerta sesion denegada */
if (isset($_SESSION['inicioDenegado'])) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Acceso denegado',
            text: '<?php echo $_SESSION['inicioDenegado']; ?>',
        })
    </script>
<?php
    unset($_SESSION['inicioDenegado']);
}