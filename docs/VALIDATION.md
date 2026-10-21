# Restoration and validation record

- Restored every original PHP source file unchanged from the supplied `bookstore.zip`.
- Restored `database/bookstore.sql` from the original dump, including the original sample rows.
- Restored all original book cover and other `image/` assets from `bookstore.zip`.
- Kept report-derived screenshots from the earlier repository preparation.
- Rewrote README and schema/security notes to accurately describe the historical source.
- PHP syntax was checked with PHP CLI (`php -l`), and the restored original PHP/SQL/image files were compared byte-for-byte against supplied originals.

**Not checked:** running MySQL import, HTTP/browser workflows, modern runtime compatibility, vulnerability exploitation, or ownership/licensing of included imagery and descriptions.
