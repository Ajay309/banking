<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use Illuminate\Http\Request;

class BankDetailController extends Controller
{
    public function index(Request $request)
{
    $query = BankDetail::query();

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('account_number', 'like', "%$search%")
              ->orWhere('ifsc_code', 'like', "%$search%")
            ->orWhere('user_name', 'like', "%$search%");

              
    }

    $bankDetails = $query->paginate(5);

    return view('welcome', compact('bankDetails'));
}



    // Store new bank detail
   public function store(Request $request)
{
    $request->validate([
        'user_name' => 'required|string|max:255',
        'account_number' => 'required',
        'ifsc_code' => 'required',
        'pdf_file' => 'required|file|mimes:pdf|max:2048',
    ]);

    $path = $request->file('pdf_file')->store('pdfs', 'public');

    return BankDetail::create([
        'user_name' => $request->user_name,
        'account_number' => $request->account_number,
        'ifsc_code' => $request->ifsc_code,
        'pdf_file' => $path,
    ]);
}
    // Show specific bank detail
    public function show($id) {
        return BankDetail::findOrFail($id);
    }

    // Update bank detail
    public function update(Request $request, $id) {
        $bank = BankDetail::findOrFail($id);
        $bank->update($request->all());
        return $bank;
    }

    // Delete bank detail
    public function destroy($id) {
        return BankDetail::destroy($id);
    }
}
