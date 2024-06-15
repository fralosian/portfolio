// <<< FUNCÃO AJAX DE INSERÇÃO CONTATOS >>>
				//funcao ajax insert Contato sem refresh da pagina
				$(document).ready(function () {
						// captura o clique do btnGravar
            $('#btnGravar').click(function() {
								//captura todos os dados do formulario 'formInsertContatos' e joga na variavel dados
                var dados = $('#formInsertContatos').serialize();
								
								// função ajax
                $.ajax({
										//metodo POST
                    type : 'POST',
										//arquivo php que sera enviado os dados
                    url  : 'php/insertFormContato.php',
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
												$("#table-date").load(location.href + " #table-date");
                    }
										
                });

                return false;
            });
        });
				// <<< FIM DA FUNCÃO AJAX DE INSERÇÃO CONTATOS >>>