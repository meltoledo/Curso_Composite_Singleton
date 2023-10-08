<?php
	class Curso
	{
		public function __construct(private int $idcurso = 0, private string $nome = ""){}
		
		//gets
		
		public function getIdcurso()
		{
			return $this->idcurso;
		}
		
		public function getNome()
		{
			return $this->nome;
		}
	}
?>