<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Libertar - Casa de Recuperaçãode Duartina</title>
<link rel="stylesheet" type="text/css" href="css/libertar.css">
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/libertar.js"></script>
<script type="text/javascript" src="js/validaform.js"></script>
</head>

<body>

<div id="pageContato" class="page">
<div id="traco"></div>
	<header>
			<nav id="mainMenu">
			<figure>
				<img src="upload/images/logo.png">
			</figure>
				<ul>
					<li><a href="index.php">INÍCIO</a></li>
					<li><a href="servicos.php">SERVIÇOS</a></li>
					<li><a href="filosofia.php">FILOSOFIA</a></li>
					<li><a href="equipe.php">EQUIPE</a></li>
					<li><a href="estrutura.php">ESTRUTURA</a></li>
					<li><a href="blog.php">BLOG</a></li>
					<li><a href="contato.php">CONTATO</a></li>
				</ul>
			</nav>
		<aside id="slider">
			<div class="container">
			<nav id="navSliderEsq"><!-- img via CSS --></nav>
			<nav id="navSliderDir"><!-- img via CSS --></nav>
				<ul id="sliderItens">
					<li class="sliderItem">Texto 1</li>
					<li class="sliderItem">Texto 2</li>
					<li class="sliderItem">Texto 3</li>
				</ul>
			</div>
		</aside>

		<aside id="filo">
			<div id="cerrilhaTop"></div>
			<div id="cerrilhaBottom"></div>
			<p class="titulo">Nossa Filosofia</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
		</aside>
	</header>
	<div id="bodyBg"><!-- foto aérea de fundo via CSS --></div>

	<div id="content">
		<h2>CONTATO</h2>
		<div id="validaform"></div>
		<form>
			<fieldset>
				<label>Nome</label>
				<input type="text" value="" id="formnome" name="Nome">
				<label>Telefone</label>
				<input type="text" value="" id="formfone" name="Telefone">
				<label>E-mail</label>
				<input type="text" value="" id="formmail" name="E-mail">
			</fieldset>
			<fieldset>
				<label>Mensagem</label>
				<textarea id="formmsg" name="Mensagem"></textarea>
				<button id="enviar">Enviar!</button>
			</fieldset>
		</form>
		<div class="telefone">
			<h3>Outras formas de Contato</h3>
			<br>
			<p>contato@casalibertar.com.br</p>
			<br>
			<p>14 - 3282 . 0636</p>
		</div>
	</div>

	<div id="footer">
		<footer>
			<nav id="contatoFooter">Entre em contato. <a href="#contato">CLIQUE AQUI!</a> <div class="dobras"></div> </nav>
			<aside id="msg"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></aside>
			<aside id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118039.98757531813!2d-49.401433300000015!3d-22.4007948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bf82d73c708d41%3A0x485d620fff629380!2sDuartina!5e0!3m2!1spt-BR!2sbr!4v1394218991466" width="480" height="280" frameborder="0" style="border:0"></iframe>
			</aside>
		</footer>
	<div id="sign">
		<div class="endereco">Nosso Endereço, 33, Duartina/SP - São Paulo</div>
		<div class="creatibe">
			<div id="copyrigth">&copy;&nbsp;<span id="year"></span> - Libertar | Casa de Recuperação</div>
			<div id="developed"><a href="http://www.agenciacreatibe.com.br" target="_blank">Desenvolvido por Agência Creatibe&nbsp;&nbsp;&nbsp;<img src="upload/images/creatibe.jpg" alt="Agência Creatibe" title="Agência Creatibe Desenvolvimento de Sites Profissinais"></a></div>
		</div>
	</div>
	</div>
</div> <!-- fecha pageServicos -->
</body>

</html>
