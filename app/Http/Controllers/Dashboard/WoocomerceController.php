<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Woocomerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WoocomerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $woocomerces = Woocomerce::all();
        // return $woocomerces;
        return view('backend.woocomerce.index', compact('woocomerces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // dd($tags);
        return view('backend.woocomerce.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formRequest = $request->validate([
            'name' => 'required',
            'api_url' => 'required',
            'api_key' => 'required',
            'api_secret' => 'required',
            'tag_id' => 'required|not_in:--Select--',
        ]);

        Woocomerce::create($formRequest);

        return redirect()->route('woocomerce.index')->with('success', 'Woocomerce created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $woocomerce = Woocomerce::find($id);
        return view('backend.woocomerce.edit', compact('woocomerce', 'tags'));
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
            'api_url' => "required|unique:woocomerces,api_url," . $id,
            'api_key' => "required|unique:woocomerces,api_key," . $id,
            'api_secret' => "required|unique:woocomerces,api_secret," . $id,
            'tag_id' => 'required',
        ]);

        Woocomerce::where('id', $id)->update($formRequest);
        return redirect()->route('woocomerce.index')->with('success', 'Woocomerce updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Woocomerce::find($id);
        $task->delete();
        return redirect()->route('woocomerce.index')->with('success', 'Woocomerce deleted successfully !!');
    }

   
}
