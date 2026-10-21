# Preparation validation

**Completed:** PHP CLI syntax check (`php -l`) passed on all 23 PHP files in the prepared repository; SQL file was reconstructed from the five `CREATE TABLE` definitions and three foreign-key ALTER statements in the submitted dump; screenshots were extracted from the uploaded group report; original user/cart/order/rating seed records are not included; mock credit-card fields were removed.

**Not completed:** booting MySQL, importing the database into a running server, browser-based end-to-end tests, verification on a particular WAMP/PHP runtime, automated security testing, or performance benchmarking.

**Local smoke-test checklist:** create an empty MySQL `bookstore` database, import the public SQL, load the home page, register a local test user, log in, browse/search a book, add it to cart, place a **demo** order, post a review, and test admin screens after promoting your own local test account. If any step fails, document the runtime and traceback before changing code.
