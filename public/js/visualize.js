$(document).ready(function() {
    let temperatura = $('#pTemperatura').text().replace('°C', '');
    if (temperatura <= 19) {
        $('#card-temperatura').addClass('bg-primary');
        $('#card-temperatura .card-body .card-title, #card-temperatura .card-body .card-text').css('color', 'white')
    } else if (temperatura > 19 && temperatura <= 28) {
        $('#card-temperatura').addClass('bg-warning');
        $('#card-temperatura .card-body .card-title, #card-temperatura .card-body .card-text').css('color', 'black')
    } else if (temperatura > 28) {
        $('#card-temperatura').addClass('bg-danger');
        $('#card-temperatura .card-body .card-title, #card-temperatura .card-body .card-text').css('color', 'white')
    }

    let sensacao = $('#pSensacao').text().replace('°C', '');
    if (sensacao <= 19) {
        $('#card-sensacao').addClass('bg-primary');
        $('#card-sensacao .card-body .card-title, #card-sensacao .card-body .card-text').css('color', 'white')
    } else if (sensacao > 19 && sensacao <= 28) {
        $('#card-sensacao').addClass('bg-warning');
        $('#card-sensacao .card-body .card-title, #card-sensacao .card-body .card-text').css('color', 'black')
    } else if (sensacao > 28) {
        $('#card-sensacao').addClass('bg-danger');
        $('#card-sensacao .card-body .card-title, #card-sensacao .card-body .card-text').css('color', 'white')
    }
});

function mostrarErro(text) {
    Swal.fire({
        title: 'Ops!',
        text,
        icon: 'error',
        confirmButtonText: 'Entendi'
    })
}

function mostrarSucesso(text) {
    Swal.fire({
        title: 'Tudo certo!',
        text,
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/';
        }
    });
}

function redirecionarIndex() {
    window.location.href = '/';
}

function saveClimate(climate, csrf) {
    $.ajax({
        url: '/create',
        method: "POST",
        data: {
            _token: csrf,
            climate: climate
        },
        success: function(response) {
            $('#salvar').hide();
            mostrarSucesso(response.msgResult);
        },
        error: function(xhr, status, error) {
            mostrarErro("Erro ao salvar os dados.");
        }
    });
}