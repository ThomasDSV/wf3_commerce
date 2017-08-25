<?php
	
$w_routes = array(
	['GET', '/', 'Default#home', 'home'],
	['GET|POST', '/contact', 'Default#contact', 'contact'],

	// Routes des produits
	['GET', '/products', 'Products#index', 'products_index'],
	['GET|POST', '/product/create', 'Products#create', 'product_create'],
	['GET', '/product/[i:id]', 'Products#read', 'product_read'],
	['GET|POST', '/product/[i:id]/edit', 'Products#edit', 'product_edit'],
	['GET|POST', '/product/[i:id]/delete', 'Products#delete', 'product_delete'],

	// Identification
	['GET|POST', '/signin', 'Security#signin', 'security_signin'],
	['GET|POST', '/signup', 'Security#signup', 'security_signup'],
	['GET', '/signout', 'Security#signout', 'security_signout'],
	['GET|POST', '/lost_password', 'Security#lostPwd', 'security_lost_pwd'],
	['GET|POST', '/reset_password', 'Security#resetPwd', 'security_reset_pwd'],

	// Utilisateurs
	['GET', '/profile', 'User#profile', 'profile'],
);