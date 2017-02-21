<?php


// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

//Category
Breadcrumbs::register('category.index', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('category.lbl_category_list_title'), route('category.index'));   
});

Breadcrumbs::register('category.show', function($breadcrumbs, $categoryId) {
    $breadcrumbs->parent('category.index', null);
    $breadcrumbs->push(trans('category.lbl_category_show_title'), route('category.show', $categoryId));
});

Breadcrumbs::register('category.edit', function($breadcrumbs, $categoryId) {
    $breadcrumbs->parent('category.index', null);
    $breadcrumbs->push(trans('category.lbl_category_edit_title'), route('category.edit', $categoryId));
});        

Breadcrumbs::register('category.create', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('category.lbl_category_create_title'), route('category.create'));
});

Breadcrumbs::register('category.related', function($breadcrumbs) {
    $breadcrumbs->parent('category.index', null);
    $breadcrumbs->push(trans('category.lbl_category_related_title'), route('category.related', null));
}); 

//Products
Breadcrumbs::register('product.index', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('product.lbl_product_list_title'), route('product.index'));   
});

Breadcrumbs::register('product.show', function($breadcrumbs, $productId) {
    $breadcrumbs->parent('product.index', null);
    $breadcrumbs->push(trans('product.lbl_product_show_title'), route('product.show', $productId));
});

Breadcrumbs::register('product.edit', function($breadcrumbs, $productId) {
    $breadcrumbs->parent('product.index', null);
    $breadcrumbs->push(trans('product.lbl_product_edit_title'), route('product.edit', $productId));
});        

Breadcrumbs::register('product.create', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('product.lbl_product_create_title'), route('product.create'));
});