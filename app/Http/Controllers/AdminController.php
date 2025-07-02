<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function brands(){
         $brands = Brand::orderBy('id','DESC')->paginate(10);
         return view('admin.brands',compact('brands'));
    }

    public function add_brand(){

        return view('admin.brand-add');
    }

    public function brand_store(Request $request){
          
         $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
         ]);

         $brand = new Brand();
         $brand->name = $request->name;
         $brand->slug = Str::slug($request->name);
         $image = $request->file('image');
         $file_extention = $request->file('image')->extension();
         $file_name = Carbon::now()->timestamp.'.'.$file_extention;
         $this->GenerateBrandThumbailsImage($image,$file_name);
         $brand->image = $file_name;
         $brand->save();

         return redirect()->route('admin.brands')->with('status','Brand has been added succesfully');
    }

    public function GenerateBrandThumbailsImage($image,$imageName){

        $destinationPath = public_path('adminassets/uploads/brands');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){

        })->save($destinationPath.'/'.$imageName);

    }

    public function categories(){
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('admin.categories',compact('categories'));
    }

    public function category_add(){
        return view('admin.category-add');
    }

    public function category_store(Request $request){

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
         ]);

         $products = new Category();
         $products->name = $request->name;
         $products->slug = Str::slug($request->name);
         $image = $request->file('image');
         $file_extention = $request->file('image')->extension();
         $file_name = Carbon::now()->timestamp.'.'.$file_extention;
         $this->GenerateCategoryThumbailsImage($image,$file_name);
         $products->image = $file_name;
         $products->save();

         return redirect()->route('admin.categories')->with('status','Category has been added succesfully');
    }

    public function GenerateCategoryThumbailsImage($image,$imageName){

        $destinationPath = public_path('adminassets/uploads/categories');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){
            $contraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

    }

    public function products(){

        $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('admin.products',compact('products'));
    }

    public function product_add(){

        $categories = Category::select('id','name')->orderBy('name')->get();
        $brands = Brand::select('id','name')->orderBy('name')->get();
        return view('admin.product-add',compact('categories','brands'));
    }

    public function product_store(Request $request){
          
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'SKU' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'images' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',

         ]);

         $product = new Product();
         $product->name = $request->name;
         $product->slug = Str::slug($request->name);
         $product->short_description = $request->short_description;
         $product->description = $request->description;
         $product->regular_price = $request->regular_price;
         $product->sale_price = $request->sale_price;
         $product->SKU = $request->SKU;
         $product->stock_status = $request->stock_status;
         $product->featured = $request->featured;
         $product->quantity = $request->quantity;
         $product->category_id =  $request->category_id;
         $product->brand_id =  $request->brand_id;

         $current_timestamp = Carbon::now()->timestamp;
  
        
        if($request->hasFile('image')){
             $image = $request->file('image'); 
             $imageName = $current_timestamp . '.' .$image->extension();
             $this->GenerateProductThumbailsImage($image, $imageName);
             $product->image = $imageName;
        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if($request->hasFile('images')){
             $allowedfileExtion = ['jpg','png','jpeg'];
             $files = $request->file('images');
             foreach($files as $file){

                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedfileExtion);

                if($gcheck){
                   $gfileName = $current_timestamp ."-".$counter.".".$gextension;
                   $this->GenerateProductThumbailsImage($file,$gfileName);
                   array_push($gallery_arr,$gfileName); 
                   $counter = $counter + 1;
                }

             } 
             $gallery_images = implode(',',$gallery_arr);
        }
        $product->images = $gallery_images;
        $product->save();
        return redirect()->route('admin.products')->with('status','Product has been successfully added');

    }

    public function GenerateProductThumbailsImage($image, $imageName){

        $destinationPathThumbnail = public_path('adminassets/uploads/products/thumbnails');
        $destinationPath = public_path('adminassets/uploads/products');
        $img = Image::read($image->path());

        $img->cover(540,689,"top");
        $img->resize(540,689,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        $img->resize(104,104,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);
    }

}