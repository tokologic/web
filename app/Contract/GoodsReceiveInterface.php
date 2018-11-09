<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 09/11/18
 * Time: 13.52
 */

namespace App\Contract;


interface GoodsReceiveInterface
{
    public function isQuantityFull();
    public function getReceivedQuantity();
}
