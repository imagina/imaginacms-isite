<?php

namespace Modules\Isite\Console;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Crawler\Crawler;

class GenerateSitemapCommand extends Command
{

  protected $signature = 'sitemap:generate';
  protected $description = 'Generate the sitemap.';

  public function handle()
  {
    // modify this to your own needs
    SitemapGenerator::create(config('app.url'))
      ->configureCrawler(function (Crawler $crawler) {
        $crawler->setMaximumDepth(setting('isite::sitemapDepth'));
        $crawler->setParseableMimeTypes(['text/html', 'text/plain']);
      })
      ->writeToFile(public_path('sitemap.xml'));
    \Log::info('Sitemap Generate successfully');
  }
}