<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller {
    public function __invoke(Offer $offer) {
        // apply policy to allow accepting offers only if allowed in the update policy
        $this->authorize('update', $offer->listing);

        // Accept selected offer
        // $offer->accepted_at = now(); $offer->save();
        $offer->update(['accepted_at' => now()]);

        $offer->listing->sold_at = now();
        $offer->listing->save();

        // Reject all offers except this current offer
        $offer->listing->offers()->except($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with(
                'success',
                "Offer with ID:{$offer->id} accepted, other offers automatically rejected"
            );
    }
}
