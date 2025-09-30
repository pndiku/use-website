<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Security;
use Carbon\Carbon;

class SecuritySeeder extends Seeder
{
    public function run()
    {
        $securities = [
            [
                'ticker' => 'BATU',
                'company_name' => 'British American Tobacco Uganda',
                'sector' => 'Consumer Staples',
                'industry' => 'Tobacco',
                'security_type' => 'equity',
                'current_price' => 23500.00,
                'previous_close' => 23000.00,
                'day_change' => 500.00,
                'day_change_percent' => 2.17,
                'volume' => 1250,
                'market_cap' => 1450000000.00,
                'fifty_two_week_high' => 25000.00,
                'fifty_two_week_low' => 20500.00,
                'pe_ratio' => 18.5,
                'dividend_yield' => 4.2,
                'listing_date' => '2000-01-15',
                'description' => 'British American Tobacco Uganda is the leading tobacco company in Uganda.'
            ],
            [
                'ticker' => 'BOBU',
                'company_name' => 'Bank of Baroda Uganda',
                'sector' => 'Financial Services',
                'industry' => 'Banking',
                'security_type' => 'equity',
                'current_price' => 185.00,
                'previous_close' => 180.00,
                'day_change' => 5.00,
                'day_change_percent' => 2.78,
                'volume' => 45000,
                'market_cap' => 95000000.00,
                'fifty_two_week_high' => 200.00,
                'fifty_two_week_low' => 160.00,
                'pe_ratio' => 12.3,
                'dividend_yield' => 6.5,
                'listing_date' => '2002-03-20',
                'description' => 'Bank of Baroda Uganda provides comprehensive banking services.'
            ],
            [
                'ticker' => 'DFCU',
                'company_name' => 'Development Finance Company of Uganda',
                'sector' => 'Financial Services',
                'industry' => 'Banking',
                'security_type' => 'equity',
                'current_price' => 1850.00,
                'previous_close' => 1820.00,
                'day_change' => 30.00,
                'day_change_percent' => 1.65,
                'volume' => 8750,
                'market_cap' => 485000000.00,
                'fifty_two_week_high' => 1950.00,
                'fifty_two_week_low' => 1650.00,
                'pe_ratio' => 15.2,
                'dividend_yield' => 5.8,
                'listing_date' => '2004-11-12',
                'description' => 'DFCU Bank is one of Uganda\'s leading commercial banks.'
            ],
            [
                'ticker' => 'EABL',
                'company_name' => 'East African Breweries Limited',
                'sector' => 'Consumer Staples',
                'industry' => 'Beverages',
                'security_type' => 'equity',
                'current_price' => 145.00,
                'previous_close' => 142.00,
                'day_change' => 3.00,
                'day_change_percent' => 2.11,
                'volume' => 15600,
                'market_cap' => 275000000.00,
                'fifty_two_week_high' => 160.00,
                'fifty_two_week_low' => 125.00,
                'pe_ratio' => 16.8,
                'dividend_yield' => 3.9,
                'listing_date' => '1996-05-08',
                'description' => 'East African Breweries is the leading beverage company in East Africa.'
            ],
            [
                'ticker' => 'JHL',
                'company_name' => 'Jubilee Holdings Limited',
                'sector' => 'Financial Services',
                'industry' => 'Insurance',
                'security_type' => 'equity',
                'current_price' => 320.00,
                'previous_close' => 315.00,
                'day_change' => 5.00,
                'day_change_percent' => 1.59,
                'volume' => 3250,
                'market_cap' => 185000000.00,
                'fifty_two_week_high' => 350.00,
                'fifty_two_week_low' => 280.00,
                'pe_ratio' => 14.5,
                'dividend_yield' => 7.2,
                'listing_date' => '2001-09-14',
                'description' => 'Jubilee Holdings is a leading insurance company in East Africa.'
            ],
            [
                'ticker' => 'SBU',
                'company_name' => 'Stanbic Bank Uganda',
                'sector' => 'Financial Services',
                'industry' => 'Banking',
                'security_type' => 'equity',
                'current_price' => 4250.00,
                'previous_close' => 4200.00,
                'day_change' => 50.00,
                'day_change_percent' => 1.19,
                'volume' => 2850,
                'market_cap' => 1285000000.00,
                'fifty_two_week_high' => 4500.00,
                'fifty_two_week_low' => 3800.00,
                'pe_ratio' => 19.2,
                'dividend_yield' => 5.5,
                'listing_date' => '2001-12-18',
                'description' => 'Stanbic Bank Uganda is part of the Standard Bank Group.'
            ],
            [
                'ticker' => 'UCL',
                'company_name' => 'Uganda Clays Limited',
                'sector' => 'Materials',
                'industry' => 'Building Materials',
                'security_type' => 'equity',
                'current_price' => 240.00,
                'previous_close' => 235.00,
                'day_change' => 5.00,
                'day_change_percent' => 2.13,
                'volume' => 5600,
                'market_cap' => 75000000.00,
                'fifty_two_week_high' => 280.00,
                'fifty_two_week_low' => 200.00,
                'pe_ratio' => 13.8,
                'dividend_yield' => 3.5,
                'listing_date' => '2000-07-25',
                'description' => 'Uganda Clays is a leading manufacturer of building materials.'
            ],
            [
                'ticker' => 'UMEM',
                'company_name' => 'UMEME Limited',
                'sector' => 'Utilities',
                'industry' => 'Electric Utilities',
                'security_type' => 'equity',
                'current_price' => 285.00,
                'previous_close' => 280.00,
                'day_change' => 5.00,
                'day_change_percent' => 1.79,
                'volume' => 6750,
                'market_cap' => 425000000.00,
                'fifty_two_week_high' => 320.00,
                'fifty_two_week_low' => 245.00,
                'pe_ratio' => 16.8,
                'dividend_yield' => 6.2,
                'listing_date' => '2012-12-20',
                'description' => 'UMEME is Uganda\'s primary electricity distribution company.'
            ]
        ];

        foreach ($securities as $security) {
            Security::create($security);
        }
    }
}
