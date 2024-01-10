<?php
$routes = [];

function layout($pagePath): void
{
    require "./includes/header.php";
    require "./includes/nav.php";
    require $pagePath;
    require "./includes/footer.php";
}

route('/', function () {
    return layout("./pages/home.php");
});

route('/about-us', function () {
    return layout("./pages/about.php");
});

route('/services', function () {
    return layout("./pages/services.php");
});

route('/outsourcing', function () {
    return layout("./pages/outsourcing.php");
});

route('/recruitment', function () {
    return layout("./pages/recruitment.php");
});

route('/background-check', function () {
    return layout("./pages/background-check.php");
});

route('/payroll', function () {
    return layout("./pages/payroll.php");
});

route('/learning', function () {
    return layout("./pages/learning.php");
});

route('/advisory', function () {
    return layout("./pages/advisory.php");
});

route('/audit', function () {
    return layout("./pages/audit.php");
});

route('/legal-services', function () {
    return layout("./pages/legal-services.php");
});

route('/employers', function () {
    return layout("./pages/employers.php");
});

route('/book-session', function () {
    return layout("./pages/booking.php");
});

route('/contact', function () {
    return layout("./pages/contact.php");
});

route('/404', function () {
    return layout("./pages/404.php");
});

function route(string $path, callable $callback)
{
    global $routes;
    $routes[$path] = $callback;
}

run();

function run()
{
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    foreach ($routes as $path => $callback) {
        if ($path !== $uri) continue;

        $found = true;
        $callback();
    }

    if (!$found) {
        $notFoundCallback = $routes['/404'];
        $notFoundCallback();
    }
}
