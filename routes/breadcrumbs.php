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
        $trail->push('User', route('users.index'));
    });

    Breadcrumbs::for('midwives.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Bidan', route('midwives.index'));
    });

    Breadcrumbs::for('brands.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Brand', route('brands.index'));
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
       $trail->push('Gudang PO', route('warehouse.po.index'));
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
        $trail->push('Kategori', route('categories.index'));
    });

    Breadcrumbs::for('regions.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Wilayah', route('regions.index'));
    });

    Breadcrumbs::for('suppliers.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Supplier', route('suppliers.index'));
    });

    Breadcrumbs::for('warehouses.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Gudang', route('warehouses.index'));
    });

    Breadcrumbs::for('warehouse.gr.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('GR (Penerimaan)', route('warehouse.gr.index'));
    });

    Breadcrumbs::for('warehouse.gr.show', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $trail->parent('warehouse.gr.index');
        $trail->push('PO #' . $id, route('warehouse.gr.show', [$id]));
    });

    Breadcrumbs::for('stalls.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Kios', route('stalls.index'));
    });

    Breadcrumbs::for('stalls.create', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('stalls.index');
        $trail->push('Baru', route('stalls.create'));
    });

    Breadcrumbs::for('warehouses.stocks.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $warehouse = \App\Model\Warehouse::find($id);
        $trail->parent('warehouses.index');
        $trail->push('Gudang ' . $warehouse->name . ' Stock Item', route('warehouses.stocks.index', [$id]));
    });

    Breadcrumbs::for('stalls.po.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('PO (Permintaan)', route('stalls.po.index'));
    });

    Breadcrumbs::for('stalls.po.create', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('stalls.po.index');
        $trail->push('New', route('stalls.po.create'));
    });

    Breadcrumbs::for('stalls.po.show', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $po = \App\Model\Stall\PurchaseOrder::find($id);
        $trail->parent('stalls.po.index');
        $trail->push($po->id, route('stalls.po.show', $po->id));
    });

    Breadcrumbs::for('stalls.gr.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('GR (Penerimaan)', route('stalls.gr.index'));
    });

    Breadcrumbs::for('stalls.gr.show', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $trail->parent('stalls.gr.index');
        $trail->push('PO #' . $id, route('stalls.gr.show', [$id]));
    });

    Breadcrumbs::for('sale.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Penjualan', route('sale.index'));
    });

    Breadcrumbs::for('sale.show', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $trail->parent('sale.index');
        $trail->push('Penjualan #' . $id, route('sale.show', [$id]));
    });

    Breadcrumbs::for('stallitem.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Sale', route('sale.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\BreadcrumbsException $e) {

}
