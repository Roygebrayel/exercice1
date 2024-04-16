<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve search input from the request
        $search = $request->input('search');

        // Query to retrieve filtered data based on name or email
        $query = Person::query();
        if ($search) {
            $query->where('first_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }
        
        // Retrieve data based on the query
        $data = $query->get();

        // Return the view with the filtered data
        return view('ListPerson')->with('all', $data)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPerson');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    
    $request->validate([
        'email' => 'required|email|unique:signups,email',
        
    ]);
    
    
    // Encrypt the password
    $encryptedPassword = bcrypt($request->password);

    // Proceed with saving the record
    $obj = new Person();
    $obj->first_name = $request->first_name;
    $obj->last_name = $request->last_name;
    $obj->gender = $request->gender;
    $obj->email = $request->email;
    $obj->password = $encryptedPassword; // Save encrypted password
    $obj->save();

    return "Welcome $obj->first_name $obj->last_name";
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the user data based on the provided ID
        $person = Person::findOrFail($id);
        
        // Return the personDescription view with the retrieved user data
        return view('personDescription', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Person::find($id);
        return view('editPerson')->with('person',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj= Person::find($id);
        $obj->first_name = $request->first_name;
        $obj->last_name = $request->last_name;
        $obj->gender = $request->gender;
        $obj->email = $request->email;
        $obj->password = $request->password;
        $obj->save();
    
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $obj = Person::find($id);
       $obj->delete(); 
       return redirect()->route('person.index');
    }
}
