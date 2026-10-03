# IT0049 - Technical Formative Assessment 2
## Point of Sale (POS) System Workspace

A database-backed CodeIgniter 4 web application deployed on Render and connected to an Aiven MySQL Cloud Database.

### Live Hosted Links
- **Customers Page:** [https://pos-workspace.onrender.com/customers](https://pos-workspace.onrender.com/customers)
- **Users Page:** [https://pos-workspace.onrender.com/users](https://pos-workspace.onrender.com/users)

### Database Export
The database schema and sample seed records are exported in `schema.sql` located at the root of this repository.

### TFA2 Features
- Create and edit customers at `/customers/new` and `/customers/{id}/edit`.
- Create and edit users at `/users/new` and `/users/{id}/edit`.
- Customer forms require a full name and valid email address.
- Usernames are required and unique.
- User avatars accept JPG/PNG files up to 2MB. Uploaded files are resized to a 300x300 display-ready image and only the generated filename is stored in the `users.avatar` column.
- Run `php spark migrate` against an existing database to add the avatar column. New databases can use the updated `schema.sql`.

### Local Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/jmsiray-hash/pos-workspace.git
   cd pos-workspace
   ```
2. Configure the database connection in `.env`.
3. Import `schema.sql`, or run the migrations:
   ```bash
   php spark migrate
   ```
4. Start the development server:
   ```bash
   php spark serve
   ```
