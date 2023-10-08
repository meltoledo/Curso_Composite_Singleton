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
			<label>Nome do curso:</label>
			<input type="text" name="nome">
			<br>
			<div><?php echo $msg!=""?$msg:""?></div>
			<br><br>
			<input type="submit" value="Inserir">
		</form>
	</body>
</html>