<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista de Cursos</title>
	</head>
	<body>
		<h1>Lista de Cursos</h1>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Curso</th>
				<th>Ações</th>
			</tr>
			<?php
			
				foreach($retorno as $dado)
				{
					echo "<tr>
						  <td>{$dado->idcurso}</td>
						  <td>{$dado->nome}</td>
						  <td><a href='index.php?controle=cursoController&metodo=alterar&id={$dado->idcurso}'>Alterar</a>
						  &nbsp;&nbsp
						  <a href='index.php?controle=cursoController&metodo=excluir&id={$dado->idcurso}'>Excluir</a></td>
						  </tr>";
				}
			?>
		</table>
		<br><br>
		<a href="index.php?controle=cursoController&metodo=inserir">Novo Curso</a>
	</body>
</html>