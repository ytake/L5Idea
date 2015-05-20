<?php
namespace App\Http\Controllers;

/**
 * Class IndexController
 * @package App\Http\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class IndexController extends AbstractController
{

    public function index()
    {
        return view('welcome');
    }
    
}
