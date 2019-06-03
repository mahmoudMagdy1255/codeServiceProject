<template>
		<div>

			<div class="alert alert-warning">
				
				<span>انت لديك  {{ services.length }} خدمات على الموقع</span>

			</div>


			<div v-for="service in services" track-by="$index" class="col-sm-6 col-md-4">
				
				<single-service :service="service"></single-service>

			</div>

		</div>

</template>

<script type="text/javascript">
	
	import singleService from './SingleService.vue'

	export default{

		data(){

			return{

				services:[]

			}

		},
		components:{
			singleService
		},
		created(){
			this.getMyServices();
		},
		methods:{

			getMyServices(){
				axios.get('/services/my-services').then( (response)=>{

					this.services = response.data;

				}, ()=>{
					
					alert('Errooooor');

				});
			}

		}

	}

</script>