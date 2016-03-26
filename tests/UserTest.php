<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

		use WithoutMiddleware;
    use DatabaseMigrations;
    public function testExample()
    {
    		$data = $this->getData();

    		$this->post('/user', $data)->seeJsonEquals(['created' => true]);
    		$data = $this->getData(['name'], 'Jesus');
    		$this->put('user/1', $data)->seeJsonEquals(['updated' => true]);
    		$this->get('user/1')->seeJson(['name' => 'Jesus']);
    		$this->delete('user/1')->seeJson(['deleted' => false]);
        $this->assertTrue(true);
    }
    // public function testValidationErrorOnCreateUser() {
    //     $data = $this->getData(['name' => '', 'email' => 'juan']);
    //     $this->post('/user', $data)->dump();
    // }
    //public function testNotFoundUser() {
      //  $this->get('user/1')->seeJsonEquals(['error' => 'Model not found'])->dump();
    //}
    public function deleteUser() {
        
        $this->delete('user/24')->seeJson(['deleted' => true]);
    }
    public function getData($custom = array()) {
    	$data = [
    		'name' => 'Jesus', 
    		'email' => 'jesus@gmail.com',
    		'password' => '12345'
    	];

    	$data = array_merge($data, $custom);
    	return $data;
    }
}
