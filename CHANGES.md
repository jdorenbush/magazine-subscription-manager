# Publication changes — September 2026

These are limited edits to prepare a non-executable historical archive. They do not constitute a security retrofit or full modernization.

## Changed files

### `legacy/adduser_form.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.

### `legacy/config.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced database host, username, password and database name with inert placeholders.

### `legacy/header.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced original-site URL with relative path style.css.
- Replaced original-site URL with relative path assets/master.css.

### `legacy/index.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced original-site URL with relative path subscription.php.

### `legacy/magadd.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/magadd_config.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced database host, username, password and database name with inert placeholders.

### `legacy/magadd_issues.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/paypal.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Corrected confirmation-message spelling.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/search.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Corrected address-search branch and missing WHERE in city search; query security remains legacy.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/subscription.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/xls.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.

### `legacy/adduser.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced newest-row lookup with connection-specific mysql_insert_id().
- Corrected confirmation-message spelling.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/bulletin.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced original-site URL with relative path img/xls.png.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/details.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Replaced raw database diagnostics / invalid error call with generic message.

### `legacy/edit.php`

- Added unconditional execution stop and archive notice; normalized PHP opening tags where needed.
- Kept subscriber and details query results separate and used row zero for the bulletin flag.
- Replaced raw database diagnostics / invalid error call with generic message.

## Added files

- `README.md`: project context, file map, missing dependencies, provenance and validation limits.
- `CHANGES.md`: this edit inventory.
- `.gitignore`: common credential, export, backup and local-development exclusions.

## Preserved and excluded

`style.css` is unchanged. The archive includes all 15 PHP files and the stylesheet supplied for this application. Screenshots, the unrelated Shopify text attachment, original credential-bearing backups, database data and tool/helper scripts are excluded.

## Known defects left as historical source

- SQL interpolation and raw HTML output remain in multiple workflows.
- No authentication, authorization or CSRF implementation is included in this source set.
- Subscriber creation is not transactional and still uses legacy token generation, date handling and duplicate checks.
- Subscriber action routing and payment-update routing are incomplete.
- Pagination, input validation, array-key usage and error handling still need a systematic rewrite.
- The export is tab-delimited text named `.xls`; formula-injection and format issues are not fixed.
- The email workflow references missing export and send handlers; no email was sent.
- Database schema, external access controls, data constraints and third-party provenance could not be verified.

All PHP files stop immediately on execution. No environment-variable switch or runtime bypass was added.

## Validation

- Compared output against all original database connection values without disclosing the values in the report.
- Checked remaining URL/email/credential-like references; remaining external URLs are historical PayPal documentation and XHTML declarations.
- Verified execution stops in every PHP file, removal of original-site URLs, and targeted search/edit/insert-ID changes.
- Checked archive inventory and ZIP integrity.
- PHP syntax linting and end-to-end execution were not available; no production-readiness claim is made.
