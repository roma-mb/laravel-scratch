<?php

namespace App\Http\Controllers;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Models\Company;
use App\Models\Customer;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    public function __construct()
    {
        //        Authenticate only or except methods
        $this->middleware('auth')->except(['index']);
        $this->middleware('auth')->only(['index']);
    }

    public function index()
    {
        //		        https://laravel.com/docs/5.0/eloquent#query-scopes
        //        $activeCustomers   = Customer::active()->get();
        //        $inactiveCustomers = Customer::inactive()->get();

        //        Example lazy loading, displayed in queries telescope when accessing the company relationship.
        //        $customers = Customer::all();
        $customers = Customer::with('company')->paginate(15);

        //        return view('internals.customer', ['customer' => $customer]);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store()
    {
        $this->authorize('create', Customer::class);

        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        //Create event
        event(new NewCustomerHasRegisteredEvent($customer));

        //        return to the same route
        //        return back();
        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        $customer->save();

        $this->storeImage($customer);

        return redirect('/customers/' . $customer->id);
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Customer $customer)
    {
        $this->authorize('delete', $customer);
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest(): array
    {
        //        First example
        //        $validateData = request()->validate([
        //            'name'   => 'required|min:3',
        //            'email'  => 'required|email',
        //            'active' => 'required',
        //            'company_id' => 'required',
        //        ]);
//
        //        if (request()->hasFile('image')) {
        //           $imageData = request()->validate([
        //               'image' => 'file|image|max:50000'
        //           ]);
//
        //            $validateData['image'] = $imageData['image'];
        //        }
        //        return $validateData;

        //        Example with tap() function
        //         return tap(request()->validate([
        //             'name'   => 'required|min:3',
        //             'email'  => 'required|email',
        //             'active' => 'required',
        //             'company_id' => 'required',
        //         ]), static function() {
        //             if (request()->hasFile('image')) {
        //                 request()->validate([
        //                     'image' => 'file|image|max:50000'
        //                 ]);
        //             }
        //         });

        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:50000',
        ]);
    }

    public function storeImage($customer): void
    {
        if (request()->hasFile('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            //            http://image.intervention.io/api/fit
            //            ->fit(300,300, null, 'top-left');
            //            http://image.intervention.io/api/crop
            //            ->crop(300, 1000); crop — Crop an image
            $image = Image::make(public_path('storage/' . $customer->image))->fit(200, 200);
            $image->save();
        }
    }
}
