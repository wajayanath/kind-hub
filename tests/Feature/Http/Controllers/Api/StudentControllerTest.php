<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function can_register_a_student()
    {
    	$response = $this->json('POST','/api/students',[
                "first_name" =>"Saman",
                "last_name"  =>"Perera",
                "gender"     =>"M",
                "joined_year"=>2019
    	]);
        
    	$response->assertJsonStructure([
            'id','first_name','last_name','gender','joined_year','created_at'
        ])
        ->assertJson([
                "first_name" =>"Saman",
                "last_name"  =>"Perera",
                "gender"     =>"M",
                "joined_year"=>2019
        ])
        ->assertStatus(201);

        $this->assertDatabaseHas('students', [
                "first_name" =>"Saman",
                "last_name"  =>"Perera",
                "gender"     =>"M",
                "joined_year"=>2019
        ]);
    }

    public function will_fail_with_a_404_if_update_student_was_not_found()
    {
        $response = $this->json('PUT', '/api/students/-1');

        $response->assertStatus(404);
    }

    public function will_fail_with_a_404_if_student_was_not_found()
    {
        $response = $this->json('DELETE', '/api/students/-1');

        $response->assertStatus(404);
    }
}
