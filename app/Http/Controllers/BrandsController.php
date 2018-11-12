<?php


namespace App\Http\Controllers;


use App\DataTables\BrandsDataTable;
use App\Http\Requests\ProductRequest;
use App\Model\Company;
use App\Model\Brand;
use App\Traits\Crud;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    use Crud;

    /**
     * @param BrandsDataTable $dataTable
     * @return mixed
     */
    public function index(BrandsDataTable $dataTable)
    {
        return $dataTable->render('brands.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('brands.create', [
            'companies' => Company::all()
        ]);
    }

    /**
     * @param ProductRequest $request
     */
    public function store(ProductRequest $request)
    {
        $data = $this->gatherRequest(Brand::class, $request);

        $brand = new Brand();
        foreach ($data as $field => $value) $brand->{$field} = $value;

        if ($request->has('company'))
            $brand->company()->associate(Company::find($request->get('company')));

        $brand->save();
    }

    /**
     * @param Brand $brand
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Brand $brand)
    {
        $companies = Company::all();
        return view('brands.edit', compact('brand', 'companies'));

    }

    /**
     * @param Brand $brand
     * @param Request $request
     */
    public function update(Brand $brand, Request $request)
    {
        $data = $this->gatherRequest(Brand::class, $request);

        foreach ($data as $field => $value) $brand->{$field} = $value;

        if ($request->has('company'))
            $brand->company()->associate(Company::find($request->get('company')));

        $brand->save();
    }

    /**
     * @param Brand $brand
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
        } catch (\Exception $e) {
        }
    }
}
