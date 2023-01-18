<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function customer()
    {
        return redirect('/customer/view');
    }

    public function customer_create()
    {
        $type = "create";
        $url = url('customer/add');
        $data = compact('type', 'url');
        return view('customer_form')->with($data);
    }

    public function add_customer(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required',
            ]
        );

        $customer = new Customer;

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->address = $request['address'];
        $customer->gender = $request['gender'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->status = 1;
        $customer->save();

        return redirect('/customer/view');
    }

    public function get_customer()
    {
        $customers = Customer::all();
        $data = compact('customers');
        return view("view_customer")->with($data);
    }

    public function delete_customer($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect('customer/view');
    }

    public function edit_customer($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return redirect('customer/view');
        } else {
            $type = "edit";
            $url = url('customer/update/' . $id);
            $data = compact('customer', 'type', 'url');
            return view('customer_form')->with($data);
        }
    }

    public function update_customer($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
            ]
        );

        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->gender = $request['gender'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->status = 1;
        $customer->save();
        return redirect('customer/view');
    }
}
