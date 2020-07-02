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
Breadcrumbs::for('groupmyevent', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Sự Kiện Của Tôi');
    $trail->push('Nhóm Sự Kiện', route('groupmyevent'));
});
Breadcrumbs::for('myevent', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Sự Kiện Của Tôi');
    $trail->push('Danh Sách Sự Kiện', route('myevent'));
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
    $trail->push('Ví Tiền Của Tôi', route('wallet'));
});
Breadcrumbs::for('asset', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tài Sản', route('asset'));
});
Breadcrumbs::for('history_payment', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Lịch Sử Thanh Toán', route('history_payment'));
});
Breadcrumbs::for('notice_payment', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Thông Báo Thanh Toán', route('notice_payment'));
});

Breadcrumbs::for('methods_payment', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Phương Thức Thanh Toán', route('methods_payment'));
});
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Liên Hệ', route('contact'));
});
Breadcrumbs::for('membership', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Thành Viên', route('membership'));
});


///// ADMIN
Breadcrumbs::for('admin_dashboard', function ($trail) {

    $trail->push('Xem Tổng Quan', route('admin_dashboard'));
});
Breadcrumbs::for('admin_profile', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Hô Sơ Cá Nhân', route('admin_profile'));
});
Breadcrumbs::for('admin_users', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Người Dùng'); 
    $trail->push('Danh Sách Người Dùng', route('admin_users'));
});
Breadcrumbs::for('admin_users_update', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Người Dùng'); 
    $trail->push('Cập Nhật Người Dùng', route('admin_users_update'));
});
Breadcrumbs::for('admin_users_insert', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Người Dùng'); 
    $trail->push('Thêm Người Dùng', route('admin_users_insert'));
});
Breadcrumbs::for('admin_users_payment', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Người Dùng'); 
    $trail->push('Thanh Toán', route('admin_users_payment'));
});
Breadcrumbs::for('admin_setting', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Cài Đặt Hệ Thống', route('admin_setting'));
});
Breadcrumbs::for('admin_contact', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Tin Nhắn Liên Hệ', route('admin_contact'));
});
 
Breadcrumbs::for('admin_roles', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Phân Quyền', route('admin_roles'));
});
Breadcrumbs::for('admin_roles_permission', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Cập Nhật Quyền Hệ Thống', route('admin_roles_permission'));
});
Breadcrumbs::for('admin_404', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Không Tìm Thấy Trang ', route('admin_404'));
});

Breadcrumbs::for('admin_505', function ($trail) {
    $trail->parent('admin_dashboard');
    $trail->push('Không Tìm Thấy Trang ', route('admin_505'));
});
