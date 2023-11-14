<!-- Modal Eliminar Proveedor -->
<div class="modal fade" id="modalEliProve<?php echo $registro["ID_Proveedor"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEliProveLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliProveLabel">¿Seguro que quiere eliminar este proveedor? <u style="color:red; font-style: oblique;"><?php echo $registro['NombreEmpresa']; ?></u></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i class="fa-solid fa-triangle-exclamation fa-2xl"></i> Una vez eliminado no podrá recuperar la información!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="../controlador/delete.php?idProveedor=<?php echo $registro['ID_Proveedor']; ?>" type="button" class="btn btn-primary">
                    <i class="fa-solid fa-trash"></i> Aceptar
                </a>
            </div>
        </div>
    </div>
</div>