<template>
	<div class="col-lg-12">
		
		<div v-if="isLoaded">

				<span class="pull-right">
					
					<i class="fa fa-user"></i>
طلبات الشراء الخاصة بالعضو 
					{{ user.name }}

				</span>


				<span class="pull-left">
					
					<i class="far fa-clock"></i>
				{{ user.created_at }}

				</span>

				<div class="clearfix"></div>

				<div class="alert alert-warning">
					
					<span>انت لديك  {{ orders.length }} طلب على الموقع</span>

				</div>

				<div class="clearfix"></div>

					<div class="pull-right col-lg-6">

						<div class="btn-group">


							<button class="btn btn-info" @click="ordersFilter('0')">جديد</button>
							<button class="btn btn-info" @click="ordersFilter('1')">قديم</button>
							<button class="btn btn-info" @click="ordersFilter('4')">منتهى</button>
							<button class="btn btn-info" @click="ordersFilter('3')">ملغى</button>
							<button class="btn btn-info" @click="ordersFilter('2')">قيد التنفيذ</button>
							<button class="btn btn-info" @click="ordersFilter('')">كل الطلبات</button>

						</div>

					</div>

			
				<div class="clearfix"></div>

				<br>				
				<br>

			
				<div class="row">

					<div class="col-lg-2">حالة الطلب</div>
					<div class="col-lg-2">انشء فى</div>

					<div class="col-lg-2">مقدم الخدمة</div>
					<div class="col-lg-5"><b>اسم الخدمة</b></div>

					<div class="col-lg-1">رقم العملية</div>
					
				</div>

				<hr>
		
	
				<div  v-if="orders.length > 0">
						<div v-for="order in filterOrders">
							
							<orders :order="order"></orders>
							<hr>								

						</div>

				</div>

					<div v-else>

						<tr>
							<td>لا يوجد اى طلبات</td>
						</tr>
					</div>

		</div>

		<div v-else>
			<div class="text-center">
				<b>	
					جارى التحميل	
				</b>
			</div>
		</div>

	</div>

</template>

<script type="text/javascript">
	

	var alert = require('vue-strap').alert;


	import orders from './orders.vue';

	export default{
		components: {
		    alert,
		    orders
		 },
		data(){
			return {

				isLoaded:false,
				orders:{},
				user:{},
				filterKey:'',
				reverse:1,
			};
		},
		created(){
			this.getMySendOrders();
		},

		methods:{

			getMySendOrders(){
				axios.get('/orders/get-my-send-orders').then((response)=>{

					this.isLoaded = true;
					this.orders = response.data.orders;
					this.user = response.data.user;

					console.log(this.orders);

				},(error)=>{

					this.isLoaded = false;
					alert('Errooooor');

				});
			},

			ordersFilter(filterKey){



				if ( this.filterKey == filterKey) {

					this.reverse = -1 * this.reverse;

				}else {

					this.reverse = 1;					
				}

				this.filterKey = filterKey;


				if ( this.reverse == -1 ) {

					this.orders = _.orderBy(this.orders, 'status').reverse();

				}
			}

		},
		computed:{
			filterOrders() {


				if (this.filterKey) {

					return this.orders.filter((order)=>{

						return order.status == this.filterKey;

					});					
				}

				return this.orders;
			},
					
		}

	}

</script>