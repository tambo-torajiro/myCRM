<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $customers = Customer::searchCustomers($request->search)
            ->select('id', 'name', 'work_category', 'tel', 'request_date')->paginate(25);

        // dd($customers);

        return Inertia::render('Customers/Index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create([
            'name' => $request->name,
            'work_category' => $request->work_category,
            'tel' => $request->tel,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'person_in_charge1' => $request->person_in_charge1,
            'person_in_charge2' => $request->person_in_charge2,
            'person_in_charge3' => $request->person_in_charge3,
            'request_date' => $request->request_date,
            'memo' => $request->memo,
        ]);

        return to_route('customers.index')
            ->with([
                'message' => '登録しました。',
                'status' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        // dd($customer);
        return Inertia::render('Customers/Show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return Inertia::render('Customers/Edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->work_category = $request->work_category;
        $customer->tel = $request->tel;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->person_in_charge1 = $request->person_in_charge1;
        $customer->person_in_charge2 = $request->person_in_charge2;
        $customer->person_in_charge3 = $request->person_in_charge3;
        $customer->request_date = $request->request_date;
        $customer->memo = $request->memo;
        $customer->save();

        return to_route('customers.index')
            ->with([
                'message' => '更新しました',
                'status' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return to_route('customers.index')->with([
            'message' => '削除しました。',
            'status' => 'danger'
        ]);
    }
}