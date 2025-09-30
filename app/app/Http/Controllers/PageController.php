<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;

use Kreait\Firebase\Exception\Auth\FailedToVerifySessionCookie;

use App\Models\Subscriber;
use App\Models\Event;
use App\Models\News;
use App\Models\SiteContent;
use App\Models\CarouselImage;
use App\Models\MenuItem;


class PageController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    protected $auth;


    public function __construct()
    {
       
    }

    public function home(){

        if (session()->has('user')) {
            return redirect('/manage');
        } else {
            // Fetch upcoming events for the banner
            $upcomingEvent = Event::active()
                ->visible()
                ->upcoming()
                ->orderByDate()
                ->first();

            // Fetch latest news
            $latestNews = News::published()
                ->latest()
                ->take(3)
                ->get();

            // Fetch site content settings
            $siteContent = SiteContent::all()->pluck('value', 'key')->toArray();

            // Fetch carousel images
            $carouselImages = CarouselImage::active()
                ->ordered()
                ->get();

            // Fetch menu items with 3-level hierarchy
            $menuItems = MenuItem::with('activeChildren.activeChildren')
                ->mainMenu()
                ->active()
                ->get();

            return view('index', compact('upcomingEvent', 'latestNews', 'siteContent', 'carouselImages', 'menuItems'));
        }

    }


    public function reg(){
        return view('register');
    }

    public function subscribe(Request $request){
        $email = $request['email'];
        $u = Subscriber::where('email', $email)->first();
        //dd($user);
        if(!$u) {
            $u = new Subscriber;
            $u->email = $email;
            $u->save();
        }
        return redirect()->back();
    }
    
    public function inbox(Request $request){
        if (Auth::check()){
            return redirect('/manage');
        } else {
            return redirect('/login');
        }
        
        /**if (session()->has('token')) {
            try {
                $firebaseAuth = app('auth');
                $sessionCookieString = session('token');
                $verifiedSessionCookie = $firebaseAuth->verifySessionCookie($sessionCookieString);
                $uid = $verifiedSessionCookie->claims()->get('sub');
                
                $user =$firebaseAuth->getUser($uid);
                $uid = $user->uid;
                $alias = $user->displayName;
                $email = $user->email;
                $emailVerified = $user->emailVerified;
                session()->put('user', [
                    'email' => $email,
                    'verified' => $emailVerified,
                    'uid' => $uid,
                    'alias' => $alias
                    // Add other user data as needed
                ]);
                return view('dash');
            } catch (FailedToVerifySessionCookie $e) {
                echo 'The Session Cookie is invalid: '.$e->getMessage();
                session()->forget('token');
                session()->forget('user');
                return view('start');
            }
        } else {
            return view('start');
        }**/
        
    }

    
    public function manage(Request $request){
        if (Auth::check()){
            // Fetch menu items for the management interface with 3-level hierarchy
            $menuItems = MenuItem::with('activeChildren.activeChildren')
                ->mainMenu()
                ->active()
                ->get();

            return view('manage', compact('menuItems'));
        } else {
            return redirect('/login');
        }
    }

    public function annualReports()
    {
        // Sample annual reports data - in a real app this would come from a database
        $reports = [
            [
                'year' => '2023',
                'title' => 'Uganda Securities Exchange Annual Report 2023',
                'description' => 'Comprehensive overview of market performance, regulatory developments, and strategic initiatives.',
                'file_url' => '/files/annual-reports/USE-Annual-Report-2023.pdf',
                'file_size' => '3.2 MB',
                'pages' => 48,
                'featured' => true
            ],
            [
                'year' => '2022',
                'title' => 'Uganda Securities Exchange Annual Report 2022',
                'description' => 'Market growth analysis, trading statistics, and regulatory compliance highlights.',
                'file_url' => '/files/annual-reports/USE-Annual-Report-2022.pdf',
                'file_size' => '2.8 MB',
                'pages' => 44,
                'featured' => false
            ],
            [
                'year' => '2021',
                'title' => 'Uganda Securities Exchange Annual Report 2021',
                'description' => 'Digital transformation journey and resilience during challenging times.',
                'file_url' => '/files/annual-reports/USE-Annual-Report-2021.pdf',
                'file_size' => '2.5 MB',
                'pages' => 40,
                'featured' => false
            ],
            [
                'year' => '2020',
                'title' => 'Uganda Securities Exchange Annual Report 2020',
                'description' => 'Navigating market challenges and strengthening institutional capacity.',
                'file_url' => '/files/annual-reports/USE-Annual-Report-2020.pdf',
                'file_size' => '2.3 MB',
                'pages' => 36,
                'featured' => false
            ],
            [
                'year' => '2019',
                'title' => 'Uganda Securities Exchange Annual Report 2019',
                'description' => 'Building momentum in East Africa\'s financial markets ecosystem.',
                'file_url' => '/files/annual-reports/USE-Annual-Report-2019.pdf',
                'file_size' => '2.1 MB',
                'pages' => 38,
                'featured' => false
            ],
            [
                'year' => '2018',
                'title' => 'Uganda Securities Exchange Annual Report 2018',
                'description' => 'Expanding access to capital markets and enhancing market infrastructure.',
                'file_url' => '/files/annual-reports/USE-Annual-Report-2018.pdf',
                'file_size' => '1.9 MB',
                'pages' => 34,
                'featured' => false
            ]
        ];

        // Fetch site content and menu items for consistent branding
        $siteContent = SiteContent::all()->pluck('value', 'key')->toArray();
        $menuItems = MenuItem::with('activeChildren.activeChildren')
            ->mainMenu()
            ->active()
            ->get();

        return view('annual-reports', compact('reports', 'siteContent', 'menuItems'));
    }
}