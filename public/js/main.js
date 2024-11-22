    const parametros = new URLSearchParams(window.location.search)
    const tipoMensagem =parametros.get("mensagem")

    const notificacao = document.createElement("div")

    if (tipoMensagem === "sucesso"){
        notificacao.innerHTML = "Operação realizada com sucesso"
        notificacao.className = "notificacao de sucesso"
    }else if(tipoMensagem === "erro"){
        notificacao.innerHTML = "erro ao realizar a operação"
        notificacao.className = "notificacao de erro"
    }

    document.body.appendChild(notificacao)

    const URLSemParametro =window.location.pathname
    window.history.replaceState(null,"",URLSemParametro)

    setTimeout(function(){
        notificacao.remove()
    }, 2000)