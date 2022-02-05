<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapping;

class MappingController extends Controller
{
    /**
     * Display a listing of resource
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $mappedResources = Mapping::get()->toArray();

        return view('app', compact('mappedResources'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return \Illuminate\Http\Response
    */
    public function store()
    {
        $validate = $this->validate(request(), [
            'url' => 'required|url'
        ]);

        $mappedResource = new Mapping();
        $mappedResource->shorten_url_key = uniqid();
        $mappedResource->url = request()->url;
        $mappedResource->save();

        return redirect()->route('index');
    }

    /**
     * redirect short URL to original URL
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirect($urlkey)
    {
        $urlMapping = Mapping::where('shorten_url_key', $urlkey)->first();

        if (isset($urlMapping)) {
            return redirect($urlMapping->url);
        } else {
            abort(404);
        }
    }
}
