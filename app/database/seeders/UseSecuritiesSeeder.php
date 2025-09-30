<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Security;

class UseSecuritiesSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        Security::truncate();

        $securities = [
            // Equities
            [
                'ticker' => 'BATU',
                'isin' => 'UG0000000010',
                'company_name' => 'British American Tobacco Uganda Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'BOBU',
                'isin' => 'UG0000000020',
                'company_name' => 'Bank of Baroda (Uganda) Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'DFCU',
                'isin' => 'UG0000000030',
                'company_name' => 'DFCU Bank Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'EABL',
                'isin' => 'UG0000000040',
                'company_name' => 'East African Breweries Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'JHL',
                'isin' => 'UG0000000050',
                'company_name' => 'Jubilee Holdings Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'SBU',
                'isin' => 'UG0000000060',
                'company_name' => 'Stanbic Bank Uganda Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'UCL',
                'isin' => 'UG0000000070',
                'company_name' => 'Uganda Clays Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],
            [
                'ticker' => 'UMEME',
                'isin' => 'UG0000000080',
                'company_name' => 'UMEME Limited',
                'security_type' => 'equity',
                'currency' => 'UGX',
                'is_active' => true
            ],

            // Treasury Bonds
            [
                'ticker' => null,
                'isin' => 'UG0001000101',
                'issuer_name' => 'Republic of Uganda',
                'security_type' => 'treasury_bond',
                'type' => 'Fixed Rate Bond',
                'issued_shares' => 50000000000,
                'issue_date' => '2020-01-15',
                'rate' => 13.5000,
                'maturity_date' => '2030-01-15',
                'currency' => 'UGX',
                'category' => 'Government',
                'is_active' => true
            ],
            [
                'ticker' => null,
                'isin' => 'UG0001000102',
                'issuer_name' => 'Republic of Uganda',
                'security_type' => 'treasury_bond',
                'type' => 'Fixed Rate Bond',
                'issued_shares' => 75000000000,
                'issue_date' => '2021-06-10',
                'rate' => 14.2500,
                'maturity_date' => '2031-06-10',
                'currency' => 'UGX',
                'category' => 'Government',
                'is_active' => true
            ],
            [
                'ticker' => null,
                'isin' => 'UG0001000103',
                'issuer_name' => 'Republic of Uganda',
                'security_type' => 'treasury_bond',
                'type' => 'Fixed Rate Bond',
                'issued_shares' => 100000000000,
                'issue_date' => '2022-03-20',
                'rate' => 15.0000,
                'maturity_date' => '2032-03-20',
                'currency' => 'UGX',
                'category' => 'Government',
                'is_active' => true
            ],

            // Treasury Bills
            [
                'ticker' => null,
                'isin' => 'UG0002000201',
                'issuer_name' => 'Republic of Uganda',
                'security_type' => 'treasury_bill',
                'type' => '91-Day Bill',
                'issued_shares' => 25000000000,
                'issue_date' => '2024-01-15',
                'rate' => 10.5000,
                'maturity_date' => '2024-04-15',
                'currency' => 'UGX',
                'category' => 'Government',
                'is_active' => true
            ],
            [
                'ticker' => null,
                'isin' => 'UG0002000202',
                'issuer_name' => 'Republic of Uganda',
                'security_type' => 'treasury_bill',
                'type' => '182-Day Bill',
                'issued_shares' => 30000000000,
                'issue_date' => '2024-02-01',
                'rate' => 11.2500,
                'maturity_date' => '2024-08-01',
                'currency' => 'UGX',
                'category' => 'Government',
                'is_active' => true
            ],
            [
                'ticker' => null,
                'isin' => 'UG0002000203',
                'issuer_name' => 'Republic of Uganda',
                'security_type' => 'treasury_bill',
                'type' => '364-Day Bill',
                'issued_shares' => 40000000000,
                'issue_date' => '2024-03-01',
                'rate' => 12.0000,
                'maturity_date' => '2025-03-01',
                'currency' => 'UGX',
                'category' => 'Government',
                'is_active' => true
            ]
        ];

        foreach ($securities as $security) {
            Security::create($security);
        }
    }
}