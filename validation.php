<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formuliere</title>
   
   <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body class="container-fluid bg-2">

<?php
 
$nom = $email = $msg = $pays = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $nom = test_input($_POST["inputNom"]);
  $email = test_input($_POST["inputEmail"]);
  $msg = test_input($_POST["inputMessage"]);
  $genre = test_input($_POST["Genre"]);
  $suget = test_input($_POST["Sugets"]);
  $pays = test_input($_POST["inputPays"]);



  if ($nom == " " OR $email == " " OR $msg == " ") {
    echo "Il faut spécifier le nom, e-mail, et message.";
    exit;
}

foreach( $_POST as $value ){
    if( stripos($value,'Content-Type:') !== FALSE ){
        echo "Il y a un problèmme avec l'informations que vous nous avez fournies.";    
        exit;
    }
}

 try {
    mail($email,$nom,$msg);
    print_r($_POST);
} catch (Exception $e) {
    echo 'Exception: ',  $e->getMessage(), "\n";
}



   
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
?>


</body>
   
   </html>
