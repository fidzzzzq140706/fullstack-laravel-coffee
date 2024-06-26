<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StockExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StockStoreRequest;
use App\Imports\StockImport;
use App\Models\Menu;
use App\Models\Stock;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('view-any', Stock::class);

        $stocks = Stock::all();
        $stocks = Stock::paginate(5);
        return view('admin.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.stocks.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockStoreRequest $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|integer',
        ]);
        
        Stock::create($validatedData);

        return to_route('admin.stocks.index')->with('success', 'Stock created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.stocks.edit', compact('stock'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockStoreRequest $request, Stock $menuId, $stock)
    {
        try {
            $stock = Stock::where('menu_id', $menuId)->firstOrFail();

            if ($stock->jumlah >= $request->quantity) {
                // Update stok
                $stock->decrement('jumlah', $request->quantity);

                return response()->json(['message' => 'Stok berhasil diperbarui']);
            } else {
                return response()->json(['error' => 'Stok tidak mencukupi'],   400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat memperbarui stok'],   500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $this->authorize('delete', $stock);

        $stock->delete();
        $stock->delete();

        return to_route('admin.stocks.index')->with('danger', 'Stock daleted successfully.');
    }

    public function export() 
    {
        return Excel::download(new StockExport, 'stocks.xlsx');
    }

    public function pdf()
    {
     $data ['stocks'] = Stock::get();
        $pdf = Pdf::loadView('admin.stocks.exportpdf', $data);
        return $pdf->stream('');
    }

    public function import(Request $request)
    {
        Excel::import(new StockImport, $request->file('file'));
        return redirect()->back()->with('success', 'Menu imported successfully.');
    }
}
