<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class AddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProvinces()
    {
        $getProvinces = Province::all();

        echo json_encode($getProvinces);
    }

    public function getCities($province_id)
    {
        $getCities = Regency::where('province_id', $province_id)->get();

        echo json_encode($getCities);
    }

    public function getDistricts($city_id)
    {
        $getDistricts = District::where('regency_id', $city_id)->get();

        echo json_encode($getDistricts);
    }

    public function getVillages($district_id)
    {
        $getVillage = Village::where('district_id', $district_id)->get();

        echo json_encode($getVillage);
    }


}
