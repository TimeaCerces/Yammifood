<?php
   function corectez($sir) {
   $sir = trim($sir);
   $sir = stripslashes($sir);
   $sir = htmlspecialchars($sir);
   return $sir;
   }

   // preiau valorile din campurile formularului (nume, prenume, recenzie)
   $nume = corectez($_POST["nume"]);
   
   $email = corectez($_POST["email"]);
   $mesaj = corectez($_POST["recenzie"]);
   
   
   include("conn.php");
 
  $cda = "INSERT INTO recenzii (nume, email, recenzie)VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($cnx, $cda);
   mysqli_stmt_bind_param($stmt, 'sssss', $nume, $email, $recenzie);
   mysqli_stmt_execute($stmt) or die (mysqli_error($cnx));
   
   mysqli_stmt_close($stmt);
   mysqli_close($cnx);
   $raspuns = [];
   $raspuns['nume'] = $nume;
   
   echo json_encode($raspuns);    
?>