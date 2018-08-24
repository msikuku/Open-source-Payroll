<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Http;

use CleaniqueCoders\OpenPayroll\Tests\TestCase;
use Illuminate\Routing\Router;

class RouteTest extends TestCase
{
    public $routes;
    public $router;

    public function setUp()
    {
        parent::setUp();
        $this->router = app()->make('router');
        $this->routes = collect($this->router->getRoutes())->map(function($route) {
            return [
                'host'   => $route->domain(),
                'method' => implode('|', $route->methods()),
                'uri'    => $route->uri(),
                'name'   => $route->getName(),
                'action' => ltrim($route->getActionName(), '\\'),
            ];
        });
    }

    /** @test */
    public function it_has_payroll_routes()
    {
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.index'));
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.show'));
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.create'));
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.store'));
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.edit'));
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.update'));
        $this->assertNotEmpty($this->routes->where('name', 'open-payroll.payroll.destroy'));
    }
}
