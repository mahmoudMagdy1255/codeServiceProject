<template>
	
	<span>
		
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

						<div>



							<button-buy :service_id="service.id"></button-buy>

						</div>
						<div class="clearfix"></div>
					</div>
				</div>

	</span>

</template>


<script type="text/javascript">
	
	import buttonBuy from '../buttons/ButtonBuy.vue'

	export default{

		props:['service'],
		components:{
			buttonBuy
		},
		filters:{

			limit(string){

				return string.substring(0, 20) + ' ....';

			}

		}
	}

</script>