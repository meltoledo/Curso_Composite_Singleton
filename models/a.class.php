<?php
	class a implements componente
	{
		public function __construct(private string $href = "#", private string $texto = ""){}
		
		public function criar()
		{
			echo "<a href = '{$this->href}'>{$this->texto}</a>";
		}
	}
?>