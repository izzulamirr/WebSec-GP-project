<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;

use App\Models\Reservation;

use App\Models\User;

use App\Models\Foodchef;

use App\Models\StaffDuty;

class AdminController extends Controller


{
    //Users

    public function user()
    {
        $data=user::all();
        return view('admin.users',compact('data'));

    }

    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back();

    }


//staff

public function deleteduty($id)
{
    $dataa=StaffDuty::find($id);

    $dataa->delete();

    return redirect()->back();
}

public function updateduty($id)
{
    $dataa=StaffDuty::find($id);
    return view("admin.updateduty", compact("dataa"));
}


    public function viewstaff()
    {
        $dataa = StaffDuty::all();
        return view("admin.viewstaff",compact("dataa"));

    }

    public function uploadduty(Request $request)
    {
        $dataa = new StaffDuty;

        $dataa->name = $request -> name;
        $dataa->role = $request -> role;
        $dataa->shift = $request -> shift;
        $dataa->save();

        return redirect()->back();


    }

    public function updatee(Request $request, $id)
    {
        $dataa=StaffDuty::find($id);

        $dataa->name = $request -> name;
        $dataa->role = $request -> role;
        $dataa->shift = $request -> shift;
        $dataa->save();

        return redirect()->back();

    }








    //FoodMenu

    public function deletemenu($id)
    {
        $data=food::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function updateview($id)
    {
        $data=food::find($id);
        return view("admin.updateview", compact("data"));

    }

    public function update(Request $request, $id )
    {
        $data=food::find($id);

        $image = $request->image;

        $imagename = time().'.'. $image -> getClientOriginalExtension();

                $request -> image -> move('foodimage',$imagename);

                $data->image = $imagename;
                $data->title = $request -> title;
                $data->codeno = $request -> codeno;
                $data->description = $request -> description;
                $data->save();

                return redirect()->back();

    }

    public function foodmenu()
    {
        $data = food::all();
        return view('admin.foodmenu', compact("data"));

    }

    public function upload(Request $request)
    {
        $data = new food;

        $image = $request->image;

        $imagename = time().'.'. $image -> getClientOriginalExtension();

                $request -> image -> move('foodimage',$imagename);

                $data->image = $imagename;
                $data->title = $request -> title;
                $data->codeno = $request -> codeno;
                $data->description = $request -> description;
                $data->save();

                return redirect()->back();

    }


    public function index()
    {
        return view("");
    }

    public function redirects()
    {
        return view("admin.adminhome");
    }



    //Reservation

    public function reservation(Request $request)
    {
    $data = new reservation;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;

        $data->save();

        return view("payment");

    }

    public function viewreservation(Request $request)
    {
        $data = reservation::all();

        return view("admin.adminreservation", compact("data"));

    }


    //Chefs

public function viewchef()
{
  $data=foodchef::all();
    return view("admin.adminchef", compact("data"));
}


    public function uploadchef(Request $request)
    {
        $data= new Foodchef;

        $image= $request -> image;

        $imagename = time().'.'. $image -> getClientOriginalExtension();

        $request -> image -> move('chefimage',$imagename);

        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;

        $data-> save();

        return redirect()->back();

    }

public function updatechef($id){

    $data=foodchef::find($id);
    return view("admin.updatechef", compact("data"));
}

public function updatefoodchef(Request $request, $id){

   $data=foodchef::find($id);

    $image = $request->image;

    if($image){
        $imagename = time().'.'. $image -> getClientOriginalExtension();

        $request -> image -> move('chefimage',$imagename);

        $data->image = $imagename;

    }


            $data->name=$request->name;

            $data->speciality=$request->speciality;

            $data->save();

            return redirect()->back();
}

public function deletechef($id)
{
    $data=foodchef::find($id);

    $data->delete();
    return redirect()->back();
}


    public function viewcreditcard()
    {


        return view("creditcard");
    }


    public function viewqr()
    {


        return view("qrpayment");
    }




}
