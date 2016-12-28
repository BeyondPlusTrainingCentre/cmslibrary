<?php

/**
 * Created by Beyond Plus <bplusmyanmar@hotmail.com>
 * User: Beyond Plus
 * Date: D/M/Y
 * Time: MM:HH PM
 */
namespace BeyondPlus\CmsLibrary\Controllers\BpAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use BeyondPlus\CmsLibrary\Models\Bp_post;
use BeyondPlus\CmsLibrary\Models\Bp_menu;
use BeyondPlus\CmsLibrary\Models\User;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;
use BeyondPlus\CmsLibrary\Services\MenuService;
use BeyondPlus\CmsLibrary\Transformers\MenuTransformer;
use Auth;

class MenuController extends Controller
{
    var $categories;
    protected $service;
    public function __construct(MenuService $service)
    {   
        $this->middleware('auth');
        $this->service = $service;
        $this->transformer = new MenuTransformer;
       
    }


    public function index(Request $request){
        $per_page = $request->input('per_page',Limit::NORMAL );
        $query = $this->service->menu($per_page);
        return $this->transformer->transform($query);
    }


    public function pageStore(Request $request){
        $pages  = $request->get('pages');

        foreach( $pages as $i => $value) {
            $page['post_id'] = $pages[$i];
            $getpages = Bp_post::where('id' , '=', $pages[$i])->first();
            $page_name = $getpages->title;

            $page['menu_name'] = $page_name;
            $page['menu_link'] = $page_name;
            $page['staff_id'] = Auth::user()->id;
            Bp_menu::create($page);
        }
        return response()->json(['success' => 1]);
    }

    public function postStore(Request $request){
        $posts  = $request->get('posts');

        foreach( $posts as $i => $value) {
            $post['post_id'] = $posts[$i];
            $getposts = Bp_post::where('id' , '=', $posts[$i])->first();
            $post_name = $getposts->title;
            $post['menu_name'] = $post_name;
            $post['menu_link'] = $post_name;
            $post['staff_id'] = Auth::user()->id;
            Bp_menu::create($post);
        }

        return response()->json(['success' => 1]);
    }


    public function store(Request $request){
        // $this->validate($request, [
        // 'title' => 'required',
        // 'description' => 'required'
        // ]);
        $inputs = $request->all();
        $inputs['menu_link'] = $request->input('menu_link');
        $inputs['staff_id'] = Auth::user()->id;
        Bp_menu::create($inputs);
        return response()->json(['success' => 1]);
    }

    public function update($id, Request $request)
    {
        $inputs = $request->all();
        $inputs['menu_link'] = $request->input('menu_link');

        Bp_menu::findOrFail($id)->update($inputs);
        return response()->json(['success' => 1]);
    }

    public function destroy($id)
    {
        Bp_menu::find($id)->delete();
        return response()->json(['success' => 1]);
    }

}
