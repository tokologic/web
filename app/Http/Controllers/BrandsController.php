<?php


namespace App\Http\Controllers;


use App\DataTables\BrandsDataTable;
use App\Http\Requests\BrandRequest;
use App\Model\Brand;
use App\Traits\Crud;

class BrandsController extends Controller
{
    use Crud;

    public function index(BrandsDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-bold', 'title' => 'Brands'];
        return $dataTable->render('brands.index', compact('page'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(BrandRequest $request)
    {
        $data = $this->gatherRequest(Brand::class, $request);

        $brand = new Brand();
        $brand->create($data);
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Brand $brand, BrandRequest $request)
    {
        $data = $this->gatherRequest(Brand::class, $request);
        $brand->update($data);
    }

    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
        } catch (\Exception $e) {
        }
    }
}
