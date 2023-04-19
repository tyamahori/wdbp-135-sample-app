<?php

namespace Tests\Feature;

use App\Models\SimpleMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SimpleMessageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_メッセージが登録できて一覧画面に表示される(): void
    {
        // SimpleMessage を1つ登録する
        $response = $this->post(route('message.store'), [
            'body' => 'テストメッセージ',
        ]);

        // 登録されたIDを取得する
        $latestMessage = SimpleMessage::latest()->first();

        $response
            ->assertStatus(302)
            ->assertRedirectToRoute('message.show', ['message' => $latestMessage->id]);

        $response = $this->get(route('message.index'));

        // 一覧画面にメッセージが表示されるかテストする
        $response
            ->assertStatus(200)
            ->assertSee('テストメッセージ');
    }
}
