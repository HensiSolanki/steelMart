<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers =  customers::all();
        return (view('customers.customerslist', compact('customers')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addForm  = true;
        $customers = false;
        return view('customers.customersform', compact('addForm', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(customers $customers)
    {
        $addForm = false;
        return view('customers.customersform', compact('customers', 'addForm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(customers $customers)
    {
        //
    }
}