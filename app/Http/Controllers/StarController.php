<?php
  
namespace App\Http\Controllers;
  
use App\Models\Star;
use Illuminate\Http\Request;
  
class StarController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::latest()->paginate(5);
        return view('stars.index',compact('stars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stars.create');
    }
    
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Star::create($input);
     
        return redirect()->route('stars.index')
                        ->with('success','Le profil a bien été crée');
    }
     
    /**
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        return view('stars.show',compact('star'));
    }
     
    /**
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function edit(Star $star)
    {
        return view('stars.edit',compact('star'));
    }
    
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Star $star)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'description' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $star->update($input);
    
        return redirect()->route('stars.index')
                        ->with('success','Le profil a bien été mis à jour');
    }
  
    /**
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(Star $star)
    {
        $star->delete();
     
        return redirect()->route('stars.index')
                        ->with('success','Le profil a bien été supprimé');
    }
}