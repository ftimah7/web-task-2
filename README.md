# Web Development Task - Toggle Status

## Task Description
A simple webpage connected to a MySQL database that allows users to add records and toggle their status immediately without reloading the page.

## Steps of Implementation:

1. **Frontend (HTML, CSS, JS):**
   - Designed a one-line form to accept `Name` and `Age`.
   - Styled the page and the table using inline CSS.
   - Used JavaScript (`Fetch API`) to handle the toggle button click and update the status dynamically without refreshing the page.

2. **Backend (PHP):**
   - Created `db.php` to establish a connection with the local MySQL database.
   - Wrote PHP code in `index.php` to insert new user data via `POST` method and fetch existing records via `SELECT` query.
   - Created `toggle_status.php` to handle the logic of switching the status between `0` and `1` in the database.

3. **Database (MySQL):**
   - Created a database named `web_task`.
   - Created a table named `users` with columns: `id` (Auto Increment), `name`, `age`, and `status` (Default: 0).
