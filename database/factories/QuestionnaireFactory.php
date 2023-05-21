<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questionnaire>
 */
class QuestionnaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $questions = [
            'question_1'  => '¿Cuál es tu nombre completo?',
            'question_2'  => '¿Cuál es tu edad?',
            'question_3'  => '¿Dónde vives actualmente?',
            'question_4'  => '¿Tienes experiencia previa en la adopción de mascotas?',
            'question_5'  => '¿Por qué estás interesado/a en adoptar una mascota?',
            'question_6'  => '¿Qué tipo de mascota estás buscando? (Perro, gato, etc.)',
            'question_7'  => '¿Tienes preferencia por una raza en particular?',
            'question_8'  => '¿Estás dispuesto/a a asumir los costos de alimentación y atención veterinaria de la mascota?',
            'question_9'  => '¿Tienes un espacio adecuado en tu hogar para la mascota?',
            'question_10' => '¿Cuánto tiempo diario puedes dedicarle a la mascota en términos de ejercicio y atención?',
            'question_11' => '¿Tienes otros animales en casa? En caso afirmativo, describe brevemente.',
            'question_12' => '¿Alguien en tu hogar es alérgico a las mascotas?',
            'question_13' => '¿Has tenido alguna experiencia previa con entrenamiento de mascotas?',
            'question_14' => '¿Cuál es tu disponibilidad para realizar visitas periódicas al veterinario?',
            'question_15' => '¿Estás dispuesto/a a brindarle un hogar permanente y amoroso a la mascota adoptada?',
        ];
    
        $answers = [];
    
        foreach ($questions as $key => $question) {
            $answers[$key] = [
                'question' => $question,
                'answer' => $this->faker->text(),
            ];
        }
    
        return [
            'observation' => $this->faker->text(),
            'answers' => $answers,
        ];
    }
}
