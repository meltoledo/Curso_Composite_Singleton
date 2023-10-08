<?php
	require_once "models/Conexao.class.php";
	require_once "models/cursoDAO.class.php";
	require_once "models/Curso.class.php";
	class cursoController
	{
		private $parm;
		public function __construct()
		{
			$this->parm = Conexao::getInstancia();
		}
		public function listar()
		{
			$cursoDAO = new cursoDAO($this->parm);
			$retorno = $cursoDAO->buscar_todos_cursos();
			if(!is_array($retorno))
			{
				echo $retorno;
			}
			else
			{
				require_once "views/listar_cursos.php";
			}
		}
		public function inserir()
		{
			$msg = "";
			if($_POST)
			{
				if(empty($_POST["nome"]))
				{
					$msg = "Preecha o nome do curso";
				}	
				else
				{
					//inserir no BD
					$curso = new curso(nome:$_POST["nome"]);
					$cursoDAO = new cursoDAO($this->parm);
					$cursoDAO->cadastrar($curso);
					header("location:index.php?controle=cursoController&metodo=listar");
				}
				
			}
			require_once "views/form_curso.php";
		}//fim do inserir
		public function gerar_grafico_barras()
		{
			require_once "views/mostrar_grafico_barras.html";
		}
		public function buscar_dados_grafico()
		{
			$cursoDAO = new cursoDAO($this->parm);
			$retorno = $cursoDAO->dados_grafico();
			echo json_encode($retorno);
		}
		public function gerar_grafico_pizza()
		{
			require_once "views/mostrar_grafico_pizza.html";
		}
		public function alterar()
		{
			$msg = "";
			if(isset($_GET["id"]))
			{
				$curso = new Curso($_GET["id"]);
				$cursoDAO = new cursoDAO($this->parm);
				$retorno = $cursoDAO->buscar_Um_Curso($curso);
				require_once "views/edit_curso.php";
				if($_POST)
				{
					$curso = new Curso($_POST["idcurso"], $_POST["nome"]);
					
					$cursoDAO = new cursoDAO($this->parm);
					$retorno = $cursoDAO->alterar_curso($curso);
					echo $retorno;
				}//fim post
			}//fim if
		}//fim alterar
		
		public function excluir()
		{
			if(isset($_GET["id"]))
			{
				$curso = new Curso($_GET["id"]);
				$cursoDAO = new cursoDAO($this->parm);
				$retorno = $cursoDAO->excluir_curso($curso);
				echo $retorno;
			}
		}
	}//fim da classe
?>