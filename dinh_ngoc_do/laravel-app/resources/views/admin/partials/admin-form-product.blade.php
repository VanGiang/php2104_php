<div class="card-body">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
      @csrf

      @if ($method == 'PUT')
        @method('PUT')
      @endif
      <div class="row">
        <div class="col-sm-12">
          <!-- select -->
          <div class="form-group">
            <label>Category</label>
            <select class="custom-select" name="category_id">
            @foreach ($categories as $categoryId => $category)
              <option value="{{ $categoryId }}" @if ($categoryId == @$product->category_id) selected @endif>
                {{ $category }}
              </option>
            @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" value="{{ @$product->name }}" placeholder="Enter product name..." require>
            @foreach ($errors->get('name') as $message)
            <p style="color:red;">{{ $message }}</p>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label>Title</label>
            <input name="title" type="text" class="form-control" value="{{ @$product->title }}" placeholder="Enter product title...">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">
                    @if (isset($product))
                        {{ $product->image }}
                    @else
                        Choose file
                    @endif
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- textarea -->
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" value="" rows="3" placeholder="Enter product description...">{{ @$product->description }}</textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label>Price</label>
            <input name="price" type="text" class="form-control" value="{{ @$product->price }}" placeholder="Enter product price...">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label>Quantity</label>
            <input name="quantity" type="text" class="form-control" value="{{ @$product->quantity }}" placeholder="Enter product quantity...">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- checkbox -->
          <div class="form-group">
            <div class="form-check">
              <input name="is_public" class="form-check-input" type="checkbox" value="1"
              @if (@$product->is_public) checked @endif>
              <label class="form-check-label">Public</label>
            </div>
          </div>
        </div>
      </div>
      <input type="submit" value="Save Product" class="btn btn-primary">
    </form>
</div>

@section('script-image-product')
<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  });
</script>
@endsection
