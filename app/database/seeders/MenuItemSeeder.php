<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing menu items
        MenuItem::truncate();

        // Main menu items
        $aboutUse = MenuItem::create([
            'title' => 'About USE',
            'url' => null,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $listings = MenuItem::create([
            'title' => 'Listings',
            'url' => null,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $investors = MenuItem::create([
            'title' => 'Investors',
            'url' => null,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        $marketStats = MenuItem::create([
            'title' => 'Market Statistics',
            'url' => null,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        $rules = MenuItem::create([
            'title' => 'Rules & Regulations',
            'url' => null,
            'sort_order' => 5,
            'is_active' => true,
        ]);

        $scd = MenuItem::create([
            'title' => 'SCD',
            'url' => null,
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // About USE submenu items
        MenuItem::create([
            'title' => 'About USE',
            'url' => '/about',
            'parent_id' => $aboutUse->id,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Governance',
            'url' => '#governance',
            'parent_id' => $aboutUse->id,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Products and Services',
            'url' => '#products-services',
            'parent_id' => $aboutUse->id,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Trading Participants',
            'url' => '#trading-participants',
            'parent_id' => $aboutUse->id,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Contact Us',
            'url' => '#contact',
            'parent_id' => $aboutUse->id,
            'sort_order' => 5,
            'is_active' => true,
        ]);

        // Listings submenu items
        MenuItem::create([
            'title' => 'How to List',
            'url' => '#how-to-list',
            'parent_id' => $listings->id,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Listing Rules',
            'url' => '#listing-rules',
            'parent_id' => $listings->id,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Listed Securities',
            'url' => '#listed-securities',
            'parent_id' => $listings->id,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'FAQs',
            'url' => '#faqs',
            'parent_id' => $listings->id,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // Investors submenu items
        MenuItem::create([
            'title' => 'How to Invest',
            'url' => '#how-to-invest',
            'parent_id' => $investors->id,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Private Transfers',
            'url' => '#private-transfers',
            'parent_id' => $investors->id,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Investor FAQs',
            'url' => '#investor-faqs',
            'parent_id' => $investors->id,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Corporate Announcements',
            'url' => '#corporate-announcements',
            'parent_id' => $investors->id,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Complaints Escalation',
            'url' => '#complaints-escalation',
            'parent_id' => $investors->id,
            'sort_order' => 5,
            'is_active' => true,
        ]);

        // Market Statistics submenu items
        MenuItem::create([
            'title' => 'Market Snapshot',
            'url' => '#market-snapshot',
            'parent_id' => $marketStats->id,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Market Performance',
            'url' => '#market-performance',
            'parent_id' => $marketStats->id,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // Rules & Regulations submenu items
        MenuItem::create([
            'title' => 'Market Regulations',
            'url' => '#market-regulations',
            'parent_id' => $rules->id,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'SCD',
            'url' => '#scd-regulations',
            'parent_id' => $rules->id,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // SCD submenu items
        MenuItem::create([
            'title' => 'About the SCD',
            'url' => '#about-scd',
            'parent_id' => $scd->id,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Legal and Regulatory Framework',
            'url' => '#legal-framework',
            'parent_id' => $scd->id,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'Services',
            'url' => '#scd-services',
            'parent_id' => $scd->id,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        MenuItem::create([
            'title' => 'SCD Forms',
            'url' => '#scd-forms',
            'parent_id' => $scd->id,
            'sort_order' => 4,
            'is_active' => true,
        ]);
    }
}
