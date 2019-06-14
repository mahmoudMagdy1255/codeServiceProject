<template>
	

	<span>

		<alertDone :show.sync="done" :duration="duration" placement="top-right" type="success" width="400px" dismissable>
		  <span class="alert-icon-float-left" @click.prevent="done = !done"></span>
			<b> تم :</b>

			<span>طلب الخدمة بنجاح فى انتظار رد مقدم الخدمة

				<router-link :to="{name:'SendOrders'}">
					لعرض تفاصيل الخدمة
				</router-link>

			</span>

		</alertDone>

		<alertError :show.sync="error" :duration="duration" placement="top-right" type="danger" width="400px" dismissable>
		  <span class="alert-icon-float-left" @click.prevent="error = !error"></span>
			
			<b>لا يمكنك طلب هذه الخدمة</b>

		</alertError>

			
		<button  style="width:130px;float: initial;" :disabled="disabled" @click="addOrder()" class="col-md-12 btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> اشترى</button>



	</span>

</template>


<script type="text/javascript">

	var alert = require('vue-strap').alert;

	export default{
		props:['service_id'],	

		components: {
		    alertDone: alert,
		    alertError: alert,
		 },

		data(){
			return {

				error:false,
				done:false,
				disabled:false,
				duration:3000

			};
		},
		methods:{
			addOrder(){

				this.disabled = true;

				axios.post('orders' , {service_id:this.service_id}).then((response)=>{

					this.error = false;
					this.done = true;

				},(response)=>{
					this.error = true;
					this.done = false;
	
				});

				this.disabled = false;

			}
		}
	}

</script>