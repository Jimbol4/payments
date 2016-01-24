<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use App\Http\Controllers\Controller;
use DB;

class PaymentsController extends Controller
{
    
    /**
     * List all payments
     * 
     * @return Response
     */
    public function index() {
        $payments = Payment::all();
        return view('index', compact('payments'));
    }
    
    /**
     * Search for payments matching a supplier name and/or pound rating.
     * 
     * @param Request $request
     * @return Response
     */
    public function search(Request $request) {
        
        // flash old input to save search terms
        $request->flash();
        
        $query = DB::table('payments');
        $query->select('*');
        
        // search for supplier name if they have specified anything
        if (!empty($request->get('supplier'))) {
            $query->where('payment_supplier', 'like', '%' . strtoupper($request->get('supplier')) . '%');
        }
        
        // search for payment cost rating if they have specified one
        if (!empty($request->get('rating'))) {
            $query->where('payment_cost_rating', '=', $request->get('rating'));
        }
        
        $payments = $query->get();
        
        return view('index', compact('payments'));
        
    }
    
}
