# PHP Contact Manager

## Overview
This project is a simple PHP-based contact manager application that allows users to manage their contacts. Users can add, edit, view, and delete contacts, with all data stored in a MySQL database.

## Project Structure
```
php-contact-manager
├── public
│   ├── index.php        # Main entry point for the application
│   ├── crear.php        # Form for adding a new contact
│   ├── editar.php       # Form for editing an existing contact
│   ├── ver.php          # Displays details of a specific contact
├── src
│   ├── config.php       # Database connection settings
│   ├── templates
│   │   ├── header.php   # HTML header section
│   │   └── footer.php    # HTML footer section
├── sql
│   └── database.sql     # SQL commands for database schema and initial data
└── README.md            # Documentation for the project
```

## Requirements
- PHP 7.4 or higher
- MySQL database
- Composer (optional, for dependency management)

## Setup Instructions
1. **Clone the repository**:
   ```
   git clone <repository-url>
   cd php-contact-manager
   ```

2. **Set up the database**:
   - Create a MySQL database named `agenda_contactos`.
   - Import the SQL schema from `sql/database.sql` to set up the necessary tables.

3. **Configure database connection**:
   - Open `src/config.php` and update the database connection settings if necessary.

4. **Run the application**:
   - Use a local server (like XAMPP or MAMP) to serve the `public` directory.
   - Access the application via `http://localhost/php-contact-manager/public/index.php`.

## Usage
- **Add a new contact**: Click on "Agregar Nuevo Contacto" in the main interface.
- **Edit a contact**: Click on "Editar" next to the contact you wish to modify.
- **View contact details**: Click on "Ver" next to the contact.
- **Delete a contact**: Click on "Eliminar" next to the contact and confirm the action.

## Contributing
Feel free to fork the repository and submit pull requests for any improvements or bug fixes. 

## License
This project is open-source and available under the MIT License.