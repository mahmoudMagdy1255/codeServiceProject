<template>
	
	<div class="thumbnail" style="width:100%;">
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
								<h3>
									<router-link :to="{name:'User' , params:{id:service.user.id}}">
										{{ service.user.name }}
									</router-link>
								
								</h3>
							</div>
							
						</div>
						<p>{{ service.desc | limit }}</p>

						<p>
							<i class="fa fa-eye"> </i>
							{{ service.views_count }}
						</p>

							<div class="text-left">

								<span v-if="service.status == 0">
									
									<span class="col-md-12 btn btn-warning btn-product">
										<i class="far fa-clock"></i>
										 فى انتظار  الادارة
									</span> 

								</span>

								<span v-if="service.status == 2">
									
									<span class="col-md-12 btn btn-danger btn-product">
										<i class="fa fa-window-close"></i>
										 تم الرفض من الادارة
									</span> 

								</span>

								<span v-if="service.status == 1">
									
									<span class="col-md-12 btn btn-success btn-product">
										<i class="fas fa-check"></i>
										 تم الموافقة على الخدمة
									</span> 

								</span>

							<div class="clearfix">

							</div>
							
						</div>

					</div>
				</div>

</template>


<script type="text/javascript">
	
	export default{

		props:['service'],
		created(){
			console.log(this.service);
		},
		filters:{

			limit(string){

				return string.substring(0, 20) + ' ....';

			}

		}
	}

</script>