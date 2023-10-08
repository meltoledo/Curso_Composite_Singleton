<?php
	require_once "models/Componente.php";
	require_once "models/ul.class.php";
	require_once "models/li.class.php";
	require_once "models/a.class.php";
	class inicioController
	{
		public function inicio()
		{
			
			$ul = new ul();
			$ul->setElemento(new li(new a("index.php?controle=cursoController&metodo=listar","Listar Cursos")));
			
			$ul->setElemento(new li(new a("index.php?controle=cursoController&metodo=gerar_grafico_barras","Gráfico de Barras")));
			
			$ul->setElemento(new li(new a("index.php?controle=cursoController&metodo=gerar_grafico_pizza","Gráfico de Pizza")));
			
			require_once "views/menu.php";
		}
	}
?>