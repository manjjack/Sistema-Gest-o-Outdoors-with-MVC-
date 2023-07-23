
$(document).ready(function () {
    // Adiciona um evento de escuta para capturar a mudança no valor do select #comuna
    $("#comuna").change(function () {
        // Obtém o valor selecionado no select
        var valorJS = $(this).val();
        console.log('Valor selecionado no select: ' + valorJS);

        // Faz a requisição AJAX para enviar o valor para o PHP
        $.ajax({
            type: "POST",
            url: '../controllers/CascataOController.php', // Usa a URL atual da página
            data: { valorJS: valorJS }, // Passando o valorJS para o PHP usando POST
            dataType: "json",
            success: function (response) {
                console.log("Resposta do PHP: " + JSON.stringify(response));
                
                // Limpa as opções atuais do select #tipo
                $("#tipo").empty();

                $("#tipo").append('<option value="">--Selecione--</option>');
                $.each(response, function (index, item) {
                    $("#tipo").append('<option value="' + item.id + '">' + item.id + ',' + item.tipo + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.log("Erro na requisição AJAX: " + xhr.responseText);
            }
        });
    });
});