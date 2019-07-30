<?php 

$route['user_auth/add-admin'] = "user_auth/addAdminPage";
$route['user_auth/admin-list'] = "user_auth/adminListPage";
$route['user_auth/edit-admin/(:num)'] = "user_auth/editAdminPage/$1";

$route['user_auth/group-list'] = "user_auth/groupListPage";
$route['user_auth/add-group'] = "user_auth/addGroupPage";
$route['user_auth/edit-group/(:num)'] = "user_auth/editGroupPage/$1";

$route['user_auth/admin-role-list'] = "user_auth/adminRoleListPage";

?>