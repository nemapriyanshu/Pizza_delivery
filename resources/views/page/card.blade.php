@include('admin.loginmaster')

@php
    $totalcheckout=0;
@endphp

<div class="container">
    <h1>Shopping Card</h1>
    <div class="container">
        <table class="table">
            
@foreach ($answer as $item)
@php
    $total=0
@endphp
            <tr class="">
                <td class=""><img src="menuimage/{{$item->image}}" width="75x" height="75px" style="border-radius: 50%" alt=""></td>
                <td class="">{{$item->name}}</td>
                <td class="">&#8377;{{$item->price}}</td>
                <td class=""><input type="disabled" disabled name="" value="{{$item->total}}" id="" class="form-control col-5"></td>
                @php
                $total=$item->price*$item->total;
                    $totalcheckout=$totalcheckout+$total;
                @endphp
                 <td class=""> &#8377;{{$total}}</td>
                <td><a href="card/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
@endforeach
            <tr>
                <td colspan="5" class="text-right h2">Total price = &#8377;  <span>{{$totalcheckout}}</span></td>
                <td><a href="checkout/{{$totalcheckout}}" class="btn  btn-dark">Checkout ></a></td>
            </tr>
        </table>
    </div>

</div>