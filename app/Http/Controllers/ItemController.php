<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        $services = Item::where('type','1')->get();
        $products = Item::where('type','2')->get();
        return view('intranet.item.index', [
            'services' => $services,
            'products' => $products
        ]);
    }

    public function create(){
        return view('intranet.item.popup_create');
    }

    public function store(Request $request){
        $item = $this->save($request, (new Item));
        return redirect('intranet/item')
        ->with('status', 'Item registrado Correctamente');
    }

    public function save(Request $request, $item){
        $item->title = $request->title;
        $item->type = $request->type;
        $item->description = $request->description;
        $image_path = "";
        
        if($image = $request->image):
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,JPG,JPEG,GIF,SVG|max:1024'
            ]);
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image_path = public_path('img/item');
            $image->move($image_path, $image_name); 
            $item->image = $image_name; 
        endif;
        $item->save();
        return $item;
    }

        // public function delete(Request $request){
        //     $item = Item::findOrFail($request->id);
        //     $path = 'img/item/' . $item->image;
        //     if(file_exists(public_path($path))):
        //         unlink(public_path('img/item/' . $item->image));
        //     endif;

        //     $item->delete();
        //     return redirect('intranet/item')
        //         ->with('status', ($item->type == 1 ? 'Servicio': 'Producto')  .'eliminada correctamente');
        // }
}
