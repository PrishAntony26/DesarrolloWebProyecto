<?php

    class formRegistro{

        public function formRegistroShow(){
        include_once('formShared/headSingleton.php');
        headSingleton::getHead();
         ?>
            <link rel="stylesheet" type="text/css" href="securityModule/styles/formRegistro.css" media="screen" />
            <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>TeleCovid</h3>
                        <p>Los mejores eventos, para disfrutar!</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registro de nuevo cliente</h3>
                                <form id="formRegistro" name="formRegistro" method="post" action="securityModule/getformRegistro.php">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="User *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="contrasenia" id="contrasenia" class="form-control"  placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="sexo" value="masculino" checked>
                                                    <span> Masculino </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="sexo" value="femenino">
                                                    <span>Femenino</span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="correo" id="correo" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="telefono" id="telefono" minlength="9" maxlength="9"  class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister" name="btnRegister" id="btnRegister" value="Registrarse"/>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php
            }
    }

?>
