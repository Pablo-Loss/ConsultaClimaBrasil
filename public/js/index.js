function clearFields() {
    $("#cidade").val("");
    $("#consultar").hide();
}

function mostrarErro(text) {
    Swal.fire({
        title: 'Ops!',
        text,
        icon: 'error',
        confirmButtonText: 'Entendi'
    })
}

$(document).ready(function() {
    $("#cep").blur(function() {
        let cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            let validaCep = /^[0-9]{8}$/;
            if (validaCep.test(cep)) {
                $("#cidade").val("...");

                $.getJSON(`https://viacep.com.br/ws/${cep}/json/?callback=?`, function(dados) {
                    if (dados.hasOwnProperty('erro')) {
                        clearFields();
                        mostrarErro("CEP não encontrado");
                    } else {
                        $("#cidade").val(dados.localidade);
                        $("#consultar").show();
                    }
                });
            } else {
                clearFields();
                mostrarErro("Formato de CEP inválido");
            }
        } else {
            clearFields();
        }
    });

    $("#cep").keydown(function() {
        $("#consultar").hide();
    });
});