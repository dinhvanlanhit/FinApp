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
    $trail->push('Thu Nhập', route('salary'));
});
Breadcrumbs::for('debt', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Quản Lý Nợ', route('debt'));
});
Breadcrumbs::for('lendloan', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Cho vay', route('lendloan'));
});
Breadcrumbs::for('invest', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Đâu Tư', route('invest'));
});
Breadcrumbs::for('goals_dreams', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Mục Tiêu Của Tôi', route('goals_dreams'));
});
Breadcrumbs::for('wallet', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Mục Tiêu Của Tôi', route('wallet'));
});
Breadcrumbs::for('asset', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tài Sản', route('asset'));
});

///// ADMIN
Breadcrumbs::for('admin_dashboard', function ($trail) {
    // $trail->parent('admin_dashboard');
    $trail->push('Xem Tổng Quan', route('admin_dashboard'));
});
Breadcrumbs::for('admin_profile', function ($trail) {
    // $trail->parent('admin_dashboard');
    $trail->push('Hô Sơ Cá Nhân', route('admin_profile'));
});
Breadcrumbs::for('admin_users', function ($trail) {
    // $trail->parent('admin_dashboard');
    $trail->push('Quản Lý Người Dùng', route('admin_users'));
});
