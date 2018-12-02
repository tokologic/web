<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Sale
 *
 * @property int $id
 * @property string $payment_method
 * @property int $amount
 * @property int $cash
 * @property int $change
 * @property int $tax
 * @property string $info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = ['payment_method', 'amount', 'cash', 'change', 'tax','info'];
}
