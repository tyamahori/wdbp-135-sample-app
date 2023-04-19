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
//        return 'simple message index.';

//        return response(
//            content: 'simple message index.',
//            headers: [
//                'Content-Type' => 'text/plain',
//            ]
//        );

//        return view('simple_message.index');

//        return view('simple_message.index', [
//            'messages' => [
//                ['body' => 'This is first message.'],
//                ['body' => '2nd message.'],
//            ],
//        ]);

        $messages = SimpleMessage::latest()->get();

        return view('simple_message.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('simple_message.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSimpleMessageRequest $request)
    {
        $validated = $request->validated();
        $message = SimpleMessage::create($validated);

        return redirect(route('message.show', [
            'message' => $message->id,
        ]));
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
