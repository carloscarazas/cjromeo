<?php 
    
	require_once('admin/model/Conexion.php');	

    if (isset($_POST['inicio']) && isset($_POST['fin']) ) {
       
	$usuario ="SELECT *
            FROM mk_articulo a inner join mk_categoria c on c.Id_Categoria=a.fk_Categoria
                where Fecha_Articulo>='".$_POST['inicio']."' and Fecha_Articulo<='".$_POST['fin']."' ";	
	$usuarios=$Conexion->query($usuario);

if(isset($_POST['create_pdf'])){
    
      
 

	require_once('PDF/tcpdf.php');
	$pdf = new TCPDF('L', 'mm', 'A4 LANDSCAPE', true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Pintasqa');
	$pdf->SetTitle($_POST['reporte_name']);
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();
// set image scale factor
    
    
	$content = '<div style="position:fixed; zindex:-1; " ><img  src="files/logo_empresa.jpg" width="100px"  ><h1>REPORTE DE ARTÍCULOS </h1></div>';
	
	$content .= '
           
		<div class="row">
        	<div class="col-md-12">
            	
       	
      <table border="1" cellpadding="7">
        <thead>
          <tr>
            <th># </th>
            <th>Articulo</th>
            <th>Código </th>
            <th >Descripción</th>
            <th >Estado</th>
          
            <th >Fecha</th>
            
          </tr>
        </thead>
        <tbody>
         
	';
    
        $i=1;
    
	while ($user=$usuarios->fetch_assoc()) { 
			
	$content .= '
		<tr >
            <td>'.$i++.'</td>
            <td>'.$user['Nombre_Categoria'].'</td>
            
            <td>'.$user['Codigo_Articulo'].'</td>
            <td>'.$user['Detalle_Articulo'].'</td>
            <td>'.$user['Estado_Articulo'].'</td>
            <td>'.$user['Fecha_Articulo'].'</td>
            
           
            
            
        </tr>
	';
	}
	
	$content .= 
        
        ' </tbody>
            </table>';
	
	$content .= '
		<div class="row ">
        	<div class="col-md-12" style="text-align:center;">
            	
            </div>
            <div class="col-md-12">
            <p>más información en : INVERMARK.COM</p>
            
            </div>
        </div>
    	
	';
    
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
    }
        
}else{
         
         echo  ' <br><br><center><h1>No existe ninguna Articulo</h1>s</center>';
         
         
         
     }
?>  

