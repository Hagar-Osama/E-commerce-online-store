<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\Sub_CategoryInterface;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ImagesTrait;
use App\Http\Traits\SubCategoriesTrait;
use App\Models\Category;
use App\Models\SubCategory;


class Sub_CategoryRepository implements Sub_CategoryInterface
{
    use SubCategoriesTrait;
    use CategoryTrait;
    use ImagesTrait;
    private $subCategoryModel;
    private $categoryModel;
    public function __construct(SubCategory $subCategory, Category $category)
    {
        $this->subCategoryModel = $subCategory;
        $this->categoryModel = $category;
    }

    public function get_sub_categories()
    {
        $subcategories = $this->show_sub_categories(); //SubCategoriesTrait
        return view('admin.sub-categories.index',compact('subcategories'));
    }

    public function create_sub_categories()
    {
        $categories = $this->getCategories(); //CategoryTrait
        return view('admin.sub-categories.create',compact('categories'));
    }

    public function store_sub_categories($request)
    {
        $image =$request->file('image');
        $imageName = time(). '_sub_category.' . $image->getClientOriginalExtension();
        $this->uploadImage($image,$imageName,'sub-categories'); //ImagesTrait
        $this->subCategoryModel::create([
            'name' => $request->name,
            'image' => $imageName,
            'category_id' => $request->select
        ]);
        Session()->flash('done','SubCategory Has Been Created Successfully');
        return redirect(route('sub_categories.index'));
    }

    public function edit_sub_categories($id)
    {
        $subCategory = $this->get_sub_category_by_id($id); //SubCategoryTrait
        $categories = $this->getCategories(); //CategoryTrait
        return view('admin.sub-categories.edit',compact('subCategory','categories'));

    }

    public function update_sub_categories($request)
    {
        $subCategory = $this->get_sub_category_by_id($request->sub_category_id); //SubCategoryTrait
        if ($request->hasFile('image')) {
            $image =$request->file('image');
            $imageName = time(). '_sub_category.' . $image->getClientOriginalExtension();
            //$old_path = 'images/sub-categories/'.$subCategory->image;
            $this->uploadImage($image,'sub-categories',$imageName); //ImagesTrait
            if ($subCategory->image) {
                unlink('images/sub-categories/'.$subCategory->image);
            }
        }

        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->select,
            'image' => (isset($imageName)) ? $imageName : $subCategory->image
        ]);
        Session()->flash('done','SubCategory Has Been Updated');
        return redirect(route('sub_categories.index'));
    }

    public function delete_sub_categories($request)
    {
        $subCategory = $this->get_sub_category_by_id($request->sub_category_id); //SubCategoryTrait
        $imageUrl = 'images/sub-categories/'.$subCategory->image;
        if ($subCategory->image) {
            unlink(public_path($imageUrl));
        }
        $subCategory->delete();
        Session()->flash('done','SubCategory Has Been Deleted');
        return redirect()->back();
    }
}
