<!-- Modal Editar Trabajador -->
<div class="modal fade" id="modalModiTrab<?php echo $registro['ID_Empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalModiTrabLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModiTrabLabel">Modificar Trabjador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controlador/update.php?idTrabajador=<?php echo $registro['ID_Empleado']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="container1 text-center">
                        <div class="row" style="background: none;">
                            <div class="input-group mb-1">
                                <span class="input-group-text">Nombre completo</span>
                                <input type="text" REQUIRED class="form-control" name="nombre" value="<?php echo $registro["Nombre"]; ?>">
                                <input type="text" REQUIRED class="form-control" name="apellidoP" value="<?php echo $registro["ApellidoP"]; ?>">
                                <input type="text" class="form-control" name="apellidoM" value="<?php echo $registro["ApellidoM"]; ?>">
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Fecha de Nacimiento</span>
                                    <input type="date" REQUIRED class="form-control" name="fecha" value="<?php echo $registro["FechaNac"]; ?>">
                                </div>
                                <div class="col">
                                    <span class="input-group-text">Teléfono</span>
                                    <input type="number" REQUIRED class="form-control" name="telefono" value="<?php echo $registro["Telefono"]; ?>">
                                </div>
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Puesto</span>
                                    <select name="puesto" REQUIRED class="form-select" aria-label="Default select example">
                                        <option><?php echo $registro["PuestoEmpleado"]; ?></option>
                                        <option value="2">Contador</option>
                                        <option value="3">Vendedor</option>
                                        <option value="4">Ayudante General</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="input-group-text">Sueldo</label>
                                    <input type="number" REQUIRED id="sueldo" class="form-control" name="sueldo" value="<?php echo $registro["Sueldo"]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Producto -->
<div class="modal fade" id="modalEliTrab<?php echo $registro['ID_Empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEliTrabLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliTrabLabel">¿Seguro que quiere eliminar este trabajador? <u style="color:red; font-style: oblique;"><?php echo $registro['Nombre'];  ?> <?php echo $registro['ApellidoP']; ?> <?php echo $registro['ApellidoM'];?></u></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i class="fa-solid fa-triangle-exclamation fa-2xl"></i> Una vez eliminado no podrá recuperar la información!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="../controlador/delete.php?idTrabajador=<?php echo $registro['ID_Empleado']; ?>" type="button" class="btn btn-primary">
                    <i class="fa-solid fa-trash"></i> Aceptar
                </a>
            </div>
        </div>
    </div>
</div>