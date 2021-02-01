<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class MainCategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id','DESC') -> paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index', compact('categories'));
    }
    /*public function index(Request $request)
    {
        $categories = Category::parent()
            ->with('childrenCategories')
            ->orderBy('id','DESC')
            ->get();

        $categories_table = Category::with('_parent')
            ->with('childrenCategories')
            ->orderBy('id','DESC')
            ->get();

        if ($request->ajax()) {

            return DataTables::of($categories_table)
                ->addIndexColumn()

                ->addColumn('parent_id', function ($row) {
                    return $row->_parent->name ?? '--';
                })

                ->addColumn('is_active', function ($row) {
                    return $row->is_active == 1 ? _('translate-admin/category.active') : _('translate-admin/category.not active');
                })
                ->addColumn('photo', function ($row) {
                    return '<img src="' . $row->photo . '" border="0" style="width: 100px; height: 90px;" class="img-rounded" align="center" />';

                })
                ->addColumn('action', function ($row) {
                    $url = route('edit.category', $row->id);
                    $btn = '<td><a href="' . $url . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-outline-primary box-shadow-3 mb-1 editMain_categories" style="width: 80px"><i class="la la-edit"></i>'.__('translate-admin/category.edit').'</a></td>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn = $btn . ' <td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-outline-danger box-shadow-3 mb-1 deleteMain_categories" style="width: 80px"><i class="la la-remove"></i> '.__('translate-admin/category.delete').'</a></td>';
                    return $btn;
                })
                ->rawColumns(['photo', 'action'])
                ->make(true);


        }


        return view('admin.categories.index', compact('categories'));
    }*/

    public function create()
    {
         $categories = Category::parent()->get();
        return view('dashboard.categories.create',compact('categories'));
    }

    public function store(MainCategoryRequest $request)
    {

        try {

            DB::beginTransaction();

            //validation

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //if user choose main category then we must remove paretn_id from the request

            if($request -> type == CategoryType::mainCategory) //main category
            {
                $request->request->add(['parent_id' => null]);
            }
            //if($request -> type == 1) //main category
            //{
                //$request->request->add(['parent_id' => null]);
            //}

            //if he choose child category we must add parent_id


            $category = Category::create($request->except('_token'));

            //save translations
            $category->name = $request->name;
            $category->save();

            DB::commit();
            return redirect()->route('admin.maincategories')->with(['success' => __('admin/setting.added successfully')]);
            

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error' => __('admin/setting.there is a mistake, please try again later')]);
        }

    }


    public function edit($id)
    {

        //get specific categories and its translations
        $category = Category::orderBy('id', 'DESC')->find($id);
        //$category->makeVisible(['translations']);
        if (!$category)
            return redirect()->route('admin.maincategories')->with(['error' =>  __('admin/setting.this section does not exist')]);

        return view('dashboard.categories.edit', compact('category'));

    }


    public  function update(MainCategoryRequest $request,$id){

        try{
            $category=Category::find($id);
            if(!$category){
                return redirect()->route('admin.maincategories')->with(['error'=>'هذا القسم غير موجود']);
            }else{
                $requestData=$request->except(['_token','_method']);
                $requestData["is_active"]=$request->has("is_active")?1:0;
                DB::beginTransaction();
                $category->update($requestData);
                DB::commit();
                return redirect()->route('admin.maincategories')->with([
                    'success'=>'تم تحديث  القسم بنجاح'
                ]);
            }
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.maincategories')->with([
                'error'=>'هناك خطأ ما يرجى المحاولة مرة أخرى'
            ]);
        }
    }


    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category)
                return redirect()->route('admin.maincategories')->with(['error' => __('admin/setting.this section does not exist')]);

            $category->translations()->delete();  
            $category->delete();

            return redirect()->route('admin.maincategories')->with(['success' => __('admin/setting.the deletion was successful')]);

        } catch (\Exception $ex) {
            return redirect()->route('admin.maincategories')->with(['error' => __('admin/setting.there is a mistake, please try again later')]);
        }
    }

}
