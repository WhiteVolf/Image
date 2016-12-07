<?php


namespace App\Http\Controllers;

use App\Image;
use App\User;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManager;

class ImageController extends Controller
{

    /**
     * Upload image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
	$this->validate($request, [
    		'title' => 'required',
		'image' => 'required|mimes:jpeg,jpg',
	]);                              

	$req = $request->all();

	// Save image file
	$image = $req['image'];
       	$filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/' . $filename);

        $manager = new ImageManager(array('driver' => 'imagick'));

       	$manager->make($image->getRealPath())->save($path);
	
	$jpg = new Image;
	$jpg->title = $req['title'];
	$jpg->path = $path;
	$jpg->save();

	if ($req['dependence']=='product') {
	 	$obj = Product::find($req['id']);
	} 
	if ($req['dependence']=='user') {
	 	$obj = User::find($req['id']);
	} 

	$obj->image()->save($jpg);

        return response()->json(['response' => 'Image upload successfully']);
    }


}