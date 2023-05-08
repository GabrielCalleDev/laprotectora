Migrations:

php artisan make:migration create_shelters_houses_table --create=shelters_houses
php artisan make:migration create_pets_table --create=pets
php artisan make:migration create_pets_images_table --create=pets_images
php artisan make:migration create_pets_histories_table --create=pets_histories
php artisan make:migration add_fields_to_users_table --table=users
php artisan make:migration create_contact_form_table --create=contact_form
php artisan make:migration create_donations_table --create=donations
php artisan make:migration create_favorites_table --create=favorites
php artisan make:migration create_visits_table --create=visits
php artisan make:migration create_questionnaires_table --create=questionnaires
php artisan make:migration create_adoptions_table --create=adoptions
php artisan make:migration create_adoptions_history_table 
php artisan make:migration create_contacts_directory_table --create=contacts_directory
php artisan make:migration create_people_table --create=people
php artisan make:migration create_roles_table --create=roles

Models:

php artisan make:model ShelterHouse --seed --factory
php artisan make:model Pet --seed --factory
php artisan make:model PetImage --seed --factory
php artisan make:model PetHistory --seed --factory
php artisan make:model ContactForm --seed --factory
php artisan make:model Donation --seed --factory
php artisan make:model Favorite --seed --factory
php artisan make:model Visit --seed --factory
php artisan make:model Questionnaire --seed --factory
php artisan make:model Adoption --seed --factory
php artisan make:model AdoptionHistory --seed --factory
php artisan make:model ContactsDirectory --seed --factory
php artisan make:model People --seed --factory
php artisan make:model Role --seed --factory


Controllers:

php artisan make:controller ShelterHouseController --resource
php artisan make:controller PetController --resource
php artisan make:controller PetImageController --resource
php artisan make:controller HistoryPetController --resource
php artisan make:controller ContactFormController --resource
php artisan make:controller DonationController --resource
php artisan make:controller FavoriteController --resource
php artisan make:controller VisitController --resource
php artisan make:controller QuestionnaireController --resource
php artisan make:controller AdoptionController --resource
php artisan make:controller AdoptionHistoryController --resource
php artisan make:controller ContactsDirectoryController --resource
php artisan make:controller PeopleController --resource
php artisan make:controller RoleController --resource

Filament:
php artisan make:filament-resource User --generate
php artisan make:filament-resource ShelterHouse --generate
php artisan make:filament-resource Pet --generate
php artisan make:filament-resource PetImage --generate
php artisan make:filament-resource PetHistory --generate
php artisan make:filament-resource ContactForm --generate
php artisan make:filament-resource Donation --generate
php artisan make:filament-resource Favorite --generate
php artisan make:filament-resource Visit --generate
php artisan make:filament-resource Questionnaire --generate
php artisan make:filament-resource Adoption --generate
php artisan make:filament-resource AdoptionHistory --generate
php artisan make:filament-resource ContactsDirectory --generate
php artisan make:filament-resource People --generate
php artisan make:filament-resource Role --generate

Translating Filament:
php artisan vendor:publish --tag=filament-translations
