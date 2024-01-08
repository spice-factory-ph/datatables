# Package Name

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Description

A brief description of what the package does.

## Features

- Can create a standard datatable to be used in different spice factory projects
- Datatable style can be changed by design

## Installation
### Exporting the styles
`php artisan vendor:publish --provider=SpiceDataTable\ServiceProvider`
### Adding the styles
- Put this in the view files:
    <link href="{{ asset('spicedatatable/css/app.css') }}" rel="stylesheet" />
