<?php

namespace App\Http\Controllers;

use Domain\AdvertCampaigns\Models\AdvertCampaign;
use Domain\AdvertCampaigns\Resources\AdvertCampaignCollection;
use Illuminate\Http\Request;

class AdvertCampaignController extends Controller
{
    /**
     * Display a listing of all advert campaigns.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertCampaigns = request()
            ->user()
            ->advertCampaigns()
            ->paginate();

        return new AdvertCampaignCollection($advertCampaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
