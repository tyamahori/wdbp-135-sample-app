<?php

namespace App\Http\Controllers;

use App\Features\UiVer2;
use App\Http\Requests\StoreSimpleMessageRequest;
use App\Http\Requests\UpdateSimpleMessageRequest;
use App\Mail\SimpleMessageCreated;
use App\Models\SimpleMessage;
use Illuminate\Support\Facades\Mail;
use Laravel\Pennant\Feature;

class SimpleMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = SimpleMessage::query()->latest()->get();

        return view('simple_message.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSimpleMessageRequest $request)
    {
        $validated = $request->validated();
        $path = $validated['image']->store('uploads', 'public');
        $message = SimpleMessage::create([...$validated, 'image' => $path]);

        Mail::to('notify+laravel-app@inbaa.dev')
            ->send(new SimpleMessageCreated($message));

        return redirect(route('message.show', ['message' => $message->id]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Feature::active(UiVer2::class) ?
            view('simple_message.create') :
            view('simple_message.new_ui_test.create');
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
