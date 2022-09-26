const botao = document.querySelector("#botao");
const conteudo = document.querySelector(".conteudo");
let status = 0;
let truOrFal = false;
let milisegundos, tempoMili, timeOut;
let textRecomeco = conteudo.innerHTML;
botao.addEventListener("click",()=>{
    status++;
    if(status == 1){
        clearInterval(milisegundos); // limpa o intervalo que conta os milisegundos
        clearTimeout(timeOut);// limpa a espera do delay
        conteudo.innerHTML = textRecomeco;
        conteudo.classList.remove("vermelho")
        tempoMili = 0;

        let delay = Math.random()*5000; // Cria o tempo aleatorio para o botão ficar vermelho
        botao.innerHTML = "Espere"; // Muda o que esta escrito no botão
        botao.style.color = "white";
        timeOut = setTimeout(()=>{ // espera chegar no delay para fazer a ação

            botao.style.background = "red"; // muda o background para vermelho
            tempoMili = 0; // cria a variavel do tempo que demorou para clicar

            milisegundos = setInterval(()=>{ // horizonte de eventos

                truOrFal = true;
                tempoMili += 10;
                botao.style.color = "white";
                botao.innerHTML = "Clique";

                if(tempoMili == 1000){ // se chegar a 1 segundo a pessoa perdeu
                    clearInterval(milisegundos);
                    conteudo.innerHTML = "Você Perdeu!!";
                    conteudo.className = "vermelho"
                    botao.style.background = "#7eaafc";
                    botao.style.color = "black";
                    botao.innerHTML = "Recomeçar";
                    status = 0;
                }
            },10);

        }, delay);


    }
    
    else if(status == 2 ){
        if(!truOrFal){
            clearInterval(milisegundos); // limpa o intervalo que conta os milisegundos
            clearTimeout(timeOut);// limpa a espera do delay
            conteudo.innerHTML= "Você foi muito rapido e perdeu!"
            conteudo.className = "vermelho"
            botao.innerHTML = "Recomeçar"
            botao.style.color = "black";
            status = 0;
            truOrFal = false;
        }
        else{
            clearInterval(milisegundos); // limpa o intervalo que conta os milisegundos
            clearTimeout(timeOut);// limpa a espera do delay
            conteudo.innerHTML = `Seu tempo de resposta foi 0.${tempoMili} segundos`;
            historico.push(tempoMili);
            botao.style.background = "#7eaafc";
            botao.style.color = "black";
            botao.innerHTML = "Recomeçar"
            status = 0;
            truOrFal = false;
            addHistorico()
        }
    }
});
