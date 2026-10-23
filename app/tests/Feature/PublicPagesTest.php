<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\News;
use App\Models\Security;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use DatabaseTransactions;

    private const STATIC_PAGES = [
        '/',
        '/home',
        '/login',
        '/register',
        '/about',
        '/about/academy',
        '/about/contact-us',
        '/about/governance/structure',
        '/about/products-and-services/international-securities-identification-number-isin',
        '/about/trading-participants/custodian-banks',
        '/about/trading-participants/stock-broker-firms',
        '/annual-reports',
        '/investors/complaints-escalation',
        '/investors/corporate-announcements',
        '/investors/how-to-invest/kyc-requirements',
        '/investors/how-to-invest/types-of-investors',
        '/investors/investor-faqs',
        '/investors/private-transfers',
        '/listings/how-to-list',
        '/listings/listing-faqs',
        '/listings/listing-rules',
        '/market-statistics/market-performance',
        '/market-statistics/market-snapshot',
        '/rules-and-regulations/market-regulations',
        '/scd/about-scd',
        '/scd/scd-forms',
        '/scd/scd-rules',
        '/scd/services/clearing-and-settlement',
        '/scd/services/depository',
        '/scd/services/easy-portal',
        '/scd/services/registry',
        '/securities/bonds',
        '/securities/equities',
        '/use-specialist-market',
    ];

    public function test_static_pages_render()
    {
        $failures = [];
        foreach (self::STATIC_PAGES as $uri) {
            $status = $this->get($uri)->getStatusCode();
            if ($status !== 200) {
                $failures[] = "$uri => $status";
            }
        }

        $this->assertSame([], $failures);
    }

    public function test_news_article_and_feed_render()
    {
        $article = News::create([
            'title' => 'Smoke test article',
            'slug' => 'smoke-test-article',
            'content' => 'Body with a ]]> CDATA terminator',
            'article_type' => 'article',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $this->get('/news/' . $article->slug)->assertOk()->assertSee('Smoke test article');

        $feed = $this->get('/news/feed')->assertOk();
        $this->assertNotFalse(simplexml_load_string($feed->getContent()), 'RSS feed is not valid XML');
    }

    public function test_event_page_renders()
    {
        $event = Event::create([
            'title' => 'Smoke test event',
            'description' => 'Event description',
            'event_date' => now()->addWeek(),
            'is_active' => true,
            'show_on_site' => true,
        ]);

        $this->get('/events/' . $event->id)->assertOk()->assertSee('Smoke test event');
    }

    public function test_security_pages_render()
    {
        $security = Security::create([
            'ticker' => 'SMKT',
            'company_name' => 'Smoke Test Ltd',
            'security_type' => 'equity',
            'is_active' => true,
        ]);

        $this->get('/securities/' . $security->ticker)->assertOk();
        $this->get('/listed/' . $security->ticker)->assertOk();
    }

    public function test_uploaded_files_are_served_without_traversal()
    {
        $this->get('/images/logo.PNG')->assertOk();
        $this->get('/uploads/does-not-exist.pdf')->assertNotFound();
        $this->get('/uploads/..%2fapp%2fcomposer.json')->assertNotFound();
        $this->get('/uploads/../app/composer.json')->assertNotFound();
        $this->get('/images/..%2f..%2f..%2fetc%2fpasswd')->assertNotFound();
    }
}
