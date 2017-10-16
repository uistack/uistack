<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
use Goutte;

class WebScraperController extends Controller
{
    public function __construct(Goutte $goutte)
    {
//        $this->goutte = $goutte;
    }

    public function index(Goutte $goutte)
    {
//        $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
        $crawler = Goutte::request('GET', 'https://www.flipkart.com/');
//        $crawler->filter('.result__title .result__a')->each(function ($node) {
        $crawler->filter('._2kSfQ4 .iUmrbN')->each(function ($node) {
            dump($node->text());
        });
//        return view('welcome');
    }
}