# Laravel App | Encrypt & Decrypt Data

## :open_book: Description

This application allows you to manage Products and Categories securely. Data is stored in an
encrypted format to ensure confidentiality.

## :hammer_and_wrench: Technologies

-   Laravel 11
-   PHP 8.3
-   MySQL 8.0.36
-   Composer 2.6.6
-   Bootstrap 5.3

## :construction: Work Flow

#### Example on create new product

1. User input data
2. Data will pass to controller
3. Controller will interact with related service for store data
4. Service will store data using eloquent model (`Product::create`)
5. In the model, setters are used to encrypt the data before it is stored in the database.
6. Data will store to database in encrypted format

#### So, how to decrypt data?

As we know, the data is encrypted in the model before being stored in the database. Similarly, when retrieving the data, during the data retrieval with the model in the service, the model has an accessor to decrypt the columns when they are accessed.

#### So, the conclusion?

The encryption and decryption processes are handled in the model using accessors and mutators provided by Laravel. However, for the encryption option, the `EncryptionService` is used, which refers to the `.env` file for the encryption settings.

#### Related Files For Encryption & Decryption Process

-   [Product Model](app/Models/Product.php)
-   [Category Model](app/Models/Category.php)
-   [Encryption Service](app/Services/EncryptionService.php)

## :gear: Setup

1.  Clone this repository
2.  Run `composer install`
3.  Create a new database
4.  Copy the `.env.example` file to `.env`
5.  Configure the database connection in the `.env` file
6.  For generate app, run following command
    ```bash
    php artisan key:generate
    ```
7.  Configure the encryption type and key in the `.env` file on the following lines:

    ```bash
    ENCRYPTION_TYPE=
    ENCRYPTION_KEY=
    ```

    for now, the encryption type are
    | Encryption Type | Description | ENCRYPTION_TYPE | ENCRYPTION_KEY |
    | --------------- | ----------- | --------------- | --------------- |
    | default | This refers to the application's APP_KEY | `default` | |
    | openssl | OpenSSL encryption with key refers to ENCRYPTION_KEY | `openssl` | `input_your_Key` |
    | base64 | Base64 encryption without key | `base64` | |

8.  For migration, run following command
    ```bash
    php artisan migrate
    ```
9.  For seed, run following command
    ```bash
    php artisan db:seed
    ```
10. For run the application, run following command
    ```bash
    php artisan serve
    ```
    And open the browser with the following URL (assuming you are running the application on the default port):
    ```bash
    http://127.0.0.1:8000/login
    ```
11. Login with the following credentials:
    -   Email: `admin@admin.com`
    -   Password: `password`
