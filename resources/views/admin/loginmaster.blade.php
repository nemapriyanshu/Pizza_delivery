<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
  a{
    text-decoration: none;
  }
</style>


<div class=" container bg-light" >

    <!-- Just an image -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/">
      <img src="{{asset('useimage/i1.jpg')}}" width="75" height="75" style="border-radius: 50%">
    </a>
    <div>
      <span class="h6">{{session('email')}}</span>
      <a href="{{url('menu')}}" class="px-4 nav-bar">Menu</a>
      <a href="{{url('card')}}" class="px-4 h5 nav-bar"><i class="bi bi-cart-check-fill">{{session('totalitems')}}</i> </a>
      <a href="#" class="px-4 nav-bar">Profile</a>
    <a href="{{url('logout')}}" class="btn btn-outline-secondary">logout</a>
    </div>
    
  </nav>

</div>
