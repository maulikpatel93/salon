<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Categories;
use Illuminate\Http\Request;

class SaleApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'name',
        'description',
        'percentage',
    ];

    protected $salon_field = [
        'id',
        'business_name',
    ];

    protected $product_field = [];

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function services(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            $add_on_services = Categories::with(['services' => function ($query) use ($salon_id) {
                $query->with(['serviceprice:id,service_id,name,price,add_on_price'])->select('category_id', 'id', 'name', 'duration')->where('salon_id', $salon_id)->where('is_active', '1');
            }])->has('services')->select('id', 'name')->where('is_active', '1')->get()->toArray();
            if ($add_on_services) {
                $add_on_services = array_values(array_filter($add_on_services, function ($v) {return !empty($v['services']);}));
                $successData = $add_on_services;
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }
}