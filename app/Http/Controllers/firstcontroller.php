<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\pizzadata;
use App\Models\menu;
use App\Models\carddetail;
use session;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class firstcontroller extends Controller
{
    
    public function index()
    {
            return view('page.index');
    }


    public function register()
    {
        return view('page.register');
    }


    public function registerdone(Request $req)
    {
        $valid=$req->validate([
            'email'=>'required|unique:pizzadatas',
            'mobile'=>'required',
            'name'=>'required',
            'password'=>'required|min:2',
            'address'=>'required|min:5|max:100'

        ]);
        if($valid)
        {
            $data=new pizzadata();
            $data->name=$req->name;
            $data->password=$req->password;
            $data->email=$req->email;
            $data->mobile=$req->mobile;
            $data->address=$req->address;
            $data->save();
            return redirect("login");
        }
        else
        {
            return "Error is there";
        }
    }


    public function login()
    {
        if(session('email'))
        return redirect('menu');
        return view('page.login');
    }

    public function logindone(Request $req)
    {
        $valid=$req->validate([
            'email'=>'required',
            'password'=>'required|min:2'

        ]);
        if($valid)
        {
            $data=pizzadata::where('email',$req->email)->first();
            if($data)
            {
                if ($data->password == $req->password)
                {   
                    session(['email'=>$req->email]);
                    session(['sid'=>$data->id]);

                    // card informationss

                    $card=carddetail::all()->where('userid',$data->id);
                
                    
                    session(['totalitems'=>count($card)]);

                    return redirect('menu');
                }
                else
                {
                    return back()->with("error","Password Not Matched");
                }
            }
            else
            {
                return back()->with("error","User not Register Go to Sign up");
            }
        }
        else
        {
            return "Error is there";
        }
    }



    public function logout()
    {
        session()->forget('email');
        session()->forget('sid');
        session()->forget('totalitems');
        return redirect('login');
    }


    public function menu()
    {
        $data=menu::all();
       
        return view('page.menu',compact('data'));

    }


    public function menuadd($id='null')
    {
        $data=new carddetail();
        $data->userid=session('sid');
        $data->cardid=$id;
        $data->save();
        
        $card=carddetail::all()->where('userid',session('sid'));
         session(['totalitems'=>count($card)]);
         session(['updatecard'=>$card->all()]);
        return redirect('menu');
    }



    public function card()
    {
       
        $card=collect(carddetail::all()->where('userid',session('sid')));
    
        $kk=collect($card)->groupBy('cardid')->map(function($row){
            return $row->count();
        });
        
        $answer=array();
        
        foreach ($kk as $item=>$ans)
        {
            $data=menu::all()->where('id',$item)->first();
            $data['total']=$ans;
            array_push($answer,$data);

        }
        return view('page.card',compact('answer'));
    }

/*
$data=sdf::where([fie=>sdf,sdf=>ksdj]);
*/

    public function deletecard($id=null)
    {
        $card=carddetail::all()->where('userid',session('sid'))->where('cardid',$id);
        foreach($card as $i)
        $i->delete();

        $card=carddetail::all()->where('userid',session('sid'));
         session(['totalitems'=>count($card)]);

        return redirect('card');
        
    }


    public function checkout($id=null)
    { 
        $eemail=trim(session('email'));
        
        Mail::to($eemail)->send(new MyTestMail($id));
        // return back()->with("sucsses","DONE ");
        return view("page.checkout",['id'=>$id ]);
    }


    public function checkdone(Request $req)
    {
            $validat= $req->validate([
                    'checkout'=>'required|min:12|max:15'
                ],
            [
                'required'=>"You card Info is required",
                'min'=>"please enter a valid card number"
            ]);

            if($validat)
            {
                $card=carddetail::all()->where('userid',session('sid'));
                foreach($card as $i)
                $i->delete();
                
                $card=carddetail::all()->where('userid',session('sid'));
                session(['totalitems'=>count($card)]);
       
                return back()->with("success","your will recive a notification by email with order details");
            }
    }


    function try()
    {
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
    
        return view('page.sendmail',compact('array'));
      
        //  return session('updatecard');
    }

}
