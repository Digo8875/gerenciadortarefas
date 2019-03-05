var Main = {

	load_form_usuario: function(id){

		var action = 'load_form_usuario';
		var data = {
			id: id,
			nome: '',
		};

		$.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/gerenciadortarefas/view/usuario/usuario.ajax.php',
                async: true,
                data: {action, data},
                success: function(data) {
                    $('#conteiner_usuario').html(data);
                }
        });
	},
	deleta_usuario: function(id){

		var action = 'deleta_usuario';
		var data = {
			id: id
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
	},
	load_form_tarefa: function(id){

		var action = 'load_form_tarefa';
		var data = {
			id: id,
			assunto: '',
			descricao: '',
			data_registro: '',
			usuario_solicitante: '',
			usuario_solicitado: '',
			status: ''
		};

		$.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/gerenciadortarefas/view/tarefa/tarefa.ajax.php',
                async: true,
                data: {action, data},
                success: function(data) {
                    $('#conteiner_tarefa').html(data);
                }
        });
	},
	deleta_tarefa: function(id){

		var action = 'deleta_tarefa';
		var data = {
			id: id
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
	},
	load_form_status: function(id){

		var action = 'load_form_status';
		var data = {
			id: id,
			nome: '',
		};

		$.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/gerenciadortarefas/view/status/status.ajax.php',
                async: true,
                data: {action, data},
                success: function(data) {
                    $('#conteiner_status').html(data);
                }
        });
	},
	deleta_status: function(id){

		var action = 'deleta_status';
		var data = {
			id: id
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
	}
};