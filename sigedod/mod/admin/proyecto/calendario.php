<html>
    <body>
        <h1 id="text">Calendario</h1>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><div id="CalendarioWeb"></div></div>
                <div class="col"></div>
            </div>
        </div>

        <!--===================================================================================================-->
        <!--MODAL PARA AGREGAR-->
        <div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloEvento"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Título:</label>
                                <input type="text" class="form-control" id="titletxt">
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" id="descripciontxt"></textarea>
                            </div>
                            <table style="width:30%">
                                <tr>
                                    <td style="width:20%">
                                        <div class="form-group">
                                            <label for="fechaInicio" class="col-form-label">Fecha inicio:</label>
                                            <input type="text" style="WIDTH: 228px; HEIGHT: 30px" class="form-control" id="fechaIniciotxt" readonly="readonly">
                                        </div>
                                    </td>
                                    <td style="width:0%" >
                                        <div class="form-group">
                                            <label for="hora" class="col-form-label">Hora inicio:</label>
                                            <div class="input-group clockpicker" data-autoclose="true" placement="top">
                                                <input type="text" class="form-control" style="WIDTH: 228px; HEIGHT: 30px" id="horaInitxt" value="10:30">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <td  width="20%">
                                    <div class="form-group">
                                        <label for="fechaFin" class="col-form-label">Fecha fin:</label>
                                        <input type="text" style="WIDTH: 228px; HEIGHT: 30px" class="form-control" id="fechaFintxt" >
                                    </div>
                                </td>
                                <td width='0%'>
                                    <div class="form-group">
                                        <label for="hora" class="col-form-label">Hora fin:</label>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="text" class="form-control" style="WIDTH: 228px; HEIGHT: 30px" id="horaFintxt" value="10:30">
                                        </div>
                                </td>
                            </table>
                            <div class="form-group">
                                <label for="color" class="col-form-label">Color:</label>
                                <input type="color"  class="form-control"  id="colortxt" value="#ff0000" >
                            </div
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                        <button type="button" id="btnCancelar" class="btn btn-default">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--===================================================================================================-->
        <!--MODAL PARA MODIFICAR Y ELIMINAR-->
        <div class="modal fade" id="modalEventos2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloEvento2"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario2">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Título:</label>
                                <input type="text" class="form-control" id="titletxt2" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" id="descripciontxt2" readonly="readonly"></textarea>
                            </div>
                            <table style="width:30%">
                                <tr>
                                    <td style="width:20%">
                                        <div class="form-group">
                                            <label for="fechaInicio" class="col-form-label">Fecha inicio:</label>
                                            <input type="text" style="WIDTH: 228px; HEIGHT: 30px" class="form-control" id="fechaIniciotxt2" readonly="readonly">
                                        </div>
                                    </td>
                                    <td style="width:0%" >
                                        <div class="form-group">
                                            <label for="hora" class="col-form-label">Hora inicio:</label>
                                            <div class="input-group clockpicker" data-autoclose="true">
                                                <input type="text" class="form-control" style="WIDTH: 228px; HEIGHT: 30px" id="horaInitxt2" readonly="readonly">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <td  width="20%">
                                    <div class="form-group">
                                        <label for="fechaFin" class="col-form-label">Fecha fin:</label>
                                        <input type="text" style="WIDTH: 228px; HEIGHT: 30px" class="form-control" id="fechaFintxt2"readonly="readonly" >
                                    </div>
                                </td>
                                <td width='0%'>
                                    <div class="form-group">
                                        <label for="hora" class="col-form-label">Hora fin:</label>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="text" class="form-control" style="WIDTH: 228px; HEIGHT: 30px" id="horaFintxt2" readonly="readonly">
                                        </div>
                                </td>
                            </table>
                            <div class="form-group">
                                <label for="color" class="col-form-label">Color:</label>
                                <input type="color"  class="form-control"  id="colortxt2" readonly="readonly" value="#ff0000" >
                            </div
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                        <button type="button" id="btnGuardar" class="btn btn-success"style="display: none">Guardar</button>
                        <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
                        <button type="button" id="btnCancelar2" class="btn btn-default">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        var NuevoEvento;
        var id;
            jQuery('#btnAgregar').click(function(){
                javascript:new_event();
                recolectarDatosGUI();
                jQuery('#CalendarioWeb').fullCalendar('renderEvent',NuevoEvento);
                jQuery('#CalendarioWeb').fullCalendar('refetchEvents');
                OpcionMenu('mod/admin/proyecto/calendario.php?', '');
                jQuery("#modalEventos").modal("toggle");
              });
              
              function recolectarDatosGUI(){
                  console.log("recolectarDatosGUI")
                   NuevoEvento={
                    title:jQuery('#titletxt').val(),
                    descripcion:jQuery('#descripciontxt').val(),
                    start:jQuery('#fechaIniciotxt').val()+" "+ jQuery('#horaInitxt').val(),
                    end:jQuery('#fechaFintxt').val()+""+ jQuery('#horaFintxt').val(),
                    color:jQuery('#colortxt').val()
                };
            }
            
  
            jQuery(document).ready(function () {
                cargarDatos();
            });
            
            function limpiarFormulario(){
                jQuery('#tituloEvento').val(" ");
                jQuery('#titletxt').val(" ");
                jQuery('#descripciontxt').val(" ");
                jQuery('#fechaIniciotxt').val(" ");
                jQuery('#horaInitxt').val(" ");  
                jQuery('#fechaFintxt').val(" ");
                jQuery('#horaFintxt').val(" "); 
                jQuery('#colortxt').val(" ");
            }
            
            function volverFormulario(){
                document.getElementById('btnModificar').style.display='inline';
                document.getElementById('btnEliminar').style.display='inline';
                document.getElementById('btnGuardar').style.display='none';
                document.getElementById('titletxt2').readOnly=true;
                document.getElementById('descripciontxt2').readOnly=true;
                document.getElementById('fechaIniciotxt2').readOnly=true;
                document.getElementById('horaInitxt2').readOnly=true;  
                document.getElementById('fechaFintxt2').readOnly=true;
                document.getElementById('horaFintxt2').readOnly=true; 
                document.getElementById('colortxt2').readOnly=true;   
                
                
            }
          
            
            function cargarDatos(){
                var array;
                jQuery.ajax({url : "mod/admin/proyecto/ajax_lista_eventos.php", 
                    success : function(data){
                        var arrayResponse = JSON.parse(data)
                        for (var i = 0; i < arrayResponse.length; i++) {
                            arrayResponse[i].color = `#${arrayResponse[i].color}`
                        }
                        
                    jQuery('#CalendarioWeb').fullCalendar({
                    header: {
                        left: 'today, prev, next',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    dayClick: function (date, jsEvent, view) {
                        limpiarFormulario();
                        jQuery("#fechaIniciotxt").val(date.format());
                        jQuery("#fechaFintxt").val(date.format());
                        jQuery("#modalEventos").modal("show");

                    },

                
                    events: arrayResponse,

                  

                    eventClick: function (calEvent, jsEvent, view) {
                        console.log("event click")
                        jQuery('#tituloEvento2').html(calEvent.title);
                        jQuery('#titletxt2').val(calEvent.title);
                        jQuery('#descripciontxt2').val(calEvent.descripcion);
                        jQuery('#colortxt2').val(calEvent.color);
                        id=calEvent.id_even;
                        
                        
                        
                        FechaHoraIni=calEvent.start.format().split("T");
                        jQuery('#fechaIniciotxt2').val(FechaHoraIni[0]);
                        jQuery('#horaInitxt2').val(FechaHoraIni[1]);
                        
                        FechaHoraFin=calEvent.end.format().split("T");
                        jQuery('#fechaFintxt2').val(FechaHoraFin[0]);
                        jQuery('#horaFintxt2').val(FechaHoraFin[1]);
                        jQuery("#modalEventos2").modal("show");
                       
                    }

                });
                    } 
                })
            }
            
            jQuery('#btnModificar').click(function(){
                document.getElementById('btnModificar').style.display='none';
                document.getElementById('btnEliminar').style.display='none';
                document.getElementById('btnGuardar').style.display='inline';
                document.getElementById('titletxt2').readOnly=false;
                document.getElementById('descripciontxt2').readOnly=false;
                document.getElementById('fechaIniciotxt2').readOnly=false;
                document.getElementById('horaInitxt2').readOnly=false;  
                document.getElementById('fechaFintxt2').readOnly=false;
                document.getElementById('horaFintxt2').readOnly=false; 
                document.getElementById('colortxt2').readOnly=false;   
              
              });
            
            
            jQuery('#btnGuardar').click(function(){
                javascript:update_event(id);
                recolectarDatosGUI();
                jQuery("#modalEventos2").modal("toggle");
                jQuery('#CalendarioWeb').fullCalendar('renderEvent',NuevoEvento);
                jQuery('#CalendarioWeb').fullCalendar('refetchEvents');
                OpcionMenu('mod/admin/proyecto/calendario.php?', '');
                volverFormulario(); 
              });
            
            jQuery('#btnEliminar').click(function(){
                javascript:eliminarEvento(id);
                jQuery("#modalEventos2").modal("toggle");
                jQuery('#CalendarioWeb').fullCalendar('refetchEvents');
               
              });
            
            jQuery('#btnCancelar').click(function(){
               jQuery("#modalEventos").modal("toggle");
            });
            
             jQuery('#btnCancelar2').click(function(){
               jQuery("#modalEventos2").modal("toggle");
            });
            
            jQuery('.clockpicker').clockpicker({
                placement: 'right'
            });
        </script>
    </body>
</html>

