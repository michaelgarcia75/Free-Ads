<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class CrudAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::latest()->get();

        return view("ads.index", compact("ads"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ads.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'description' => ['required'],
            'picture' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        $newPictureName = time() . '-' . $request->title . '.' . $request->picture->getClientOriginalName();

        $request->picture->move(public_path('pictures'), $newPictureName);

        Ad::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'picture' => $newPictureName,
            'location' => $request->location,
            'price' => $request->price,
            'user_id' => $request->user_id
        ]);

        return redirect(route("ads.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        $user = User::where('id', $ad->user_id)->latest()->get();
        $userlogin = $user[0]["login"];
        return view("ads.show", compact("ad", "userlogin"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view("ads.edit", compact("ad"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'description' => ['required'],
            // 'picture' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        if (isset($request->picture)) {
            $newPictureName = time() . '-' . $request->title . '.' . $request->picture->getClientOriginalName();

            $request->picture->move(public_path('pictures'), $newPictureName);
            $ad->update(['picture' => $newPictureName,]);
        }
        $ad->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'user_id' => $request->user_id
        ]);

        return redirect(route("ads.show", $ad));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect(route('ads.index'));
    }
}
