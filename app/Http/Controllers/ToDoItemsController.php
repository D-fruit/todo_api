<?php

namespace App\Http\Controllers;

use App\Models\ToDoItem;
use Illuminate\Http\Request;

class ToDoItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ToDoItem::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new ToDoItem;
        $item->item = $request->item;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDoItem  $to_do_item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = ToDoItem::find($id);
        $item->item = $request->item;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ToDoItem::find($id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
