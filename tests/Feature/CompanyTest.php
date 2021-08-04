<?php

namespace Tests\Feature;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_company_can_be_created()
    {
        $this->actingAsAdmin();

        $this->post('companies',$this->data())->assertRedirect(route('companies.index'));

        $this->assertCount(1 , Company::all());
    }

    public function test_company_can_be_fetched(){
        $this->actingAsAdmin();

        $response = $this->get('companies');

        $response->assertStatus(200);
    }

    private function actingAsAdmin(){
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    private function data(){
        return [
                'name' => 'Test Company',
                'email' => 'test@company.com',
                'website' => 'test.com'
        ];
    }
}
