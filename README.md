# PHP Site Skeleton

This is a minimal PHP site ready for shared hosting environments that only support PHP.

- Public web root: `public/`
- Front controller/router: `public/index.php`
- Views: `app/views`
- Assets: `public/assets`

## Local usage

- Serve the `public/` directory with PHP's built-in server:

```bash
php -S 127.0.0.1:8080 -t public
```

Then open `http://127.0.0.1:8080`.

## Deploying to shared hosting

- Point your hosting document root to `public/`.
- If you cannot change the document root, upload everything and ensure `.htaccess` from `public/` sits in the directory served by the web server.
- Ensure Apache `mod_rewrite` is enabled. If not, link directly to `.php` files or remove pretty URLs.

## Adding pages

- Create a new view in `app/views`, e.g. `services.php`.
- Add a route in `public/index.php` (the `$routes` array), e.g. `'/services' => 'services'`.

## Contact form

- Wire `app/views/contact.php` to a PHP handler or an external form service. On many hosts, `mail()` requires specific configuration.