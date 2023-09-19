
import Vue from 'vue/dist/vue.js';


new Vue({
	el: '#app_login',
	data: {
		email: '',
		password: ''

	},
	methods: {
		login: function(){
			axios.post('/login',{
				email: this.email,
				password: this.password
			})
			.then(response => {
				console.log(email);
				swal('Has iniciado sesión', 'Datos correctos', 'success');
			})
			.catch(error => {
				let errors = error.response.data.errors;
				let message = "Error no identificado";
				if(errors !== undefined && errors.hasOwnProperty('email')){
					message = errors.email[0];
				}else if(errors !== undefined && errors.hasOwnProperty('password')){
					console.log(email);
					message = errors.password[0];
				}else if(errors !== undefined && errors.hasOwnProperty('login')){
					message = errors.login[0];

				}

				swal('Error', message, 'error');
			});
		},
		enviarDatos($curso){
			console.log($curso);
		}
	}
});
