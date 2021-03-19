
$(document).ready(function(){

    //--------------------- SELECCIONAR FOTO alumno ---------------------
    $("#foto").on("change",function()
    {
    	var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                    var type = foto[0].type;
                    var name = foto[0].name;
                    if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                    {
                        contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                        $("#img").remove();
                        $(".delPhoto").addClass('notBlock');
                        $('#foto').val('');
                        return false;
                    }
                else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
            }else{
                    alert("No selecciono foto");
                    $("#img").remove();
                  }              
    });

            $('.delPhoto').click(function()
            {
                $('#foto').val('');
                $(".delPhoto").addClass('notBlock');
                $("#img").remove();
                        
                    if($("#foto_actual") && $("#foto_remove"))
                        {
                        $("#foto_remove").val('img_alumno.png');
                        }
            });


        /*activa campos para registrar alumno*/ 
        $('.btn_new_alumno').click(function(e)  {
            e.preventDefault();
            
          
            $('#nombre').removeAttr('disabled'); /* desactiva el campo a autocompletar*/
            $('#apellidos').removeAttr('disabled');/* desactiva el campo a autocompletar*/
            $('#div_registro_alumno').slideDown();
        }); /*fin registro*/ 
  
        /*buscar alumno............  eventosss*/
                $('#ci').keyup(function(e)/*keyup evento presiones y levantemos se ejecuta la funcion*/
                {
                    e.preventDefault();

                            var al= $(this).val();
                            var action='searchAlumno';
                                $.ajax({
                                    url: 'ajax.php',
                                    type:"POST",
                                    async :true,
                                    data:{action:action,alumno:al},
                                    success:function(response)
                                    {
                                        console.log(response);
                                        if(response == 0){// si el ci del alumno no existe poner en blanco los campos para llenar los nuevos datos
                                        $('#idalumno').val('');
                                        $('#nombre').val('');
                                        $('#apellidos').val('');
                                        /* como no existe el alumno se Muestra bonton  Registrar nuevo alumno*/
                                        $('.btn_new_alumno').slideDown();
                                        

                                        }else{ //si se encuentra un estudiante con el ci ingresado entonces rellena los siguienrtes  datos automaticamente
                                            var data = $.parseJSON(response);
                                            $('#idalumno').val(data.idalumno); 
                                            $('#nombre').val(data.nombre);
                                            $('#apellidos').val(data.apellidos);
                                        
                                            /*unas vez que los campos nombre y apellidos se rellenaron automaticamente se Ocultar el boton registrar  nuevo alumno*/
                                            $('.btn_new_alumno').slideUp();
                                            
                                            /*unas vez rellenados automaticamente se bloque de campos con los datos rellenados por defecto*/
                                                                
                                            $('#nombre').attr('disabled','disabled');
                                            $('#apellidos').attr('disabled','disabled');
                                        
                                            /*tambien oculta boton guardar dicho registro de alumno*/
                                            $('#div_registro_alumno').slideUp();
                                        }
                                    },
                                    error:function(error){

                                    }
                                });

            });
  
            $('#search_curso').change(function(e){
                e.preventDefault();
                var sistema = getUrl();
                    alert(sistema);
                location.href = sistema+'buscar_inscrito.php?grado='+$(this).val();
                //alert(URLactual)
        });


    //cambiar password
    $('.newPass').keyup(function(){
    validPass();
    });



    //formulario de cambio de contraseña
    $('#frmChangePass').submit(function(e){
        e.preventDefault();
        var passActual = $('#txtPassUser').val();
        var passNuevo = $('#txtNewPassUser').val();
        var confirmPassNuevo =$('#txtPassConfirm').val();
        var action = "changePassword";

        if(passNuevo != confirmPassNuevo){
            $('.alertChangePass').html('<p style="color:red;"> Las contraseñas no son iguales.</p>');
            $('.alertChangePass').slideDown();
            return false;
        }
        if(passNuevo.length < 6){
            $('.alertChangePass').html('<p style="color:red;"> La nueva contraseñas debe ser de 6 caracteres como minimo.</p>');
            $('.alertChangePass').slideDown();
            return false;
        }
        $.ajax({
        url: 'ajax.php',
        type:"POST",
        async :true,
        data:{action:action,passActual:passActual,passNuevo:passNuevo},
        success: function(response)
        {

            if(response != 'error')
            {
                var info = JSON.parse(response);
                if(info.cod == '00')
                {
                    $('.alertChangePass').html('<p style="color:green;"> '+info.msg+'</p>');
                      $('#frmChangePass')[0].reset();
                }else
                {
                     $('.alertChangePass').html('<p style="color:red;"> '+info.msg+'</p>');
                }
                    $('.alertChangePass').slideDown();
            }
          },
          error: function(error){
          }
  });

       });

});//end Ready




//validar contraseña
function validPass(){
    var passNuevo = $('#txtNewPassUser').val();
    var confirmPassNuevo = $('#txtPassConfirm').val();
        if(passNuevo != confirmPassNuevo){
            $('.alertChangePass').html('<p style="color:red;"> Las contraseñas no son iguales.</p>');
            $('.alertChangePass').slideDown();
            return false;
        }
        if(passNuevo.length < 6){
            $('.alertChangePass').html('<p style="color:red;"> La nueva contraseñas debe ser de 6 caracteres como minimo.</p>');
            $('.alertChangePass').slideDown();
            return false;
        }
        $('.alertChangePass').html('');
        $('.alertChangePass').slideUp();
}


function getUrl(){
var loc = window.location;
var pathName = loc.pathname.substring(0,loc.pathname.lastIndexOf('/') + 1);
return loc.href.substring(0,loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

    