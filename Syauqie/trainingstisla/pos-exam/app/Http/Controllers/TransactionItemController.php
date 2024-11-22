<?php

namespace App\Http\Controllers;

use App\Models\TransactionItem;
use App\Http\Requests\StoreTransactionItemRequest;
use App\Http\Requests\UpdateTransactionItemRequest;

class TransactionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionItem $transactionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionItem $transactionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionItemRequest $request, TransactionItem $transactionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionItem $transactionItem)
    {
        //
    }
}
