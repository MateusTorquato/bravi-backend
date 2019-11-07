<?php

use App\Person;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    public function testPeopleRoutes()
    {
        $response = $this->call('POST', '/people', ['name' => 'Mateus', 'last_name' => 'Torquato']);
        $array = json_decode($response->getContent(), true);
        $person = Person::find($array['person']['id']);

        $this->call('PUT', '/people/' . $person->id, ['name' => 'Mateus', 'last_name' => 'Torquato de Medeiros']);
        $response = $this->call('GET', '/people', ['id' => $person->id]);
        $people = json_decode($response->getContent(), true);
        $this->assertCount(1, $people);
        $this->assertEquals('Torquato de Medeiros', $people[0]['last_name']);
    }
}
