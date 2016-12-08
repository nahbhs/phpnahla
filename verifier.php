<?php
$systeme = $_REQUEST['systeme'];
$connect=new mysqli("localhost","root","","description") or die ("impossible de connecter à la base de donnée");

$resultat = $connect->query("SELECT * FROM os WHERE systeme='$systeme'");
if(mysqli_num_rows($resultat) > 0) {
    $outputs["ensos"] = array();
 
    while ($row = mysqli_fetch_assoc($resultat)) {
        $os = array();
        $os["systeme"] = $row["systeme"];
        $os["famille"] = $row["famille"];
        $os["noyau"] = $row["noyau"];
        $os["dev"] = $row["dev"];
        $os["derversion"] = $row["derversion"];
         array_push($outputs["ensos"], $os);
    }
 
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
	echo json_encode($outputs);
}
 
    
    

?>
