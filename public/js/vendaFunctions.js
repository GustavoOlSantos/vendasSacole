function registrarProduto() {
    let produto = document.getElementById("sacoleSelecionado");
    let qtd = document.getElementById("qtd");

    if (produto.value == -1) {
        userMessage("Selecione um sacolé.", 'warning');
        return;
    }

    if (qtd.value == 0 || qtd.value == null) {
        userMessage("Informe a quantidade de sacolés a serem vendidos.", 'warning');
        return;
    }

    let qtdEmEstoque = parseInt(document.querySelectorAll(`#Sacole${produto.value} > td`)[2].innerText);

    if(qtd.value > qtdEmEstoque){
        userMessage("Não há sacolés o suficiente disponíveis no estoque.", 'error');
        return;
    }

    $.ajax({
        method: 'post',
        dataType: 'json',
        url: '../actions/vendas.php',
        data: { id: produto.value, qtd: qtd.value, qtdEmEstoque: qtdEmEstoque, action: 'registrarProduto' },
        success: function (response) {
            if (response.success) {
                atualizarPedido();
                qtd.value = 0;
                produto.value = -1;
            }
            else {
                userMessage(response.message, 'error');
                if(response.errorLog) {
                    console.error("Erro ao registrar venda: ", response.errorLog); 
                }
            }
        },
    });
}

function abrirModal(){
    var total = document.getElementById('TotalPedido').innerHTML;

    $.ajax({
        method: 'post',
        dataType: 'json',
        url: '../actions/vendas.php',
        data: { action: 'checaPedido' },

        success: function (response) {
            if (response.success) {
                
                var input = document.getElementById('totalVenda');
                input.value = parseFloat(total.split("R$")[1]);
                let modal = new bootstrap.Modal(document.getElementById('modalPag'));
                modal.show()
            } else {
                userMessage(response.message, 'error');
            }
        }
    });
}

function pagamento(el){
    var btnRegistrar = document.getElementById('regBtn');
    if(btnRegistrar.disabled == true){
        btnRegistrar.disabled = false;
    }

    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/vendas.php',
        data: { formaPagamento: el.value, action: 'carregarPagamento' },
        success: function (data) {
            $('#divPag').html(data);
            if(el.value == 1){
                document.getElementById('tot').innerHTML += document.getElementById('totalVenda').value;
            }
            else if(el.value == 2){
                document.getElementById('tot').value += document.getElementById('totalVenda').value;
            }
            
        },
        error: function (mensagem) {
            console.error("Falha ao apagar Sacolé do pedido: ", mensagem);
        }

    });
}

function registrarVenda() {
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: '../actions/vendas.php',
        data: { action: 'registrarVenda' },

        success: function (response) {
            if (response.success) {
                let modalElement = document.getElementById('modalPag');
                let modal = bootstrap.Modal.getInstance(modalElement);
                modal.hide();
                
                userMessage(response.message, 'success');
                limparPedido();
                atualizaEstoque();
            } else {
                let modal = new bootstrap.Modal(document.getElementById('modalPag'));
                modal.close();
                userMessage(response.message, 'error');
                if(response.errorLog) {
                    console.error("Erro ao registrar venda: ", response.errorLog); 
                }
            }
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
        error: function (mensagem) {
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
        error: function (mensagem) {
            console.error("Falha ao limpar Pedido: ", mensagem);
        }

    });
}

function atualizaEstoque(){
    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/vendas.php',
        data: { action: 'atualizaEstoque' },
        success: function (data) {
            $('#estoqueAtual').html(data);
        },
        error: function (mensagem) {
            console.error("Falha ao limpar Pedido: ", mensagem);
        }

    });
}

function atualizarPedido(){
    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/vendas.php',
        data: { action: 'atualizarPedido' },
        success: function (data) {
            $('#pedidoAtual').html(data);
            atualizarValorTotal();
        },
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

function userMessage(mensagem, tipo){
    let div = document.getElementById('divMessages');
    let text = document.getElementById('textMessage');
    let icon = document.getElementById('iconMessage');

    if (tipo === 'success') {
        div.classList.add('alert-success');
        div.classList.remove('alert-warning');
        div.classList.remove('alert-danger');

        icon.classList.add('fa-check-circle');
        icon.classList.remove('fa-info-circle');
        icon.classList.remove('fa-exclamation-triangle');
    }
    else if (tipo === 'warning') {
        div.classList.add('alert-warning');
        div.classList.remove('alert-danger');
        div.classList.remove('alert-success');

        icon.classList.add('fa-info-circle');
        icon.classList.remove('fa-check-circle');
        icon.classList.remove('fa-exclamation-triangle');
    }
    else if (tipo == 'error'){
        div.classList.add('alert-danger');
        div.classList.remove('alert-warning');
        div.classList.remove('alert-success');

        
        icon.classList.add('fa-exclamation-triangle');
        icon.classList.remove('fa-info-circle');
        icon.classList.remove('fa-check-circle');
    }

    div.classList.remove('d-none');
    text.innerHTML = mensagem;

    setTimeout(() => {
        div.classList.add('d-none');
    }, 20000);

}