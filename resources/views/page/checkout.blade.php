@include('admin.loginmaster')

<div class="container">
    <h1>Check Out</h1>

 <form action="{{url('checkdone')}}" method="get">
    <div>
        <h5>Credit card</h5>

        @if (Session::has('success'))
        <div class="alert alert-success col-8 font-width-bold">
            {{ Session::get('success')}}
        </div>
        <a href="{{url('menu')}}" class="btn btn-dark btn-lg">Go an order for some more</a>
               
        @else
        <span class="text-danger font-weight-bold"> @error('checkout') {{$message}}  @enderror </span>
      <input type="text" name="checkout" id="" class="form-control col-6">
      
    <div class="my-2 h5">
        Order Total :  {{$id}}
    </div>

    <input type="submit" value="Place order" class="btn btn-dark btn-lg">
            
        @endif

    </div>

 </form>

 


</div>