<?php

namespace App\Http\Controllers\Panel\Admin\Sitemap;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemapController extends Controller
{
    public function index()
    {
        return view('panel.admin.sitemap.index');
    }

    public function generate(Request $request)
    {
        try {
            SitemapGenerator::create(config('app.url'))
                ->shouldCrawl(function (UriInterface $url) {
                    return strpos($url->getPath(), '/articles/read-documentation') === false;
                })
                ->writeToFile(public_path('sitemap.xml'));
        } catch (\Throwable $th) {
            info($th->getMessage());
            return redirect()->back()->withInput($request->all())->with('alert', Helpers::sendAlert(false, $th->getMessage()));
        }

        return redirect()->route('admin.sitemap.index')->with('alert', Helpers::sendAlert(true, 'Sitemap berhasil dibuat.'));
    }
}
