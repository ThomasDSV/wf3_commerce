<?php
	
$w_routes = array(
	['GET', '/', 'Default#home', 'home'],
	['GET|POST', '/contact', 'Default#contact', 'contact'],

	// Routes des produits
	['GET', '/products', 'Products#index', 'products_index'],
	['GET|POST', '/product/create', 'Products#create', 'product_create'],
	['GET', '/product/[i:id]', 'Products#read', 'product_read'],
	['GET|POST', '/product/[i:id]/edit', 'Products#edit', 'product_edit'],
	['GET|POST', '/product/[i:id]/delete', 'Products#delete', 'product_delete']
);