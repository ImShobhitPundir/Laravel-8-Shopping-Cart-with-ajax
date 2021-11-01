<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
      
        </ul>
        <form class="d-flex">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cart <span class="badge" id="badge" style="background-color:red; font-size: .55em; position: absolute;">{{ $cart_quantity }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:250px; left:-190px;">
              <li id="cart">
                  <table class="table">
                      @if($cart_total)
                        @foreach($cart_list as $data)
                        <tr>
                            <td> <img src="{{ $data->attributes->image }}" width="30px" height="25px"> </td>
                            <td>
                                <span>{{ $data->name }}</span> </br>
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
                      @else
                      <tr>
                        <td colspan="2">Cart is Empty </td>
                      </tr>
                      @endif
                  </table>
                </div>
           
            </ul>
          </li>
        </form>
      </div>
    </div>
  </nav>
