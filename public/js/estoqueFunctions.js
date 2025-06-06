function registrarProducao() {
    let selected = document.getElementById("sacolesDisponíveis");
    let qtd = document.getElementById("qtdProduzida");

    if (selected.value == -1) {
        alert("Selecione um sacole disponível.");
        return;
    }

    if (qtd.value == 0 || qtd.value == null) {
        alert("Informe a quantidade produzida.");
        return;
    }

    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/estoque.php',
        data: { id: selected.value, qtd: qtd.value, action: 'registrarProducao' },
        success: function (data) {
            $('#sacolesProduzidos').html(data);
        },
        failure: function (mensagem) {
            console.error("Falha ao registrar Produção: ", mensagem);
        }

    });
}

function enviarProduzidos() {
    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/estoque.php',
        data: { action: 'enviarProduzidos' },
        success: function (data) {
            alert("Quantidades atualizadas com sucesso!");
            location.reload();
        },
        failure: function (mensagem) {
            console.error("Falha ao Atualizar quantidade: ", mensagem);
        }

    });
}

function apagarProduzido(e){
    let id = e.getAttribute('data-id');

    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/estoque.php',
        data: { id: id, action: 'apagaProduzido' },
        success: function (data) {
            $('#sacolesProduzidos').html(data);
        },
        failure: function (mensagem) {
            console.error("Falha ao excluir Sacolé: ", mensagem);
        }

    });
}

function desfazerLista(){
    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/estoque.php',
        data: { action: 'desfazerLista' },
        success: function (data) {
            $('#sacolesProduzidos').html(" ");
        },
        failure: function (mensagem) {
            console.error("Falha ao desfazer lista: ", mensagem);
        }

    });
}