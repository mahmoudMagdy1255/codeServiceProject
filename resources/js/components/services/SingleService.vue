<template>
	
	<div class="thumbnail" >
					<router-link :to="{name:'ServiceDetails' , params:{id:service.id} }">

						<h3 class="text-right">
							{{ service.name }}
						</h3>

					</router-link>

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

</template>


<script type="text/javascript">
	
	export default{

		props:['service'],
		filters:{

			limit(string){

				return string.substring(0, 40) + ' ....';

			}

		}
	}

</script>