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
use Illuminate\Routing\Controller;
use BeyondPlus\CmsLibrary\Models\Bp_category;
use BeyondPlus\CmsLibrary\Utils\Limit;
use BeyondPlus\CmsLibrary\Services\CategoryService;
use BeyondPlus\CmsLibrary\Transformers\CategoryTransformer;


class CategoryController extends Controller
{
    protected $service;
    public function __construct(CategoryService $service)
    {   
        $this->middleware('auth');
        $this->service = $service;
        $this->transformer = new CategoryTransformer;
    }

	public function index(Request $request){     
        $per_page = $request->input('per_page',Limit::NORMAL );
        $query = $this->service->category($per_page);
        return $this->transformer->transform($query);
	}

    public function search(Request $request){
        $query = $this->service->search($request->all());
        if(sizeof($query)>0){
            return  $query;
        } else {
            return  json_encode([]);
        }

    }

	public function store(Request $request){
        // $this->validate($request, [
        // 'category_name' => 'required'
        // ]);
        $inputs = $request->except('category_id');
        $inputs['category_link'] = str_replace(' ', '-', strtolower($request->input('category_name')));
        try {
            $query = Bp_category::create($inputs);
            return response(['success' =>  sizeof($query) ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return 'Category Not Found';
        }		
	}

    public function update($id, Request $request)
    {
        $inputs = $request->all();
        $inputs['category_link'] = str_replace(' ', '-', strtolower($request->input('category_name')));
        Bp_category::findOrFail($id)->update($inputs);
        return json_encode(['success' => '1']);
    }

    public function destroy($id)
    {
        try {
            Bp_category::destroy($id);
         } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return 'Category Not Found';
        }
        
    }

}
