<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar productos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar productos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarproductos">

                    Agregar productos

                </button>

            </div>

            <div class="box-body">

                <table id="tablaProductos" class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <!-- <th style="width:10px">#codigo</th> -->
                            <th>codigo</th>
                            <th>descripcion</th>
                            <th>stock</th>
                            <th>valor unidad compra</th>
                            <th>porcentaje inpuesto</th>
                            <th>valor inpuesto</th>
                            <th>valor de venta</th>
                            <th>categoria</th>
                            <th>fecha registro</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR productosu
======================================-->

<div id="modalAgregarproductos" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" id="nuevoProducto" method="post" enctype="multipart/form-data">

                <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar productos</h4>

                </div>

                <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->



                        <!-- ENTRADA PARA EL productos -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                <input type="text" class="form-control input-lg" name="Descripcion" placeholder="Ingresar descripcion" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR SU categoria -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon">Categoria</i></span>

                                <select class="form-control input-lg" name="categoriaProducto" id="categoriaProducto" style="width:100%">
                                    </select><br>

                            </div>

                        </div>


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon">Proveedor</span>

                                <select class="form-control input-lg" name="ProveedorProducto" id="ProveedorProducto" style="width:100%">
                                    </select><br>

                            </div>

                        </div>



                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                <input type="number" class="form-control input-lg" id="stock" name="stock" min="0" placeholder="Stock" required>

                            </div>

                        </div>
                        <div class="form-group row">
                            <!-- checbox para porcentaje -->
                            <div class="col-xs-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                    <input type="number" class="form-control input-lg" id="precioCompra" name="precioCompra" min="0" placeholder="precio de compra" required>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                porcentaje de inpuesto
                                <div class="input-group">

                                    <input type="number" class="form-control input-lg PorcentajeInpuesto" name="PorcentajeInpuesto" id="PorcentajeInpuesto" min="0" value="0" reqired>
                                    <span class="input-group-addon"> <i class="fa fa-percent"></i> </span>
                                </div>
                            </div>


                            <div class="col-xs-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                    <input type="number" class="form-control input-lg" id="precioVenta" name="precioVenta" min="0" placeholder="precio de venta" required>

                                </div>
                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <!-- <div class="form-group">

                            <div class="panel">SUBIR imagen</div>

                            <input type="file" id="nuevaImagen" name="nuevaImagen">

                            <p class="help-block">Peso máximo de la foto 2 MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">

                        </div> -->

                    </div>

                </div>

                <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar producto</button>

                </div>

            </form>

        </div>

    </div>

</div>
<div id="modal_editarProducto" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" id="editar" method="post" >

                <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Actualizar producto</h4>

                </div>

                <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->



                        <!-- ENTRADA PARA EL productos -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                <input type="text" class="form-control input-lg" id="EditarDescripcion" name="EditarDescripcion" placeholder="Ingresar descripcion" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR SU categoria -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon">Categoria</i></span>

                                <select class="form-control input-lg" name="editarCategoriaProducto" id="editarCategoriaProducto" style="width:100%">
                                    </select><br>

                            </div>

                        </div>


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon">Proveedor</span>

                                <select class="form-control input-lg" name="editProveedorProducto" id="editProveedorProducto" style="width:100%">
                                    </select><br>

                            </div>

                        </div>



                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                <input type="number" class="form-control input-lg" id="editStock" name="editStock" min="0" placeholder="Stock" required>

                            </div>

                        </div>
                        <div class="form-group row">
                            <!-- checbox para porcentaje -->
                            <div class="col-xs-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                    <input type="number" class="form-control input-lg" id="editPrecioCompra" name="editPrecioCompra" min="0" placeholder="precio de compra" required>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                porcentaje de inpuesto
                                <div class="input-group">

                                    <input type="number" class="form-control input-lg PorcentajeInpuesto" name="editPorcentajeInpuesto" id="editPorcentajeInpuesto" min="0" value="0" reqired>
                                    <span class="input-group-addon"> <i class="fa fa-percent"></i> </span>
                                </div>
                            </div>


                            <div class="col-xs-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                    <input type="number" class="form-control input-lg" id="editPrecioVenta" name="editPrecioVenta" min="0" placeholder="precio de venta" required>
                                   <input type="hidden" name="codigo" id="codigo">


                                </div>
                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <!-- <div class="form-group">

                            <div class="panel">SUBIR imagen</div>

                            <input type="file" id="nuevaImagen" name="nuevaImagen">

                            <p class="help-block">Peso máximo de la foto 2 MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">

                        </div> -->

                    </div>

                </div>

                <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Actualizar producto</button>

                </div>

            </form>
        </div>

    </div>

</div>


<script src="vistas/js/productos.js"></script>