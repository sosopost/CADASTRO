
async function cadastrar() {

    var form = document.getElementById('form-cadastro');
    var dados = new FormData(form);

    var req = await fetch("cadastro.php", {
        method: "POST",
        body: dados
    });

    var resposta = await req.json();
    alert(resposta.status + ": " + resposta.mensagem);
}