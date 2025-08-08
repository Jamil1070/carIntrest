
# CarIntrest - Auto Community Platform

<<<<<<< HEAD
## Projectbeschrijving

CarIntrest is een volledig functionele auto community platform gebouwd met Laravel 12.x. Het platform biedt gebruikers de mogelijkheid om auto's te bekijken, nieuws te lezen, commentaren te plaatsen en contact op te nemen. Daarnaast beschikt het over een uitgebreid admin panel voor contentbeheer.

### Hoofdfunctionaliteiten
=======
##  Projectbeschrijving

CarIntrest is een volledig functionele auto community platform gebouwd met Laravel 12.x. Het platform biedt gebruikers de mogelijkheid om auto's te bekijken, nieuws te lezen, commentaren te plaatsen en contact op te nemen. Daarnaast beschikt het over een uitgebreid admin panel voor contentbeheer.

###  Hoofdfunctionaliteiten
>>>>>>> 7a2318c726dcf249f4912c9850416b90cad464cb

- **Auto Catalogus**: Bekijk en beheer auto's met afbeeldingen en beschrijvingen
- **Nieuws Systeem**: Volledig nieuws management met tags en many-to-many relaties
- **Gebruikers Authenticatie**: Registratie, login, profiel beheer
- **Comment Systeem**: Reacties plaatsen op auto's (alleen voor ingelogde gebruikers)
- **FAQ Systeem**: Veelgestelde vragen met categorieën
- **Contact Formulier**: Met client-side validatie en email notificaties
- **Admin Dashboard**: Volledig admin panel voor alle content management
- **Responsive Design**: Mobile-first design met hamburger menu

##  Technische Vereisten Implementatie

### 1. **Laravel Framework** 
- **Locatie**: Gehele project
- **Versie**: Laravel 12.x
- **Implementatie**: `composer.json:8-12`

### 2. **MVC Architectuur**

#### Models:
- **User Model**: `app/Models/User.php:1-47`
- **Car Model**: `app/Models/Car.php:1-32`  
- **News Model**: `app/Models/News.php:1-29`
- **Tag Model**: `app/Models/Tag.php:1-18`
- **Comment Model**: `app/Models/Comment.php:1-25`
- **FAQ Models**: `app/Models/Faq.php:1-23` & `app/Models/FaqCategory.php:1-18`
- **Contact Model**: `app/Models/Contact.php:1-23`

#### Controllers:
- **HomeController**: `app/Http/Controllers/HomeController.php:1-27`
- **NewsController**: `app/Http/Controllers/NewsController.php:1-25`
- **ContactController**: `app/Http/Controllers/ContactController.php:1-52`
- **Admin Controllers**: `app/Http/Controllers/Admin/` (7 controllers)

#### Views:
- **Layouts**: `resources/views/layouts/app.blade.php:1-245`
- **Home Views**: `resources/views/home.blade.php:1-89`
- **Admin Views**: `resources/views/admin/` (18+ views)

### 3. **Database & Migraties**

#### Migraties (14 totaal):
- **Users**: `database/migrations/0001_01_01_000000_create_users_table.php`
- **Cars**: `database/migrations/2025_08_07_161845_create_cars_table.php`
- **Comments**: `database/migrations/2025_08_07_175454_create_comments_table.php`
- **FAQ System**: `database/migrations/2025_08_07_183510_create_faq_categories_table.php`
- **News System**: `database/migrations/2025_08_08_182434_create_news_table.php`
- **Many-to-Many**: `database/migrations/2025_08_08_182553_create_news_tags_table.php`

#### Seeders:
- **DatabaseSeeder**: `database/seeders/DatabaseSeeder.php:1-20`
- **AdminUserSeeder**: `database/seeders/AdminUserSeeder.php:1-25`
- **CarSeeder**: `database/seeders/CarSeeder.php:1-39`
- **NewsSeeder**: `database/seeders/NewsSeeder.php:1-59`

### 4. **Authenticatie Systeem**

#### Implementatie:
- **AuthController**: `app/Http/Controllers/AuthController.php:1-98`
- **Middleware**: `app/Http/Middleware/AdminMiddleware.php:1-25`
- **Routes**: `routes/web.php:45-52`
- **Login Views**: `resources/views/auth/login.blade.php:1-78`

### 5. **CRUD Operaties**

#### Auto Management:
- **Create**: `app/Http/Controllers/Admin/CarAdminController.php:35-58`
- **Read**: `app/Http/Controllers/Admin/CarAdminController.php:15-20`
- **Update**: `app/Http/Controllers/Admin/CarAdminController.php:80-106` 
- **Delete**: `app/Http/Controllers/Admin/CarAdminController.php:108-115`

#### News Management:
- **CRUD**: `app/Http/Controllers/Admin/NewsAdminController.php:1-120`

### 6. **Many-to-Many Relaties**

#### News-Tags Relatie:
- **News Model**: `app/Models/News.php:24-27`
- **Tag Model**: `app/Models/Tag.php:13-16`
- **Pivot Table**: `database/migrations/2025_08_08_182553_create_news_tags_table.php:15-20`
- **Controller Usage**: `app/Http/Controllers/Admin/NewsAdminController.php:45-47`

### 7. **Form Validatie**

#### Server-side Validatie:
- **Contact Form**: `app/Http/Controllers/ContactController.php:16-30`
- **News Form**: `app/Http/Controllers/Admin/NewsAdminController.php:30-36`

#### Client-side Validatie:
- **Contact Form**: `resources/views/contact.blade.php:135-247`
- **JavaScript Validation**: `resources/views/contact.blade.php:180-220`

### 8. **File Upload**

#### Implementatie:
- **Car Images**: `app/Http/Controllers/Admin/CarAdminController.php:70-78`
- **News Images**: `app/Http/Controllers/Admin/NewsAdminController.php:60-68`
- **Storage**: `public/images/` directory

### 9. **Responsive Design**

#### CSS Media Queries:
- **Mobile First**: `resources/views/layouts/app.blade.php:82-138`
- **Hamburger Menu**: `resources/views/layouts/app.blade.php:30-62`
- **Breakpoints**: 768px en 480px

### 10. **Blade Components**

#### Alert Component:
- **Component**: `resources/views/components/alert.blade.php:1-86`
- **Usage**: Herbruikbaar in alle views

### 11. **Route Management**

#### Route Definitie:
- **Web Routes**: `routes/web.php:1-87`
- **Admin Routes**: `routes/web.php:55-76`
- **API Routes**: Resource controllers voor RESTful operations

### 12. **Database Seeding**

#### Seed Data:
- **Cars**: `database/seeders/CarSeeder.php:15-37`
- **News**: `database/seeders/NewsSeeder.php:20-57`
- **Admin User**: `database/seeders/AdminUserSeeder.php:12-23`

##  Installatiehandleiding

### Vereisten
- PHP 8.1 of hoger
- Composer
- Node.js & NPM
- MySQL/SQLite database

### Installatie Stappen

1. **Clone Repository**
```bash
git clone https://github.com/Jamil1070/carIntrest.git
cd carIntrest
```

2. **Install Dependencies**
```bash
composer install
npm install && npm run build
```

3. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Configuratie**
Bewerk `.env` file:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

5. **Database Migratie & Seeding**
```bash
php artisan migrate
php artisan db:seed
```

6. **Storage Link**
```bash
php artisan storage:link
```

7. **Server Starten**
```bash
php artisan serve
```

### Default Admin Account
- **Email**: admin@ehb.be
- **Password**: Password!321
- **Username**: admin

##  Screenshots

### Hoofdpagina & Navigation
![Homepage](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/homepagina.png)

![Homepage](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/nieuws_bericht.jpg)
*Homepage met auto overzicht en nieuws*



![Hamburger Navigation](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/responsive.jpg)

![Hamburger Navigation](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/hamburger_navigatie.jpg)
*Responsive hamburger menu voor mobile devices*



### Authenticatie Systeem
![Login Pagina](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/login_pagina.jpg)
*Login interface voor gebruikers*

![Registratie Pagina](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/registratie_pagina.jpg)


*Registratie formulier voor nieuwe gebruikers*

![Wachtwoord Vergeten](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/wachtwoord_vergeten.jpg)
*Wachtwoord reset functionaliteit*

### Profiel Beheer
![Mijn Profiel](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/mijn_profiel.jpg)
*Gebruiker profiel overzicht*

![Profiel Bewerken](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/gebruiker_bewerken.jpg)
*Profiel informatie bijwerken*

![Profielen Pagina](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/profielen_pagina.jpg)
*Overzicht van alle gebruikers profielen*

### Admin Dashboard
![Admin Dashboard](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/admin_dashboard.jpg)
*Admin dashboard *

### Nieuws Systeem
![Nieuws Pagina]([c:\Users\burha\OneDrive\Bureaublad\screenshot\nieuws_pagina.jpg](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/nieuws_bekijken.jpg))
*Nieuws overzicht voor bezoekers*

![Nieuws Bekijken](https://github.com/Jamil1070/carIntrest/blob/35841c0f830212f149442961f6eb800da8be129e/screenshot/nieuws_bekijken.jpg)
*Volledig nieuwsartikel met tags*



![Nieuws Bewerken](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/nieuws_beheren.jpg)
*Nieuwsartikel bewerken *



### Auto Management
![Auto's Beheren](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/auto_overzicht.jpg)
*CRUD operaties voor auto beheer*



![Auto Toevoegen](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/auto_toevoegen.jpg)
*Nieuwe auto toevoegen aan de catalogus*

### Gebruikers Beheer


![Gebruiker Bewerken](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/admin_rechten.jpg)
*Gebruiker rechten en informatie beheren*

### FAQ Systeem
![FAQ Pagina](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/faq_pagina.jpg)
*Veelgestelde vragen interface*

![FAQ Beheren](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/faq_beheren.jpg)
*Admin FAQ management systeem*

### Contact Systeem
![Contact Pagina](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/contact_pagina.jpg)
*Contact formulier met client-side validatie*

### about 
![Contact Pagina](https://github.com/Jamil1070/carIntrest/blob/3d842ebf9cd2234acb22acc160f6e7573a9200c5/screenshot/about_pagina.jpg)
*about pagina*


## Bijzondere Features

### 1. **Dual Layout System**
- **Public Layout**: `resources/views/layouts/app.blade.php` (Gele theme)
- **Consistent Design**: Alle admin views gebruiken dezelfde gele layout

### 2. **Advanced Comment System**
- **Authentication Required**: `app/Http/Controllers/CommentController.php:16-18`
- **User Association**: Comments gekoppeld aan gebruikers

### 3. **Real-time Form Validation**
- **Live Feedback**: JavaScript validatie met visuele feedback
- **Error Styling**: Dynamic CSS classes voor form states

### 4. **Mobile-First Design**
- **Hamburger Menu**: Smooth animaties en auto-close functionaliteit
- **Responsive Tables**: Stack layout op mobile devices

### 5. **Security Features**
- **CSRF Protection**: Alle forms beschermd
- **XSS Prevention**: Input sanitization
- **Admin Middleware**: Route protection

<<<<<<< HEAD
## Gebruikte Bronnen
=======
##  Gebruikte Bronnen
>>>>>>> 7a2318c726dcf249f4912c9850416b90cad464cb


### AI Assistentie
1. **GitHub Copilot**
2. **AI Chat Sessions** 
   - Project architectuur en planning (teksten , beschrijvingen)
   - debuggen 
   - layouts

### Libraries & Packages
1. **Laravel Framework**: https://laravel.com/
2. **Faker Library**: Voor test data generatie
3. **Carbon**: Voor datum manipulatie

##  Git Commit History

Het project bevat meerdere commits per functionaliteit:

### Commit Structure:
- **Initial Setup**: Project initialisatie en basis configuratie
- **Models & Migrations**: Database structuur implementatie
- **Authentication**: Login/register functionaliteit
- **CRUD Operations**: Basis CRUD voor alle entiteiten
- **Admin Panel**: Admin dashboard en management
- **Responsive Design**: Mobile-first implementatie
- **Advanced Features**: News systeem, validatie, components
- **Final Polish**: Bug fixes en laatste verbeteringen

### Daily Commits:
Commits gedaan op verschillende dagen tijdens ontwikkeling, zie Git history voor details.



## Contact

Voor vragen over dit project:
- **Naam**: Chaud-ry Burhan
- **Project**: Backend Development Herexamen
- **Jaar**: 2025

---

*Dit project is ontwikkeld als onderdeel van het backend development herexamen en demonstreert alle vereiste Laravel concepten en best practices.*

