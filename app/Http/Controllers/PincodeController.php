<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PincodeController extends Controller
{
    public function showPincodeForm()
    {
        return view('pincode');
    }
    public function savePincode(Request $request)
    {

        $request->validate([
            'pincode1' => 'required|digits:1',
            'pincode2' => 'required|digits:1',
            'pincode3' => 'required|digits:1',
            'pincode4' => 'required|digits:1',
            'pincode5' => 'required|digits:1',
            'pincode6' => 'required|digits:1',
        ]);


        $pincode = $request->pincode1 . $request->pincode2 . $request->pincode3 . $request->pincode4 . $request->pincode5 . $request->pincode6;


        session(['pincode' => $pincode]);

        $products = Product::where('pincode', $pincode)->get();

        if ($products->isEmpty()) {
            return redirect()->route('pincode.prompt')->with('error', 'No products available in this pincode.');
        }
        return redirect()->route('home')->with('success', 'Pincode saved successfully.');
    }


    public function resetPincode(Request $request)
    {
        $request->session()->forget('pincode');
        return redirect()->route('pincode.prompt')->with('success', 'Pincode reset successfully. Please choose a new pincode.');
    }
}
