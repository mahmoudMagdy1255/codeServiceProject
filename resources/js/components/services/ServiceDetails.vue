<template>
	
	<div class="thumbnail" >
		555555555555555555555555555555555			
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