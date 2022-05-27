<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdController extends Controller
{
  public function create()
  {
    return view('create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => ['required', 'string', 'max:255'],
      'category_id' => ['required'],
      'description' => ['required'],
      'picture' => ['required'],
      'location' => ['required', 'string', 'max:255'],
      'price' => ['required', 'numeric'],
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
      'user_id' => Auth::user()->id
    ]);

    return redirect(route("ads"));
  }

  public function search(Request $request)
  {
    if ($request->query && $request->input('query') != "") {
      $query = $request->input('query');
      $adsq = Ad::where('title', 'LIKE', "%{$query}%")->orwhere('description', 'LIKE', "%{$query}%");
    } else {
      $query = "";
      $adsq = Ad::where('id', '<>', 0);
    }
    if (isset($request->category_id) && $request->category_id != NULL) {
      $adsq->where('category_id', '=', $request->category_id);
    }
    if (isset($request->location)) {
      $location = $request->input('location');
      $adsq->where('location', 'LIKE', "%{$location}%");
    }
    if (isset($request->min)) {
      $adsq->where('price', '>=', $request->min);
    }
    if (isset($request->max)) {
      $adsq->where('price', '<=', $request->max);
    }

    $ads = $adsq->latest()->get();
    return view('search', compact('ads', 'query'));
  }

  public function detail($id)
  {
    $ad = Ad::find($id);
    return view('detail', ['ad' => $ad]);
  }

  public function destroy($id)
  {
    Ad::find($id)->delete();
    return redirect(route('dashboard'));
  }
}
