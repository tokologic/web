<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Model\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereUpdatedAt($value)
 * @property int $brand_id
 * @property string|null $description
 * @property string|null $barcode
 * @property int|null $category_id
 * @property string|null $unit
 * @property-read \App\Model\Brand $brand
 * @property-read \App\Model\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereUnit($value)
 */
class Product extends Model
{
    protected $fillable = [
        'name','description','barcode','brand_id','category_id','unit'
    ];

    public function scopeWhereBrandId($query, $brand_id)
    {
        return $query->where('brand_id', $brand_id);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_products', 'product_id', 'supplier_id')
            ->withTimestamps();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
