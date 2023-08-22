# :flying_saucer: Silverstripe Boilerplate Repository

This repository contains a Silverstripe boilerplate setup with various addons and a theme named "Galactic" for the frontend.

## Addons

The following Silverstripe addons are included in this boilerplate:

- `silverstripe/spamprotection`: Helps prevent spam submissions.
- `undefinedoffset/silverstripe-nocaptcha`: Provides a NoCaptcha reCAPTCHA field for forms.
- `silverstripe/blog`: Enables blog functionality.
- `webmen/silverstripe-webp-images`: Adds support for serving images in the WebP format.
- `silverstripe/userforms`: Allows easy creation of custom forms.

## Theme: Galactic

"Galactic" theme is included for the frontend. It incorporates the following technologies:

- SCSS: A powerful stylesheet preprocessor for enhanced styling.
- Bootstrap: A popular CSS framework for responsive and mobile-first designs.
- jQuery: A JavaScript library for interactive and dynamic web elements.
- Tiny Slider: A lightweight and responsive slider/carousel library.
- AOS (Animate On Scroll): A library for animating elements as they come into view during scrolling.
- Gulp Automations: The theme utilizes Gulp for automation tasks including:
  - `gulp-autoprefixer`: Adds vendor prefixes to CSS rules.
  - `gulp-concat`: Concatenates multiple files into a single file.
  - `gulp-sass`: Compiles SCSS files into CSS.
  - `gulp-terser`: Minifies and compresses JavaScript files.
  - `gulp-file-include`: Includes HTML files within other HTML files.

## Getting Started

Clone this repository to your local environment.

```
git clone <repository-url>
cd silverstripe-boilerplate
```

Clone this repository to your local environment.

```
composer install

```

Navigate to the theme directory and install frontend dependencies using npm or yarn.

```
cd themes/galactic
npm install
# or
yarn install

```

Build frontend assets using Gulp.

```
gulp

```
Set up your Silverstripe environment and configure your database.

Access the Silverstripe admin panel to start customizing and adding content.

## Additional Notes
Remember to configure your environment settings, database connection, and other Silverstripe configurations according to your needs.
Explore the theme's SCSS and JavaScript files to customize the frontend appearance and behavior.
Refer to the documentation of individual addons and libraries for detailed usage instructions.

## Author

- [Lalit Rane](https://lalitrane.dev)

## Contributing

Feel free to contribute to this

License
This project is open source and available under the [MIT License](LICENSE).