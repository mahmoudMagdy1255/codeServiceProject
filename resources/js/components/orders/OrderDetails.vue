<template>
	
	<div class="col-lg-12">


		<div class="row">


			<div class="col-lg-9 pull-right">
					
					<div v-if="isLoading">

						<div class="col-lg-12 col-md-12">
						

							<div class="content-wrapper">	
								<div class="item-container">	
									<div class="container">	

										<div class="col-md-12">
											<span class="product-title pull-right">
												{{ order.services.name }}  
												 
											</span>
											
											<span class="small pull-left"> <i class="far fa-clock"></i> {{ order.services.created_at }}</span>

											<div class="clearfix"></div>

											<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
										</div>

										<div class="col-md-12">
						                    
											<img id="item-display" class="img-responsive" :src="'/images/services/' + order.services.image" :alt="order.services.name">
										
										</div>
										

										<div class="col-md-12">

											<div class="product-desc">{{ order.services.desc }}</div>
											
											<hr>
											<div class="product-price">$ {{ order.services.price }}</div>
											<div class="product-stock">عدد مرات الشراء</div>
											<hr>
											<div>

												<button type="button" class="btn btn-danger">
													اضف الى المفضلة 
												</button>

											</div>
										</div>
									</div> 
								</div>
						

							</div>
						

						</div>
					</div>
					
					<span v-else class="pull-left">
						<div class="text-center">
							<b>	
								جارى التحميل	
							</b>
						</div>
					</span>

			</div>
			<div class="col-lg-3">
				<user-sidebar :user="user"></user-sidebar>
				<user-sidebar :user="user_order"></user-sidebar>
			</div>

		</div>	


	</div>



</template>


<script type="text/javascript">
	
	var spinner = require('vue-strap').spinner;
	import userSidebar from '../users/UserSidebar'
	export default{

		components:{
			spinner,
			userSidebar
		},

		data(){
			return {

				order:{},
				isLoading:false,
				user:{},
				user_order:{}
			};

		},
		created(){
			this.getorderById();
		},

		methods:{
			getorderById(){
				var id = this.$route.params.id;

				this.isLoading = false;

				axios.get('/orders/' + id).then( (response)=>{
					
					this.order = response.data.order;
					this.user = response.data.user;
					this.user_order = response.data.user_order;

					this.isLoading = true;
					
				}, ()=>{
					this.$router.push('/');
				});

			}
		},

		watch:{

			'$route': 'getorderById'

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

.order1-items {
	padding: 0px 0 0px 0;
	float: left;
	position: relative;
	overflow: hidden;
	max-width: 100%;
	height: 321px;
	width: 130px;
}

.order1-item {
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

.order1-item > img {
	max-height: 110px;
	max-width: 110px;
	opacity: 0.6;
	transition: all .2s ease-in;
	-o-transition: all .2s ease-in;
	-moz-transition: all .2s ease-in;
	-webkit-transition: all .2s ease-in;
}

.order1-item > img:hover {
	cursor: pointer;
	opacity: 1;
}

.order-image-left {
	padding-right: 50px;
}

.order-image-right {
	padding-left: 50px;
}

.order-image-left > center > img,.order-image-right > center > img{
	max-height: 155px;
}


</style>