<?php

namespace App\Http\Controllers;
use App\Components\CategoryRecusive;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Storage;

class AdminProductController extends Controller
{   
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    public function __construct(Category $category , Product $product , ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function index () {
        return view ('admin.products.index');
    }

    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new CategoryRecusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create() {
        $htmlOption = $this->getCategory($parentId = '');
        return view ('admin.products.create' ,compact('htmlOption'));
    }

    
    public function store (Request $request) {
        //insert data to table product

        $dataProductCreate = [
            'name' => $request->name,
            'price'=>$request->price,
            'content'=>$request->content,
            'user_id'=>auth()->id(),
            'categories_id'=> $request->categories_id,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path' , 'product');
        if(!empty($dataUploadFeatureImage)){
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);


        //insert data to table product_images

        if($request-> hasFile('image_path')){
            foreach($request->image_path as $fileItem) {
                $imageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                $product->images()->create([
                    'image_path'=>$imageDetail['file_path'],
                    'image_name'=>$imageDetail['file_name']
                ]);
            }
        }

        //insert tag to table tags

        // foreach ( $request->tags as $tagItem){

        // }


    }
}
