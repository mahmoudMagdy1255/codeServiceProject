<template>
	<div>


		<span v-if ="messages.length > 0">

			<div class="alert alert-danger">
				
				<a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>

				<b>خطأ </b>

				<ol>
						
					<li v-for="message in messages[0]">
						{{ message }}
					</li>

				</ol>

			</div>
			

		</span>

		<div class="form-group">
			
			<label>اسم الخدمة</label>
			<input type="text" name="name" id="name" v-model="name" class="form-control">

		</div>

		
		<div class="form-group">
			
			<label>صورة الخدمة</label>
			<input type="file" ref="file">

			<span class="help-block">
				يبجب ان تكون الصورة اكثر من 300 بكسل طول و عرض و اقل من 1000 بكسل طول و عرض
			</span>

		</div>

		<div class="form-group">
			
			<label>وصف الخدمة</label>
			<textarea rows="10" name="desc" id="desc" v-model="desc" class="form-control">
				
			</textarea>
		</div>


		<div class="form-group">
			
			<label>القسم</label>
			<select name="cat_id" id="cat_id" v-model="cat_id" class="form-control">
				<option value="1">
					القسم الاول
				</option>
			</select>

		</div>

		<div class="form-group">
			
			<label>السعر</label>
			<input type="text" name="price" id="price" v-model="price" class="form-control">

		</div>

		<div class="form-group">
			
			<input @click="AddService" type="submit" class="btn btn-default" value="اضف الخدمة">

		</div>

	</div>


</template>

<script type="text/javascript">
	
	export default{

		data(){
			return {

				name:"",
				desc:"",
				cat_id:"",
				price:"",
				messages:[]
			};
		},
		methods:{

			AddService(){

				var formData = new FormData();

				formData.append('name' , this.name);
				formData.append('desc' , this.desc);
				formData.append('cat_id' , this.cat_id);
				formData.append('price' , this.price);
				formData.append('image' , this.$refs.file.files[0] );

				this.sendData(formData);

			},

			sendData(formData){
				
				this.messages = [];

				axios.post('services' , formData).then( response => {

					console.log(response);

					this.name = '';
					this.desc = '';
					this.cat_i = '';
					this.price = '';
					this.cat_id = '';

					if ( response.data == 'done' ) {

						

						alert('تم اضافة الخدمة بنجاح  جارى انتظار الموافقة عليها من الادارة');
					}

				}).catch( (errors) => {
					console.log( errors.response.data.errors);
					this.messages.push( errors.response.data.errors );

				});

			}

		}

	}

</script>