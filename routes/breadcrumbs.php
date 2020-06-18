<?php
// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Trang chủ', route('dashboard'));
});

Breadcrumbs::for('wedding', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Đám cưới', route('wedding'));
});