$(document).ready(function(){

		alinharCentro();
		configuraUl();
		esconder();
		navSetaMiniaturas();
		navSeta();

		btFecharGaleria		= document.getElementsByClassName('fecharConteudo');
		divHiddenGaleria		= document.getElementById('galeriaExterno');
		divBackgroundGaleria 	= document.getElementById('carregaGaleriaExterno');

		$(divBackgroundGaleria).click(function(){
			$(divHiddenGaleria).fadeOut(500);
		});

		i=0;
		while(i<btFecharGaleria.length){
			x=fecharConteudo(btFecharGaleria[i], divHiddenGaleria);
			i++;
		}; //fecha while

		function fecharConteudo(botao, div){
		$(botao).click(function(){
				$(div).fadeOut(500);
			});
		}; //fecharConteudo

		/*=-=-=--=--=-=-=-=-=--=-=-=-=-=-=-=--=-=-=-=-=-=-
		ACIMA /\
		Função padrão para fechar DIV de conteudo externo
		=-=-=--=--=-=-=-=-=--=-=-=-=-=-=-=--=-=-=-=-=-=-*/

		/*=-=-=--=--=-=-=-=-=--=-=-=-=-=-=-=--=-=-=-=-=-=-
		ABAIXO \/
		Aqui começa a config da apresentação da Galeria
		=-=-=--=--=-=-=-=-=--=-=-=-=-=-=-=--=-=-=-=-=-=-*/

	function alinharCentro(){	
		/*Alinha imagem em destaque ao centro*/
		ulImg = document.getElementById('galeriaExterno');
		img = ulImg.getElementsByTagName('img');

		c=img.length-1;
		while (c>=0){
			largura = img[c].clientWidth;
			img[c].style.marginLeft=(largura/2)*-1+'px';
			c--;
		};
	} // fecha alinhaCentro

	/*define largura da UL conforme qtde de LIS*/
	
	function configuraUl()
	{	
		/*ajusta mascara miniaturas e setas de navegação ao centro, uma em cima da outra.*/
		centro 		= new Array();
		centro[0] 	= document.getElementById('mask-galeria');
		centro[1] 	= document.getElementById('navMini'); //container das setas de navegação que fica em cima das miniaturas
	
		iCentro = centro.length-1;
		while(iCentro>=0){
			d=defineMargin(centro[iCentro]);
			iCentro--;
		};
			function defineMargin(alinhar){
				var larguraMask = alinhar.clientWidth;
				alinhar.style.marginLeft=(larguraMask/2)*-1+'px';
			}

		/*Criar miniaturas conforme a quantidade de imagens*/
		ulMini = document.getElementById('miniaturas');
		galeria = ulMini.getAttribute('class'); /*class definida via PHP para criar a pasta com as imagens de miniaturas*/
		
		i=img.length-1;

		while (i>=0){
			liMini = document.createElement('li');
			ulMini.appendChild(liMini);
			i--;
		};

		/*Inserir imagens de miniatura nas LIS conforme o nome da pasta criada via PHP em upload/images*/
		imgsMini = ulMini.getElementsByTagName('li');
		margem = 10; /*clientwidth não pega margin-left pq as LIs são definidas por aqui*/
		border = 2; /*definir manualmente pq o clientwidth não pega este valor manual*/
		larguraLi = imgsMini[0].clientWidth+border+margem;

		ulMini.style.width=imgsMini.length*(larguraLi)+'px';
		ulMini.style.left="0px";

		qtdMini = 5; // determina a quantidade de miniaturas que devem aparecer
		centro[0].style.width=larguraLi*qtdMini+'px';
		
		insertImg = imgsMini.length-1;
		while (insertImg>=0){
			name = img[insertImg].getAttribute('name');
			imgsMini[insertImg].style.background='url("upload/images/'+galeria+'/'+name+'")';
			//imgsMini[insertImg].style.marginLeft=margem+'px';
			insertImg--;
		};

	}; //fecha confguraUl

	/* Esconde todas as imagens ao carregar | define z-index | criar função CLICK nas imagens miniaturas*/
	function esconder(){
		imgDestaque = ulImg.getElementsByClassName('imgDestaque');

		z=0;
		iz=imgDestaque.length-1;

		while(iz>=0){
			imgDestaque[iz].style.zIndex=z;
			imgDestaque[iz].style.display='none';
			z++;
			iz--;
		};

		e=imgDestaque.length-1;
		while (e>=0){
			criaBt=navMiniatura(imgsMini[e], imgDestaque[e]);
			e--;
		};
	} // fecha esconder

	/*var 'clicado' vem do arquivo carrega.js que define qual imagem do array foi clicada para exibição - função loadGaleria*/
	imgDestaque[clicado].style.display="block";
	imgsMini[clicado].style.opacity=1;

/*
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
CONFGIURA TIPOS DE NAVEGAÇÃO
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
*/

		function navMiniatura(imgMiniatura, imgPrincipal){
			imgMiniatura.onclick=function(){
				f=imgDestaque.length-1;
				while(f>=0){
					$(imgDestaque[f]).fadeOut(500);
					imgsMini[f].style.opacity=0.4;
					f--;
				}//fecha while
				$(imgPrincipal).fadeIn(500);
				imgMiniatura.style.opacity=1;
			} //fecha navMiniatura
		}

		//navegação por setas de miniaturas
		function navSetaMiniaturas(){
		largMask = centro[0].clientWidth;
		largMini = ulMini.clientWidth;

		if (imgsMini.length < qtdMini) {
			centro[1].style.display="none";
		} 

			navMiniEsq = document.getElementById('navMiniEsq');
			navMiniDir = document.getElementById('navMiniDir');

			pause = imgsMini.length-qtdMini+1;

			navMiniDir.onclick=function(){
				pAtualPx = ulMini.style.left;
				pAtual = parseInt(pAtualPx);

				move = pAtual-larguraLi;
				pause--;

				if (pause <= 0) {
					return;
				} else {
					$(ulMini).animate({left:move});
				}

			} //fecha onclick

			navMiniEsq.onclick=function(){

				//definir valor mínimo do pause para não dar erro na navMiniDir
				if (pause >= imgsMini.length-qtdMini+1) {
					return;
				};

				pAtualPxEsq = ulMini.style.left;
				pAtualEsq = parseInt(pAtualPxEsq);

				var moveEsq = pAtualEsq+larguraLi;
				pause++;

				if (ulMini.style.left == '0px') {
					return;
				} else {
					$(ulMini).animate({left:moveEsq});
				}
			}
		}// fecha navSetaMiniatura

		//Função para navegar pelas setas principais da galeria
		function navSeta(){
			esq = document.getElementById('navGaleriaEsq');
			dir = document.getElementById('navGaleriaDir');

			esq.onclick=function(){
				i = imgDestaque.length-1;
				while (i>=0){
					var imgAtiva = imgDestaque[i].style.display;

					if (imgAtiva != 'none') {
						newi = i-1;

						if (newi < 0) {
							return;
						};

						$(imgDestaque[i]).fadeOut(300);
						imgsMini[i].style.opacity=0.4;

						$(imgDestaque[newi]).fadeIn(300);
						imgsMini[newi].style.opacity=1;

						return;
					};
					i--;
				}//fecha while
			} // fecha onclickEsq

			dir.onclick=function(){
				i = imgDestaque.length-1;
				while (i>=0){
					var imgAtiva = imgDestaque[i].style.display;

					if (imgAtiva != 'none') {
						newi = i+1;

						if (newi >= imgDestaque.length) {
							return;
						};

						$(imgDestaque[i]).fadeOut(300);
						imgsMini[i].style.opacity=0.4;

						$(imgDestaque[newi]).fadeIn(300);
						imgsMini[newi].style.opacity=1;

						return;
					};
					i--;
				}//fecha while
			} // fecha onclickDir
		};

		/*Exibe descrição da foto se existir*/
		des=imgDestaque.length-1;

		while (des>=0){
			txt = imgDestaque[des].getElementsByTagName('div');
			x=descricao(imgDestaque[des], txt);
			des--;
		};

		function descricao(imagem, descricao){
			$(imagem).mouseenter(function(){
				$(descricao).fadeIn(500);
			});
			$(imagem).mouseleave(function(){
				$(descricao).fadeOut(500);
			});
		};

});