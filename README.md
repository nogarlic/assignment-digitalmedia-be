# Privileges and Access Levels

## User Privilege

- **Read Access:** Allows access to view book data.
- **Create Access (Own):** Enables users to create their own book data.
- **Update Access (Own):** Permits users to update their own book data.
- **Delete Access (Own):** Allows users to delete their own book data.

## Admin Privilege

- **Read Access:** Allows viewing book data.
- **Create Access:** Enables the creation of book data.
- **Update Access:** Permits updating book data.
- **Delete Access:** Allows deletion of book data.
- **Create Category:** Enables the creation of book categories.
- **Read Category:** Allows viewing book categories.
- **Update Category:** Permits updating book categories.
- **Delete Category:** Allows deletion of book categories.

### Example Admin Account
- **Username:** lyda.bins@example.com
- **Password:** password

# Cara Menjalankan Proyek Laravel

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah di bawah ini:

## Langkah 1: Clone Repositori

```bash
git clone https://github.com/nogarlic/assignment-digitalmedia-be.git
```

## Langkah 2: Instalasi Dependencies

### Composer Install
```bash
composer install
```

### NPM Install
```bash
npm install
```

## Langkah 3: Build & Pengembangan

### Build Assets
```bash
npm run dev
```

## Langkah 4: Konfigurasi

### Generate App Key
```bash
php artisan key:generate
```

### Buat Storage Link
```bash
php artisan storage:link
```

### Jalankan Migrasi Database
```bash
php artisan migrate
```

## Langkah 5: Menjalankan Server

```bash
php artisan serve
```

