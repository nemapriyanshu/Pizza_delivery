@include('admin.master')

{{session('email')}}


<div class="container mt-5">
    <h1>Login</h1>
   
    <form action="logindone" method="post"> @csrf
     <div class="form-group">
        <span class="text-danger font-weight-bold"> @error('email') {{$message}}  @enderror </span>
        <span class="text-danger font-weight-bold">
            @if (Session::has('error'))
            {{Session::get('error')}}
        @endif
        </span>
        <input type="text" name="email" id="" class="form-control" placeholder="Email">
     </div>
       
     <div class="form-group">
        <span class="text-danger font-weight-bold"> @error('password') {{$message}}  @enderror </span>
        <input type="text" name="password" id="" class="form-control" placeholder="Password">
     </div>
       
     <div class="form-group">
         <input type="submit" value="Login" class='btn btn-dark'>
     </div>

    </form>
</div>