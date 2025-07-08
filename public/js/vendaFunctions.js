function registrarProduto() {
    let produto = document.getElementById("sacoleSelecionado").value;
    let qtd = document.getElementById("qtd").value;

    if (produto == -1) {
        alert("Selecione um sacolé.");
        return;
    }

    if (qtd == 0 || qtd == null) {
        alert("Informe a quantidade.");
        return;
    }

    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/vendas.php',
        data: { id: produto, qtd: qtd, action: 'registrarProduto' },
        success: function (data) {
            $('#pedidoAtual').html(data);
            atualizarValorTotal();
        },
        failure: function (mensagem) {
            console.error("Falha ao registrar Produção: ", mensagem);
        }

    });
}

function apagarSacole(id) {
    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/vendas.php',
        data: { id: id, action: 'apagarSacole' },
        success: function (data) {
            $('#pedidoAtual').html(data);
            atualizarValorTotal();
        },
        failure: function (mensagem) {
            console.error("Falha ao apagar Sacolé do pedido: ", mensagem);
        }

    });
}

function limparPedido() {
    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/vendas.php',
        data: { action: 'limparPedido' },
        success: function (data) {
            $('#pedidoAtual').html(data);
            atualizarValorTotal();
        },
        failure: function (mensagem) {
            console.error("Falha ao limpar Pedido: ", mensagem);
        }

    });
}

function atualizarValorTotal() {

    let Valores = document.querySelectorAll('#vtotalSacole');
    let total = 0;

    if (Valores.length === 0) {
        document.getElementById('TotalPedido').textContent = 'R$ 0,00';
        return;
    }

    Valores.forEach(function (element) {
        let valor = parseFloat(element.textContent.replace('R$ ', '').replace(',', '.'));

        if (!isNaN(valor)) {
            total += valor;
        }
    });
    document.getElementById('TotalPedido').innerHTML = 'R$ ' + total.toFixed(2).replace('.', ',');
}