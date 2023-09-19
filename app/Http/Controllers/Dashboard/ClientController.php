<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('backend.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */                     
    public function create()
    {
        return view('backend.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $formRequest = $request->validated();

        $newImage = time() . '-' . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $newImage);
        $formRequest['image'] = $newImage;

        Client::create($formRequest);
        return redirect()->route('client.index')->with('success', 'Client created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('backend.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('backend.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formRequest = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:clients,email,'.$id,
            'phone_number' => 'required|numeric|unique:clients,phone_number,'.$id,
            'company_name' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_zip' => 'required||numeric',
            'company_tin' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $formRequest = $request->validate([
                'image' => 'mimes:jpeg,png,jpg',
            ]);

            $newImage = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $newImage);
            $formRequest['image'] = $newImage;
        }

        Client::where('id', $id)->update($formRequest);
        return redirect()->route('client.index')->with('success', 'Client updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::Where('id', $id)->delete();
        return redirect()->route('client.index')->with('success', 'Client deleted successfully !!');
    }

    // public function createPDF($id) {
    //     $client = Client::find($id);
    //     // share data to view
    //     view()->share('backend.client.show',$client);
    //     // $pdf = PDF::loadView('pdf_view', $data);
    //     $pdf = DomPDFPDF::loadView('pdf_view', $client);
    //     // download PDF file with download method
    //     return $pdf->download('pdf_file.pdf');
    // }
}
