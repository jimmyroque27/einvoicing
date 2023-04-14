<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\DataTables\CategoryDataTable;

class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
         $this->middleware('permission:category-show', ['only' => ['show']]);
         $this->middleware('permission:product-create', ['only' => ['categoryList']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
         

        return $dataTable->render('category.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
             
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save Category Data
            
            $create_category = Category::create([
                'name' => $request->name,
                'tp_id' => session('user_tp_id'),
                    
            ]);
        
            

            if(!$create_category ){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving category data');
            }
             
            if((session('user_tp_id') == '0000000000')){
                DB::rollBack();

                return back()->with('error', 'No assigned Tax Payer... Unable to save data...');
            }
           
            
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        

        if(!$category){
            return back()->with('error', 'Category Not Found');
        }

        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);
     
          
        
        try {
            DB::beginTransaction();
            $update_category = Category::where('id', $id)->update([         
                'name' => $request->name,
            ]);

            if(!$update_category){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update category data');
            }
            
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category Updated Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_category = Category::whereId($id)->delete();

            if(!$delete_category){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting category.');
            }
            
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
        $category =  Category::whereId($id)->first();
         
        if(!$category){
            
           return back()->with('error', 'Category Not Found');
        }
        
        return view('category.show')->with([
            'category' => $category
        ]);
    }
    // Category List use for Select Picker in add/edit Products (JSON Format)
    public function categorylist(Request $request)
    {
        $data = [];
        //    dd($request->filled('id'));
        if($request->filled('id')){
            $data = Category::select('*')
                ->where('name', 'LIKE', '%'. $request->get('id'). '%')
                // ->orwhere('ItemCode', 'LIKE', '%'. $request->get('id'). '%')
                ->where('tp_id', session('user_tp_id'))
                ->get();
        }else{
            // $data = Category::select('*')
            //     // ->where('name', 'LIKE', '%'. $request->get('id'). '%')
            //     // ->orwhere('ItemCode', 'LIKE', '%'. $request->get('id'). '%')
            //     ->where('tp_id', session('user_tp_id'))
            //     ->get();
        }
    
        return response()->json($data);
    }
}

