<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Handle our basic API calls if using Vue
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        return view('api_index');
    }

    /**
     * Display a listing of resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('list',[
            'customers' => CustomerResource::collection(Customer::all())
        ]);
    }

    /**
     * Display same as create
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'message' => session()->get('message')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request, false);

        $customer = Customer::create($request->all());
        $customer->save();

        return redirect(route('index'))->with([
            'message' => "User was created successfully",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('edit', [
            'message' => session()->get('message'),
            'customer' => new CustomerResource($customer)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($this->validateRequest($request, $customer));

        return redirect(route('edit', $customer))->with([
            'message' => "Customer updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('list'));
    }

    public function validateRequest($request, $customer)
    {
        $customerId = '';

        if($customer) {
            $customerId = $customer->id;
        }

        return $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'email:rfc,dns|unique:customers,email,'.$customerId,
            'address'=>'nullable',
            'gender'=>'required|boolean'
        ]);
    }
}
