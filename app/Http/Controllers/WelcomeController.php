<?php
  
namespace App\Http\Controllers;
  
use App\Models\Star;
use Illuminate\Http\Request;
  
class WelcomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::latest()->paginate(5);
        return view('welcome',compact('stars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}