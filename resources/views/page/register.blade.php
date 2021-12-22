@include('admin.master')

<div class="container mt-5">
    <h1>Register</h1>
    <form action="registerdone" method="post"> @csrf
     <div class="form-group">
         <span class="text-danger font-weight-bold"> @error('email') {{$message}}  @enderror </span>
        <input type="text" name="email" class="form-control"  placeholder="Email">
     </div>
       
     <div class="form-group">
        <span class="text-danger font-weight-bold"> @error('password') {{$message}}  @enderror </span>
        <input type="text" name="password" class="form-control" placeholder="Password">
     </div>
       
       
     <div class="form-group">
        <span class="text-danger font-weight-bold"> @error('name') {{$message}}  @enderror </span>
        <input type="text" name="name"  class="form-control"  placeholder="Name">
     </div>
       
       
     <div class="form-group">
        <span class="text-danger font-weight-bold"> @error('mobile') {{$message}}  @enderror </span>
        <input type="text" name="mobile" class="form-control"  placeholder="Mobile">
     </div>
       
       
       
     <div class="form-group">
        <span class="text-danger font-weight-bold"> @error('address') {{$message}}  @enderror </span>
         <textarea name="address"  cols="30" rows="5" class="form-control" placeholder="Delivery Address"></textarea>
     </div>
       
     <div class="form-group">
         <input type="submit" value="Sign Up" class='btn btn-dark'>
     </div>
     
    </form>
</div>