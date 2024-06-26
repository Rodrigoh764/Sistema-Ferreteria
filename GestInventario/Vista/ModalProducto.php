<style>
    .row {
        width: 100%;
    }

    img {
        width: 200px;
        height: 200px;
    }

    .modal-header {
        padding: 0.3rem;
    }

    .modal-body {
        padding: 0.2rem;
    }

    .container1 {
        padding: 0.3rem 0rem 0rem 0.5rem;
    }
</style>

<!-- Modal Ver Productos -->
<div class="modal fade" id="verModal<?php echo $mostrar['Clave']; ?>" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verModalLabel">Clave del Producto: <?php echo $mostrar['Clave']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container1">
                    <fieldset disabled>
                        <div class="row" style="background: none;">
                            <div class="input-group mb-1">
                                <span class="input-group-text">Nombre</span>
                                <input type="text" class="form-control" value="<?php echo $mostrar['Nombre']; ?>">
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Categoría</span>
                                    <input type="text" class="form-control" value="<?php echo $mostrar['Categoria']; ?>">
                                </div>
                                <div class="col">
                                    <span class="input-group-text">Marca</span>
                                    <input type="text" class="form-control" value="<?php echo $mostrar['Marca']; ?>">
                                </div>
                                <div class="col">
                                    <span class="input-group-text">Precio</span>
                                    <input type="text" class="form-control" value="$<?php echo number_format($mostrar['Precio'], 2, '.', ''); ?>">
                                </div>
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Stock</span>
                                    <input type="number" class="form-control" value="<?php echo $mostrar['Stock']; ?>">
                                </div>
                                <div class="col">
                                    <label class="input-group-text" for="select-Medida">Unidad de medida</label>
                                    <span class="input-group-text"><?php echo $mostrar['Medida']; ?>(s)</span>
                                </div>
                                <div class="col">
                                    <span class="input-group-text">Días de garantía</span>
                                    <input type="number" class="form-control" value="<?php echo $mostrar['Garantia']; ?>">
                                </div>
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Descripción</span>
                                    <textarea REQUIRED class="form-control mb-1" cols="5" rows="1" name="Descripcion" placeholder="Descripción"><?php echo $mostrar['Descripcion']; ?></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <img src="data:image/png;base64,<?php echo base64_encode($mostrar['Imagen']); ?>" class="rounded mx-auto d-block">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Producto -->
<div class="modal fade" id="modalModificar<?php echo $mostrar['Clave']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalModificarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarLabel">Modificar Producto: <?php echo $mostrar['Clave']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controlador/Modificar.php?idProducto=<?php echo $mostrar['Clave']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="container1 text-center">
                        <div class="row" style="background: none;">
                            <div class="input-group mb-1">
                                <span class="input-group-text">Nombre</span>
                                <input type="text" REQUIRED class="form-control" name="Nombre" value="<?php echo $mostrar['Nombre']; ?>">
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <label class="input-group-text" for="select-Categoria">Categoría</label>
                                    <select class="form-select text-center" name="Categoria">
                                        <option selected value="<?php echo $mostrar['Categoria']; ?>"><?php echo $mostrar['Categoria']; ?></option>
                                        <option value="Herramienta">Herramienta</option>
                                        <option value="Herramientas eléctricas">Herramienta eléctrica</option>
                                        <option value="Cerrajería">Cerrajería</option>
                                        <option value="Pintura y Complementos">Pintura y Complementos</option>
                                        <option value="Soldadura">Soldadura</option>
                                        <option value="Material Eléctrico">Material Eléctrico</option>
                                        <option value="Plomería">Plomería</option>
                                        <option value="Ferretería">Ferretería</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="input-group-text" for="select-Marca">Marca</label>
                                    <select class="form-select text-center" name="Marca">
                                        <option selected value="<?php echo $mostrar['Marca']; ?>"><?php echo $mostrar['Marca']; ?></option>
                                        <option value="TRUPER">TRUPER</option>
                                        <option value="PRETUL">PRETUL</option>
                                        <option value="FOSET">FOSET</option>
                                        <option value="VOLTECK">VOLTECK</option>
                                        <option value="FIERO">FIERO</option>
                                        <option value="HERMEX">HERMEX</option>
                                        <option value="MAKITA">MAKITA</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <span class="input-group-text">Precio</span>
                                    <input type="tex" REQUIRED class="form-control" name="Precio" value="<?php echo $mostrar['Precio']; ?>">
                                </div>
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Stock</span>
                                    <input type="text" REQUIRED class="form-control" name="Stock" value="<?php echo $mostrar['Stock']; ?>">
                                </div>
                                <div class="col">
                                    <label class="input-group-text" for="select-Medida">Unidad de medida</label>
                                    <span class="input-group-text"><?php echo $mostrar['Medida']; ?>(s)</span>
                                </div>
                                <div class="col">
                                    <span class="input-group-text">Días de garantía</span>
                                    <input min="1" max="10" type="number" name="DiasGarantia" class="form-control" value="<?php echo $mostrar['Garantia']; ?>">
                                </div>
                            </div>
                            <div class="input-group mb-1">
                                <div class="col">
                                    <span class="input-group-text">Descripcion</span>
                                    <textarea REQUIRED class="form-control mb-1" cols="5" rows="1" name="Descripcion" placeholder="Descripción"><?php echo $mostrar['Descripcion']; ?></textarea>
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
<div class="modal fade" id="modalEliminar<?php echo $mostrar['Clave']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <center>
                <div class="modal-header" style="padding: 1rem;">
                    <h5 class="modal-title" id="modalEliminarLabel">¿Seguro que quiere eliminar este producto? <u style="color:red; font-style: oblique;"><?php echo $mostrar['Nombre']; ?></u></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <i class="fa-solid fa-triangle-exclamation fa-2xl"></i> Una vez eliminado no podrá recuperar la información!
                </div>
            </center>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="../Controlador/Eliminar.php?idProducto=<?php echo $mostrar['Clave']; ?>" type="button" class="btn btn-primary">
                    <i class="fa-solid fa-trash"></i> Aceptar
                </a>
            </div>
        </div>
    </div>
</div>