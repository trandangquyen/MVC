<?php
// echo " đã import file load_view <br /> ";
Class View {
	public $urls;
	public function render($link,$url,$Noinclude=""){
		if($Noinclude == "")
		{
			require_once(__VIEW_PATH."header.php");
			echo "<div id='content'>";
				require(__VIEW_PATH.$link.".php");
			echo"</div>";
			require_once(__VIEW_PATH."footer.php");
		}else{
			require(__VIEW_PATH.$link.".php");
		}
	}
	public function redirect($link=""){
		if($link!='')
		{
			$link=__SITE_PATH.$link;
		}
		else{
			$link=__SITE_PATH;
		}
		header("Location:$link");
	}
}

?>