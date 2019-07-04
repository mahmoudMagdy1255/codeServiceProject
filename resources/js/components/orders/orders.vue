<template>

		<div class="row">
			
			<div class="col-lg-2">
				
				<span v-if="order.status == 0">
					
					<span class="label label-info">
						طلب جديد
					</span>

				</span>


				<span v-if="order.status == 1">
					
					<span class="label label-info">
						طلب قديم
					</span>

				</span>


				<span v-if="order.status == 3">
					
					<span class="label label-danger">
						طلب منتهى
					</span>

				</span>


				<span v-if="order.status == 2">
					
					<span class="label label-warning">
						طلب قيد التنفيذ
					</span>

				</span>


				<span v-if="order.status == 4">
					
					<span class="label label-success">
						طلب منتهى
					</span>

				</span>

			</div>

			<div class="col-lg-2">{{ order.created_at }}</div>
			<div class="col-lg-2">
				<router-link :to="{name:'User' , params:{id:user.id}}">
					{{ user.name }}
				</router-link>
			</div>
			<div class="col-lg-5">
				<b> 
					<router-link :to="{name:'Order' , params:{id:order.id}}">
						{{ order.services.name }}
					</router-link>
				</b>
			</div>
			<div class="col-lg-1">{{ order.id }}</div>
		</div>

</template>

<script type="text/javascript">
	
	export default{
		props:['order' , 'user'],
	}

</script>