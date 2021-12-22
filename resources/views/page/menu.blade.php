@include('admin.loginmaster')

    
<div class="container">
    <h1>Menu</h1>
    <div class="row">

        
@foreach ($data as $item)

        <div class="col-lg-4 my-2 col-sm-6" >

            <div class="border text-center pb-3 pt-2">
                <img src="menuimage/{{$item->image}}" alt="" style="border-radius: 20px" width="250px" height="250px">
                <h2 class="text-center py-3">{{$item->name}}</h2>
                <div class="row">
                    <div class="col-6">
                        <a href="menu/{{$item->id}}" class=" btn btn-dark">Add to Card</a>
                    </div>
                    <h2 class="col-6 text-dark">&#8377;{{$item->price}}</h2>
                </div>
            </div>
        </div>
       
        @endforeach

   

        
    </div>
</div>