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


    function getHist(){
        let ajax = new XMLHttpRequest();
            ajax.open('GET','usuario_controller.php?tratamento=gethist');
            ajax.onreadystatechange = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200)
                {
                    divHis.innerHTML = '';
                    let histo = ajax.responseText;
                    let objJson_hist = JSON.parse(histo);
                    //console.log(objJson_hist);
                    objJson_hist.forEach(historico_tempo => {
                        let his = document.createElement('li');
                        his.innerHTML = `${historico_tempo.tempo}ms`;
                        divHis.appendChild(his);
                    });
                }
            }
            ajax.send();
    }
    
    function addHistorico(){
            let ajax = new XMLHttpRequest();
            ajax.open('GET','usuario_controller.php?tratamento=sethist&temp='+historico[i]);
            ajax.onreadystatechange = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200)
                {
                    i++;
                }
            }
            ajax.send();

    }
    

   function media(){

    mediaHist =0;
    historicoAtual = 0;

    let ajax = new XMLHttpRequest();
            ajax.open('GET','usuario_controller.php?tratamento=gethist');
            ajax.onreadystatechange = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200)
                {
                    divHis.innerHTML = '';
                    let histo = ajax.responseText;
                    let objJson_hist = JSON.parse(histo);
                    //console.log(objJson_hist);
                    if(historico[0] != 0)
                    {
                        objJson_hist.forEach(historico_tempo => {
                            historicoAtual += historico_tempo.tempo;
                        });
                        mediaHist = Math.round(historicoAtual/objJson_hist.length);
                        console.log(mediaHist);
                        if(!isNaN(mediaHist)){
                            pMedia.innerHTML = `Sua media é de ${mediaHist}ms`
                        }
                    }
                }
            }
            ajax.send();
   }
