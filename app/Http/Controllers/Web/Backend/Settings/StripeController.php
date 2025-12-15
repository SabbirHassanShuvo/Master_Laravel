<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use Illuminate\Http\Request;
use App\Models\StripeSetting;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
     // Show the Stripe settings form
    public function edit()
    {
        $sandbox = StripeSetting::where('stripe_type', 'sandbox')->first();
        $production = StripeSetting::where('stripe_type', 'production')->first();
        return view('backend.layouts.settings.stripe', compact('sandbox', 'production'));
    }

    // Save Stripe settings
    public function update(Request $request)
    {
        $validated = $request->validate([
            'stripe_type'    => 'required|string|in:sandbox,production',
            'publish_key'    => 'required|string',
            'secret_key'     => 'required|string',
            'webhook_secret' => 'nullable|string',
        ]);

        // Check existing setting by type
        $setting = StripeSetting::where('stripe_type', $validated['stripe_type'])->first();

        // Create new if not exists
        if (!$setting) {
            $setting = new StripeSetting();
            $setting->stripe_type = $validated['stripe_type'];
        }

        // Assign values
        $setting->publish_key    = $validated['publish_key'];
        $setting->secret_key     = $validated['secret_key'];
        $setting->webhook_secret = $validated['webhook_secret'] ?? null;

        // Save data
        $setting->save();

        return redirect()
            ->route('payment-gateway.edit')
            ->with('success', 'Stripe settings updated successfully.');
    }

    // // createPayment method for testing purpose
}
