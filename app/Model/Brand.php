<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Brand
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
