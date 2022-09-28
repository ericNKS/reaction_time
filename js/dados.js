let container = document.querySelector(".container");
let buttonHist = document.querySelector(".buttonHist");
let divHis = document.createElement('ol');
let pMedia = document.querySelector(".media");
let historicoAtual = 0;
let i = 0;
let mediaHist;
divHis.className = 'historico';
document.querySelector(".divHist").appendChild(divHis);


let historico = Array();


    function addHistorico(){
        /*
            let his = document.createElement('li');
            his.innerHTML = `${historico[i]}ms`;
            divHis.appendChild(his);
            i++;*/
            let ajax = new XMLHttpRequest();
            ajax.open('GET','usuario_controller.php?tratamento=getHist&temp='+historico[i]);
            ajax.send();
    }


   function media(){

    mediaHist =0;
    historicoAtual = 0;
    if(historico[0] != 0){
        for(let i =0; i < historico.length; i++){
            historicoAtual += historico[i];
        }
        mediaHist = Math.round(historicoAtual/historico.length);
        console.log(mediaHist)
        if(!isNaN(mediaHist)){
            pMedia.innerHTML = `Sua media é: ${mediaHist}ms`
        }
    }
   }
