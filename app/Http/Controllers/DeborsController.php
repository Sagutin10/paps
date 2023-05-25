<?php

namespace App\Http\Controllers;
use App\Models\Debors;
use Illuminate\Http\Request;

class DeborsController extends Controller
{

    public function index()
    {
        $debors = Debor::orderBy('id', 'desc')->paginate(4);
        return view('debors.index', compact('debors'));
    }

    public function create()
    {
        return view('debors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrowname' => 'required',
            'date_transaction' => 'required',
            'borrows_amount' => 'required',
            'remarks' => 'required',
        ]);
        
       
        Debor::create([
            'borrowname' => $request->borrowname,
            'date_transaction' => $request->date_transaction,
            'borrows_amount' => $request->borrows_amount,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('debors.index')->with('success','Student Added Successfully.');
    }

   
    public function show(Debor $debors)
    {
        return view('debors.show',compact('debor'));
    }

    
    public function edit(Debor $debors)
    {
        return view('debors.edit',compact('debor'));
    }

    
    public function update(Request $request, Debor $debors)
    {
        $request->validate([
            'borrrowname' => 'required',
            'date_transaction' => 'required',
            'borrows_amount' => 'required',
            'remarks' => 'required',
        ]);
        
        //$student->fill($request->post())->save();

        $debors->fill([
            'borrowname' => $request->borrowname,
            'date_transaction' => $request->date_transaction,
            'borrows_amount' => $request->borrows_amount,
            'remarks' => $request->remarks,
        ])->save();

        return redirect()->route('debors.index')->with('success','Student updated successfully');
    }

   
    public function destroy(Debor $debors)
    {
        $debors->delete();
        return redirect()->route('debors.index')->with('success','Deleted Successfully');
    }
}