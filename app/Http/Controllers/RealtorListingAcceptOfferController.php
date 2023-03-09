<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller {
    public function __invoke(Offer $offer) {
        // Accept selected offer
        // $offer->accepted_at = now(); $offer->save();
        $offer->update(['accepted_at' => now()]);

        // Reject all other offers
        $offer->listing->offers()->except($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with(
                'success',
                "Offer with ID:{$offer->id} accepted, other offers automatically rejected"
            );
    }
}
