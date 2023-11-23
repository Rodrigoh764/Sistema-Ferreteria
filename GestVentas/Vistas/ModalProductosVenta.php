<!-- Modal productos Venta-->
<div class="modal fade" id="verModalVentas<?php echo $mostrar['IDVenta']; ?>" tabindex="-1" aria-labelledby="verModalVentasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verModalVentasLabel" style="color: black;">Productos de la Venta: <?php echo $mostrar['Folio']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <fieldset disabled>
                <div class="table-responsive modal-body">
                    <table class="table table-dark table-sm table-striped table-hover table align-middle">
                        <thead class="text-center">
                            <th scope="col">Clave</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">DiasGarantía</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Cantidad</th>
                        </thead>

                        <tbody class="text-center">
                            <?php
                            $id_venta_actual = $mostrar['IDVenta'];
                            $consulta_productos_venta = "SELECT ClaveProducto, Medida, Garantia, Nombre, Cantidad, Subtotal FROM productosventa INNER JOIN productos ON productosventa.ClaveProducto = productos.Clave WHERE NumVenta = $id_venta_actual";
                            $resultado_productos_venta = $conexion->query($consulta_productos_venta);
                            while ($producto_venta = mysqli_fetch_array($resultado_productos_venta)) {
                            ?>

                                <tr>
                                    <td style="width: 10%;">
                                        <input class="form-control" name="clave" value="<?php echo $producto_venta['ClaveProducto']; ?>">
                                    </td>
                                    <td style="width: 60%;">
                                        <input class="form-control" name="nombre" value="<?php echo $producto_venta['Nombre']; ?>">
                                    </td>
                                    <td>
                                        <input class="form-control" name="garantia" value="<?php echo $producto_venta['Garantia']; ?>">
                                    </td>
                                    <td style="width: 15%;">
                                        <input class="form-control" name="cantidad" value="<?php echo $producto_venta['Cantidad']; ?><?php echo $producto_venta['Medida']; ?>(s)">
                                    </td>
                                    <td style="width: 15%;">
                                        <input class="form-control" name="subtotal" value="$<?php echo number_format($producto_venta['Subtotal'], 2, '.', ''); ?>">
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </fieldset>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>