<?php

namespace App\Http\Controllers;
use App\Components\CategoryRecusive;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{   
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category , Product $product , ProductImage $productImage , Tag $tag , ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index () {
        $products = $this->product->latest()->paginate(5);
        return view ('admin.products.index', compact('products'));
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
        try {
            DB::beginTransaction();

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
    

    
            if($request-> hasFile('image_path')){
                foreach($request->image_path as $fileItem) {
                    $imageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path'=>$imageDetail['file_path'],
                        'image_name'=>$imageDetail['file_name']
                    ]);
                }
            }
    
            if(!empty($request->tags)){
                foreach ( $request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate(['name'=> $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('prodducts.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }


    public function edit ($id) {
        $productSingle = $this->product->find($id);
        $htmlOption = $this->getCategory($productSingle->categories_id);
        return view ('admin.products.edit', compact('productSingle', 'htmlOption'));
    }

    public function update (Request $request, $id){
        try {
            DB::beginTransaction();

            $dataProductUpdated = [
                'name' => $request->name,
                'price'=>$request->price,
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'categories_id'=> $request->categories_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path' , 'product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdated['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdated['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdated);
            $product = $this->product->find($id);



    
            if($request-> hasFile('image_path')){
                foreach($request->image_path as $fileItem) {
                    $this->productImage->where('product_id', $id)->delete();
                    $imageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path'=>$imageDetail['file_path'],
                        'image_name'=>$imageDetail['file_name']
                    ]);
                }
            }
    
            if(!empty($request->tags)){
                foreach ( $request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate(['name'=> $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('prodducts.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function delete ($id){
        dd($id);
    }

}