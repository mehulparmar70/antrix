<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\Media;

use File;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    // public function __construct(){
    //     $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

    // }

    // public function index()
    // {
    //     // $data = ['parent_categories' =>  $this->parent_categories];
    //     // return view('adm.pages.product.index', $data);
    // }

    public function __construct(){
        $this->products = Product::orderBy('id','DESC')->get();
        $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

    }

    public function index(Request $request)
    {
        // dd($request->image);
        $product = Product::where('id', $request->image)->first();
        $productSearch = Product::where('category_id', $request->search)->first();
        $productPhotos =  Media::where('media_id', $productSearch->id)->get();

        // dd($productSearch);
        
        if(isset($product) && $request->image){
            return view('adm.pages.product.image', ['product' => $product]);
        }
        elseif(isset($productSearch) && $request->search){
            $data = [
                'parent_categories' =>  $this->parent_categories,
                'products' => $productSearch,
                'productPhotos' => $productPhotos,
                'seach_id' => $request->search
            ];
            return view('adm.pages.product.index', $data);
        }else{
        // dd('test');
            $data = [
                'parent_categories' =>  $this->parent_categories,
                'products' => $productSearch,
                'productPhotos' => $productPhotos,
                'seach_id' => null
            ];
            return view('adm.pages.product.index', $data);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $product = category::where('id', $request->subCategory)->first();
        $subCategory = category::where('id', $request->subCategory)->get();

        
        if(isset($product) && $request->image){
            return view('adm.pages.product.image', ['product' => $product]);
        }

        elseif($subCategory->count() > 0 && $request->subCategory){
            $isProductAvailable = DB::table('products')->where('category_id', $request->subCategory)->first();
            $data = [
                'parent_categories' =>  $this->parent_categories,
                'selectedSubCategory' =>  $this->subCategory,
                'seach_id' => $request->subCategory,
                'productDetail' => $isProductAvailable
            ];

            return view('adm.pages.product.create', $data);
        }
        else{
            $data = [
                'parent_categories' =>  $this->parent_categories,
                'products' => $subCategory,
                'seach_id' => null,
                'productDetail' => null
            ];
            return view('adm.pages.product.create', $data);
        }

        $data = ['parent_categories' =>  $this->parent_categories];
        return view('adm.pages.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        dd($request->input());
        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }

        $request->validate([
        ]);

        $image_name = uploadTinyImageThumb($request);
        $isProduct = Product::where('category_id', $request->sub_category)->first();
        // dd($isProduct);
        
        if(isset($isProduct)){
            $data = [
                'name' => $request->name,
                'full_description' => $request->full_description,
                'slug' => $request->slug,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'search_index' => $request->search_index,
                'search_follow' => $request->search_follow,
                'canonical_url' => $request->canonical_url,
                'status' => 1,
                'category_id' => $request->sub_category,
            ];

            $save = DB::table('products')->where('id', $isProduct->id)->update($data);

            
                    return redirect(route('admin.index').'/photo?page=manage&main_category='.$request->main_category.'&sub_category='.$request->sub_category)->with('success', 'Product Details Updated...');
                

        }else{
            // $product = Product::where('category_id', $request->category_id)->first();
          
            $product = new Product;
            $product->name = $request->name;   
            $product->full_description = $request->full_description;
            $product->slug  = $request->slug;
            $product->meta_title  = $request->meta_title;
            $product->meta_keyword  = $request->meta_keyword;
            $product->meta_description  = $request->meta_description;
    
            $product->search_index = $request->search_index;      
            $product->search_follow = $request->search_follow;      
            $product->canonical_url = $request->canonical_url;    
    
            $product->category_id  = $request->sub_category;
            $product->status  = 1;
            $save = $product->save();

            if($save){
                // return back()->with('success', 'Product Details Created...');
                return redirect(route('admin.index').'/photo?page=manage&main_category='.$request->main_category.'&sub_category='.$request->sub_category)->with('success', 'Product Details Updated...');

            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }
        // dd($task->id);
    }
    

    public function productImage(Request $request){
        $product = Product::find($request->id);
        // dd($product);
        // echo $request->id;

        // dd(getParentCategory($product->category_id)['subcategory']->name);
        $data = [
            'main_categories' =>  $this->parent_categories,
            'products' => $productSearch,
            'seach_id' => null
        ];
        // dd($data);

        return view('adm.pages.product.image', $data);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $data = [
            'product' =>  $product, 
            'parent_categories' => $this->parent_categories
        ];

        if($product){
            return view('adm.pages.product.edit', $data);
        }else{
            return redirect(route('product.index'))->with('fail', 'Product Not Available...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'full_description' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:'.getMaxUploadSide(),
            

        ]);

        if($request->file('image')){
            $image_name = uploadTinyImageThumb($request);
        }else{
            $image_name = $request->old_image;
        }
        
        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }
        

        $product =  Product::find($id);
        $product->name = $request->name;   
        $product->short_description = $request->short_description;             
        $product->full_description = $request->full_description;      
        $product->image  = $image_name ; 
        $product->image_alt = $request->image_alt;       
        $product->image_title  = $request->image_title;
        $product->slug  = $request->slug;
        $product->meta_title  = $request->meta_title;
        $product->meta_keyword  = $request->meta_keyword;
        $product->meta_description  = $request->meta_description;

        $product->search_index = $request->search_index;      
        $product->search_follow = $request->search_follow;      
        $product->canonical_url = $request->canonical_url;    

        $product->category_id  = $request->category_id;
        $product->status  = $status;

        $save = $product->save();

        if($save){
            return back()->with('success', 'Product Updated...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         if(File::exists(public_path('web').'/media/lg/'.$product->image)){
          unlink(public_path('web').'/media/lg/'.$product->image);
          unlink(public_path('web').'/media/md/'.$product->image);
          unlink(public_path('web').'/media/sm/'.$product->image);
          unlink(public_path('web').'/media/xs/'.$product->image);
          unlink(public_path('web').'/media/icon/'.$product->image);

          deleteTableUrlData($product->id,'product_link');
         $product = $product->delete();
         return back()->with('success', 'Product Deleted...');
        }
        else{
            deleteTableUrlData($product->id, 'product_link');
            $product = $product->delete();
            return back()->with('success', 'Product Deleted...');
        }

       
    }


}
