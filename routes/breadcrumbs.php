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
Breadcrumbs::for('backend.category.edit', function ($trail, $category) {
    $trail->parent('backend.category.index');
    $trail->push($category->category_name, route('backend.category.edit', $category));
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
Breadcrumbs::for('backend.post.edit', function ($trail, $post) {
    $trail->parent('backend.post.index');
    $trail->push($post->post_name, route('backend.post.edit', $post));
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
Breadcrumbs::for('backend.page.edit', function ($trail, $page) {
    $trail->parent('backend.page.index');
    $trail->push($page->page_name, route('backend.page.edit', $page));
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
Breadcrumbs::for('backend.contact.edit', function ($trail, $contact) {
    $trail->parent('backend.contact.index');
    $trail->push($contact->contact_name, route('backend.contact.edit', $contact));
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
Breadcrumbs::for('backend.socialmedia.edit', function ($trail, $socialmedia) {
    $trail->parent('backend.socialmedia.index');
    $trail->push($socialmedia->name, route('backend.socialmedia.edit', $socialmedia));
});

// ----------------------
// BreadCrumbs Item
// ----------------------

Breadcrumbs::for('backend.item.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Item', route('backend.item.index'));
});
Breadcrumbs::for('backend.item.create', function ($trail) {
    $trail->parent('backend.item.index');
    $trail->push('Create', route('backend.item.create'));
});
Breadcrumbs::for('backend.item.edit', function ($trail, $item) {
    $trail->parent('backend.item.index');
    $trail->push($item->item_name, route('backend.item.edit', $id));
});
Breadcrumbs::for('backend.item.show', function ($trail, $item) {
    $trail->parent('backend.item.index');
    $trail->push($item->item_name, route('backend.item.show', $item));
});



// ----------------------
// BreadCrumbs Item Detail
// ----------------------

Breadcrumbs::for('backend.itemdetail.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Item Detail', route('backend.itemdetail.index'));
});
Breadcrumbs::for('backend.itemdetail.create', function ($trail, $item) {
    $trail->parent('backend.itemdetail.index');
    $trail->push($item->item_name, route('backend.itemdetail.create', $item));
});
Breadcrumbs::for('backend.itemdetail.edit', function ($trail, $itemdetail) {
    $trail->parent('backend.itemdetail.index');
    $trail->push($itemdetail->item_detail_name, route('backend.itemdetail.edit', $itemdetail));
});

// ----------------------
// BreadCrumbs Company Profile
// ----------------------

Breadcrumbs::for('backend.profile.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('Company Profile', route('backend.profile.index'));
});