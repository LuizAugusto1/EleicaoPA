<?php
require_once('app/Models/Eleitor.php');
require_once('app/Controllers/ControllerEleitor.php');

$eleitorDao = new ControllerEleitor();
if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade'])  && !empty($_POST['voto'])){
$eleitor = new Eleitor($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['voto']);
    
$eleitor->validarDados();
$eleitorDao->createEleitor($eleitor);
}

?>


<!DOCTYPE html>
<html lang="pt_Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>

</head>
<body>
   <?php if($eleitorDao->readEleitor()){ ?>
        <div class="container">
            <h1>Relatório</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Idade</th>    
                        <th>Voto</th>    
                        <th>Data Registro</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($eleitorDao->readEleitor() as $eleitor){ ?>
                        <tr>
                        <td> <?php echo $eleitor["nome"]; ?></td>
                        <td> <?php echo $eleitor["cpf"]; ?></td>
                        <td> <?php echo $eleitor["idade"]; ?></td>  
                        <td> <?php echo $eleitor["voto"]; ?></td>  
                        <td> <?php echo date ('d/m/Y', strtotime($eleitor["data_registro"])); ?></td>
                    <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>
</html>