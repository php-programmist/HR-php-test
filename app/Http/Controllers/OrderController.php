<?php

namespace App\Http\Controllers;

use App\Order;
use App\Partner;
use App\Http\Requests\OrderRequest;

class OrderController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('products','partner')->paginate(config('system.per_page',25));
        $title = __('system.orders');
        $this->template = 'orders';
        $this->vars = compact('orders','title');
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/orders');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = $order->getProductsList();
        $partners = Partner::getOptionsList();
        $title = __('system.order_edit');
        $this->template = 'order';
        $this->vars = compact('order','title','partners','products');
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->fill($request->all());
        try{
            $order->save();
            session()->flash('success', trans('system.order_updated'));
        } catch (\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/orders');
    }
}
