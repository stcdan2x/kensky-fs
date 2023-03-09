<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller {
    // apply policy
    public function __construct() {
        // able to apply Listing policy to all actions since this is a resource controller using default actions:
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->notSold()
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        /** sample policy implementation:
         * 
         * $this->authorize('create', Listing::class);  // specify full class name  
         * 
         */

        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // $request->user() or Auth::user() to get the current user
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing) {
        /** sample policy implementation:
         * 
         * if (Auth::user()->cannot('view', $listing)) {
         *      abort(403);
         * }
         * 
         * OR simply:         * 
         * $this->authorize('view', $listing);
         */

        // load images - listing relationship
        $listing->load(['images']);
        
        // $offer = $listing->offers->where('bidder_id', Auth::user()?->id);
        $offer = Auth::user() ? $listing->offers()->byCurrentUser()->first() : null;

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
                'offer' => $offer
            ]
        );
    }

    public function edit(Listing $listing) {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(Request $request, Listing $listing) {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was changed!');
    }


    public function destroy(Listing $listing) {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'OBSOLETE Listing was deleted!');
    }
}
