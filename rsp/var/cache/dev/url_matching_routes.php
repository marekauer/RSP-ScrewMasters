<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\AdminDashboardController::index'], null, null, null, false, false, null]],
        '/autor_teams' => [[['_route' => 'app_autorteams', '_controller' => 'App\\Controller\\ChiefDashboardController::index'], null, ['GET' => 0], null, false, false, null]],
        '/add-author' => [[['_route' => 'app_add_author', '_controller' => 'App\\Controller\\ChiefDashboardController::addAuthor'], null, ['POST' => 0], null, false, false, null]],
        '/autor_teams/create' => [[['_route' => 'app_autorteams_create', '_controller' => 'App\\Controller\\ChiefDashboardController::createTeam'], null, ['POST' => 0], null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/helpdesk' => [[['_route' => 'app_helpdesk', '_controller' => 'App\\Controller\\HelpDeskController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::home'], null, null, null, false, false, null]],
        '/profile/edit' => [[['_route' => 'app_profile_edit', '_controller' => 'App\\Controller\\ProfileController::edit'], null, null, null, false, false, null]],
        '/psub' => [[['_route' => 'app_psub', '_controller' => 'App\\Controller\\PublicatedSubmissionController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/dashboard/reviewer' => [[['_route' => 'app_dashboard_reviewer', '_controller' => 'App\\Controller\\ReviewController::reviewer'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/task/notification' => [[['_route' => 'app_task_notification', '_controller' => 'App\\Controller\\TaskNotificationController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/autor_teams/(?'
                    .'|delete/([^/]++)(*:233)'
                    .'|edit/([^/]++)(*:254)'
                .')'
                .'|/review/(?'
                    .'|list/([^/]++)(*:287)'
                    .'|detail/([^/]++)(*:310)'
                .')'
                .'|/dashboard/reviewer/form/([^/]++)(*:352)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        233 => [[['_route' => 'app_autorteams_delete', '_controller' => 'App\\Controller\\ChiefDashboardController::deleteTeam'], ['id'], ['POST' => 0], null, false, true, null]],
        254 => [[['_route' => 'app_autorteams_edit', '_controller' => 'App\\Controller\\ChiefDashboardController::editTeam'], ['id'], ['POST' => 0], null, false, true, null]],
        287 => [[['_route' => 'app_review_show_list', '_controller' => 'App\\Controller\\ReviewController::showReviewList'], ['id'], null, null, false, true, null]],
        310 => [[['_route' => 'app_review_detail', '_controller' => 'App\\Controller\\ReviewController::showReviewDetail'], ['id'], null, null, false, true, null]],
        352 => [
            [['_route' => 'app_dashboard_reviewer_form', '_controller' => 'App\\Controller\\ReviewController::form'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
