<main>
<section id="wrapper">
                <div id="formulario">
                    <form action="">
                        <div>
                            <h1 class="titulo">FORMULARIO DE USUARIO</h1>
                        </div>

                        <div>
                            <br><label for="correo" class="form-Nombres">Correo institucional (*)</label>
                            <input type="email" class="form-Texto" id="correo" name="correo" required />
                        </div><br>

                        <div>
                            <label for="contrasenia" class="form-Nombres">Contraseña (*)</label>
                            <input type="password" class="form-Texto" id="contrasenia" name="contrasenia" required />
                        </div><br>

                        <div>
                            <label for="rol" class="form-Nombres">Rol (*)</label>
                            <select name="rol" required class="form-Menu">
                                <option disabled selected value="0">Selecciona una opción</option>
                                <option value="1">SUPERUSUARIO</option>
                                <option value="2">REGIDOR (a)</option>
                                <option value="3">DIRECTOR (a)</option>
                                <option value="4">SECRETARIO (a)</option>
                            </select>
                        </div><br>

                        <div>
                            <label for="area" class="form-Nombres">Área de trabajo (*)</label>
                            <select name="area" required class="form-Menu">
                                <option disabled selected value="0">Selecciona una opción</option>
                                <option value="1">REGIDURÍA</option>
                            </select>
                        </div><br>

                        <div>
                            <label for="nombre" class="form-Nombres">Nombre (*)</label>
                            <input type="text" class="form-Texto" id="nombre" name="nombre" required />
                        </div><br>

                        <div>
                            <label for="paterno" class="form-Nombres">Apellido paterno (*)</label>
                            <input type="text" class="form-Texto" id="paterno" name="paterno" required />
                        </div><br>

                        <div>
                            <label for="materno" class="form-Nombres">Apellido materno</label>
                            <input type="text" class="form-Texto" id="materno" name="materno" />
                        </div><br>

                        <div>
                            <label for="curp" class="form-Nombres">CURP (*)</label>
                            <input type="text" class="form-Texto" id="curp" name="curp" required pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)" />
                        </div><br>


                        <div>
                            <label for="telefono" class="form-Nombres">Telefono (*)</label>
                            <input type="text" class="form-Texto" id="telefono" name="telefono" required minlength="10" maxlength="10" />
                        </div><br>

                        <div>
                            <label for="status" class="form-Nombres">Estatus (*)</label>
                            <select name="estatus" required class="form-Menu">
                                <option disabled selected value="0">Selecciona una opción</option>
                                <option value="1">AC (ACTIVO)</option>
                                <option value="2">NA (NO ACTIVO)</option>
                            </select>
                        </div><br>

                        <button type="submit" class="boton-Personalizado">Registrar</button>
                        <br><br>
                        <h6 class="form-Nombres">(*) Campos obligatorios</h6>
                    </form>
                </div>
    </section>
</main>