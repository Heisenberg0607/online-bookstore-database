# Database schema (original SQL dump)

The original `database/bookstore.sql` file is retained byte-for-byte from the submitted coursework.

| Table | Primary key | Relationships | Purpose |
| --- | --- | --- | --- |
| `book` | `bookid` | Referenced by cart, orders, and rate | Catalog books |
| `user` | `userid` | Referenced by cart, orders, and rate | Test accounts and user permissions |
| `cart` | (`userid`, `bookid`) | Foreign keys to `user` and `book` | Shopping cart lines |
| `orders` | `orderid` | Foreign keys to `user` and `book` | Stored purchased book lines |
| `rate` | (`userid`, `bookid`) | Foreign keys to `user` and `book` | User reviews and ratings |

The group report also proposed tables for multiple book authors (`few_author`, `bA`), but these are **not** in the original SQL dump.

## Design limitations

- Prices and calculated amounts are stored as `FLOAT`; production systems should use `DECIMAL` (or integer currency units).
- `orders` stores one purchased book per row, rather than separate order headers and lines. It lacks order time and payment or fulfillment status.
- `ON DELETE CASCADE` on order references could delete historical records when a book or user is removed.
- `user.password` contains plaintext **fictional test** passwords in the historical dump.
- Collected book descriptions may contain original encoding artifacts and third-party copyrighted text; unchanged here for archival fidelity.
