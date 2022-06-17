<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SavingsResource;
use App\Models\Savings;
use Illuminate\Http\Request;

class AdminSavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SavingsResource::collection(Savings::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Savings  $savings
     * @return \Illuminate\Http\Response
     */
    public function show(Savings $savings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Savings  $savings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Savings $savings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Savings  $savings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Savings $savings)
    {
        //
    }
}
