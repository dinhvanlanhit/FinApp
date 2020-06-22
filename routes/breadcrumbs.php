<?php
// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Trang chủ', route('dashboard'));
});
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Hô Sơ Cá Nhân', route('profile'));
});
Breadcrumbs::for('event', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Sự kiện', route('event'));
});
Breadcrumbs::for('cost', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Chi Tiêu', route('cost'));
});
Breadcrumbs::for('shopping', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Mua Sắm', route('shopping'));
});
Breadcrumbs::for('salary', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Thu Nhập Từ Tiền Lương', route('salary'));
});
Breadcrumbs::for('debt', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Quản Lý Nợ', route('debt'));
});
Breadcrumbs::for('lendloan', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Cho vay', route('lendloan'));
});