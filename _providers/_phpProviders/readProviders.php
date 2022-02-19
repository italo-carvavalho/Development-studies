<?php
  session_start();
  $visita = $_SESSION['visita'] ?? 0;
  $visita++;
  $_SESSION['visita'] = $visita;

  $visits = $_COOKIE['visits'] ?? 0;
  $visits++;
  setcookie('visits',$visits);
  setcookie("cookieTest", "lalalala", time() + 60*60*24*365);
  //var_dump($_COOKIE);



  $file = fopen('../arquivo_externo.csv', 'r');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create</title>
	<style type="text/css"> /*  O css foi só para ajudar  */
      table, tr, td {
         border-style: solid; 
      }
      table{
        background-image: url("Esmalteria_logo.jpg");
      }
      td {
        background: cinza;
      }
      
    </style>
  </head>
  <body>
    <table>
    	<tr>
    		<th>Name:</th>
    		<th>Lastname:</th>
    		<th>Nickname:</th>
    	</tr>
      <?php while ($line = fgets($file)): ?>
      	<tr>
      	  <?php $cell = explode(',', $line) ?>
          <?php $id =array_shift($cell) ?>
      	  <?php foreach ($cell as $data): ?>
      	  	<td><?= $data ?></td>
      	  <?php endforeach ?>
          <td>
            <a href="delete.php?id=<?= $id ?>">Delete</a>
          </td>
      	</tr>
      <?php endwhile ?>
    </table>
    <a href="form.html">Inserir um novo registro.</a>
    <h1>Você já visitou esta página <?= $visita ?> vez(es). (session)</h1>
    <h1>Você já visitou esta página <?= $visits ?> vez(es).(cookie)</h1>
    <?php 
      var_dump($visita);
      var_dump($_SESSION);
      var_dump($visits);
     ?>
  </body>
</html>