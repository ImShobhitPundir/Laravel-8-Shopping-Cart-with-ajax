<table class="table">
    @foreach($cart_list as $data)
    <tr>
        <td> <img src="{{ $data->attributes->image }}" width="30px" height="25px"> </td>
        <td>
            <span class="text-sm">{{ $data->name }}</span> </br>
            <span class="text-warning">Qnt: {{ $data->quantity }}</span> | 
            <span class="text-danger">Price: Rs. {{ $data->price }}</span>  
        </td>  
    </tr>
    @endforeach
    <tr>
        <th>Total:</th>
        <th class="text-right">Rs. {{ $cart_total }}</th>
    </tr>
    <tr>
        <td colspan="2" style="text-align:right"> 
            <a href="{{ route('cart') }}"><button class="btn btn-primary" type="button">View Cart</button></a>
        </td>
    </tr>
</table>