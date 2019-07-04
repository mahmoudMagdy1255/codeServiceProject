<template>
	
	<div class="sidebar-nav">

		<div class="well" style="width:300px;padding:8px 0;">

			<ul class="nav nav-list">
				<li>
					<router-link :to="{name:'User' , params:{id:user.id}}"> <i class="fa fa-user"></i> {{ user.name }} </router-link>
				</li>
				<li class="divider"></li>
			</ul>
				
		</div>

	</div>

</template>

<script type="text/javascript">
	
	export default{
		props:['user']
	}

</script>