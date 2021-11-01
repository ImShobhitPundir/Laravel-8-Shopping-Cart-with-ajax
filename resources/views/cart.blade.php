@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('layouts.header', [
    'heading' => 'Your Cart',
    'description' => 'Products in your cart'
])  


  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
          <form action="{{ route('checkout') }}" method="post">
            @csrf
            <table class="table">
                <tr>
                    <th>S.No.</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                @php
                    $count = 1
                @endphp
                @if($cart_total)
                    @foreach($cart_list as $product)
                        <tr>
                            <td>{{ $count }}</td>
                            <td><img src="{{ $product->attributes->image }}" width="50px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->quantity*$product->price }}</td>
                        </tr>  
                        @php
                            $count++
                        @endphp      
                    @endforeach
                    <tr>
                        <th colspan="3"></th>
                        <th>Total</th>
                        <th>Rs. {{ $cart_total }}</th>
                    </tr>  
                    <tr>
                        <td colspan="4"></td>
                        <th><button class="btn btn-primary" type="submit">Buy Now</button> </th>
                    </tr>  
                @else
                    <tr>
                        <td colspan="5" class="text-center">Cart is Empty</td>
                    </tr>                 
                @endif

                
            </table>
        </form>

    </div>
</div>
</div>

@endsection