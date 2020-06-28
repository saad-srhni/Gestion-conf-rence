<!DOCTYPE html>
<html>
<head>
	<title>conference</title>
</head>
<body>
<?php

if (!empty($_GET['id'])) {
   echo "string";
}
     $connect=mysqli_connect('localhost','root','')or die("echec de connecion a la base");
     $db=mysqli_select_db($connect,'gestionconference');
     $query1=mysqli_query($connect,"SELECT * FROM conference"); 
     $row1=mysqli_num_rows($query1);
     if($row1>0){
          for ($i=0; $i < $row1; $i++) { 
          	?><table border="2"><tr>
          	<td rowspan="2">
          	<?php
          	$resulte1=mysqli_fetch_assoc($query1);
          	$id1=$resulte1['conferenceid'];
            echo $resulte1['conferenceid'].'  '.$resulte1['titre'].'  ';
            ?>
             </td>
            </tr>
            <?php
            $query2=mysqli_query($connect,"SELECT * FROM session WHERE conferenceid='$id1'");
            $row2=mysqli_num_rows($query2);
            if ($row2>0) {
            for ($j=0; $j < $row2; $j++) { 
            ?>
            
                <td>
            <?php
            $resulte2=mysqli_fetch_assoc($query2);
            $id2=$resulte2['sessionid'];
            echo $resulte2['sessionid'].' '.$resulte2['titre'].' ';
            ?>
            </td>
            </tr>
             
            <?php
            $query3=mysqli_query($connect,"SELECT * FROM papier WHERE sessionid='$id2'");
            $row3=mysqli_num_rows($query3);
            if ($row3>0) {
            for ($k=0; $k <$row3 ; $k++) { 
            ?>
            <tr>
            <td>
            	<?
            $resulte3=mysqli_fetch_assoc($query3);
            echo $resulte3['papierid'].' '.$resulte3['titre'].'  ';
            ?>
        </td></tr>
        <?php
            }

            }else{
           	echo "il y n'est a pas des papier";
            }

          	}
            }else {
     	echo "il y n'est a pas des session";
     }
        ?>
          </table>
          <?php
          }


     }else {
     	echo "il y n'est a pas des conferences";
     }


 ?>
</body>
</html>