<link href="../../modules/blog/css/style_blog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../modules/blog/js/rollpage.js" charset="utf-8"></script>
<script type="text/javascript" src="../../modules/blog/js/generic.js" charset="utf-8"></script>
<script type="text/javascript" src="../../modules/blog/js/jquery.js" charset="utf-8"></script>
<section>
	<?php ini_set('default_charset', 'UTF-8');
			//echo  "<br>".dirname(dirname(dirname(__FILE__)))."/util/functions.php";
			if(file_exists(dirname(dirname(dirname(__FILE__)))."/util/functions.php")):
				require_once (dirname(dirname(dirname((__FILE__))))."/util/functions.php");
			else:
			    echo "cb-000 - Erro fatal de diretórios - Contate o Administrador";
				exit;
			endif;	
			$list_all_articles = "WHERE status = 1 order by relevancia DESC";
			$div_content = "<h2>ARTIGOS</h2>";
			if (isset($_REQUEST['post_cat'])):
				 	$list_all_articles = 'WHERE status = 1 and categoria="'.$_REQUEST["post_cat"].'"  order by relevancia DESC';
					$div_content = "<h2>ARTIGOS - CATEGORIA - ".$_REQUEST["post_cat"]."</h2>";
			endif;
			if (isset($_REQUEST['post_data'])):
				$div_content = "<h2>ARTIGOS - ".$_REQUEST['mestxt']." </h2>";
				$list_all_articles = "WHERE status = 1 and extract( YEAR_MONTH from datacad)='".$_REQUEST['post_data']."' order by relevancia DESC";
			endif;
			$lerdb = new artigos();
			$lerdb->extra_select = $list_all_articles;
			$lerdb->selectAll($lerdb);
	?>
	<div id="principal_all_articles">
		<div id="all_articles">
		<?php 
		echo '<div id="content">';
		echo $div_content;
		while ($resdb = $lerdb -> returnData()) :
			echo '<div class="blog_all_articles">';
			echo '<span class="articles_titulo">' . ($resdb -> titulo) . '</span>';
			echo '  <div class="article_img">';
			$imagem1 = trim($resdb -> imagem1);
			if ($imagem1 != '')
			$continue_lendo = '<a  href="?m=single&post=' . $resdb -> id . '" >' . '...CONTINUE LENDO</a>';
			echo '<img src="../../upload/images/artigos/' . $imagem1 . '"/>';
			echo   '</div> <!-- fecha div imagem -->';
			echo '  <div id="article_txt">' . substr($resdb -> texto1,0,200).$continue_lendo.'</div>';
			echo '    <p class="article_comm">' . $resdb -> nome . "</p>";
			echo '    <p class="article_comm">' . $resdb -> datacad . "</p>";
			echo '   <p class="article_comm"> Categoria ' . $resdb -> categoria . "</p>";
			echo '  </div>';
			echo '</div>';
		endwhile;
		echo '</div>';
		?>
			</div>
		</div>
		<!-- <script>
			$(document).ready(function() {
				$("input").addClass('radius5');
				$("textarea").addClass('radius5');
				$("fieldset").addClass('radius5');
				$("#sidebar li").addClass('radius5');
				$("div#single_relevantes").addClass('radius5');
				$("div#single_categorias").addClass('radius5');
	
				//accordion
				$('#accordion a.item').click(function() {
					$('#accordion li').children('ul').slideUp('fast');
					$('#accordion li').each(function() {
						$(this).removeClass('active');
					});
					$(this).siblings('ul').slideDown('fast');
					$(this).parent().addClass('active');
					return false;
				});
			});
		</script> -->
		<div id="single_widgets">
			<div id="single_relevantes">
				<!-- <div id="header-logo"><img src="../../paineladm/images/creatibe/logo.svg"></div> -->
				<ul id="accordion">
					<?php $lerdb = new artigos();
					$lerdb -> extra_select = "WHERE status = 1  order by relevancia DESC LIMIT 5";
					$lerdb -> selectAll($lerdb);
					echo '<li><a class="item" href="#"><h3>PRINCIPAIS ARTIGOS</h3></a>';
					echo "  <ul>";
					while ($resdb = $lerdb -> returnData()) :
						echo '<li><a  href="../../index.php?m=artigos&post=' . $resdb -> id . '" >' . ($resdb -> titulo) . '</a></li>';
						echo "<hr style='width:100%;'>";
					endwhile;
					echo "  </ul>";
					echo "</li>";
					?>
				</ul>
				<!-- single acordion -->
			</div><!-- single relevantes -->
			<div id="single_categorias">
				<ul id="accordion">
					<?php 
					$lerdb = new artigos();
					$lerdb -> extra_select = "WHERE status = 1  order by categoria ASC";
					$lerdb -> selectAll($lerdb);
					$list_cat_atual = "";
					echo '<li><a class="item" href="#"><h3> CATEGORIAS </h3></a>';
					echo "<ul>";
					while ($resdb = $lerdb -> returnData()) :
						if ($list_cat_atual != trim($resdb->categoria)) :
							echo '<li><a href="?m=artigos&post_cat=' . $resdb -> categoria . '" >' . $resdb -> categoria . '</a> </li>';
							echo "<hr style='width:100%;'>";
						endif;
						$list_cat_atual = $resdb -> categoria;
					endwhile;
					echo "<hr style='width:100%;'>";
					echo "</ul>";
					echo "</li>";
					?>
				</ul>
				<!-- single acordion -->
			</div><!--	single categorias -->
			<div id="single_datas">
				<ul id="accordion">
					<?php
					$lerdb = new artigos();
					$lerdb -> extra_select = "WHERE status = 1  order by datacad DESC";
					$lerdb -> selectAll($lerdb);
					$list_data_atual = "";
					echo '<li><a class="item" href="#"><h3> POR DATAS </h3></a>';
					echo "<ul>";
					while ($resdb = $lerdb -> returnData()) :
						$ano = substr($resdb -> datacad, 0, 4);
						$mes = substr($resdb -> datacad, 5, 2);
						$periodo = substr($resdb -> datacad, 0, 7);
						switch ($mes) {;
							case "01" : $mestxt = "Janeiro"; break;
							case "02" : $mestxt = "Fevereiro"; break;
							case "03" : $mestxt = "Março"; break;
							case "04" : $mestxt = "Abril"; break;
							case "05" : $mestxt = "Maio"; break;
							case "06" : $mestxt = "Junho"; break;
							case "07" : $mestxt = "Julho"; break;
							case "08" : $mestxt = "Agosto"; break;
							case "09" : $mestxt = "Setembro"; break;
							case "10" : $mestxt = "Outubro"; break;
							case "11" :	$mestxt = "Novrembro"; break;
							case "12" :	$mestxt = "Dezembro"; break;
							default : 	$mestxt = "erro-" . $mes;	break;
						};
						if ($list_data_atual !== $periodo and $periodo != "") :
							echo '<li><a href="?m=artigos&post_data=' . $ano . $mes . '&mestxt='.$mestxt.'/'.$ano.'" >' . $mestxt . '/' . $ano . '</a> </li>';
							echo "<hr style='width:100%;'>";
						endif;
						$list_data_atual = $periodo;
					endwhile;
					echo "<hr style='width:100%;'>";
					echo "</ul>";
					echo "</li>";
					?>
				</ul>
				<!-- single acordion -->
			</div><!--	single datas-->
		</div> <!-- fecha single_widgets -->
	</div><!-- principal single -->
</section>
