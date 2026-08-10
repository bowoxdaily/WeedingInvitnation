<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Guest;
use App\Models\Guestbook;
use App\Models\Rsvp;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WeddingInvitationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Setting::set('groom_nickname', 'Bowo');
        Setting::set('bride_nickname', 'Riska');
        Setting::set('wedding_date', '16 Agustus 2026');
    }

    public function test_invitation_page_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Bowo');
        $response->assertSee('Riska');
        $response->assertSee('Tamu Undangan');
    }

    public function test_guest_personalization_from_url_parameter(): void
    {
        $response = $this->get('/?to=Bapak%20Andi');
        $response->assertStatus(200);
        $response->assertSee('Bapak Andi');
    }

    public function test_guest_personalization_sanitizes_xss(): void
    {
        $response = $this->get('/?to=<script>alert("xss")</script>Bapak%20Ahmad');
        $response->assertStatus(200);
        $response->assertDontSee('<script>alert', false);
        $response->assertSee('Bapak Ahmad');
    }

    public function test_rsvp_submission_success(): void
    {
        $response = $this->postJson('/rsvp', [
            'name'              => 'Bapak Andi',
            'attendance_status' => 'hadir',
            'guest_count'       => 2,
            'message'           => 'Selamat atas pernikahannya!',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseHas('rsvps', [
            'name'              => 'Bapak Andi',
            'attendance_status' => 'hadir',
            'guest_count'       => 2,
        ]);
    }

    public function test_rsvp_submission_accepts_belum_pasti(): void
    {
        $response = $this->postJson('/rsvp', [
            'name'              => 'Ibu Siska',
            'attendance_status' => 'belum_pasti',
            'guest_count'       => 1,
            'message'           => 'Semoga bisa hadir',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseHas('rsvps', [
            'name'              => 'Ibu Siska',
            'attendance_status' => 'belum_pasti',
        ]);
    }

    public function test_guestbook_submission_success(): void
    {
        $response = $this->postJson('/guestbook', [
            'name'    => 'Budi',
            'message' => 'Selamat menempuh hidup baru!',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseHas('guestbooks', [
            'name'    => 'Budi',
            'message' => 'Selamat menempuh hidup baru!',
            'status'  => 'visible',
        ]);
    }

    public function test_admin_login_page_loads(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_admin_authentication_and_dashboard_access(): void
    {
        $admin = Admin::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@wedding.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/admin/login', [
            'email'    => 'admin@wedding.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin, 'admin');

        $dashboardResponse = $this->get('/admin');
        $dashboardResponse->assertStatus(200);
    }

    public function test_admin_can_create_guest(): void
    {
        $admin = Admin::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@wedding.com',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($admin, 'admin');

        $response = $this->post('/admin/guests', [
            'name'        => 'Dodi Kurniawan',
            'phone'       => '08123456789',
            'guest_limit' => 2,
        ]);

        $response->assertRedirect('/admin/guests');
        $this->assertDatabaseHas('guests', [
            'name'  => 'Dodi Kurniawan',
            'phone' => '08123456789',
        ]);
    }

    public function test_admin_can_update_settings(): void
    {
        $admin = Admin::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@wedding.com',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($admin, 'admin');

        $response = $this->post('/admin/settings', [
            'groom_name' => 'Bowo Prasetyo, S.T.',
            'bride_name' => 'Riska Anggraeni, S.Kom.',
        ]);

        $response->assertRedirect('/admin/settings');
        $this->assertEquals('Bowo Prasetyo, S.T.', Setting::get('groom_name'));
        $this->assertEquals('Riska Anggraeni, S.Kom.', Setting::get('bride_name'));
    }

    public function test_admin_can_update_love_story_settings(): void
    {
        $admin = Admin::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@wedding.com',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($admin, 'admin');

        $loveStoryData = [
            [
                'year'        => '2020',
                'title'       => 'Awal Berkenalan',
                'description' => 'Berkenalan di bangku kuliah.',
            ],
            [
                'year'        => '2026',
                'title'       => 'Menuju Pelaminan',
                'description' => 'Mengikat janji suci bersama.',
            ],
        ];

        $response = $this->post('/admin/settings', [
            'love_story_present' => '1',
            'love_story'         => $loveStoryData,
        ]);

        $response->assertRedirect('/admin/settings');
        
        $savedLoveStory = json_decode(Setting::get('love_story'), true);
        $this->assertCount(2, $savedLoveStory);
        $this->assertEquals('Awal Berkenalan', $savedLoveStory[0]['title']);

        // Verify public view displays updated love story items
        $publicResponse = $this->get('/');
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Awal Berkenalan');
        $publicResponse->assertSee('Menuju Pelaminan');
    }
}
