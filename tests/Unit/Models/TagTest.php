<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;

use App\Models\Tag;

class TagTest extends TestCase
{
    public function test_slug()
    {
        $tag = new Tag;
        $tag->name = 'Prueba de slug';

        $this->assertEquals('prueba-de-slug', $tag->slug);
    }
}
