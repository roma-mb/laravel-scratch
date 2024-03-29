<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Event::fake();
    }

    //    protected function tearDown(): void
    //    {
    //        parent::tearDown(); // TODO: Change the autogenerated stub
    //    }

    public function test_only_logged_in_user_can_see_the_customers(): void
    {
        $this->get('/customers')->assertRedirect('/login')->assertStatus(302);
    }

    public function test_authenticated_users_can_see_the_customers_list(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get('/customers')->assertOk();
    }

    public function test_a_customer_can_be_added_through_the_form()
    {
        //        force error
        //        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->post('/customers', $this->data());

        $this->assertDatabaseCount('customers', 1);
    }

    public function test_a_name_is_required(): void
    {
        $this->actingAsAdmin();

        $response = $this->post('/customers', array_merge($this->data(), [
            'name' => '',
        ]))->assertSessionHasErrors('name')
            ->assertStatus(302)
            ->assertRedirect('/');

        $this->assertDatabaseCount('customers', 0);
    }

    private function data(): array
    {
        return [
            'name' => 'Name A',
            'email' => 'namea@mail.com',
            'active' => true,
            'company_id' => 1,
        ];
    }

    public function actingAsAdmin(): void
    {
        $this->actingAs(User::factory()->make(['email' => 'another@mail.com']));
    }
}
