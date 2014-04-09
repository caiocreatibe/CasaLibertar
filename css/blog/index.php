<?php
	ini_set('default_charset', 'UTF-8');

	function __autoload($classe){
		require '../blog/classes/'.$classe.'.class.php';
	}
 
	$mysql = new MysqlBase('localhost','creatibe_admin','@logagencia2013','creatibe_creatibe');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>be.BLOG</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	

	<body>
		<ul id="posts">
		<?php
		//echo "passou aqui";
			$strSQL = sprintf("SELECT * FROM `blog_posts` where status = 1 order by relevancia DESC");
			$stmt = $mysql->execute($strSQL);
			?><div class=blog_principal>
			<?php
			while($linha = $stmt->fetchObject()){
		?>
			
			<li>
				<?php
					echo '<p><a href="single.php?post='.$linha->id.'" target="_blank">'.$linha->title.'</a>'.'</p>';
					echo '<div class="blog_img">';
					$imagem = trim($linha->images);
					if ($imagem != '') echo '<img src="../'.$linha->images.'" />';
					$post = substr($linha->post, 0,200).'<a href="single.php?post='.$linha->id.'" target="_blank">...Ler mais</a>';
					echo '<div style="width:200px; float:left; margin-top:15px;">'.$post.'</div></div>';
					$str = sprintf("SELECT * FROM `blog_comments` WHERE id_post = '%s'", $linha->id);
					$st = $mysql->execute($str);
					$linhas = $st->rowCount();
					echo '<div><p class="comm">  Categoria: '.$linha->category.' - Post: '.$linha->id.'</p>';
					echo '<p class="comm">'.$linha->nome."</p>";
					echo '<p class="comm">'.$linha->datacad."</p>";
					echo '<p class="comm">'.$linhas.' comentario(s) </p></div>';
					
				?>
				
			</li>
			
		<?php }?></div>	
		</ul>
	</body>
</html>