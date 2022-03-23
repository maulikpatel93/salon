<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Categories;
use App\Models\Api\Products;
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
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $id = $request->id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            $services = Categories::with(['services' => function ($query) use ($salon_id, $whereLike) {
                $query->with(['serviceprice:id,service_id,name,price,add_on_price'])->select('category_id', 'id', 'name', 'duration')->where('salon_id', $salon_id)->where('is_active', '1')->where(function ($squery) use ($whereLike) {
                    $squery->where('name', "like", "%" . $whereLike . "%");
                });
            }])->has('services')->select('id', 'name')->where('is_active', '1')->paginate($limit);
            if ($services) {
                $services = $services->toArray();
                if (isset($services['data']) && $services['data']) {
                    $services = array_values(array_filter($services['data'], function ($v) {return !empty($v['services']);}));
                }
                $successData = $services;
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function products(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $id = $request->id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            $products = Products::select(['id',
                'salon_id',
                'supplier_id',
                'tax_id',
                'name',
                'image',
                'sku',
                'description',
                'cost_price',
                'retail_price',
                'manage_stock',
                'stock_quantity',
                'low_stock_threshold'])->where(function ($query) use ($whereLike) {
                $query->where('name', "like", "%" . $whereLike . "%");
            })->where('is_active', '1')->paginate($limit);
            if ($products) {
                $successData = $products->toArray();
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

}