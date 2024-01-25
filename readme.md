# Package Name

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Description

Efficiently create and customize standard data tables for spice factory projects with this reusable and adaptable package.

## Features

- Standard Datatable Creation: Easily generate consistent and well-formatted data tables for various applications within our projects.
- Flexible Customization: Tailor the table's visual style to match the project's branding or specific needs, ensuring seamless integration and a cohesive dev experience.

## Benefits

- Promotes Code Reuse and Efficiency: Save time and effort by leveraging a standardized datatable solution across multiple projects.
- Enhances Data Presentation and Readability: Improve data visualization and analysis with clear, organized tables.
- Maintains Consistency: Ensure a cohesive look and feel across different project interfaces, fostering a professional and polished user experience.
- Adapts to Specific Needs: Customize table styles to align with branding guidelines or project-specific requirements, demonstrating versatility and adaptability.

## Installation

- require ```"spice-factory-ph/spice-datatable": "dev-main"``` in composer.json 
- Install Laravel DataTables Vite
    `npm i laravel-datatables-vite --save-dev`

- Once installed, we can now configure our scripts and css needed for our application. in app.js
```import './bootstrap';
import 'laravel-datatables-vite';
```

## Usage

### Create new datatable
```
sail artisan make:spice-datatable {model} --buttons=a
```

### Render the datatable inside your controller class index method with
``` 
 /**
     * Display a listing of the resource.
     *
     * @param  {ModelName}DataTable  $dataTable
     * @return View|JsonResponse
     */
    public function index({ModelName}DataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('{modelname}.index');
    }
```

### Update `views/{model}/index.blade.php` to adapt the project layout.

### Add the scripts.
``` 
@push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
```

### Customizing CSS
- While this package is designed to work seamlessly with Bootstrap, you have the flexibility to tailor the appearance of individual datatable elements to your specific needs. To achieve this customization, please follow these steps:

1. Publish the customizable CSS file
```sail artisan vendor:publish```
2. Select provider `Spicefactoryph\SpiceDatatable\Providers\DatatableServiceProvider`
3. You can now add your custom styles in `public\spicedatatable\styles\app.scss`

## Relationship Columns


## Share your thoughts!!!

- Share your feedback and experiences with other devs or lead engineer.
- Collaborate to enhance the package's capabilities and create even more versatile data table solutions for the spice factory projects.

Let's spice up your data management together! ️

