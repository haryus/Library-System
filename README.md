## Project Structure

### Routes

- **Dashboard:** `/` - Displays the main store page.
- **Book Management:Books** `/books` - Books page.
- **Book Management:Genre** `/genres` - Genres page.
- **Book Management:Authors** `/authors` - Authors page.
- **Staff Management:Staff** `/staffs` - Staff page.
- **Staff Management:Staff Accounts** `/users` - Staff Account page.
- **Sale:** `/sales` - Displays the purchase books.


### Models

- **User Model:** Manages user information, including name, password, and username.
- **Password Reset Tokens:** Handles password reset tokens.
- **Failed Jobs:** Records failed job attempts.
- **Personal Access Tokens:** Manages personal access tokens.
- **Failed Jobs:** Records failed job attempts.
- **Author:** Manages author information.
- **Book:** Manages book information.
- **Genre** Manages genre information.
- **Sale:** Manages sale information.
- **Staff:** Manages staff information.

### Migrations

- `users` table: Manages user information.
- `password_reset_tokens` table: Manages password reset tokens.
- `failed_jobs` table: Records failed job attempts.
- `personal_access_tokens` table: Manages personal access tokens.
- `author` table: Stores author information.
- `books` table: Stores book information.
- `genre` table: Stores genre of the book information.
- `staff` table: Stores staff credentials.
- `sale` table: Manages customer carts.

### Controllers

- **AuthorController:** Handles author display-related functionalities.
- **BookController:** Handles book display-related functionalities.
- **GenreController:** Handles genre display-related functionalities.
- **UserController:** Handles authentication-related functionalities.
- **StaffController:** Handles authentication-related functionalities.
- **DashboardController:** Handles dashboard display-related functionalities.
- **SaleController:** Handles sales display-related functionalities.

### Installation

1. Download the repository:


2. Unzip the repo and  Navigate to the project directory:

   ```bash
   cd LSAS
   ```

3. Install PHP dependencies:

   ```
   composer install
   ```

4. Install frontend dependencies:

   ```bash
   npm install && npm run dev
   ```

5. Copy the `.env.example` file to `.env` and configure your database connection.

6. Generate the application key:

   ```bash
   php artisan key:generate
   ```

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Run seeder 

   ```bash
   php artisan db:seed --class=UsersTableSeeder
   ```


9. Serve the application:

   ```bash
   php artisan serve
   ```

The application should now be running at [http://localhost:8000](http://localhost:8000).

