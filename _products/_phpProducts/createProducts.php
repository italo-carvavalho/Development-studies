<?php 

//var_dump($_GET);
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$nickname = $_POST['nickname'];

$key = str_replace('.', '', microtime(true));

$file = fopen('../arquivo_externo.csv','a');
fwrite($file, "$key,$name,$lastname,$nickname\n");

?>

<h2>Dados inseridos</h2>
<table>
	<tr>
		<td>Name:</td>
		<td><?= $name ?></td>
	</tr>
	<tr>
		<td>Lastname:</td>
		<td><?= $lastname ?></td>
	</tr>
	<tr>
		<td>Nickname:</td>
		<td><?= $nickname ?></td>
	</tr>
</table>
<?php header("location: Atividade5FileManipulation-delete-ItaloCarvalho.php");?>