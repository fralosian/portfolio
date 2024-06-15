
    function f_mostra() {
        alert("Entrei");
    }

    f_mostra();

/*  $(document).ready(function() {
        /// Quando usuário clicar em excluir será feito todos os passo abaixo
        $('#excluir').click(function() {

            var dados = $('#formEdit').serialize();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'php/deletar-vaga.php',
                async: true,
                data: dados,
                success: function(response) {
                    location.reload();
                }
            });
            return false;
        });
*/