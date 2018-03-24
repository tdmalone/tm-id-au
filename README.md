# tm.id.au

Custom, lean WordPress theme for [tm.id.au](https://tm.id.au).

Designed to be converted to a static site with the [Simply Static](https://wordpress.org/plugins/simply-static/) plugin.

Currently under construction, and not active just yet.

## Installation

From your `wp-content/themes` directory, run:

    git clone https://github.com/tdmalone/tm-id-au.git
    cd tm-id-au
    yarn
    yarn build

Then activate the theme via `Appearance -> Themes` in WordPress admin.

## Building, Developing and Testing

To get started:

    yarn
    composer install

To build once:

    yarn build

To turn on watch mode (useful during development):

    yarn watch

JS and Sass linting are handled by Node packages (and thus via Yarn scripts); PHP linting is handled via a Composer package (and thus via Composer scripts):

    yarn lint
    composer lint

To apply lint fixes automatically (use with caution - make sure your working tree is clean first):

    yarn fix
    composer fix

Run tests (which may or may not do much yet!):

    yarn test
    composer test

## Deployment

Deployment of this repo to [tm.id.au](https://tm.id.au) is handled by Travis CI.

After linting and tests pass, the custom [.deploy.sh](.deploy.sh) script is run. This performs a number of steps to deploy to the firewalled EC2 instance that my WordPress instance is running on. It triggers static site generation via a [custom WP-JSON endpoint](inc/static.php) for the [Simply Static plugin](https://wordpress.org/plugins/simply-static/), which then triggers syncing to S3 via an [on-server script](https://gist.github.com/tdmalone/2af8bce70ecc1b665fb953d5e806c8fd).

## License

[GPLv3](LICENSE).
