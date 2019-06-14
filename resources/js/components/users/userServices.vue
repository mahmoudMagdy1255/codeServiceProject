<template>
	<div>
		
		<span v-if="isLoading">
			
			<span class="pull-right">										
				<i class="far fa-user"></i>
				الخدمات الخاصة بالعضو {{ user.name }}
			</span>
			
			<div class="clearfix"></div>

			<div class="alert alert-warning">
				
				<span>{{ user.name }} لديه  {{ services.length }} خدمات على الموقع</span>

			</div>


			<div class="row">
				<div class="pull-right col-lg-6">

					<div class="btn-group">


						<button class="btn btn-info" @click="ordersServices('price')">على حسب السعر</button>
						<button class="btn btn-info" @click="ordersServices('status')">فى انتظار الادارة</button>
						<button class="btn btn-info" @click="ordersServices('')">المضاف اخيرا</button>
						<button class="btn btn-info" @click="ordersServices('name')">على حسب الاسم</button>
						
					</div>

				</div>

				<div class="btn-group pull-right col-lg-4 text-left">

					<input type="text" v-model="service_name" placeholder="ابحث عن خدمة" class="form-control">
				
				</div>


			</div>

			<br>
			
			<div class="row">

				<span v-if="services.length">

					<div v-for="service in filterServices" track-by="$index" class="col-sm-6 col-md-4 pull-right">
						
						<single-service :service="service"></single-service>

					</div>

				</span>

				<span v-else>
					<div class="alert alert-warning">
						
						
						<span>
							<div class="text-center">
								<b>	
									العضو {{ user.name }} ليس لديه اى خدمات 	
								</b>
							</div>
						</span>

					</div>
				</span>

			</div>


		</span>


		<span v-else>
			<div class="text-center">
				<b>	
					جارى التحميل	
				</b>
			</div>
		</span>

	</div>

</template>


<script type="text/javascript">

		import singleService from './SingleService.vue'

	export default{
		data(){

			return{
				isLoading:false,
				services:{},
				sortKey:'',
				reverse:1,
				user:{},
				service_name:''

			}

		},
		created(){
			this.getUserServices();
		},components:{
			singleService
		},
		methods:{
			getUserServices(){

				axios.get('services/user-services/' + this.$route.params.id).then((response)=>{

					this.isLoading = true;

					this.services = response.data[0];

					this.user = response.data[1];

				}, (error)=>{
					
					this.isLoading = false;
				});

			},
			ordersServices(sortKey){



				if ( this.sortKey == sortKey) {

					this.reverse = -1 * this.reverse;

				}else {

					this.reverse = 1;					
				}

				this.sortKey = sortKey;


				if ( this.reverse == -1 ) {

					this.services = _.orderBy(this.services , this.sortKey).reverse();

				}else {

					this.services = _.orderBy(this.services , this.sortKey);

				}
			}

		},
		computed:{
			filterServices() {


				if ( this.services.length > 0 && this.service_name) {


					return this.services.filter((service)=>{

						var word = this.service_name;

						return service.name.includes(word) ||service.desc.includes(word)|| service.price ==word;

					});

				}

				return this.services;
			},
					
		}

	}

</script>