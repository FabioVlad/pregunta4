<?php
include "cabecera.inc.php";
include "menu.inc2.php";
include "conexion.inc.php";

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }
    if(isset($_SESSION['ci'])){
        $ci = $_SESSION['ci'];
        
    }
    $rescolor = mysqli_query($con, "select * from color");

    //pregunta 4, sin case-when

    
    $siglas = mysqli_query($con, "SELECT distinct sigla FROM nota");
    $sigla = array('INF-111','INF-324');
    $pos=0;
    //pregunta 5, con case-when


    $con_casewhen = mysqli_query($con, "SELECT
		AVG(case WHEN departamento='01' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) CH,
		AVG(case WHEN departamento='02' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) LP,
		AVG(case WHEN departamento='03' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) CB,
		AVG(case WHEN departamento='04' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) as 'OR',
		AVG(case WHEN departamento='05' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) PT,
		AVG(case WHEN departamento='06' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) TJ,
		AVG(case WHEN departamento='07' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) SC,
		AVG(case WHEN departamento='08' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) BE,
		AVG(case WHEN departamento='09' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-111') end) PD
		from persona p
		union all
		select
		AVG(case WHEN departamento='01' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) CH,
		AVG(case WHEN departamento='02' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) LP,
		AVG(case WHEN departamento='03' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) CB,
		AVG(case WHEN departamento='04' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) as 'OR',
		AVG(case WHEN departamento='05' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) PT,
		AVG(case WHEN departamento='06' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) TJ,
		AVG(case WHEN departamento='07' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) SC,
		AVG(case WHEN departamento='08' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) BE,
		AVG(case WHEN departamento='09' then (SELECT notafinal from nota where ci=p.ci and sigla='inf-324') end) PD
		from persona p");

?>

<div id="right" style="background-color:#<?php echo $_SESSION['color'];?>;">
    <h2>Bienvenido a la Facultad de Ciencias Puras y Naturales</h2>
    <table style="font-size:25px">
            <tr>
                <td>
                <a href="informatica/">Informática</a>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>
                <a href="quimica/">Química</a>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td colspan="2">
                <a href="fisica/">Física</a>
                </td>
            </tr>
            
        </table>
    <div id="welcome"> 
      
      
      <p class="more"></p>
      <form action="cambiar_color.php" method="POST">
        <select id="color" name="color">
          
         <?php
while ($filacolor = mysqli_fetch_array($rescolor))
{
?>
<option value="<?php echo $filacolor[0];?>"><?php echo $filacolor[2];?></option>
<?php
};
?>
        </select>
        <input type="submit" value="cambiar color">
      </form>
      <h1>PROMEDIO NOTAS</h1>
      <h2 style="color:red;"><strong>4. <u>Sin case-when</u></strong></h2>
      <div>
      	<table style="width:100%; border="1px solid black"; ">
        <tr bgcolor="orange">
            <th></th>
            <th>CH</th>
            <th>LP</th>
            <th>CB</th>
            <th>OR</th>
            <th>PT</th>
            <th>TJ</th>
            <th>SC</th>
            <th>BE</th>
            <th>PD</th>
            
        </tr>
      <?php
      $cis=[];
      $dep=[];
      $pepe = mysqli_query($con, "select * from persona");
      $q=0;
      while($pci = mysqli_fetch_array($pepe)){
      	$cis[$q]=$pci[0];
      	$dep[$q]=$pci[5];
      	$q=$q+1;
      }
      $conp=count($cis);
      /*for ($i=0; $i < $conp ; $i++) { 
      	echo $cis[$i]."-";
      	echo $dep[$i];
      	echo "<--->";
      }*/
      
      $materias=[];
      $nota = mysqli_query($con, "select distinct sigla from nota");
      $q=0;
      while($n = mysqli_fetch_array($nota)){
      	$materias[$q]=$n[0];
      	$q=$q+1;
      }
      $cont = count($materias);
      /*for ($i=0; $i < $cont ; $i++) { 
      	echo $materias[$i];
      	echo "<<>>";
      }*/

      $nci=[];
      $nnota=[];
      $mat=[];
      $notaq = mysqli_query($con, "select * from nota");
      $q=0;
      while($n = mysqli_fetch_array($notaq)){
      	$nci[$q]=$n[1];
      	$mat[$q]=$n[2];
      	$nnota[$q]=$n[6];
      	$q=$q+1;
      }
      $ncont = count($nci);
      /*for ($i=0; $i < $ncont ; $i++) { 
      	echo $nci[$i];
      	echo $mat[$i];
      	echo $nnota[$i];
      	echo "<culito>";
      }*/
      $copia = array_values($nci);

      /*for ($i=0; $i < $ncont ; $i++) { 
      	echo $copia[$i];
      }*/
      $valores=[0,0,0,0,0,0,0,0,0,0];
      $cants=[0,0,0,0,0,0,0,0,0,0];
      $sw=0;
      $cont = count($materias);
      for ($i=0; $i < $cont ; $i++) { 
      	$m = $materias[$i];
      	$valores=[null,0,0,0,0,0,0,0,0,0];
      	$cants=[null,0,0,0,0,0,0,0,0,0];
      	$ncont = count($nci);
      	for ($j=0; $j < $ncont ; $j++) { 
      	  $carnet = $nci[$j];
      	  $nval = $nnota[$j]*1;
      	  if ($mat[$j]==$m) {
      	  	//echo "son iguales";
      	  	//echo $i."ooo".$j."ooo".$m;
      	  	$conp=count($cis);
      	  	for ($e=0; $e < $conp; $e++) {
      	  		$sw=0; 
      	  		$t= $dep[$e]*1;
      	  		$v= $valores[$t]*1;
      	  		$cc = $cants[$t]*1;
      	  		if ($cis[$e] == $carnet and $sw==0) {
      	  			$valores[$t]=$v+$nval*1;
      	  			$cants[$t]=$cc+1;
      	  			$sw=1;
      	  		}

      	  	}
      	  
      		
      	  }
      	  
        }
        $cat=count($valores);
        $x=0;
        $v=0;
        
        for ($m=0; $m < $cat ; $m++) { 
        	$v=$valores[$m]*1;
        	$x=$cants[$m]*1;
        	if ($x!=0) {
        		$valores[$m]=$v/$x;
        	}
        }
        echo "<tr bgcolor='white'>";
        echo "<td>".$materias[$i]."</td>";
        echo "<td>$valores[1]</td>";
        echo "<td>$valores[2]</td>";
        echo "<td>$valores[3]</td>";
        echo "<td>$valores[4]</td>";
        echo "<td>$valores[5]</td>";
        echo "<td>$valores[6]</td>";
        echo "<td>$valores[7]</td>";
        echo "<td>$valores[8]</td>";
        echo "<td>$valores[9]</td>";
        echo "</tr>";
      }     
     	
      ?>
  		</table>
      </div>



      <h2 style="color:red;"><strong>5. <u>Con case-when</u></strong></h2>
      
      <div>
      	<table style="width:100%; border="1px solid black"; ">
        <tr bgcolor="orange">
            <th></th>
            <th>CH</th>
            <th>LP</th>
            <th>CB</th>
            <th>OR</th>
            <th>PT</th>
            <th>TJ</th>
            <th>SC</th>
            <th>BE</th>
            <th>PD</th>
            
        </tr>
        <?php
        while ($ccase = mysqli_fetch_array($con_casewhen))
        {
        echo "<tr bgcolor='white'>";
        echo "<td>".$sigla[$pos]."</td>";
        echo "<td>".$ccase["CH"]."</td>";
        echo "<td>$ccase[LP]</td>";
        echo "<td>$ccase[CB]</td>";
        echo "<td>$ccase[OR]</td>";
        echo "<td>$ccase[PT]</td>";
        echo "<td>$ccase[TJ]</td>";
        echo "<td>$ccase[SC]</td>";
        echo "<td>$ccase[BE]</td>";
        echo "<td>$ccase[PD]</td>";

        echo "</tr>";
        $pos=$pos+1;
        }
        ?>
      </table>
      </div>
    </div>
   
  </div>

  <div class="clear"> </div>
  <div id="spacer"> </div>
    
<?php

include "pie.inc.php";
?>