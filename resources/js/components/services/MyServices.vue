<template>
		<div>

			<div class="alert alert-warning">
				
				<span>انت لديك  {{ services.length }} خدمات على الموقع</span>

			</div>


			<button class="btn btn-info" @click="sortKey='price'">على حسب السعر</button>
			<button class="btn btn-info" @click="sortKey='status'">فى انتظار الادارة</button>
			<button class="btn btn-info" @click="sortKey=''">المضاف اخيرا</button>
			<button class="btn btn-info" @click="sortKey='name'">على حسب الاسم</button>

			<hr>

			<div class="row">
				<div v-for="service in ordersServices " track-by="$index" class="col-sm-6 col-md-4">
					
					<single-service :service="service"></single-service>

				</div>
			</div>

		</div>

</template>

<script type="text/javascript">
	
	import singleService from './SingleService.vue'

	export default{

		data(){

			return{

				services:[],
				sortKey:''

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

		},

		computed:{

			ordersServices(){
				return _.orderBy(this.services , this.sortKey);
			}

		}

	}

</script>