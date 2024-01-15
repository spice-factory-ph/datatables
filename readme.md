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
### Exporting the styles
`php artisan vendor:publish --provider=SpiceDataTable\ServiceProvider`
### Adding the styles
- Import the css file in resources/sass/app.css:
```    @import '../public/spicedatatable/css/app';```

## Share your thoughts!!!

- Share your feedback and experiences with other devs or lead engineer.
- Collaborate to enhance the package's capabilities and create even more versatile data table solutions for the spice factory projects.

Let's spice up your data management together! ️
