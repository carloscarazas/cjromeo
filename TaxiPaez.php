<?php // include_once("admin/model/Conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">      
        <title>Acceder-Taxipaez</title>
         <?php include_once("link-admin-css.html");    ?>
          <style>
         body{
                 background-image: url("files/fondos/auto-1.jpg")  ;
            
             
                  background-repeat: no-repeat;
                  
                  background-attachment: fixed;
                  background-size:100% 100%;    
             }
           .body_login{
               position: absolute;
               width: 100%;
               height: 100%;
               background-image: linear-gradient( rgba(255,255,0,.6),  rgba(40,40,40,5) );

               
           }
           .login{
               background: rgba(0,89,89,0.7);
               border-radius: 10px;
           }
          
           .login h1{
              
              color: rgba(255,255,255,.9);
                 border-radius: 5px;
                 background: rgba(0,0,0,.5);
           }
           .login h3{
               font-family:arial;
                color: rgba(255,255,0,.9);
                margin: 5px;
               padding: 5px;
           }
           .form-top>.form-top-left{
               border-radius: 5px;   
           } 
              .text_user, .text_pass, #text_acceder{
                  border-radius: 10px
              }
        </style>
    </head>
    <body>   
               <div class="body_login">  	
                <div class="container">
                    <div class="row">
                   <div class="col-xs-12 col-sm-8 col-sm-offset-2 ">
                      <div class="login control_logo">
                    <div class="row ">
                        <div class=" col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2  form-top" style="text-align:center; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">
                            <h1 class="text-danger"> <strong>SISTEMA TAXIPAEZ</strong> </h1>
                        </div>
                    </div>
                    <div class="row  ">
                        <div class="col-lg-6 col-lg-offset-3  col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 form-box ">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Accede a tu cuenta....</h3>
                        		</div>
                            </div>
                            
                            <div class="form-bottom">
                        
			                    <form role="form" id="frmIngresar" name="frmIngresar" method="post" class="login-form">
			                    	<div class="form-group">
			                    		
			                        	<input  type="text" value="" name="form-username" placeholder="Ingresa  su Usuario..." class="form-username form-control text_user" id="form-username" autofocus/>
			                        </div>
			                        <div class="form-group">
			                        	
		                                
                                        <input  type="password" value="" name="form-password" placeholder="ingresa su Contraseña..." class="form-password form-control text_pass" id="form-password"/>
			                        </div>
	                   <button type="submit" id="text_acceder" class="btn btn-primary btn-lg"> Acceder <i class="fa fa-unlock"></i>
                            </button>
			                    </form>
			                    
		                    </div>
                        </div>
                    </div>
                        <br>
                </div>
                       
                   </div>
               </div>
                </div>
           
              </div> 
            
             <?php include_once("link-admin-js.html");?>

        <script type="text/javascript" src="admin/scripts/Acceder.js"></script>
        
    </body>
</html>