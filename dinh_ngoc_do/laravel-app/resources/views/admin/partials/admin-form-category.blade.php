<div class="card-body">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
      @csrf

      @if ($method == 'PUT')
        @method('PUT')
      @endif
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" value="{{ @$category->name }}" placeholder="Enter category name..." require>
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
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">
                    @if (isset($category))
                      {{ $category->image }}
                    @else
                      Choose File
                    @endif
                </label>
              </div>
            </div>
            @foreach ($errors->get('image') as $message)
            <p style="color:red;">{{ $message }}</p>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- checkbox -->
          <div class="form-group">
            <div class="form-check">
              <input name="is_public" class="form-check-input" type="checkbox" value="1" 
              @if (@$category->is_public) checked @endif>
              <label class="form-check-label">Public</label>
            </div>
          </div>
        </div>
      </div>
      <input type="submit" value="Save Category" class="btn btn-primary">
    </form>
</div>

@section('script-image-name')
<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  });
</script>
@endsection