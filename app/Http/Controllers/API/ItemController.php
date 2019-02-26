<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gallery()
    {
        $gallery = Item::with('itemdetail')->where('item_name', 'like', '%galeri%')->first();
        return $gallery;
    }
}
