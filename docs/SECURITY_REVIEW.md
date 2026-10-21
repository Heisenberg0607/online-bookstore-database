# Security & publication review — historical original source

**Archival purpose only. Do not deploy publicly.** This is a focused source review, not a complete penetration test or runtime security certification.

## Sensitive configuration inventory

- The original ZIP contains **no `.env` file**, no checked-in PEM/SSH private keys, and no obvious external API tokens in a pattern-based source inspection.
- `db_con.php` and multiple other PHP files use local MySQL connection arguments (`localhost`, `root`, empty password, `bookstore`). These values do **not** appear to be externally issued secrets, but **must not** be used in a real deployment.
- `database/bookstore.sql` stores a small set of **classroom test account IDs and plaintext passwords**. The repository owner stated these were fabricated test data. They are restored unchanged for archival accuracy; do not reuse any of their passwords for real accounts.
- The checkout page has fields labeled CARD NUMBER, CARD ID, and EXPIRY DATE. The source does not demonstrate a payment processor; entering real payment-card information into this form is unsafe.
- We cannot rule out all private information or third-party content rights from code scanning alone. Check the source, original images, and contributor permissions before publishing.

## Original-code security limitations

| Topic | Observed original behavior | Safer approach in a future rewrite |
| --- | --- | --- |
| Password handling | Original signup stores plaintext passwords and sends the signup form via GET; login uses plaintext equality | POST + password hashing (`password_hash` / `password_verify`), secure session settings |
| SQL injection | Multiple queries interpolate request parameters directly | Prepared statements, input validation and allowed query fields |
| Authorization | Administrative or modifying endpoints do not reliably enforce role and session ownership server-side | Server-side authorization and use session identity for changes |
| CSRF | State-changing handlers lack CSRF protection; some use GET | POST with CSRF tokens and SameSite cookies |
| Output / uploads | User-controlled strings and uploaded filenames are insufficiently validated or escaped | HTML escaping, restrictive upload handling |
| Database connection | Several PHP files hard-code root / empty password | Least-privileged DB account and secret configuration outside repository |
| Order integrity | Copies cart to orders and deletes cart without an encompassing transaction | Atomic transactions, rollback handling |
| Money data type | Uses floating-point `FLOAT` amounts | `DECIMAL` or integer minor units |
| Payment UX | Card-like fields are displayed; no secure checkout integration is implemented | Remove fields or integrate a compliant payment gateway |

## Publication guidance

GitHub can host this **source repository** for historical review, but do not host a **running PHP/MySQL application** on a public internet-facing server. Do not commit future `.env` files, actual passwords, API keys, certificates, database exports with real users, logs, or uploaded content. The `.gitignore` is only a convenience; already tracked files and past Git history are not protected retroactively.

The original book descriptions, jacket images, and third-party theme assets may be subject to copyrights. Keep the repository private until collaborators and applicable content rights have been considered.
