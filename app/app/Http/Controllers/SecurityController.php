<?php

namespace App\Http\Controllers;

use App\Models\Security;
use App\Models\News;
use App\Models\SiteContent;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function publicIndex()
    {
        $securities = Security::active()->orderBy('created_at', 'desc')->get();

        // Fetch site content and menu items for consistent branding
        $siteContent = SiteContent::all()->pluck('value', 'key')->toArray();
        $menuItems = MenuItem::with('activeChildren.activeChildren')
            ->mainMenu()
            ->active()
            ->get();

        return view('securities', compact('securities', 'siteContent', 'menuItems'));
    }

    public function index(Request $request)
    {
        $query = Security::query()->orderBy('created_at', 'desc');

        // Filter by security type
        if ($request->has('type') && $request->type !== 'all') {
            $query->where('security_type', $request->type);
        }

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('ticker', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('issuer_name', 'like', "%{$search}%")
                  ->orWhere('isin', 'like', "%{$search}%");
            });
        }

        $securities = $query->paginate(20);

        return response()->json($securities);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticker' => 'nullable|string|max:10',
            'isin' => 'nullable|string|max:12',
            'company_name' => 'nullable|string|max:255',
            'issuer_name' => 'nullable|string|max:255',
            'security_type' => 'required|in:equity,treasury_bill,treasury_bond',
            'type' => 'nullable|string|max:255',
            'issued_shares' => 'nullable|integer|min:0',
            'issue_date' => 'nullable|date',
            'rate' => 'nullable|numeric|min:0',
            'maturity_date' => 'nullable|date',
            'currency' => 'nullable|string|max:3',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $security = Security::create($request->all());
        return response()->json($security, 201);
    }

    public function show($id)
    {
        $security = Security::findOrFail($id);
        return response()->json($security);
    }

    public function update(Request $request, $id)
    {
        $security = Security::findOrFail($id);

        $request->validate([
            'ticker' => 'nullable|string|max:10',
            'isin' => 'nullable|string|max:12',
            'company_name' => 'nullable|string|max:255',
            'issuer_name' => 'nullable|string|max:255',
            'security_type' => 'required|in:equity,treasury_bill,treasury_bond',
            'type' => 'nullable|string|max:255',
            'issued_shares' => 'nullable|integer|min:0',
            'issue_date' => 'nullable|date',
            'rate' => 'nullable|numeric|min:0',
            'maturity_date' => 'nullable|date',
            'currency' => 'nullable|string|max:3',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $security->update($request->all());
        return response()->json($security);
    }

    public function destroy($id)
    {
        $security = Security::findOrFail($id);
        $security->delete();
        return response()->json(['message' => 'Security deleted successfully']);
    }

    public function getSectors()
    {
        $types = Security::distinct()->pluck('security_type')->filter()->sort();
        return response()->json($types);
    }

    public function getMarketSummary()
    {
        $summary = [
            'total_securities' => Security::active()->count(),
            'equities_count' => Security::equities()->active()->count(),
            'bonds_count' => Security::bonds()->active()->count()
        ];

        return response()->json($summary);
    }

    public function showPublic($symbol)
    {
        // Find security by ticker or ISIN, preferring the most recent one
        $security = Security::where(function($query) use ($symbol) {
            $query->where('ticker', $symbol)
                  ->orWhere('isin', $symbol);
        })->where('is_active', true)
          ->orderBy('created_at', 'desc')
          ->first();

        if (!$security) {
            abort(404, 'Security not found');
        }

        // Get related news articles
        $relatedNews = $security->news()
            ->where('is_published', true)
            ->latest()
            ->take(10)
            ->get();

        // Fetch site content for consistent branding
        $siteContent = SiteContent::all()->pluck('value', 'key')->toArray();

        // Fetch menu items with 3-level hierarchy
        $menuItems = MenuItem::with('activeChildren.activeChildren')
            ->mainMenu()
            ->active()
            ->get();

        return view('security-detail', compact('security', 'relatedNews', 'siteContent', 'menuItems'));
    }
}
