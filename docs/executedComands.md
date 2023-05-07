Migrations:

php artisan make:migration create_shelters_houses_table --create=shelters_houses
php artisan make:migration create_pets_table --create=pets
php artisan make:migration create_pets_images_table --create=pets_images
php artisan make:migration create_history_pets_table --create=history_pets
php artisan make:migration add_fields_to_users_table --table=users
php artisan make:migration create_contact_form_table --create=contact_form
php artisan make:migration create_donations_table --create=donations
php artisan make:migration create_favorites_table --create=favorites
php artisan make:migration create_visits_table --create=visits
php artisan make:migration create_questionnaires_table --create=questionnaires
php artisan make:migration create_adoptions_table --create=adoptions
php artisan make:migration create_adoptions_history_table 
php artisan make:migration create_contacts_directory_table --create=contacts_directory

Models:

php artisan make:model ShelterHouse --seed --factory
php artisan make:model Pet --seed --factory
php artisan make:model PetImage --seed --factory
php artisan make:model HistoryPet --seed --factory
php artisan make:model ContactForm --seed --factory
php artisan make:model Donation --seed --factory
php artisan make:model Favorite --seed --factory
php artisan make:model Visit --seed --factory
php artisan make:model Questionnaire --seed --factory
php artisan make:model Adoption --seed --factory
php artisan make:model AdoptionHistory --seed --factory
php artisan make:model ContactsDirectory --seed --factory

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
