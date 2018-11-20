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

} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
