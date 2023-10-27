<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportFees;

class TransportFeesController extends Controller
{
    public function index ()
    {
    	$userId = session('user_id');
        $place = TransportFees::where('user_id', $userId)->get();
    	return view('project.transport_fees' , compact('place'));
    }

    public function store (Request $request)
    {
    	$request->validate([
        'place_name' => 'required',
        'fees' => 'required|numeric',
    ]);
    // create a new place instance and store data
    $place = new TransportFees;
    $place->place_name = $request->input('place_name');
    $place->fees = $request->input('fees');

    $place->user_id = session('user_id');
    $place->save();

    return redirect('/transport_fees');
    }

    public function delete (Request $request, $id)
    {
    	$place = TransportFees::find($id);

        $place->delete();

        return redirect('/transport_fees');
    }

}
