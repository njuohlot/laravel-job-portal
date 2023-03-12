<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;


class ListingController extends Controller
{
    //fetch all listing

    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
        return view('listings.index', [
            'listings' => $listings,
        ]);
    }

    
     //single listing
     public function show(Request $request){
        $id = $request->id;
        $listing = Listing::find($id);
    if($listing){
        return view('listings.show', [
            'listing'=> $listing
            ]);
    }else{
        abort('404');
    }

    }

    //display create listing form

    public function create()
    {
        return view('listings.create');
    }

    //store listing

    public function store(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formData['user_id'] = auth()->id();

        Listing::create($formData);

        return redirect('/')->with('message', 'Listing save successfully');
    }
    //show listing edit form

    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing,
        ]);
    }
//update listings
    public function update(Request $request, Listing $listing)
    {
        if($listing->user_id != auth()->id){
            abort(403, 'Unauthorized action');
        }
        $formData = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $formData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formData);

        return back()->with('message', 'Listing updated successfully!');
    }
    //delete listings
    public function destroy(Listing $listing)
    {
        if($listing->user_id != auth()->id){
            abort(403, 'Unauthorized action');
        }
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
    //manage listings

    public function manage(){
        return view('listings.manage', [
            'listings' => auth()->user()->listing()->get()
        ]);

    }
}
