window.onload=function(){
    //alert('oi');
    conteudoExterno();
    galeria();
} // fecha window.onload

function conteudoExterno() {
        /*
            - Se definir display none, o Js não consegue obter a largura inicial, por isso o visibility e o dislay none em JS após clicar
            - o nome do arquivo HTML a ser aberto deve ser igual ao ID do botão
            */
        bt = document.getElementsByClassName('btacao');

        icont = bt.length - 1;
        while (icont >= 0) {
            x = carregarConteudo(bt[icont], bt[icont].getAttribute('id'));
            icont--;
        };

        function carregarConteudo(botao, arquivo) {
            divHidden = document.getElementById('contExterno');
            divContent = document.getElementById('containerContExterno');
            $(botao).click(function() {
                divHidden.style.visibility = 'visible';
                divHidden.style.display = 'none'; //não pode definir via css. Definido via JS para pegar o clienteWidth na função defineMargin();
                $(divHidden).fadeIn(500);
                $(divContent).load(arquivo + '.html');
                //alert(arquivo+'.html');
            });
        }; // fecha carregaConteudo()

    }; //fecha conteudoExterno()

    /*  jsCreatibe8  */
    function galeria() {

        contExternoGaleria = document.getElementById('galeriaExterno');
        divContentGaleria = document.getElementById('containerGaleriaExterno');

        /*Define margin negativa para alinahr ao centro*/
        larguraDivGaleria = divContentGaleria.clientWidth;
        alturaDivGaleria = divContentGaleria.clientHeight;

        divContentGaleria.style.marginLeft = (larguraDivGaleria / 2) * -1 + 'px';
        divContentGaleria.style.marginTop = (alturaDivGaleria / 2) * -1 + 'px';
        /**/

        container = document.getElementsByClassName('fotos');

        i1 = container.length - 1;
        while (i1 >= 0) {
            imgs = container[i1].getElementsByTagName('img');
            arquivo = container[i1].getAttribute('id');

            i2 = imgs.length - 1;
            while (i2 >= 0) {
                x = loadGaleria(imgs[i2], contExternoGaleria, arquivo, i2);
                //alert(i2);
                //alert(i1);
                //alert(arquivo);
                i2--;
            } // fecha while i2

            i1--;
        }; //fecha while i1

        function loadGaleria(imgBt, container, link, posicao) {
            $(imgBt).click(function() {
                container.style.visibility = 'visible';
                container.style.display = 'none'; //não pode definir via css. Definido via JS para pegar o clienteWidth na função defineMargin();
                $(container).fadeIn(500);
                $(divContentGaleria).load('galerias/'+link+'.php');

                /*var clicado esta no arquivo galeriaexterno.js que abrirá o arquivo clicado como display block - função exibeClick*/
                clicado = posicao;
            });
        } // fecha loadGaleria

    }; // fecha galeria