<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
		@csrf

		@if ($method == 'PUT')
			@method('PUT')
		@endif

		<div class="card-body">
			<div class="form-group" data-select2-id="44">
				<label>CATEGORY</label>
				<select class="form-control" name="categories_id">
					@foreach ($categories as $id => $category)
						<option value="{{ $id }}"
							@if ($id == @$product->categories_id)
								selected
							@endif
						>{{ $category }}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control" id="" placeholder="Name..." value="{{ old('name', @$product->name) }}">
				</div>
				@foreach ($errors->get('name') as $message)
					<div class="alert-danger">
						<ul>
							<li>{{ $message }}</li>
						</ul>
					</div>
				@endforeach
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description"  rows="5" placeholder="Enter Quantity...">{{ old('description', @$product->description) }}</textarea>
				</div>
				@if ($errors->has('description'))
				<div class="alert-danger">
					 <ul>
						<li>{{ $errors->first('description') }}</li>
					</ul>
				 </div>
				@endif
				<div class="form-group">
					<label for="">Price</label>
					<input type="text" name="price"  class="form-control" id="" placeholder="Price..." value="{{ old('price', @$product->price) }}">
				</div>
				@if ($errors->has('price'))
					<div class="alert-danger">
						<ul>
							<li>{{ $errors->first('price') }}</li>
						</ul>
					</div>
				@endif
				<div class="form-group">
					<label for="">Quantity</label>
					<input type="text" name="quantity"  class="form-control" id="" placeholder="quantity..." value="{{ old('quantity', @$product->quantity) }}">
				</div>
				@if ($errors->has('quantity'))
				<div class="alert-danger">
					 <ul>
						<li>{{ $errors->first('quantity') }}</li>
					</ul>
				 </div>
				@endif
				<div class="form-group">
					<label for="">Sale_off</label>
					<input type="text" name="sale_off"  class="form-control" id="" placeholder="%" value="{{ old('sale_off', @$product->sale_off) }}">
				</div>
				@if ($errors->has('sale_off'))
				<div class="alert-danger">
					 <ul>
						<li>{{ $errors->first('sale_off') }}</li>
					</ul>
				 </div>
				@endif
				<div class="form-group">
					<label for="exampleInputFile">File Image</label>
					<div class="input-group" name="image">
						<div class="custom-file">
							<input type="file" id="image" name="image" class="custom-file-input" id="exampleInputFile" >
							<label class="custom-file-label" for="exampleInputFile">
								@if (@$product->image_name)
									{{ $product->image_name }}
								@else
									Image file
								@endif

							</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text">Upload</span>
						</div>
					</div>
				</div>
				@if ($errors->has('image'))
				<div class="alert-danger">
					 <ul>
						<li>{{ $errors->first('image') }}</li>
					</ul>
				 </div>
				@endif
				<div class="form-check">
					<input type="checkbox" name="is_public" class="form-check-input" id="exampleCheck1" value="1"
					@if (@$product->is_public)
							checked
					@endif>
					<label class="form-check-label" for="exampleCheck1">Public</label>
				</div>
		</div>
        <!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
</form>

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#image').change(function() {
				$('.custom-file-label').html($('#image')[0].files[0].name);
			});
		});
	</script>
@endsection