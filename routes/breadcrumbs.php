<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin
Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->push('Admin');
});

// Admin::Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Dasbor', route('admin.dashboard.index'));
});

// Admin::User
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Pengguna', route('admin.users.index'));
});

// Admin::User::Create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Buat Baru');
});

// Admin::User::Edit
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Ubah ' . $user);
});

// Admin::Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Profil');
});

// Admin::Role
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Hak Akses', route('admin.roles.index'));
});

// Admin::Role::Create
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Buat Baru');
});

// Admin::Role::Edit
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('Ubah ' . $role);
});

// Module::Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Blog');
});

// Module::Blog::Category
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Kategori', route('admin.blog.categories.index'));
});

// Module::Blog::Category::Create
Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Buat Baru');
});

// Module::Blog::Category::Edit
Breadcrumbs::for('categories.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push('Ubah ' . $category);
});

// Module::Blog::Tag
Breadcrumbs::for('tags', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Tag', route('admin.blog.tags.index'));
});

// Module::Blog::Tag::Create
Breadcrumbs::for('tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tags');
    $trail->push('Buat Baru');
});

// Module::Blog::Tag::Edit
Breadcrumbs::for('tags.edit', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tags');
    $trail->push('Ubah ' . $tag);
});

// Module::Blog::Post
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Post', route('admin.blog.posts.index'));
});

// Module::Blog::Tag::Create
Breadcrumbs::for('posts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('posts');
    $trail->push('Buat Baru');
});

// Module::Blog::Tag::Edit
Breadcrumbs::for('posts.edit', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('posts');
    $trail->push('Ubah ' . $post);
});

// Module::MailConfig
Breadcrumbs::for('mail-config', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Konfigurasi Email');
});

// Module::MailConfig::SmtpSetting
Breadcrumbs::for('mail-config.smtp-setting', function (BreadcrumbTrail $trail) {
    $trail->parent('mail-config');
    $trail->push('Pengaturan SMTP');
});

// Module::MailConfig::MailTest
Breadcrumbs::for('mail-config.mail-test', function (BreadcrumbTrail $trail) {
    $trail->parent('mail-config');
    $trail->push('Test Email');
});
