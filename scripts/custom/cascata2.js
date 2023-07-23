
document.addEventListener('DOMContentLoaded', function() {
    var selectProvincia = document.getElementById('municipio');

    if (selectProvincia) {
        selectProvincia.addEventListener('change', function() {
            var valorP = selectProvincia.value;
            console.log('Valor selecionado: ' + valorP);

            
            $.ajax({
                type: "POST",
                url: "../controllers/CascataCController.php",
                data: { municipio: valorP },
                dataType: "json",
                success: function(data) {
                    // Limpa as opções atuais do campo filho
                    $("#comuna").empty();

                    // Adiciona as novas opções do campo filho
                    $("#comuna").append('<option value="">--Selecione--</option>');
                    $.each(data, function(index, item) {
                        $("#comuna").append('<option value="' + item + '">' + item + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Erro na requisição AJAX: " + xhr.responseText);
                }
            });
        });
    }
});
