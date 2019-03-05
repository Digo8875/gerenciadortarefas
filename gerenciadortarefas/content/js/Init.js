$(document).ready(	
	
	function(){

		$('#create_usuario').click(function(){
			event.preventDefault();

			Main.load_form_usuario(0);
		});

		$('#conteiner_usuario').on('submit','#form_usuario',function(){
			event.preventDefault();

			var action = 'create_edit_usuario';
			var data = {
				id: $('#id').val(),
				nome: $('#nome').val()
			};

			$.ajax({
	                type: 'POST',
	                dataType: 'html',
	                url: '/gerenciadortarefas/view/usuario/usuario.ajax.php',
	                async: true,
	                data: {action, data},
	                success: function(data) {
	                    $(location).attr('href','/gerenciadortarefas/view/usuario/index.php');
	                }
	        });
		});

		$('#create_tarefa').click(function(){
			event.preventDefault();

			Main.load_form_tarefa(0);
		});

		$('#conteiner_tarefa').on('submit','#form_tarefa',function(){
			event.preventDefault();

			var action = 'create_edit_tarefa';
			var data = {
				id: $('#id').val(),
				assunto: $('#assunto').val(),
				descricao: $('#descricao').val(),
				data_registro: $('#data_registro').val(),
				usuario_solicitante: $('#solicitante').val(),
				usuario_solicitado: $('#solicitado').val(),
				status: $('#status').val()
			};

			$.ajax({
	                type: 'POST',
	                dataType: 'html',
	                url: '/gerenciadortarefas/view/tarefa/tarefa.ajax.php',
	                async: true,
	                data: {action, data},
	                success: function(data) {
	                    $(location).attr('href','/gerenciadortarefas/view/tarefa/index.php');
	                }
	        });
		});

		$('#create_status').click(function(){
			event.preventDefault();

			Main.load_form_status(0);
		});

		$('#conteiner_status').on('submit','#form_status',function(){
			event.preventDefault();

			var action = 'create_edit_status';
			var data = {
				id: $('#id').val(),
				nome: $('#nome').val()
			};

			$.ajax({
	                type: 'POST',
	                dataType: 'html',
	                url: '/gerenciadortarefas/view/status/status.ajax.php',
	                async: true,
	                data: {action, data},
	                success: function(data) {
	                    $(location).attr('href','/gerenciadortarefas/view/status/index.php');
	                }
	        });
		});
	}
);