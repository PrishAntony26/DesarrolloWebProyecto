<?php
    include_once('headSingleton.php');
    headSingleton::getHead();
    class formResult
    {
        public function formResultShow($titulo,$mensaje,$enlace){
            //Creacion del modal de mensaje
            ?>
            <script type="text/javascript">
                function redireccionar(){
                // alert("1"); JS para mostrar ventana de window implementada OJO
                document.getElementById('id01').style.display='active';
                $("#id01").trigger("click");
                } 
                setTimeout ("redireccionar()", 200); //tiempo expresado en milisegundos
            </script>
            <button id="id01" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">boton </button>
            <div id="myModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php  echo $titulo ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php  echo $mensaje ?></p>
                    </div>
                    <div class="modal-footer">
                        <?php 
                            echo "<a href='".$enlace."'
                                class='btn-btn-success'>Volver al login</a>"
                        ?>
                    </div>
                    </div>
                </div>
            </div>
<?php
        }


    }

?>