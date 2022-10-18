<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos as _Photos;
use App\Models\PhotosUrl;
use App\Models\Photographers;
use Unsplash;


class Photos extends Controller
{
    public function index(){
        $data['photos'] = _Photos::all();
        // dd($data['photos']);
        return view('photos',$data);
    }
    
    /**
     *
     * Unsplash üzerinden fotoğrafları ve bilgilerini alarak veri tabanına aktarır
     *
     * @author Hasan Uzun
     *
     */
    public function getPhotos(){
        try{
            Unsplash\HttpClient::init([
                'applicationId'	=> 'xQ0a4MtIbRuzVPrJAUuOQlb_cmRBl8TS4I33Dch2wVI',
                'secret'	=> '5ary_dfVAmx5IzJkvXZJyWu3-dzlXmHRXSFSyE9VYGw',
                'callbackUrl'	=> 'https://unsplash.com/oauth/callback',
                'utmSource' => 'Hasan Uzun'
            ]);

            $photosArray = array();

            $quantity = 100;
            $pages = ($quantity / 30) + 1;

            for($i = 1;$i <= $pages; $i++){
                $photos = Unsplash\Photo::all($i, 100);
                foreach($photos as $photo){
                    $user = (object) $photo->user;
                    $photographer = Photographers::where('unsplash_id',$user->id)->exists() ? Photographers::where('unsplash_id',$user->id)->first() : new Photographers();
                    $photographer->unsplash_id = $user->id;
                    $photographer->username = $user->username;
                    $photographer->name = $user->name;
                    $photographer->profile_url = ((object)$user->links)->html;
                    $photographer->image = ((object)$user->profile_image)->large;
                    $photographer->total_likes = $user->total_likes;
                    $photographer->total_photos = $user->total_photos;
                    $photographer->location = $user->location;
                    $photographer->bio = $user->bio;
                    $photographer->save();

                    $newPhoto = _Photos::where('unsplash_id',$photo->id)->exists() ? _Photos::where('unsplash_id',$photo->id)->first() : new _Photos();
                    $newPhoto->unsplash_id = $photo->id;
                    $newPhoto->photographer_id = $photographer->id;
                    $newPhoto->description = $photo->description;
                    $newPhoto->likes = $photo->likes;
                    $newPhoto->color = $photo->color;
                    $newPhoto->save();

                    $photoUrls = PhotosUrl::where('id',$newPhoto->id)->exists() ? PhotosUrl::find($newPhoto->id) : new PhotosUrl();
                    $urls = (object)$photo->urls;
                    $photoUrls->photo_id = $newPhoto->id;
                    $photoUrls->raw = $urls->raw;
                    $photoUrls->full = $urls->full;
                    $photoUrls->regular = $urls->regular;
                    $photoUrls->small = $urls->small;
                    $photoUrls->thumb = $urls->thumb;
                    $photoUrls->small_s3 = $urls->small_s3;
                    $photoUrls->save();

                    $newPhoto = new _Photos();
                    $photosArray[] = $photo;
                }

            }
            
            print_r(count($photosArray)." adet fotoğraf işlem gördü");
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
