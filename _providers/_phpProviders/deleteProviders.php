<?php 

$file = fopen('../arquivo_externo.csv', 'r');

$data = '';
while ($line = fgets($file)) {
	$cell = explode(',', $line);
	if ($cell[0] == $_GET['id']) {
	   continue;
	} 
	$data .= $line;	
}

$file = fopen('../arquivo_externo.csv', 'w');
fwrite($file, $data);

header("location: Atividade5FileManipulation-delete-ItaloCarvalho.php");
?>