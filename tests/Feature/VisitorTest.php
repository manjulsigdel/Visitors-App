<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class VisitorTest
 * @package Tests\Feature
 */
class VisitorTest extends TestCase
{

    /**
     *
     */
    public function testVisitorAddFormRoute()
    {
        $response = $this->get('/visitors/add');

        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testVisitorSaveRoute()
    {
        $response = $this->post('/visitors', [
            'name'=>'manjul sigdel',
            'gender'=>'male',
            'phone'=>'909876',
            'email'=>'manjulsigdel@gmail.com',
            'address'=>'kalopul',
            'nationality'=>'nepali',
            'dob'=>'2018/02/09',
            'education'=>'bachelor',
            'contact_type'=>'phone'
        ], ['x-test'=>'hello']);

        $response->assertStatus(200);
    }
}
