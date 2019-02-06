<?php

// Home
Breadcrumbs::for('backend.home', function ($trail) {
    $trail->push('Home', route('backend.home'));
});

// ----------------------
// BreadCrumbs Catgory
// ----------------------

Breadcrumbs::for('backend.category.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Category', route('backend.category.index'));
});
Breadcrumbs::for('backend.category.create', function ($trail) {
    $trail->parent('backend.category.index');
    $trail->push('Create', route('backend.category.create'));
});
Breadcrumbs::for('backend.category.edit', function ($trail, $id) {
    $trail->parent('backend.category.index');
    $trail->push($id, route('backend.category.edit', $id));
});

// ----------------------
// BreadCrumbs Post
// ----------------------

Breadcrumbs::for('backend.post.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Post', route('backend.post.index'));
});
Breadcrumbs::for('backend.post.create', function ($trail) {
    $trail->parent('backend.category.index');
    $trail->push('Create', route('backend.post.create'));
});
Breadcrumbs::for('backend.post.edit', function ($trail, $id) {
    $trail->parent('backend.post.index');
    $trail->push($id, route('backend.post.edit', $id));
});

// ----------------------
// BreadCrumbs Page
// ----------------------

Breadcrumbs::for('backend.page.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Page', route('backend.page.index'));
});
Breadcrumbs::for('backend.page.create', function ($trail) {
    $trail->parent('backend.category.index');
    $trail->push('Create', route('backend.page.create'));
});
Breadcrumbs::for('backend.page.edit', function ($trail, $id) {
    $trail->parent('backend.page.index');
    $trail->push($id, route('backend.page.edit', $id));
});

// ----------------------
// BreadCrumbs Contact
// ----------------------

Breadcrumbs::for('backend.contact.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Contact', route('backend.contact.index'));
});
Breadcrumbs::for('backend.contact.create', function ($trail) {
    $trail->parent('backend.category.index');
    $trail->push('Create', route('backend.contact.create'));
});
Breadcrumbs::for('backend.contact.edit', function ($trail, $id) {
    $trail->parent('backend.contact.index');
    $trail->push($id, route('backend.contact.edit', $id));
});

// ----------------------
// BreadCrumbs Social Media
// ----------------------

Breadcrumbs::for('backend.socialmedia.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Social Media', route('backend.contact.index'));
});
Breadcrumbs::for('backend.socialmedia.create', function ($trail) {
    $trail->parent('backend.socialmedia.index');
    $trail->push('Create', route('backend.socialmedia.create'));
});
Breadcrumbs::for('backend.socialmedia.edit', function ($trail, $id) {
    $trail->parent('backend.socialmedia.index');
    $trail->push($id, route('backend.socialmedia.edit', $id));
});