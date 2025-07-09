<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\LogisticBooking;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogisticBookingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_get_cannot_get_bookings(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $response = $this->get('api/v1/logistic/bookings');

        $response->assertStatus(403);
        $response->assertSeeText('This action is unauthorized');
    }
}
