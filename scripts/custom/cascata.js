
document.addEventListener('DOMContentLoaded', function() {
    var selectProvincia = document.getElementById('provincia');

    if (selectProvincia) {
        selectProvincia.addEventListener('change', function() {
            var valorP = selectProvincia.value;
            console.log('Valor selecionado: ' + valorP);

            // Faz a requisição AJAX para obter os nomes dos municípios relacionados à província selecionada
            $.ajax({
                type: "POST",
                url: "../controllers/CascataMController.php",
                data: { provincia: valorP },
                dataType: "json",
                success: function(data) {
                    // Limpa as opções atuais do campo filho
                    $("#municipio").empty();

                    // Adiciona as novas opções do campo filho
                    $("#municipio").append('<option value="">--Selecione--</option>');
                    $.each(data, function(index, item) {
                        $("#municipio").append('<option value="' + item + '">' + item + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Erro na requisição AJAX: " + xhr.responseText);
                }
            });
        });
    }
});
