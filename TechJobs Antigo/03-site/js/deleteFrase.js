// <<< FUNCÃO AJAX DE INSERÇÃO FRASE >>>
				//funcao ajax insert Contato sem refresh da pagina
				$(document).ready(function () {
						// captura o clique do btnInsFra
            $('input[name=btnDeletePainel]').click(function() {
								//captura todos os dados do formulario 'delete-frase' e joga na variavel dados
                var dados = $('input[name=delete-frase]').serialize();
								
								// função ajax
                $.ajax({
										//metodo POST
                    type : 'POST',
										//arquivo php que sera enviado os dados
                    url  : 'php/deleteFrase.php',
										//declarando variavel dados para ser enviado para o php
                    data : dados,
										//declara o retorno em html
                    dataType: 'html',
										//abre um show com gif enquanto o processo php é realizado
										beforeSend: function() { 
											$('#loading').show(); 
										},
										//quando o processo do php termina fecha o show gif
										complete: function() { 
											$('#loading').hide(); 
										},
										//abre um modal com o retorno do php
                    success : function(data){
												$(data).modal('show');
												$("#paneis-frase").load(location.href + " #paneis-frase");
                    }
										
                });

                return false;
            });
        });
				// <<< FIM DA FUNCÃO AJAX DE FRASE >>>