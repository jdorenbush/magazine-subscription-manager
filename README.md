# Magazine Subscription Manager — Legacy Archive

Selected PHP/MySQL source from a custom administration application originally used for Mutineer Magazine. The code covers subscriber records, subscription status, magazine issues, editorial features, payment settings and data exports.

This repository is a sanitized historical portfolio sample, not a runnable application or an example of current PHP development practices. It preserves the original procedural structure, with limited publication edits documented in [CHANGES.md](CHANGES.md). Every PHP file intentionally stops before executing the legacy code.

## What the source demonstrates

- Subscriber creation, detail views and editing across `subscribers` and `sub_details` tables.
- Confirmation, bulk confirmation and soft-disable workflows.
- Search, pagination and subscription expiration fields.
- Email preference lists and an interface referencing an external mass-email handler.
- A spreadsheet-readable subscriber export.
- PayPal settings administration; this is not a complete payment integration.
- Issue creation and editorial feature, author, photographer and summary entry.
- Shared administrative navigation and styling.

## Source map

| Files in `legacy/` | Purpose |
| --- | --- |
| `subscription.php` | Subscriber listings, pagination, confirmation and soft-disable handlers |
| `adduser.php`, `adduser_form.php` | Subscriber creation and form |
| `details.php`, `edit.php` | Subscriber details and editing |
| `search.php` | Subscriber search |
| `bulletin.php` | Email preference list and mail form |
| `xls.php` | Tab-delimited export using an `.xls` filename |
| `magadd.php`, `magadd_issues.php` | Editorial features and issue entry |
| `paypal.php` | Database-backed payment settings interface |
| `config.php`, `magadd_config.php` | Inert, redacted historical database configuration |
| `index.php`, `header.php`, `style.css` | Redirect, shared markup and styling |

## Completeness and limitations

The supplied source is incomplete. No database dump, authoritative schema, image directory, shared `master.css`, `mass.php`, or `xls_bulletin.php` was supplied. Some subscriber handlers are present as separate files but are not wired into the supplied `subscription.php`. Its payment-settings update route is also incomplete. These gaps have been documented rather than reconstructed from guesses.

No customer records or database exports are included. Real connection values were replaced with inert placeholders, and original-site asset and redirect URLs were replaced with relative paths. Referenced external dependencies are not bundled.

The code still contains legacy database calls, interpolated SQL, unescaped output, GET-driven state changes, incomplete validation and fragile data handling. Authentication/authorization is not demonstrated in this source set, and CSRF protection is not implemented. **Removing the execution stops does not make this safe to run.**

## Publication edits and validation

The September 2026 cleanup was AI-assisted. It removed deployment-specific configuration, added execution stops, normalized short PHP opening tags and corrected a small number of obvious defects. It did not rewrite the original application or independently establish authorship of every line.

Static checks confirmed removal of the original connection values and original-site URLs, execution stops in all 15 PHP files, and the intended targeted fixes. A PHP runtime and database were unavailable, so PHP linting, runtime behavior and database integration were not tested.

## Attribution and reuse

The repository records historical project work. No blanket open-source license is assigned: ownership and any third-party provenance should be established before licensing the files for reuse. Historical PayPal documentation references in `header.php` are retained as context; they are not current integration instructions.

## Future modernization

A runnable successor should be developed separately, with a verified schema, PDO prepared statements, transactions, database constraints, authentication/authorization, CSRF protection, validated inputs, escaped output and meaningful integration tests. The historical source should remain clearly distinguished from that new implementation.
