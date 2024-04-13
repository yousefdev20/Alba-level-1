<?php

include_once __DIR__ . '/../../../system/Core/Helpers/assets.php';
include_once __DIR__ . '/../../../system/Core/Helpers/route.php';
include_once __DIR__ . '/../../../system/Core/Helpers/redirect.php';
include_once __DIR__ . '/../../../system/Core/Helpers/view.php';
include_once __DIR__ . '/../../../system/Core/Helpers/config.php';
include_once __DIR__ . '/../../../system/Core/Helpers/env.php'
;
include_once __DIR__ . '/../../../system/Core/Request/Request.php';
include_once __DIR__ . '/../../../system/Core/Auth/Auth.php';
include_once __DIR__ . '/../../../system/Core/Session/Session.php';
include_once __DIR__ . '/../../../system/Core/Middlewares/Middleware.php';

include_once __DIR__ . '/../../../app/Http/Middlewares/Auth/IsAuthenticated.php';
include_once __DIR__ . '/../../../app/Http/Middlewares/HasValidSession.php';

class BaseController
{
}