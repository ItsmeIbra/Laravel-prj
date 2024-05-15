<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Payment;
use Illuminate\View\View;

class PayController extends Controller
{
    public function index(): View
    {
        $payment = payment::paginate(2);
        return view('payment.index')->with('payment', $payment);
    }
    
    public function create()
    {
        return view('payment.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'type_of_pay' => 'required',
            'paid_data' => 'required',
            'amount' => 'max:255',

        ]);

        $input = $request->all();
        payment::create($input);

        return redirect()->route('payment.index')->with('success', 'Data was successfully sent');
    }

    public function show(string $id): View
    {
        $payment = payment::find($id);
        return view('payment.show')->with('payment', $payment);
    }

    public function edit(string $id): View
    {
        $payment = payment::find($id);
        return view('payment.edit')->with('payment', $payment);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $payment = payment::find($id);
        $input = $request->all();
        $payment->update($input);
        return redirect('payment')->with('flash_message', 'payment Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        payment::destroy($id);
        return redirect('payment')->with('flash_message', 'payment deleted!');
    }
}
