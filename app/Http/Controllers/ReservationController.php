<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request){
        $this->validate($request, [
            'name'        => 'required',
            'phone'       => 'required',
            'email'       => 'required',
            'dateandtime' => 'required',
            //'message' => 'required',
        ]);

       /*
       $reservation = Reservation::create([
            'name'        => $request->input('name'),
            'phone'       => $request->input('phone'),
            'email'       => $request->input('email'),
            'dateandtime' => $request->input('dateandtime'),
            'message'     => $request->input('message'),
            'status'      => false,
            Toastr::success('Votre reservation a été envoyé avec success. Nous allons vous envoyé une confirmation', 'Success', ["positionClass" => "toast-top-center"]),
        ]);
       */

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();

        Toastr::success('Votre reservation a été envoyé avec success. Nous allons vous envoyé une confirmation', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
