<?php

namespace Tests\Unit;


use App\Models\Task;
use App\Services\TodoService;
use PHPUnit\Framework\TestCase;


class TodoTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_that_todo_component_can_be_instantiated(): void
    {
        $todo = new Task();
        $this->assertInstanceOf(Task::class, $todo);
    }

}
