<?php

try {
    Breadcrumbs::for('root', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');

        $trail->push('Root', route('root'));
    });

    Breadcrumbs::for('dashboard', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->push('Dashboard', route('dashboard'));
    });

    Breadcrumbs::for('users.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Users', route('users.index'));
    });

    Breadcrumbs::for('midwives.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Midwife', route('midwives.index'));
    });

    Breadcrumbs::for('brands.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Brands', route('brands.index'));
    });

    Breadcrumbs::for('companies.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Supplier', route('companies.index'));
    });

    Breadcrumbs::for('brands.products.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $brand) {
        $trail->parent('brands.index');
        $trail->push($brand->name, route('brands.products.index', $brand));
    });

    Breadcrumbs::for('prices.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Prices', route('prices.index'));
    });

    Breadcrumbs::for('warehouse.po.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
       $trail->parent('dashboard');
       $trail->push('Purchase Orders', route('warehouse.po.index'));
    });

    Breadcrumbs::for('warehouse.po.create', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('warehouse.po.index');
        $trail->push('New', route('warehouse.po.create'));
    });

    Breadcrumbs::for('warehouse.po.edit', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $po = \App\Model\Warehouse\PurchaseOrder::find($id);
        $trail->parent('warehouse.po.index');
        $trail->push($po->id, route('warehouse.po.edit', $po->id));
    });

    Breadcrumbs::for('warehouse.po.show', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $po = \App\Model\Warehouse\PurchaseOrder::find($id);
        $trail->parent('warehouse.po.index');
        $trail->push($po->id, route('warehouse.po.show', $po->id));
    });

    Breadcrumbs::for('categories.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Categories', route('categories.index'));
    });

    Breadcrumbs::for('regions.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Regions', route('regions.index'));
    });

    Breadcrumbs::for('suppliers.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Suppliers', route('suppliers.index'));
    });

    Breadcrumbs::for('warehouses.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Warehouses', route('warehouses.index'));
    });

} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
