<template>
	
	<div v-if="isLoading">
	
		<div class="col-lg-4 col-md-4"></div>


		<div class="col-lg-8 col-md-8">
		

			<div class="content-wrapper">	
			<div class="item-container">	
				<div class="container">	

					<div class="col-md-12">
						<span class="product-title pull-right">
							{{ service.name }}  
							 
						</span>
						
						<span class="small pull-left"> <i class="far fa-clock"></i> {{ service.created_at }}</span>

						<div class="clearfix"></div>

						<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					</div>

					<div class="col-md-12">
	                    
						<img id="item-display" class="img-responsive" :src="'/images/services/' + service.image" :alt="service.name">
					
					</div>
					

					<div class="col-md-12">

						<div class="product-desc">{{ service.desc }}</div>
						
						<hr>
						<div class="product-price">$ {{ service.price }}</div>
						<div class="product-stock">عدد مرات الشراء</div>
						<hr>
						<div class="btn-group cart">
							<button type="button" class="btn btn-success">
								طلب هذه الخدمة 
							</button>
						</div>
						<div class="btn-group wishlist">
							<button type="button" class="btn btn-danger">
								اضف الى المفضلة 
							</button>
						</div>
					</div>
				</div> 
			</div>
			<div class="container-fluid">		
				<div class="col-md-12 product-info">
						<ul id="myTab" class="nav nav-tabs nav_tabs" style="padding-right:0">
							
							<li class="active"><a href="#service-one" data-toggle="tab">خدماتى فى نفس القسم</a></li>
							<li><a href="#service-two" data-toggle="tab">خدمات اعضاء فى نفس القسم</a></li>
							
						</ul>
					<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="service-one">
							 	
							 	<div class="row">

								 	<div v-for="service in myOtherService" track-by="$index" class="col-sm-6 col-md-4">
									
										<single-service :service="service"></single-service>

									</div>
								</div>
											  
							</div>
							
							<div class="tab-pane fade" id="service-two">

								<div class="row">

									<div v-for="service in otherService" track-by="$index" class="col-sm-6 col-md-4">
									
										<single-service :service="service"></single-service>

									</div>
								</div>
							</div>
						

					</div>
					<hr>
				</div>
			</div>
			</div>
		

		</div>

	


	</div>





</template>


<script type="text/javascript">
	
	import singleService from './SingleService.vue'


	export default{

		components:{
			singleService
		},

		data(){
			return {

				service:{},
				isLoading:false,
				myOtherService:{},
				otherService:{},

			};

		},
		created(){
			this.getServiceById();
		},

		methods:{
			getServiceById(){
				var id = this.$route.params.id;

				this.isLoading = false;

				axios.get('/services/' + id).then( (response)=>{

					console.log(response.data);
					this.service = response.data.service;
					this.myOtherService = response.data.myOtherService;
					this.otherService = response.data.OtherService;
					this.isLoading = true;

				}, ()=>{

				});

			}
		},

		watch:{

			'$route': 'getServiceById'

	    }
	}

</script>

<style scoped>
	

.gold{
	color: #FFBF00;
}

/*********************************************
					PRODUCTS
*********************************************/

.product{
	border: 1px solid #dddddd;
	height: 321px;
}

.product>img{
	max-width: 230px;
}

.product-rating{
	font-size: 20px;
	margin-bottom: 25px;
}

.product-title{
	font-size: 20px;
}

.product-desc{
	font-size: 14px;
}

.product-price{
	font-size: 22px;
}

.product-stock{
	color: #74DF00;
	font-size: 20px;
	margin-top: 10px;
}

.product-info{
		margin-top: 50px;
}

/*********************************************
					VIEW
*********************************************/

.content-wrapper {
	max-width: 1140px;
	background: #fff;
	margin: 0 auto;
	margin-top: 25px;
	margin-bottom: 10px;
	border: 0px;
	border-radius: 0px;
}

.container-fluid{
	max-width: 1140px;
	margin: 0 auto;
}

.view-wrapper {
	float: right;
	max-width: 70%;
	margin-top: 25px;
}

.container {
	padding-left: 0px;
	padding-right: 0px;
	max-width: 100%;
}

/*********************************************
				ITEM 
*********************************************/

.service1-items {
	padding: 0px 0 0px 0;
	float: left;
	position: relative;
	overflow: hidden;
	max-width: 100%;
	height: 321px;
	width: 130px;
}

.service1-item {
	height: 107px;
	width: 120px;
	display: block;
	float: left;
	position: relative;
	padding-right: 20px;
	border-right: 1px solid #DDD;
	border-top: 1px solid #DDD;
	border-bottom: 1px solid #DDD;
}

.service1-item > img {
	max-height: 110px;
	max-width: 110px;
	opacity: 0.6;
	transition: all .2s ease-in;
	-o-transition: all .2s ease-in;
	-moz-transition: all .2s ease-in;
	-webkit-transition: all .2s ease-in;
}

.service1-item > img:hover {
	cursor: pointer;
	opacity: 1;
}

.service-image-left {
	padding-right: 50px;
}

.service-image-right {
	padding-left: 50px;
}

.service-image-left > center > img,.service-image-right > center > img{
	max-height: 155px;
}


</style>