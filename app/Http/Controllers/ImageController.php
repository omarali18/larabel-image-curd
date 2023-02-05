<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function deleteImg($id){
        $product = Photos::findOrFail($id);
        $deleteOldProduct = "image/products/.$product->image";
        if(file_exists($deleteOldProduct)){
            File::delete($deleteOldProduct);
        }
        $product->delete();
        return redirect("/all-products");
    }

    public function updateImg(Request $request, $id){
        $updatePhoto = Photos::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);
        $imaField = "";
        $deleteOldImage = "image/products/".$updatePhoto->image;
        if($image = $request->file("image")){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imaField = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image\products', $imaField);
        }else{
            $imaField = $updatePhoto->image;
        }
        Photos::where('id', $id)->update([
            'name' => $request->name,
            'image' => $imaField,
        ]);
        Session()->flash('msg', 'Product update seccessfully.');
        return redirect("/");
        return "update now";
    }

    public function editImage($id){
        // return "dite";
        $editPhoto = Photos::findOrFail($id);
        // $editAblePhoto = '';
        // foreach($editPhotos as $editPhoto){
        //     if($id === $editPhoto->id){
        //         $editAblePhoto = $editPhoto;
        //     }
        // };
        //         
        // return $editPhoto;
        return view("editPhoto", compact("editPhoto"));
    }

    public function allProduct(){
        $products = Photos::all();
        // echo ("</pre>");
        // return $products;
        return view("allProducts", compact('products'));
    }

    public function uploadImage(Request $request){
      $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $imaField = "";
        if($image = $request->file("image")){
            $imaField = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image\products', $imaField);
        };
        Photos::create([
            'name' => $request->name,
            'image' => $imaField,
        ]);
        Session()->flash('msg', 'Product added seccessfully.');
        return redirect("/");
    }
}
