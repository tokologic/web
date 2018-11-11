<?php

try {
    Breadcrumbs::for('dashboard', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->push('Dashboard', route('dashboard'));
    });
    Breadcrumbs::for('users.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('dashboard');
        $trail->push('Users', route('users.index'));
    });
    Breadcrumbs::for('users.create', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
        $trail->parent('users.index');
        $trail->push('Create user', route('users.create'));
    });
    Breadcrumbs::for('users.edit', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, $id) {
        $trail->parent('users.index');
        $trail->push('Edit user', route('users.edit', $id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
