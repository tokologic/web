<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait Crud
{
    /**
     * @param string $model
     * @param Request $request
     * @return array
     */
    public function gatherRequest($model, $request)
    {
        $data = [];
        foreach ($request->all() as $input => $value) {
            if (in_array($input, (new $model())->getFillable())) {
                $data[$input] = $value;
            }
        }

        return $data;
    }
}
