function validaForm(destino) {
    let msg = "* Preencha os campos obrigatórios.";
    let vazio = 0;

   
    document.getElementById('msg-erro').innerHTML = '';

   
    let nome = document.getElementById('nome').value;
    let descricao = document.getElementById('descricao').value;

    
    if (nome === '') vazio++;
    if (descricao === '') vazio++;

    
    if (vazio > 0) {
        document.getElementById('msg-erro').innerHTML = msg;
        return false;
    }

    
    document.formcafe.action = destino;
    document.formcafe.submit();
}
