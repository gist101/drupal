<?php

// Enable default permissions for system roles.
user_role_grant_permissions(RoleInterface::ANONYMOUS_ID, array('access comments'));
user_role_grant_permissions(RoleInterface::AUTHENTICATED_ID, array('access comments', 'post comments', 'skip comment approval'));
