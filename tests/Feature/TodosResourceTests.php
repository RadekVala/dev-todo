<?php

namespace Tests\Feature;

use App\Todo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodosResourceTests extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testTodoDelete() {
        $todo = Todo::find(1);
        $todo->delete();
        $todo->assertSoftDeleted('todos', ['id' => 1]);
    }

}
