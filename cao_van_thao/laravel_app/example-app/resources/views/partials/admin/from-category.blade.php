<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($method == 'PUT')
        @method('PUT')
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="" placeholder="Name..." value="{{ old('name', @$categories->name) }}">
        </div>
        @foreach ($errors->get('name') as $message)
            <div class="alert-danger">
                <ul>
                    <li>{{ $message }}</li>
                </ul>
                </div>
        @endforeach
        <div class="form-check">
            <input type="checkbox" name="is_public" class="form-check-input" id="exampleCheck1" value="1"
            @if (@$categories->is_public)
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