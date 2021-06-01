<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Proveedores

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Proveedor</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">

                    Agregar Proveedor

                </button>

            </div>

            <div class="box-body">

                <table id="tablaProveedor" class="table table-bordered table-striped dt-responsive">

                    <thead>

                        <tr>

                            <th style="width:100px"># id</th>
                            <th>Nit</th>
                            <th>Proveedor</th>
                            <th>Telefono</th>
                            <th>Ubicacion</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>



                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" id="nuevoProveedor" method="post">

                <!--=====================================
              CABEZA DEL MODAL
                     ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Proveedor</h4>

                </div>

                <!--=====================================
         CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA LA Proveedor-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaProved" placeholder="Ingresar Nit" required>

                            </div>
                            <br>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lg" name="nombreProved" placeholder="Ingresar Proveedor" required>

                            </div>
                            <br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="number" class="form-control input-lg" name="telProved" placeholder="Ingresar telefono" required>

                            </div>
                            <br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                                <input type="text" class="form-control input-lg" name="dirProved" placeholder="Ingresa direccion" required>

                            </div>
                            
                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar Proveedor</button>

                </div>

            </form>

        </div>

    </div>

</div>

<div id="modalEditarProveedor" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" id="editarprovedor" method="post">

                <!--=====================================
              CABEZA DEL MODAL
                     ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Actualizar Proveedor</h4>

                </div>

                                    <!--=====================================
                            CUERPO DEL MODAL
                            ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA LA Proveedor-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                                <input type="text" class="form-control input-lg" name="EditProved" id="EditProved" placeholder="Ingresar Nit" required>

                            </div>
                            <br>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lg" name="EditarNomPRoved" id="EditarNomPRoved" placeholder="Ingresar Proveedor" required>

                            </div>
                            <br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="number" class="form-control input-lg"  id="EdittelProved" name="EdittelProved" placeholder="Ingresar telefono" required>

                            </div>
                            <br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                                <input type="text" class="form-control input-lg"  id="EditdirProved" name="EditdirProved" placeholder="Ingresa direccion" required>
                                <input type="hidden" name="id" id="id">


                            </div>
                            
                        </div>


                    </div>

                </div>

                                        <!--=====================================
                                PIE DEL MODAL
                                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="vistas/js/proveedor.js"></script>
