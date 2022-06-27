<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Products extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $appends = ['isNewRecord', 'image_url', "TotalItemSold", "TotalNetSale", "TotalTax", "TotalGrossSale"];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'supplier_id',
        'tax_id',
        'image',
        'name',
        'sku',
        'last_name',
        'description',
        'cost_price',
        'retail_price',
        'manage_stock',
        'stock_quantity',
        'low_stock_threshold',
        'is_active',
        'is_active_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active_at' => 'datetime',
    ];

    public function getIsNewRecordAttribute()
    {
        return $this->attributes['isNewRecord'] = ($this->created_at != $this->updated_at) ? false : true;
    }

    public function getImageUrlAttribute()
    {
        $image_url = asset('storage/products');
        return $this->attributes['image_url'] = $this->image && Storage::disk('public')->exists('products/' . $this->logo) ? $image_url . '/' . $this->image : "";
    }

    public function salon()
    {
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id', 'id');
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id', 'id');
    }

    public function stocksold()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function getTotalItemSoldAttribute()
    {
        $productCart = Cart::where(['product_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull('product_id');
        if ($this->startdate && $this->enddate) {
            $productCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $product_item_sold = $productCart->count();
        return $product_item_sold;
    }

    public function getTotalNetSaleAttribute()
    {
        $productCart = Cart::where(['product_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull('product_id');
        if ($this->startdate && $this->enddate) {
            $productCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $product_gross_sale = $productCart->sum(DB::raw('cost * qty'));

        $tax = Tax::where(['name' => 'GST', 'is_active' => 1])->first();
        $taxpercentage = $tax ? $tax->percentage : 0;
        $product_taxvalue = ($product_gross_sale / $taxpercentage);
        $product_net_sales = ($product_gross_sale - $product_taxvalue);
        return $product_net_sales;
    }

    public function getTotalTaxAttribute()
    {
        $productCart = Cart::where(['product_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull('product_id');
        if ($this->startdate && $this->enddate) {
            $productCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $product_gross_sale = $productCart->sum(DB::raw('cost * qty'));

        $tax = Tax::where(['name' => 'GST', 'is_active' => 1])->first();
        $taxpercentage = $tax ? $tax->percentage : 0;
        $product_taxvalue = ($product_gross_sale / $taxpercentage);
        return $product_taxvalue;
    }

    public function getTotalGrossSaleAttribute()
    {
        $productCart = Cart::where(['product_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull('product_id');
        if ($this->startdate && $this->enddate) {
            $productCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $product_gross_sale = $productCart->sum("cost");
        return $product_gross_sale;
    }

}
