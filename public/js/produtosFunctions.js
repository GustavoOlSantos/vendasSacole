function editarSacole(e) {
    var linha = $(e).closest("tr");
    var id = linha.find("td:eq(0)").text().trim();

    $.ajax({
        method: 'post',
        dataType: 'html',
        url: '../actions/produtos.php',
        data: { id: id, action: 'listarModal' },
        success: function (data) {
            $('.editBody').html(data);
        }
    });
}

function configurarPrices() {
    let normalInput = document.getElementById("normal");
    let gourmetInput = document.getElementById("gourmet");

    fetch(`../ajax/getPreco.php?tipo=1`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                normalInput.value = data.preco;
            }
        })

    fetch(`../ajax/getPreco.php?tipo=2`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                gourmetInput.value = data.preco;
            }
        })
}


function apagarSacole(e) {
    var linha = $(e).closest("tr");
    var id = linha.find("td:eq(0)").text().trim();
    var nome = linha.find("td:eq(1)").text().trim();

    var h5Text = document.getElementById("h5Apagar");
    h5Text.innerHTML = "Deseja excluir o Sacolé de " + nome + "?";

    var input = document.getElementById("idApagar");
    input.value = id;
}

