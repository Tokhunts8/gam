<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Company;
use App\Contacts;
use App\foundation;
use App\News;
use App\Rules;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index($locale)
    {
        $this->checkLocale($locale);

        if ($locale === 'en') {
            $aboutFundSelect = ['id', 'oln as name'];
            $blogTitleSelect = ['blogs.id as id', 'blogs.oln as name'];
            $newsSelect      = ['olt as title', 'old as description', 'created_at', 'image'];
            $contactSelect   = ['phone', 'ola as address', 'email'];
            $lawRulesSelect  = ['url', 'oln as name'];
            $footerSelect    = [
                'oln as name',
                'olma as menuAbout',
                'olmf as menuFoundation',
                'olnn as news',
                'olnm as newsMore',
                'olc as contact',
                'oll as links',
                'ols as settings',
                'ollaw as law',
                'olr as rules',
                'olst as settingTitle'
            ];
        }
        elseif ($locale === 'am') {
            $aboutFundSelect = ['id', 'name'];
            $blogTitleSelect = ['blogs.id as id', 'blogs.name as name'];
            $newsSelect      = ['title', 'description', 'created_at', 'image'];
            $contactSelect   = ['phone', 'address', 'email'];
            $lawRulesSelect  = ['url', 'name'];
            $footerSelect    = [
                'name',
                'menuAbout',
                'menuFoundation',
                'news',
                'newsMore',
                'contact',
                'links',
                'settings',
                'law',
                'rules',
                'settingTitle'
            ];
        }

        $about = Blog::select($aboutFundSelect)
            ->whereNull('parent_id')
            ->where('section', '=', 1)->orderBy('order', 'asc')->get();

        $foundation = Blog::select($aboutFundSelect)
            ->whereNull('parent_id')
            ->where('section', '=', 2)->orderBy('order', 'asc')->get();

        $news = News::select($newsSelect)->get();

        $blogTitle = DB::table('blogs')->rightJoin('nav_charts', 'blogs.id', '=', 'nav_charts.parent_id')->select($blogTitleSelect)->first();
        $contact   = Contacts::select($contactSelect)->where('mine', '=', true)->first();
        $law       = Rules::select($lawRulesSelect)->where('type', '=', 1)->get();
        $rules     = Rules::select($lawRulesSelect)->where('type', '=', 2)->get();
        $footer    = Company::select($footerSelect)->first();

        return view('main.index', [
            'about'      => $about,
            'foundation' => $foundation,
            'blogTitle'  => $blogTitle,
            'news'       => $news,
            'contact'    => $contact,
            'law'        => $law,
            'rules'      => $rules,
            'footer'     => $footer,
            'locale'     => $locale
        ]);
    }

    public function about($locale)
    {
        $this->checkLocale($locale);

        if ($locale === 'en') {
            $aboutSelect    = ['id', 'oln as name', 'old as description', 'type', 'image'];
            $fundSelect     = ['id', 'oln as name'];
            $contactSelect  = ['phone', 'ola as address', 'email'];
            $lawRulesSelect = ['url', 'oln as name'];
            $footerSelect   = [
                'oln as name',
                'olma as menuAbout',
                'olmf as menuFoundation',
                'olnn as news',
                'olnm as newsMore',
                'olc as contact',
                'oll as links',
                'ols as settings',
                'ollaw as law',
                'olr as rules',
                'olst as settingTitle',
                'olw as work',
                'ole as education'
            ];
        }
        elseif ($locale === 'am') {
            $aboutSelect    = ['id', 'name', 'description', 'type', 'image'];
            $fundSelect     = ['id', 'name'];
            $lawRulesSelect = ['url', 'name'];
            $contactSelect  = ['phone', 'address', 'email'];
            $footerSelect   = [
                'name',
                'menuAbout',
                'menuFoundation',
                'news',
                'newsMore',
                'contact',
                'links',
                'settings',
                'law',
                'rules',
                'settingTitle',
                'work',
                'education'
            ];
        }
        $blog = Blog::select($aboutSelect)->whereNull('parent_id')
            ->where('section', '=', 1)->orderBy('order', 'asc')->get();

        $foundation = Blog::select($fundSelect)->where('section', '=', 2)->whereNull('parent_id')
            ->orderBy('order', 'asc')->get();

        $contact = Contacts::select($contactSelect)->where('mine', '=', true)->first();
        $law     = Rules::select($lawRulesSelect)->where('type', '=', 1)->get();
        $rules   = Rules::select($lawRulesSelect)->where('type', '=', 2)->get();
        $footer  = Company::select($footerSelect)->first();

        return view('main.about-us', [
            'blog'       => $blog,
            'foundation' => $foundation,
            'contact'    => $contact,
            'law'        => $law,
            'rules'      => $rules,
            'footer'     => $footer,
            'locale'     => $locale
        ]);
    }

    public function foundation($locale)
    {
        $this->checkLocale($locale);

        if ($locale === 'en') {
            $aboutSelect       = ['id', 'oln as name', 'type'];
            $fundSelect        = ['id', 'oln as name', 'old as description', 'type', 'image'];
            $contactSelect     = ['old as description', 'website', 'fax', 'phone', 'ola as address', 'email', 'mine'];
            $lawRulesSelect    = ['url', 'oln as name'];
            $footerSelect      = [
                'oln as name',
                'olma as menuAbout',
                'olmf as menuFoundation',
                'olnn as news',
                'olnm as newsMore',
                'olc as contact',
                'oll as links',
                'ols as settings',
                'ollaw as law',
                'olr as rules',
                'olst as settingTitle',
            ];
            $chartTitlesSelect = [
                'ola as asset',
                'ols as areas',
                'olm as maturity',
                'oly as currency',
                'olc as country',
                'ollt as lastText'
            ];
        }
        elseif ($locale === 'am') {
            $aboutSelect       = ['id', 'name', 'type'];
            $fundSelect        = ['id', 'name', 'description', 'image', 'type'];
            $lawRulesSelect    = ['url', 'name'];
            $contactSelect     = ['description', 'fax', 'website', 'phone', 'address', 'email', 'mine'];
            $footerSelect      = [
                'name',
                'menuAbout',
                'menuFoundation',
                'news',
                'newsMore',
                'contact',
                'links',
                'settings',
                'law',
                'rules',
                'settingTitle',
            ];
            $chartTitlesSelect = [
                'asset',
                'areas',
                'maturity',
                'currency',
                'country',
                'lastText'
            ];
        }


        $blog = Blog::select($fundSelect)->whereNull('parent_id')
            ->where('section', '=', 2)->orderBy('order', 'asc')->get();

        $about = Blog::select($aboutSelect)
            ->where('section', '=', 1)->whereNull('parent_id')
            ->orderBy('order', 'asc')->get();

        $contacts = Contacts::select($contactSelect)->get();
        $law      = Rules::select($lawRulesSelect)->orderBy('order', 'asc')->where('type', '=', 1)->get();
        $rules    = Rules::select($lawRulesSelect)->orderBy('order', 'asc')->where('type', '=', 2)->get();
        $footer   = Company::select($footerSelect)->first();
        $charts   = foundation::select($chartTitlesSelect)->first();

        return view('main.about-foundation', [
            'blog'     => $blog,
            'about'    => $about,
            'contacts' => $contacts,
            'law'      => $law,
            'rules'    => $rules,
            'footer'   => $footer,
            'charts'   => $charts,
            'locale'   => $locale
        ]);

    }

    private function checkLocale($locale)
    {
        if (!in_array($locale, ['en', 'am'])) {
            abort(400);
        }
    }

}
