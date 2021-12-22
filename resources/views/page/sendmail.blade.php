
@php
use App\Models\menu;
      $temp=DB::select(DB::raw("SELECT cardid as total,count('cardid') as count from carddetails group BY cardid"));
        // return $temp;
        $arr=array();

        foreach($temp as $t)
        {
            $nameofitems=menu::where('id',$t->total)->first()->name;
            $arr["$nameofitems"]=$t->count;
        }
        $arr['price']=456;
        $array = (array) $arr;
      

@endphp



<table border="1"> 
    @foreach ($array as $item=>$price)
    <tr>
        <td>
            {{$item}}
        </td>
        <td> 
            {{$price}}
        </td>
    </tr>
    @endforeach
</table>