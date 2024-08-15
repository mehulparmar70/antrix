<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\Category;
use App\Models\admin\Media;
use Session;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->parent_categories = category::where(['parent_id'=>0])->orderBy('item_no')->get();

        

        // function customRedirect($routeName, $id, $type){
        //     return redirect(route($routeName, $id, $type))->with('success', 'Category Updated...');
        // }
    }
    

    public function index()
    {

        $subCategories = array();
        $productRangeCategories = array();
        $productRangeSubcategories = array();

        foreach($this->parent_categories as $parent_category){
            $subCats = category::where(['parent_id'=>$parent_category->id])->orderBy('id','DESC')->get();
            foreach($subCats as $subCat){
                $subCategories[] = $subCat;
            }
        }

        foreach($this->parent_categories as $parent_category){
            $subCats = category::where(['parent_id'=>$parent_category->id])->orderBy('id','DESC')->get();

            foreach($subCats as $subCat){
                $productRanges = category::where(['parent_id'=>$subCat->id])->orderBy('id','DESC')->get();
                foreach($productRanges as $productRange){
                    $productRangeCategories[] = $productRange;
                }
                $productRangeSubcategories[] = $subCat;
            }
        }
        
        $data = ['parent_categories' =>  $this->parent_categories, 
        'sub_categories' => $subCategories, 'productRangeCategories' => $productRangeCategories,
         'productRangeSubcategories' => $productRangeSubcategories, 'seach_id' => null];
        return view('adm.pages.category.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if((isset($request->type) && $request->type == 'main_category') || (isset($request->type) && $request->type == 'sub_category')){

            $data = ['parent_categories' =>  $this->parent_categories];
            return view('adm.pages.category.create',$data);
        }else{
            return redirect(route('admin.category.create').'?type=main_category');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $close = $request->close;
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'unique:categories,slug'
        ]);


        if($request->status){
            $status = $request->status;
        }else{
            $status = 0;
        }

        if(isset($request->category_parent_id)){
            $parent_id = $request->category_parent_id;
        }else{
            $parent_id = 0;
        }
        $image_name = uploadTinyImageThumb($request);
        $status = ($request->status == null ? 0 : 1);
        $category = new Category;
        $category->name = $request->name;
        $category->description  = $request->description;
        $category->short_description  = $request->short_description;
        
        $category->image  = $image_name ; 
        $category->image_alt = $request->image_alt;      
        $category->image_title = $request->image_title;      
        $category->slug  = $request->slug;
        $category->meta_title  = $request->meta_title;
        $category->meta_keyword  = $request->meta_keyword;
        $category->meta_description  = $request->meta_description;

        $category->search_index = $request->search_index;      
        $category->search_follow = $request->search_follow;      
        $category->canonical_url = $request->canonical_url;    

        $category->status  = $status;

        $category->parent_id  = $parent_id;

        $save = $category->save();
        if($save){
            // return back()->with('success', 'New Category Added...');

            if($request->page_type == 'main_category'){
                return(redirect(route('admin.category.edit',$parent_id).'/photo?page=manage&main_category='.$parent_id.'&sub_category='.$category->id))->with('success', 'Sub Category Added...');   
            }
            elseif($request->page_type == 'sub_category'){
                if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true')
                {
                    if ($request->close == "1") {
                        session()->put('success','Sub Category Added...');
                        return(redirect(route('admin.close')));
                    }else if ($request->close == "2") {
                        session()->put('success','Sub Category Added...');
                        return(redirect(route('admin.index').'/category/create?onscreenCms=true&type=sub_category&id='.$parent_id))->with('success', 'Sub Category Added...'); 
                    } else {
                        return(redirect(route('admin.index').'/photo?onscreenCms=true&page=manage&main_category='.$parent_id.'&sub_category='.$category->id))->with('success', 'Sub Category Added...');   
                    }
                }
                return(redirect(route('admin.index').'/photo?page=manage&main_category='.$parent_id.'&sub_category='.$category->id))->with('success', 'Sub Category Added...');   
            }

            if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true')
            {
                if ($request->close == "1") {
                    session()->put('success','Main Category Added...');
                    return(redirect(route('admin.close')));
                } else {
                    return(redirect(route('admin.index').'/category/create?onscreenCms=true&type=sub_category&id='.$category->id))->with('success', 'Main Category Added...');   
                }
            }
        
            return(redirect(route('admin.index').'/category/create?type=sub_category&id='.$category->id))->with('success', 'Main Category Added...');   
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
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
    public function edit(Request $request, $id)
    {

        if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true'){
            session(['backUrl' => url()->previous()]);
        }
        $category = Category::where('id', $id)->first();
        // $this->parent_categories

        $data = ['type'=> $request->type, 'parent_categories' => $this->parent_categories,
                'categories' =>  category::where(['parent_id'=>0])->whereNotIn('id',[$id])
                                ->orderBy('id','DESC')->get(),
                 'category'=> $category ];

                
        if($category){
            return view('adm.pages.category.edit',$data);
        }else{
            return redirect(route('admin.category.list'))->with('fail', 'Category Not Available...');
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
        $close = $request->close;
        //
        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpg,png,jpeg,webp'
            
        ]);
  
        if($request->file('image')){
            $image_name = uploadTinyImageThumb($request);
            deleteBulkImage($request->old_image);
        }else{
            $image_name = $request->old_image;
        }

        if(isset($request->category_parent_id)){
            $parent_id = $request->category_parent_id;
        }else{
            $parent_id = 0;
        }
        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description  = $request->description;
        $category->short_description  = $request->short_description;
        
        $category->image  = $image_name ; 
        $category->image_alt = $request->image_alt;      
        $category->image_title = $request->image_title;      
        $category->slug  = $request->slug;
        $category->meta_title  = $request->meta_title;
        $category->meta_keyword  = $request->meta_keyword;
        $category->meta_description  = $request->meta_description;

        $category->search_index = $request->search_index;      
        $category->search_follow = $request->search_follow;      
        $category->canonical_url = $request->canonical_url;    

        $category->parent_id  = $parent_id;
        $category->status  = $status;
        $save = $category->save();

            if($save){
                if($request->pageType == 'main_category'){

                    if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true')
                    {
                        if ($request->close == "1") {
                            session()->put('success','Sub Category Updated...');
                            return(redirect(route('admin.close')));
                        } else {
                            return(redirect(route('admin.category.create').'?onscreenCms=true&type=sub_category&id='.$id))->with('success', 'Sub Category Added...');   
                        }
                    }

                    return(redirect(route('admin.category.create').'?type=sub_category&id='.$id))->with('success', 'Sub Category Added...');   
                }
                elseif($request->pageType == 'sub_category'){
                    if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true')
                    {
                        if ($request->close == "1") {
                            session()->put('success','Sub Category Updated...');
                            return(redirect(route('admin.close')));
                        } else if ($request->close == "2") {
                            session()->put('success','Sub Category Updated...');
                            return(redirect(route('admin.category.create').'?onscreenCms=true&type=sub_category&id='.$id))->with('success', 'Sub Category Added...'); 
                        }else {

                            return(redirect(route('admin.index').'/photo?onscreenCms=true&page=manage&main_category='.$parent_id.'&sub_category='.$category->id))->with('success', 'Sub Category Updated...');   
                        }
                    }
                    return(redirect(route('admin.index').'/photo?page=manage&main_category='.$parent_id.'&sub_category='.$category->id))->with('success', 'Sub Category Updated...');   
                }
    
                
                return(redirect(route('admin.index').'/photo?page=manage&main_category='.$parent_id.'&sub_category='.$category->id))->with('success', 'Sub Category Added...');   
            
                // return redirect(route('admin.category.create').'?type=sub_category&id='.$category->id)->with('success', 'Category Updated...');
                // return back()->with('success', 'Category Updated...');
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
    public function destroy(Category $category)
    {
        $category = $category->delete();
        if($category){
            // $subCategories = DB::table('categories')->where('parent_id')
            // $category
            return back()->with('success', 'category Deleted... 000 ');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    
    public function close()
    {
        // return back()->with('fail', 'Something went wrong, try again later...');
        echo "<script>window.opener.location.reload();</script>";
        echo "<script>window.close();</script>";
    }
    public function categoryDelete(Request $request,$id)
    {
        
        $category = Category::find($id);
        if(!$category){
            return redirect(route('admin.category.list'))->with('fail', 'Category Not Available...');
        }
        deleteTableUrlData($id, 'category_link');
        
        $checkSubCategories = DB::table('categories')->where('parent_id', $id)->get();
        if($checkSubCategories->count() > 0){
            foreach($checkSubCategories as $checkSubCategory){

                deleteSubCategoryImages($checkSubCategory->id);
                
                checkProductIsEXist($checkSubCategory->id);
                    if(isset($checkSubCategory->image)){
                        deleteSubCategoryImages($checkSubCategory->id);
                    }
                deleteTableUrlData($checkSubCategory->id, 'category_link');

                //del sub cateogry
                DB::table('categories')->where('id', $checkSubCategory->id)->delete();
                $checkSubCategories2 = DB::table('categories')->where('parent_id', $checkSubCategory->id)->get();
                if($checkSubCategories2->count() > 0){
                    foreach($checkSubCategories2 as $checkSubCategories22){
                        //del sub cateogry2
                        DB::table('categories')->where('id', $checkSubCategories22->id)->delete();
                        checkProductIsEXist($checkSubCategories22->id);
                            if(isset($checkSubCategories22->image)){
                                deleteSubCategoryImages($checkSubCategories22->id);
                            }
                        deleteTableUrlData($checkSubCategories22->id, 'category_link');
                    }
                }
            }
        }else{
            $medias = Media::where('media_id', $id)->get();
            foreach($medias as $media){
                deleteSubCategoryImages($media->id);
            }
        }
        
        deleteSubCategoryImages($category->id);
        DB::table('categories')->where('id', $id)->delete();
        
        if($request->ajax())
        {
            return response()->json(['success' => 'Content Deleted Successfully']);
        } else {
            session()->put('success','Content Deleted Successfully');
        }

        return back()->with('success', 'Content Deleted Successfully');
        
    }

    
}
