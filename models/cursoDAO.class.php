<?php
	class cursoDAO 
	{
		public function __construct(private $conexao){}
				
		public function buscar_todos_cursos()
		{
			$sql = "SELECT * FROM curso";
			try
			{
				$stm = $this->conexao->prepare($sql);
				
				$stm->execute();
				
				$this->conexao = null;
				
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				//echo $e->getCode();
				//echo $e->getMessage();
				//die();
				return "Problema ao buscar os cursos";
			}
		}
		public function cadastrar($curso)
		{
			$sql = "INSERT INTO curso (nome) VALUES(?)";
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $curso->getNome());
			$stm->execute();
			$this->conexao = null;
		}
		public function dados_grafico()
		{
			$sql = "SELECT curso.nome, count(aluno.idaluno) as valor FROM curso, aluno, alunocurso WHERE curso.idcurso = alunocurso.idcurso AND aluno.idaluno = alunocurso.idaluno GROUP BY curso.nome ORDER BY valor desc";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
				
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				die("Erro ao buscar dados para o gráfico");
			}
			
		}
		public function excluir_curso($curso)
		{
			$sql = "DELETE FROM curso WHERE idcurso = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $curso->getIdcurso());
				$stm->execute();
				$this->conexao = null;
				return "Curso excluido com sucesso";
			}
			catch(PDOException $e)
			{
				if($e->getCode() == 23000)
				{
					return "Curso não pode ser excluido, pois tem aluno matriculado";
				}
				else
				{
					return "Problema ao excluir curso";
				}
			}
		}
		public function buscar_Um_Curso($curso)
		{
			$sql = "SELECT * FROM curso WHERE idcurso = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				
				$stm->bindValue(1, $curso->getIdcurso());
				
				$stm->execute();
				
				$this->conexao = null;
				
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				//echo $e->getCode();
				//echo $e->getMessage();
				//die();
				$this->conexao = null;
				return "Problema ao buscar um curso";
			}
		}
		public function alterar_curso($curso)
		{
			$sql = "UPDATE curso SET nome = ? WHERE idcurso = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $curso->getNome());
				$stm->bindValue(2, $curso->getIdcurso());
				$stm->execute();
				$this->conexao = null;
				return "Curso Alterado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao alterar curso";
			}
		}
	}//fim classe
?>