# Security and maintenance review

**Status: legacy coursework; local demonstration only. Do not expose to the public internet.**

This review documents important issues observed directly in the uploaded source. It is not a comprehensive pentest. Preparing a GitHub repository is **not** evidence that the application is secure or fully runnable.

| Topic | Original / remaining behavior | Recommended follow-up |
| --- | --- | --- |
| SQL injection | Several remaining handlers interpolate untrusted input into SQL (`search_result.php`, `cartadd.php`, `change_cart.php`, `item.php`, `profile.php`, etc.) | Use prepared statements and strict type/column whitelists throughout |
| Access control | Administrative and other write endpoints lack consistent server-side role checks; request parameters can supply target user IDs | Centralize login + role authorization; derive user ID from session |
| CSRF | State-changing endpoints do not require CSRF tokens; some operations use GET | Require POST, CSRF tokens, and same-site cookies |
| Input validation / XSS | Raw database/user strings are printed in HTML; upload filenames and contents are weakly validated | Contextual HTML escaping; server-side validation and safe random upload names |
| Passwords | Original signup stored plaintext and used GET; original login compared raw plaintext | **Partially addressed for new local accounts:** POST, `password_hash`/`password_verify`, prepared signup/login |
| Checkout data | Original mock checkout asked for payment-card-like input without a processor | **Removed from public copy**; local demo order only, no payment details |
| DB configuration | Original code used hard-coded root/blank connection in multiple places | **Centralized** in `db_con.php` with environment support; local-only defaults remain |
| Transactions | Order transfer performs insert/delete without a transaction | Wrap order placement in a transaction; handle rollback and consistency |
| Monetary schema | Prices and amounts use floating point | Replace with `DECIMAL` or integer smallest currency unit |
| Compatibility / tests | Original dependencies and scripts are from 2021–2022; no automated tests supplied | Add pinned runtime/container and integration tests |

### Integrity and licensing

- The original SQL contained fake or possibly personally identifying account fields and plaintext passwords; **those rows are not redistributed**.
- Original commercial descriptions and book-cover images are omitted from the public copy. Screenshots reproduced from the group report remain historical illustrations.
- The full student-group report is omitted to avoid publishing collaborators' identifying details without a separate review.
- The original Bootstrap libraries and theme assets are retained for compatibility; their licenses/attribution should be checked before public licensing.

### Publishing recommendation

Start with a **private GitHub repository**. Review collaborator permissions and refactor unsafe endpoints before making it public or enabling a live demo. A static portfolio website may link to screenshots and describe the academic work without hosting the application.
