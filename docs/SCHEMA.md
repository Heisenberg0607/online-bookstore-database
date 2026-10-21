# Schema notes (actual SQL dump)

The uploaded report describes a conceptual extension for multiple authors, but the supplied database dump defines only these tables:

| Table | Primary key | Key relationships | Purpose |
| --- | --- | --- | --- |
| `book` | `bookid` | Referenced by cart, orders and rate | Book metadata and price |
| `user` | `userid` | Referenced by cart, orders and rate | Account information and application permission |
| `cart` | (`userid`, `bookid`) | Foreign keys to user and book | Each user's current cart line per book |
| `orders` | `orderid` | Foreign keys to user and book | One row per ordered book line, **not** a normalized header/line-item design |
| `rate` | (`userid`, `bookid`) | Foreign keys to user and book | One rating and review per user per book |

## Design limitations of the original schema

- `book.price`, `cart.amount`, and `orders.amount` are `FLOAT`, which is inappropriate for exact monetary amounts; a redesign should use `DECIMAL(10,2)` or integer cents.
- `orders` has no order timestamp, separate order header, fulfillment/payment status, or snapshot-safe product references.
- Cascading deletes may remove order history when a user or book is deleted; production order history needs a different retention design.
- Book authors are stored as plain text instead of a join table. The proposed `few_author` and `bA` tables are not in the actual dump.
- `user.password` was stored in plaintext in the original dump. Public version retains the `varchar(100)` column and updates registration/login to hash/verify, but other security gaps remain.
- The public SQL ships no accounts or transaction records, and creates eight fictional catalog entries referencing `image/noimage.png`.
