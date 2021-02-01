<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\MainCategoryRequest;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductGenaralValidation;
use App\Http\Requests\GeneralProductRequestUpdate;
//use App\Http\Requests\ProductStockRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File; 

class ProductsController extends Controller
{

    public function index()
    {    

        $products = Product::select('id','slug','price', 'created_at','is_active')->paginate(PAGINATION_COUNT);
        return view('dashboard.products.general.index', compact('products'));
    }
    public function index1()
    {    

        $products = Product::select('id','slug','price', 'created_at','is_active')->paginate(PAGINATION_COUNT);
        return view('dashboard.products.general.edit', compact('products'));
    }

    public function create()
    {
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();

        return view('dashboard.products.general.create', $data);
    }

    public function store(GeneralProductRequest $request)
    {
        return $request;
     try {
        DB::beginTransaction();

        //validation

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        $product = Product::create([
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
            'is_active' => $request->is_active,
        ]);
        //save translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        //save product categories

        $product->categories()->attach($request->categories);

        //save product tags
        $product->tags()->attach($request->tags);
        DB::commit();
        return redirect()->route('admin.products')->with(['success' => __('admin/setting.added successfully')]);
     } catch (\Exception $ex) {
        DB::rollback();
        return redirect()->route('admin.products')->with(['error' => __('admin/setting.there is a mistake, please try again later')]);

    }
    }



    public function getAll($product_id){
        //return $request;
        $data1 = Product::find($product_id);

        if (!$data1)
            return redirect()->route('admin.products')->with(['error' =>  __('admin/setting.this prouduct does not exist')]);
        return view('dashboard.products.imagespricesstock.create')-> with('id',$product_id) ;
        
        }
       

    public function saveProductInfo(ProductGenaralValidation $request){

        //return $request;
        try{
            //Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));
            Product::whereId($request -> product_id) -> update($request -> except(['_token','product_id']));

            return redirect()->route('admin.products')->with(['success' => __('admin/setting.added successfully')]);
            
        }catch(\Exception $ex){
            //return redirect()->back()->with(['error' => __('admin/setting.there is a mistake, please try again later')]);
        }
    }
    public function addImages($product_id){
        return view('dashboard.products.images.create')->withId($product_id);
    }

    //to save images to folder only
    public function saveProductImages(Request $request ){

        $file = $request->file('dzfile');
        $filename = uploadImage('products', $file);

        return response()->json([
        'name' => $filename,
        'original_name' => $file->getClientOriginalName(),
     ]);

    }

    public function saveProductImagesDB(ProductGenaralValidation $request){
        //return $request;
       try {
        // save dropzone images
        if ($request->has('document') && count($request->document) > 0) {
            foreach ($request->document as $image) {
                Image::create([
                    'product_id' => $request->product_id,
                    'photo' => $image,
                ]);
            }
        }

        return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);

    }catch(\Exception $ex){
        return redirect()->back()->with(['error' => __('admin/setting.there is a mistake, please try again later')]);
    }
}


    /*public function getStock($product_id){
        $data1 = Product::find($product_id);

        if (!$data1)
            return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);
        return view('dashboard.products.imagespricesstock.create') -> with('id',$product_id) ;
    }

    public function saveProductStock (ProductStockRequest $request){

        return $request;
            Product::whereId($request -> product_id) -> update($request -> except(['_token','product_id']));

            return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);

    }

    */
    public function edit($id)
    {
        //get specific categories and its translations
        $products = Product::orderBy('id', 'DESC')->find($id);

        if (!$products)
            return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);

            $data = [];
            $data['brands'] = Brand::active()->select('id')->get();
            $data['tags'] = Tag::select('id')->get();
            $data['categories'] = Category::active()->select('id')->get();
            //dd($products);
            return view('dashboard.products.general.edits.edit1', compact('products'), $data);

    }


    public function update(GeneralProductRequestUpdate $request,$id)
    {
        return $request;
        
        try {
            //DB::beginTransaction();

        //validation
        $product=Product::find($id);
        if (!$product)
                return redirect()->route('admin.brands')->with(['error' => __('admin/setting.this trademark does not exist')]);
                DB::beginTransaction();

                if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
        //update translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        //update product categories

        $product->categories()->attach($request->categories);

        //update product tags
        $product->tags()->attach($request->tags);
        
         DB::commit();
            return redirect()->route('admin.products.edit')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.products.edit')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }





    public function edit2($id)
    {

        //get specific categories and its translations
        $products = Product::orderBy('id', 'DESC')->find($id);

        if (!$products)
            return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);

            $data = [];
            $data['brands'] = Brand::active()->select('id')->get();
            $data['tags'] = Tag::select('id')->get();
            $data['categories'] = Category::active()->select('id')->get();
    
            return view('dashboard.products.general.edits.edit2', compact('products'), $data);

    }


    public function update2(GeneralProductRequest $request,$id)
    {
        //return $request;
        try {
            //validation

            //update DB


            $products = Product::find($id);

            if (!$products)
                return redirect()->route('admin.products.edit')->with(['error' => 'هذا القسم غير موجود']);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $products->update($request->all());

            //save translations
            $products->name = $request->name;
            $products->save();

            return redirect()->route('admin.products.edit')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.products.edit')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }




    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $products = Product::orderBy('id', 'DESC')->find($id);
            $images = Image::find($id);
            if (!$products)
                return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);
               // $path = parse_url($products->photo);
                //File::delete(public_path($path['path']));
            $products->translations()->delete();
            $products->images()->delete();
            $products->delete();
            
            return redirect()->route('admin.products')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    

}
