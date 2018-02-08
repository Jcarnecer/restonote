<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Views/index';
$route['notes'] = 'Views/personal';

# view
$route['index'] = 'Views/index';


# API
# user
$route['api/user/(:any)']['GET'] = 'Users/get/$1';


# card
$route['api/note/get_all']['GET'] = 'Cards/get_all';

$route['api/card/(:any)']['POST'] = 'Cards/post/$1';
$route['api/card/(:any)']['GET'] = 'Cards/get/$1';

$route['api/card/(:any)/(:any)']['POST'] = 'Cards/post/$1/$2';
$route['api/card/(:any)/(:any)']['GET'] = 'Cards/get/$1/$2';

$route['api/comment/(:any)']['POST'] = 'Cards/post_comments/$1';
$route['api/comment/(:any)']['GET'] = 'Cards/get_comment/$1';

$route['api/done/(:any)']['POST'] = 'Cards/mark_as_done/$1';


# task
$route['api/task/(:any)']['POST'] = 'Tasks/post/$1';
$route['api/task/(:any)']['GET'] = 'Tasks/get/$1';

$route['api/task/(:any)/(:any)']['POST'] = 'Tasks/post/$1/$2';
$route['api/task/(:any)/(:any)']['GET'] = 'Tasks/get/$1/$2';

$route['api/note/(:any)']['POST'] = 'Tasks/post_notes/$1';
$route['api/note/(:any)']['GET'] = 'Tasks/get_notes/$1';

// $route['api/done/(:any)']['POST'] = 'tasks/mark_as_done/$1';


# end-of-API
$route['archive'] = 'Cards/auto_archive';

# other
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;