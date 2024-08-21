<!DOCTYPE html>
<html>
<body>
<h1>what is middleware</h1>
<p> is a type of filtering mechanism acts as a bridge between request and response
For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to your application's login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application</p>
<h2>Types of Middleware</h2>
<p>
Global Middleware: Applied to all HTTP requests. You can register global middleware in the app/Http/Kernel.php file under the $middleware property.

Route Middleware: Applied only to specific routes or groups of routes. You can register route middleware in the app/Http/Kernel.php file under the $routeMiddleware property. These middlewares are usually specified in the route definition.

Middleware Groups: You can group multiple middleware to apply them collectively to routes or route groups. This is also configured in app/Http/Kernel.php under the $middlewareGroups property.
</p>

<h2>Common Use Cases</h2>
<p>
Authentication: Verifying if a user is logged in before accessing certain routes.
Authorization: Checking if a user has the necessary permissions to access a route.
Logging: Recording details of requests and responses.
CORS: Adding Cross-Origin Resource Sharing headers to responses.
Throttling: Limiting the number of requests a user can make in a given time period.
Middleware is a powerful feature of Laravel that helps in organizing and managing various aspects of request handling in a clean and modular way.
</p>
<h3>Creating Middleware</h3>
<p>php artisan make:middleware ExampleMiddleware</p>
</body>

</html>