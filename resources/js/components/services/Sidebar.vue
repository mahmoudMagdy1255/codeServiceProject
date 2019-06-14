<template>
	<div>
			
		<router-link :to="{name:'User' , params:{id:service.user.id}}">

			<i class="fa fa-user"></i>
			{{ service.user.name  }}

		</router-link>	

		<br> 

		<button class="btn btn-info">
			<i class="fa fa-paper-plane" aria-hidden="true"></i>
			ارسال رسالة
		</button>

	</div>
</template>

<script type="text/javascript">
	
	export default{
		props:["service"]
	}

</script>