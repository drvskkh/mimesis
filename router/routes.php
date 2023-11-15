<?php

use App\Services\Router;

Router::page('/', 'home');
Router::page('/login', 'login');
Router::page('/register', 'register');
Router::page('/signup', 'signup');
Router::page('/signin', 'signin');
Router::page('/user', 'user');
Router::page('/user_read', 'user_read');
Router::page('/order_add', 'order_add');
Router::page('/employee', 'employee');
Router::page('/emp_read', 'emp_read');
Router::page('/admin', 'admin');
Router::page('/emp_add', 'emp_add');
Router::page('/work_add', 'work_add');
Router::page('/admin_del', 'admin_del');
Router::page('/exit', 'exit');

Router::enable();
