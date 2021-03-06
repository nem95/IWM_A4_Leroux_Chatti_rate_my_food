<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class ReviewController extends Controller
{

    public function __construct() {

        $this->middleware('isAdmin')->only('changeStatus', 'moderation');

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
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required',
            'rating' => 'required',
            'comment' => 'required',
            'restaurant_id' => 'required'
        ]);

        $review = new Review;
        $input = $request->input();
        $input['status'] = 'pending';

        $review->fill($input)->save();

        Flashy::success('Votre commentaire a bien été pris en compte');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('reviews.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
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

        $this->validate($request, [
            'price' => 'required',
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $review = Review::findOrFail($id);
        $input = $request->input();
        $review->fill($input)->save();

        Flashy::success('Le commentaire a bien été modifié');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        Flashy::success('Avis supprimé');
        return redirect()->back();
    }

    public function moderation() {

        return view('reviews.moderation');
    }

    public function changeStatus(Request $request, $id) {

        $review = Review::findOrFail($id);
        $review->status = $request->status;
        $review->save();


        Flashy::success('Statut changé avec succès');
        return redirect()->back();
    }
}
