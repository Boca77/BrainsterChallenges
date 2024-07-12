<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function Home()
    {
        return view(
            'home',
            [
                'pageTitle' => 'Home - Page',
                'title' => "Clean Blog",
                'subtitle' => "A Blog Theme by Start Bootstrap",
                'bgUrl' => 'imgs/home-bg.jpg'
            ]
        );
    }

    public function About()
    {
        return view(
            'about',
            [
                'pageTitle' => 'About',
                'title' => "About Me",
                'subtitle' => "This is what i do.",
                'bgUrl' => 'imgs/about-bg.jpg'
            ]
        );
    }

    public function Post()
    {
        return view(
            'post',
            [
                'pageTitle' => 'Posts',
                'title' => "Man must explore, and this is exploration at it's greatest",
                'title2' => "Problems look mighty small from 150 miles up",
                'subtitle' => "Posted by Start Bootstrap on August 24, 2018",
                'bgUrl' => 'imgs/blog-image.jpg'
            ]
        );
    }

    public function Contact()
    {
        return view(
            'contact',
            [
                'pageTitle' => 'Contact Me',
                'title' => "Contact me",
                'subtitle' => "Have any questions? I have answers!",
                'bgUrl' => 'imgs/contact-bg.jpg'
            ]
        );
    }
}
