<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRedirectedWithNoLoginTeste extends TestCase
{
    //===================================================================================

    public function testUserIsRedirectedWithNoLogin()
    {
        $response = $this->get('/home');

        $response->assertRedirect('login');
    }
}
