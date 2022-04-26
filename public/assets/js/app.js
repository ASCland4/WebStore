// app.js

// ========================================================
function adicionar_carrinho(id_produto) {

    // adicionar produto ao carrinho
    axios.defaults.withCredentials = true;
    axios.get('?a=adicionar_carrinho&id_produto=' + id_produto)
        .then(function (response) {
            var totalp = response.data;
            document.getElementById('carrinho').innerText = totalp;
        });
}

// ========================================================
function limpar_carrinho() {
    var e = document.getElementById("confirmar_limpar_carrinho");
    e.style.display = "inline";
}

// ========================================================
function limpar_carrinho_off() {
    var e = document.getElementById("confirmar_limpar_carrinho");
    e.style.display = "none";
}

// ========================================================
function usar_morada_alternativa() {

    // mostrar ou esconder o espaço para a morada alternativa.
    var e = document.getElementById('check_morada_alternativa');
    if (e.checked == true) {

        // mostra o quadro para definir morada alternativa
        document.getElementById("morada_alternativa").style.display = 'block';

    } else {

        // esconde o quadro para definir morada alternativa
        document.getElementById("morada_alternativa").style.display = 'none';
    }
}