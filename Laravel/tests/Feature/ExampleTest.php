<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    /*
        $response = $this->get('/');

        $response->assertStatus(200);
	*/
	$this->get('/')->assertStatus(200);
	$this->get('/hello')->assertOk();
	$this->post('/hello')->assertOk();
	$this->get('/hello/1')->assertOk();
	$this->post('/hoge')->assertStatus(404);
	$this->get('/hello')->assertSeeText('Index');
	$this->get('/hello')->assertSee('<h1>');
	$this->get('/hello')->assertSeeInOrder(['<html','<head','<body', '<h1>']);
	$this->get('/hello/json/1')->assertSeeText('KAZUMI');
	$this->get('/hello/json/2')->assertExactJson(
		[
		"id"=>2,
		"name"=>"NAMA_MYJOB",
		"age"=>36,
		"mail"=>"mail.nana@t.com",
		"created_at"=>"2020-02-17 15:55:57",
		"updated_at"=>2020-02-23 21:59:40"
		]
	);
    }
}
