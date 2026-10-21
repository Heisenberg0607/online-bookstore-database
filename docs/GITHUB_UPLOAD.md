# Uploading this project to GitHub

Recommended first visibility: **Private**, because this is historical group coursework and important security debt remains.

## Option A: GitHub website

1. Download and **extract** `online-bookstore-github-ready.zip`.
2. Log into GitHub → **New repository**.
3. Suggested name: `online-bookstore-database` and description: `Database Systems coursework — relational online bookstore built with PHP and MySQL`.
4. Choose **Private** while you confirm team sharing permissions. Do not auto-generate a README or license because both decisions are already documented in the prepared folder.
5. Open the empty repository's **uploading an existing file** page.
6. Drag the **contents of the extracted `online-bookstore-database` directory** (not the ZIP itself and not a duplicate parent directory).
7. Commit with the message `docs: organize legacy bookstore course project`.
8. Check that GitHub opens `README.md` on the repository front page and `database/bookstore.sql` is visible.

## Option B: Git command line

From your local extracted project folder:

```bash
cd online-bookstore-database
git init
git branch -M main
git add .
git commit -m "docs: organize legacy bookstore course project"
git remote add origin https://github.com/YOUR_USERNAME/online-bookstore-database.git
git push -u origin main
```

Create the empty private repository in GitHub before running the push, and replace `YOUR_USERNAME` with your own username. GitHub may require sign-in or credential-manager authorization.

## Before making it public

- Confirm that all team members permit publishing the jointly authored code/screenshots.
- Do not assume a software license; agree on one before adding a `LICENSE` file.
- Read `docs/SECURITY_REVIEW.md`. Do not enable a public PHP demo with the legacy handlers.
- Replace the placeholder text in `docs/PORTFOLIO_NOTES.md` with your **verified personal contributions**, then update `README.md`.
