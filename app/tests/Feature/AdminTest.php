<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use DatabaseTransactions;

    /** Admin resources that store a document link: same rules, same payload */
    private const DOCUMENT_RESOURCES = [
        'annual-reports',
        'corporate-announcements',
        'market-performance',
        'market-regulations',
        'private-transfers',
        'scd-forms',
        'scd-rules',
    ];

    private const INDEX_ROUTES = [
        '/admin/news',
        '/admin/events',
        '/admin/site-content',
        '/admin/carousel-images',
        '/admin/files',
        '/admin/menu-items',
        '/admin/menu-items-all',
        '/admin/menu-parent-options',
        '/admin/securities',
        '/admin/securities-sectors',
        '/admin/market-summary',
        '/admin/users',
        '/admin/annual-reports',
        '/admin/corporate-announcements',
        '/admin/market-performance',
        '/admin/market-regulations',
        '/admin/private-transfers',
        '/admin/scd-forms',
        '/admin/scd-rules',
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    private function makeUser(string $role): User
    {
        $user = new User();
        $user->name = $role . ' Tester';
        $user->email = strtolower($role) . '-' . uniqid() . '@example.test';
        $user->password = Hash::make('secret-password');
        $user->role = $role;
        $user->save();

        return $user;
    }

    public function test_guests_are_redirected_to_login()
    {
        $this->get('/manage')->assertRedirect('/login');
        $this->get('/admin/news')->assertRedirect('/login');
        $this->postJson('/admin/news', [])->assertStatus(401);
    }

    public function test_non_admin_users_are_forbidden()
    {
        $this->actingAs($this->makeUser('User'));

        $this->get('/manage')->assertForbidden();
        $this->get('/admin/users')->assertForbidden();
    }

    public function test_admin_index_routes_respond()
    {
        $this->actingAs($this->makeUser('Admin'));

        $this->get('/manage')->assertOk();

        $failures = [];
        foreach (self::INDEX_ROUTES as $uri) {
            $status = $this->getJson($uri)->getStatusCode();
            if ($status !== 200) {
                $failures[] = "$uri => $status";
            }
        }

        $this->assertSame([], $failures);
    }

    public function test_document_resources_crud()
    {
        $this->actingAs($this->makeUser('Admin'));

        foreach (self::DOCUMENT_RESOURCES as $resource) {
            $id = $this->postJson("/admin/$resource", [
                'title' => "Smoke $resource",
                'file_url' => 'https://example.test/report.pdf',
                'file_size' => '1 MB',
                'published_date' => '2026-01-15',
            ])->assertStatus(201)->json('id');

            $this->getJson("/admin/$resource/$id")->assertOk()->assertJsonFragment(['title' => "Smoke $resource"]);

            $this->putJson("/admin/$resource/$id", [
                'title' => "Updated $resource",
                'file_url' => 'https://example.test/report-v2.pdf',
            ])->assertOk()->assertJsonFragment(['title' => "Updated $resource"]);

            $this->postJson("/admin/$resource", ['title' => 'Missing URL'])->assertStatus(422);

            $this->deleteJson("/admin/$resource/$id")->assertOk();
            $this->getJson("/admin/$resource/$id")->assertNotFound();
        }
    }

    public function test_news_crud()
    {
        $this->actingAs($this->makeUser('Admin'));

        $id = $this->postJson('/admin/news', [
            'title' => 'Admin smoke article',
            'content' => 'Body',
            'article_type' => 'article',
            'is_published' => true,
        ])->assertStatus(201)->json('id');

        $this->putJson("/admin/news/$id", [
            'title' => 'Admin smoke report',
            'article_type' => 'report',
            'file_url' => 'https://example.test/report.pdf',
        ])->assertOk()->assertJsonFragment(['title' => 'Admin smoke report']);

        $this->deleteJson("/admin/news/$id")->assertOk();
    }

    public function test_event_crud()
    {
        $this->actingAs($this->makeUser('Admin'));

        $id = $this->postJson('/admin/events', [
            'title' => 'Admin smoke event',
            'description' => 'Details',
            'event_date' => '2026-12-01',
        ])->assertStatus(201)->json('id');

        $this->putJson("/admin/events/$id", [
            'title' => 'Updated event',
            'description' => 'Details',
            'event_date' => '2026-12-02',
        ])->assertOk();

        $this->deleteJson("/admin/events/$id")->assertOk();
    }

    public function test_carousel_security_and_menu_crud()
    {
        $this->actingAs($this->makeUser('Admin'));

        $id = $this->postJson('/admin/carousel-images', [
            'title' => 'Slide',
            'image_url' => 'https://example.test/slide.jpg',
            'sort_order' => 1,
        ])->assertStatus(201)->json('id');
        $this->deleteJson("/admin/carousel-images/$id")->assertOk();

        $id = $this->postJson('/admin/securities', [
            'ticker' => 'SMK2',
            'company_name' => 'Smoke Two',
            'security_type' => 'equity',
        ])->assertStatus(201)->json('id');
        $this->putJson("/admin/securities/$id", ['security_type' => 'treasury_bond'])->assertOk();
        $this->deleteJson("/admin/securities/$id")->assertOk();

        $id = $this->postJson('/admin/menu-items', [
            'title' => 'Smoke menu',
            'url' => '/smoke',
            'parent_id' => null,
            'sort_order' => 99,
        ])->assertStatus(201)->json('id');
        $this->deleteJson("/admin/menu-items/$id")->assertOk();
    }

    public function test_user_management()
    {
        $admin = $this->makeUser('Admin');
        $this->actingAs($admin);

        $id = $this->postJson('/admin/users', [
            'name' => 'New Admin',
            'email' => 'new-admin-' . uniqid() . '@example.test',
            'password' => 'long-password',
            'role' => 'Admin',
        ])->assertStatus(201)->json('id');

        $this->getJson('/admin/users')->assertOk()->assertJsonMissing(['password']);
        $this->deleteJson("/admin/users/$id")->assertOk();
        $this->deleteJson('/admin/users/' . $admin->id)->assertForbidden();
    }

    public function test_file_upload_accepts_documents_and_rejects_scripts()
    {
        $this->actingAs($this->makeUser('Admin'));

        $pdf = UploadedFile::fake()->createWithContent('report.pdf', "%PDF-1.4\n%smoke\n");
        $response = $this->postJson('/admin/files', ['file' => $pdf]);
        $path = base_path('../' . $response->json('file_path'));
        try {
            $response->assertStatus(201);
            $this->assertFileExists($path);
            $this->deleteJson('/admin/files/' . $response->json('id'))->assertOk();
            $this->assertFileDoesNotExist($path);
        } finally {
            if (is_file($path)) {
                unlink($path);
            }
        }

        foreach (['shell.php', 'shell.phtml', 'page.html', 'image.svg'] as $name) {
            $file = UploadedFile::fake()->createWithContent($name, '<?php echo 1;');
            $this->postJson('/admin/files', ['file' => $file])->assertStatus(422);
        }

        // Content is not trusted to pick the extension: a script renamed to .pdf is stored as .pdf
        $disguised = UploadedFile::fake()->createWithContent('shell.pdf', '<?php echo 1;');
        $response = $this->postJson('/admin/files', ['file' => $disguised]);
        $stored = base_path('../' . $response->json('file_path'));
        try {
            $response->assertStatus(201);
            $this->assertStringEndsWith('.pdf', $stored);
        } finally {
            if (is_file($stored)) {
                unlink($stored);
            }
        }
    }
}
