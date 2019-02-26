<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ItemDetailRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\Item;
use App\ItemDetail;

class ItemDetailController extends Controller
{

    use Crudable;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Item $item)
    {
        return view('backend.itemdetail.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ItemDetailRequest $request, Item $item)
    {
        if($request->has('file')){
            $file_name = ItemDetail::upload($request);
            $request->request->add(['item_detail_image' => $file_name]);
        }

        $request->request->add(['item_id' => $item->item_id]);

        $itemdetail = ItemDetail::create($request->all());
        if($itemdetail){
            $this->flashSuccessCreate();
            return redirect()->route('backend.item.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(ItemDetail $itemdetail)
    {
        return view('backend.itemdetail.edit', compact('itemdetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ItemDetailRequest $request, ItemDetail $itemdetail)
    {
        if($request->has('file')){
            
            // delete file
            if(is_file(ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image))
                unlink(ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image);

            $file_name = ItemDetail::upload($request);
            $request->request->add(['item_detail_image' => $file_name]);
        }

        $itemdetail->update($request->all());
        if($itemdetail){
            $this->flashSuccessUpdate();
            return redirect()->route('backend.itemdetail.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, ItemDetail $itemdetail)
    {
        if(is_file(ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image))
            unlink(ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image);

        if($itemdetail->delete()){
            $this->flashSuccessDelete();
            return redirect()->back();
        }
    }
}
