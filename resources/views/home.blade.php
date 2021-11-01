@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('layouts.header', [
    'heading' => 'Home Products',
    'description' => 'Product Listed here!'
])  
<script>
    var i = 0;
    function addCart(id){
        $.ajax({
            data: {
                product_id: id,
                _token: '{!! csrf_token() !!}',
            },
            type: 'POST',
            url: "{{  route('add_to_cart') }}",
            success: function(data){
                $('#cart').html(data);
            }
        });
        ++i;
        const old_quantity = {{ $cart_quantity }};
        var q = old_quantity + i;
        $('#badge').html(q);
    }
</script>
<style>
    #cart span{
        font-size: 13px;
    }
</style>

  <div class="album py-5 bg-light">
    <div class="container">
        @if(session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
      <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3" style="margin-top:10px;">
          <div class="card shadow-sm">
            <img src="{{ $product->image }}" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">

            <div class="card-body">
              <p class="card-text">{{ $product->title }}</p>
              <p class="card-text sm text-danger">Rs. {{ $product->price }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary" value="{{ $product->id }}" onclick="addCart(this.value)">Add To Cart</button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
        

    </div>
</div>
</div>

@endsection