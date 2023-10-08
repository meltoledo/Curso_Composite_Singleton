<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Curso</title>
		<style>
			div{color:red; font-size:10px;}
		</style>
	</head>
	<body>
		<h1>Curso</h1>
		<form action="#" method="post">
		
			<input type="hidden" name="idcurso" value = "<?php echo $retorno[0]->idcurso;?>">
			
			<label>Nome do curso:</label>
			<input type="text" name="nome" value="<?php echo $retorno[0]->nome;?>">
			<br>
			<div><?php echo $msg!=""?$msg:""?></div>
			<br><br>
			<input type="submit" value="Alterar">
		</form>
	</body>
</html>