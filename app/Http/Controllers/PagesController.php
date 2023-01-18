<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Manual;
use Illuminate\Http\Request;
use App\Models\Type;

class PagesController extends Controller
{
    Public function viewAdmin()
    {
        $brand = Brand::All()->sortBy('name');
        $types = Type::All();
        $manuals = Manual::All();
        return view('pages.adminpage', [
            "brand"=>$brand,
            "types"=>$types,
            "manuals"=>$manuals
        ]);
    }

    public function store(Request $request)
    {
        //validate input
        $request->validate([
            'brands' => 'required',
            'manual_name' => 'required',
            'link' => 'required'
        ]);

        //create a new manual in db

        $type = new Type();
        $type->name = $request->manual_name;
        $type->brand_id = $request->brands;
        $type->save();

        $manual = new Manual();
        $manual->filesize = 0;
        $manual->originURL = $request->link;
        $type->manuals()->save($manual);



        //redirect user and send message

        return redirect('/adminpage')->with('Gelukt!','Manual succesvol toegevoegd');

    }
}
