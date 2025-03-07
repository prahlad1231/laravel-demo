<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = [
            'Toyota',
            'Honda',
            'Ford',
            'Chevrolet',
            'Nissan',
        ];
        return "<ul><li>".implode("</li><li>", $cars)."</li></ul>";
    }

    public function f1() {
        return "<h2>Formula 1</h2>";
    }
}
