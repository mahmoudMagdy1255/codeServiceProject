<template>
		<div>

			<div class="alert alert-warning">
				
				<span>انت لديك  {{ services.length }} خدمات على الموقع</span>

			</div>


			<div v-for="service in services" class="col-sm-6 col-md-4">
				<div class="thumbnail" >
					<h3 class="text-right">
						{{ service.name }}
					</h3>
					<img :src="'/images/services/' + service.image " class="img-responsive">
					<div class="caption">
						<div class="row">

							<div class="col-md-6 col-xs-6 price text-left">
								<h3>
									<label>${{ service.price }}</label>
								</h3>
							</div>

							<div class="col-md-6 col-xs-6">
								<h3>{{ service.user.name }}</h3>
							</div>
							
						</div>
						<p>{{ service.desc | limit }}</p>
						<div class="row">
							<div class="col-md-6 text-left">

								<span v-if="service.status == 0">
									
									<span class="btn btn-warning btn-product">
										<i class="far fa-clock"></i>
										 فى انتظار  الادارة
									</span> 

								</span>

								<span v-if="service.status == 2">
									
									<span class="btn btn-danger btn-product">
										<i class="fa fa-window-close"></i>
										 تم الرفض من الادارة
									</span> 

								</span>

								<span v-if="service.status == 1">
									
									<span class="btn btn-success btn-product">
										<i class="fas fa-check"></i>
										 تم الموافقة على الخدمة
									</span> 

								</span>

								
							</div>
							<div class="col-md-6">
								<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a></div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>

		</div>

</template>

<script type="text/javascript">
	
	export default{

		data(){

			return{

				services:[]

			}

		}

		,created(){
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
		filters:{

			limit(string){

				return string.substring(0, 40) + ' ....';

			}

		}

	}

</script>