<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSimpleMessageRequest;
use App\Http\Requests\UpdateSimpleMessageRequest;
use App\Models\SimpleMessage;

class SimpleMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSimpleMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SimpleMessage $simpleMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SimpleMessage $simpleMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSimpleMessageRequest $request, SimpleMessage $simpleMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SimpleMessage $simpleMessage)
    {
        //
    }
}
