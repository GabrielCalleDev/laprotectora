## Instalación de laravel Breeze
Para instalar laravel breeze se ha ejecutado el siguiente comando:
>composer require laravel/breeze --dev

Después de la instalación se ha instalado breeze
>php artisan breeze:install

Una vez instalado se ejecutan los siguientes comandos:
>php artisan migrate

>npm install

>npm run dev

## Instalación de Sass
>npm install sass --save-dev

## Instalación de Tailwind sobre laravel.
Instala Tailwind y sus dependencias mediante el comando npm:
>npm install -D tailwindcss postcss autoprefixer

Luego ejecuta el siguiente comando para inicializar Tailwind y crear los archivos de configuración tailwind.config.js y postcss.config.js:

A modo de información, el flag -p se usa para crear el archivo postcss.config.js.
>npx tailwindcss init -p


A continuación edita el archivo tailwind.config.js y agrega las rutas hacia los archivos de plantilla con extensión .blade de Laravel, así como también hacia los posibles archivos JavaScript:
```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

Luego edita el archivo /resources/scss/app.scss de Laravel y agrega las directivas de los diferentes componentes o capas de Tailwind:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Instalación Heroicons
https://heroicons.com/
https://github.com/tailwindlabs/heroicons
>composer require blade-ui-kit/blade-heroicons

Una vez instalado se puede utilizar de la siguiente manera: 
```php
<x-heroicon-o-chevron-down class="w-6 h-6 text-primary"/>
```

## Instalación AlpineJS
https://alpinejs.dev/
>npm install alpinejs

Ahora hay que impotar el paquete e iniciarlizarlo, editamos el archivo app.js y añadimos lo siguiente:
```js
import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()
```

### Instalación del plugin alpinejs/collapse
Para instalar el plugin collapse de alpine se ha de ejecutar:
>npm install @alpinejs/collapse

Se ha de realizar su importanción en javascript
```js
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine

Alpine.plugin(collapse)
Alpine.start()
```

## Instalación de LiveWire

Para instalar LiveWire se ha de ejecutar el siguiente comando:
>composer require livewire/livewire

## Instalación de Filament
Para instalar Filament se ha de ejecutar el siguiente comando:
>composer require filament/filament

Para crear un usuario usuario se ha de ejecutar el siguiente comando:
>php artisan filament:user

## Paquetes utilizados:
composer require filament/spatie-laravel-media-library-plugin 
composer require filament/tables
composer require filament/forms

### Instalación del paquete doctrine/dbal
Para instalar el paquete doctrine/dbal se ha de ejecutar el siguiente comando:
>composer require doctrine/dbal

#### Artisan tinker
> $adoptionHistory = AdoptionHistory::first()
```php
= App\Models\AdoptionHistory {#8004
    id: 1,
    adoption_id: 1,
    status: "entrevista",
    update: "Doloribus perspiciatis rem quas ut dolor beatae. Rerum rerum sunt error culpa voluptatem atque. Est sint expedita deleniti amet nihil ut. Hic totam iure ut qui est. Qui officia dicta 
voluptatum officiis tenetur omnis.",
    created_at: "2023-05-19 01:49:43",
    updated_at: "2023-05-19 01:49:43",
  }
```

> echo $adoptionHistory
{"id":1,"adoption_id":1,"status":"entrevista","update":"Doloribus perspiciatis rem quas ut dolor beatae. Rerum rerum sunt error culpa voluptatem atque. Est sint expedita deleniti amet nihil ut. Hic totam iure ut qui est. Qui officia dicta voluptatum officiis tenetur omnis.","created_at":"2023-05-19T01:49:43.000000Z","updated_at":"2023-05-19T01:49:43.000000Z"}⏎

> echo $adoptionHistory->adoption
{"id":1,"pet_id":16,"user_id":7,"status":"cuestionario","observation":"Enim fugiat unde fugit qui nesciunt necessitatibus. Saepe quo quisquam commodi quia. Qui architecto quas ratione cumque illum quis. Similique est sed id voluptatibus sequi.","questionnaire_id":1,"created_at":"2023-05-19T01:49:43.000000Z","updated_at":"2023-05-19T01:49:43.000000Z"}⏎

> echo $adoptionHistory->adoption->pet
{"id":16,"name":"Jettie","species":"Gato","breed":"Bengal","age":"2018-12-27","sex":"M","color":"Negro","size":"Grande","weight":"7.18","adoption_status":"En adopci\u00f3n","admission_date":"2020-05-19","adoption_date":"2020-05-19","health_conditions":"Nihil et vero ratione aut placeat illo.","medications":"Officia quis veniam id error.","history":"Mollitia deserunt molestiae saepe tempora qui eius voluptatem.","neutered":1,"observations":"Qui sed saepe excepturi sunt quis doloribus voluptas.","shelter_house_id":3,"created_at":"2023-05-19T01:49:23.000000Z","updated_at":"2023-05-19T01:49:27.000000Z"}⏎

> echo $adoptionHistory->adoption->pet->name
Jettie⏎

> echo $adoptionHistory->adoption->user->name
Lauryn Bayer⏎



### Iconos
https://blade-ui-kit.com/blade-icons?set=1#search

#### Tables
Iconos
https://filamentphp.com/docs/2.x/tables/columns/badge#adding-an-icon

Color de campo
https://filamentphp.com/docs/2.x/tables/columns/text#customizing-the-color

Boleanos en icono
https://filamentphp.com/docs/2.x/tables/columns/icon#handling-booleans

```php
  Tables\Columns\CheckboxColumn::make('status'),
  Tables\Columns\ToggleColumn::make('status'),
```



#### FORMS
Nuevo registro desde formulario
https://filamentphp.com/docs/2.x/forms/fields#creating-new-records 


Tabs
https://filamentphp.com/docs/2.x/forms/layout#tabs


### Template forms configurado para Filament
```php
  return $form
      ->schema([
          Forms\Components\Group::make()
              ->schema([
                  Card::make()
                      ->schema([
                          Forms\Components\Select::make('pet_id')
                              ->relationship('pet', 'name')
                              ->label('Mascota')
                              ->hint('En proceso de adopcion')
                              ->required(),
                          Forms\Components\Select::make('status')
                              ->label('Estado')
                              ->options([
                                  'nuevo' => 'Nuevo',
                                  'cuestionario' => 'Cuestionario',
                                  'visita' => 'Visita',
                                  'entrevista' => 'Entrevista',
                                  'firma' => 'Firma',
                                  'pago' => 'Pago',
                                  'seguimiento' => 'Seguimiento',
                                  'finalizado' => 'Finalizado',
                                  'cancelado' => 'Cancelado',
                              ])
                              ->required(),
                          Forms\Components\MarkdownEditor::make('observation')
                              ->required()
                              ->label('Observaciones')
                              ->maxLength(255)
                              ->columnSpan('full'),
                      ])
                      ->columns(2)
              ])
              ->columnSpan(['lg' => 2]),
          
          Forms\Components\Card::make()
              ->schema([
                  Forms\Components\Placeholder::make('created_at')
                      ->label('Creado hace')
                      ->content(fn (Adoption $record): ?string => $record->created_at?->diffForHumans()),
                  Forms\Components\Placeholder::make('updated_at')
                      ->label('Última actualización hace')
                      ->content(fn (Adoption $record): ?string => $record->updated_at?->diffForHumans()),
              ])
              ->columnSpan(['lg' => 1])
              ->hidden(fn (?Adoption $record) => $record === null),
      ])
      ->columns([
          'sm' => 3,
          'lg' => 3,
      ]);




  return $table
    ->columns([
        Tables\Columns\TextColumn::make('pet.name')
            ->label('Mascota'),
        Tables\Columns\TextColumn::make('user.name')
            ->label('Adoptante'),
        Tables\Columns\BadgeColumn::make('status')
            ->getStateUsing(function (Adoption $record): string {
                switch ($record->status) {
                    case 'nuevo'        : return 'Nuevo';
                    case 'cuestionario' : return 'Cuestionario';
                    case 'visita'       : return 'Visita';
                    case 'cancelado'    : return 'Cancelado';
                }
            })
            ->color(static function ($state): string {
                if ($state === 'Nuevo' || $state === 'Finalizado') {
                    return 'success';
                }else if ($state === 'Cancelado') {
                    return 'danger';
                }else if ($state === 'Firma') {
                    return 'secondary';
                }else if ($state === 'Cuestionario' || $state === 'Visita' || $state === 'Entrevista' || $state === 'Pago' || $state === 'Seguimiento') {
                    return 'primary';
                }
                return 'secondary';
            })
            ->icons([
                'heroicon-o-shield-check' => 'Finalizado',
            ]),
        Tables\Columns\TextColumn::make('observation')
            ->limit(50)
            ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                $state = $column->getState();
                if (strlen($state) <= 40) return null;
                return $state;
            }),
        Tables\Columns\IconColumn::make('questionnaire_id')
            ->label('Cuestionario')
            ->boolean(),
        Tables\Columns\TextColumn::make('created_at')
            ->since(),
        Tables\Columns\TextColumn::make('updated_at')
            ->since(),
    ])
    ->filters([
        //
    ])
    ->actions([
        Tables\Actions\ViewAction::make(),
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
    ])
    ->bulkActions([
        Tables\Actions\DeleteBulkAction::make(),
    ]);
```