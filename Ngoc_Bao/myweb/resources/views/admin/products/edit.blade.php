<x-admin>
    <form action="{{ route('products.update',['product'=>$product->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="content" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <div class="card ">
            <div class="card-header text-center">
            <h1 class="">Edit Product</h1>
            </div>
            <!-- Main content -->
            <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <img src="{{ $product->image }}" class="product-image" alt="Product Image">
                    </div>
                    <!-- <div class="col-12 product-image-thumbs"><div class="product-image-thumb active"><img src="/themes/adminlte/dist/img/prod-1.jpg" alt="Product Image"></div><div class="product-image-thumb"><img src="/themes/adminlte/dist/img/prod-2.jpg" alt="Product Image"></div><div class="product-image-thumb"><img src="/themes/adminlte/dist/img/prod-3.jpg" alt="Product Image"></div><div class="product-image-thumb"><img src="/themes/adminlte/dist/img/prod-4.jpg" alt="Product Image"></div><div class="product-image-thumb"><img src="/themes/adminlte/dist/img/prod-5.jpg" alt="Product Image"></div></div> -->
                    </div>
                    <div class="col-12 col-sm-6">
                    <h1 class="my-3">
                        <input type="text" name="name" value="{{ $product->name }}">
                    </h1>
                    <div class="mt-4">
                        <span class="text-left mr-4">
                        <a href="#" class="mr-2">{{ $product->rate }}</a> 
                        @for ($i=0; $i<$product->rate; $i++) 
                        <span class="far fa-star"></span> 
                        @endfor 
                        </span>
                        <span class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">{{ $product->sold }}&ensp; <span style="color: #bbb;">Sold</span>
                        </a>
                        </span>
                        <span class="text-left mr-4">
                            <input type="text" name="sale_off" value="{{ $product->sale_off }}" style="max-width: 30px; text-align: center;">%&ensp; 
                            <span style="color: #bbb;">Sale Off</span>
                        </span>
                    </div>
                    <div class=" mt-4">
                        <span style="color: #bbb;">Price</span>
                        <h2 class="mb-0"> $ <input type="text" name="price" value="{{ $product->price }}">
                        </h2>
                    </div>
                    <div class=" mt-4">
                        <span style="color: #bbb;">Category</span>
                        <h4 class="mb-0">
                            
                            <input type="text" name="category_id" value="{{ $product->category->id }}" >
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                  <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                    @foreach ($categories as $category)
                                        <li>{{$category->name}}</li>
                                    @endforeach
                                  
                                </ul>
                            </div>
                        </h4>
                    </div>
                    <div class=" mt-4">
                        <span style="color: #bbb;">Profile Creator</span>
                        <h4 class="mb-0">
                        <a href="{{ route('profile-single-ms.show', ['product' => $product->user->id]) }}">
                            {{ $product->user->name }}
                        </a>
                        </h4>
                    </div>
                    
                    <hr>
                    <span style="color: #bbb;">is public</span>
                    <h5>
                        <input type="text" name="is_public" value="{{ $product->is_public }}">
                    </h5>
                    <span style="color: #bbb;">Description</span>
                    <h5>
                        <input type="text" name="description" value="{{ $product->description }}" style="min-width: 600px;min-height: 80px">
                    </h5>

                    <button type="submit" class="btn btn-warning" style="margin: 20px 20px">confirm change</button>
                    </div>
                    
                </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
    </form>
  </x-admin>