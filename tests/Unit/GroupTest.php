<?php

namespace Skcin7\LaravelLinktree\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Skcin7\LaravelLinktree\Tests\TestCase;
use Skcin7\LaravelLinktree\Models\Group;

class GroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_group_has_a_name()
    {
        $group = Group::factory()->create(['name' => 'Fake Name']);
        $this->assertEquals('Fake Name', $group->name);
    }
}