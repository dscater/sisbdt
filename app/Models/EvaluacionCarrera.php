<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionCarrera extends Model
{
    use HasFactory;

    protected $fillable = [
        "evaluacion_id",
        "titulo",
        "carrera",
        "institucion",
        "nivel",
        "fecha_titulo",
        "estado",
        "disciplina",
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    // getCarreras
    static function getCarreras()
    {
        $carreras = [
            [
                "grupo" => "no",
                "value" => "",
                "label" => "- Seleccione -",
                "datos" => [],
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Ingeniería Civiles y Petroleras',
                'datos' => [
                    ['value' => 'Ingeniería Civil'],
                    ['value' => 'Ingeniería de la Construcción'],
                    ['value' => 'Técnico de Construcción'],
                    ['value' => 'Supervisor de Construcción'],
                    ['value' => 'Contratista de Construcción'],
                    ['value' => 'Ingeniería Geológica'],
                    ['value' => 'Ingeniería Petrolera'],
                    ['value' => 'Técnico Geólogo'],
                    ['value' => 'Topógrafo'],
                    ['value' => 'Arquitectura'],
                    ['value' => 'Diseño de Interiores'],
                    ['value' => 'Ingeniería Hidraúlico'],
                    ['value' => 'Ingeniería Electrónica'],
                    ['value' => 'Ingeniería Mecánica'],
                    ['value' => 'Ingeniería Electromecánica'],
                    ['value' => 'Ingeniería Eléctrica'],
                    ['value' => 'Ingeniería Mecatrónica'],
                    ['value' => 'Ingeniería Robótica'],
                    ['value' => 'Ingeniería Industrial'],
                    ['value' => 'Ingeniería Aeronaútica'],
                    ['value' => 'Ingeniería Agronómica']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Comerciales',
                'datos' => [
                    ['value' => 'Ingeniería Comercial'],
                    ['value' => 'Comercio Internacional'],
                    ['value' => 'Comercio Exterior'],
                    ['value' => 'Técnico Aduanero'],
                    ['value' => 'Técnico de Comercio Exterior'],
                    ['value' => 'Perito de Comercio Exterior'],
                    ['value' => 'Marketing'],
                    ['value' => 'Negocios Internacionales'],
                    ['value' => 'Relaciones Públicas'],
                    ['value' => 'Digital Business'],
                    ['value' => 'Marketing e Investigación de Mercado'],
                    ['value' => 'Gestión Comercial'],
                    ['value' => 'Diseño Industrial y Desarrollo de Productos']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Sistemas y Tecnología',
                'datos' => [
                    ['value' => 'Ingeniería de Sistemas'],
                    ['value' => 'Ingeniería de Redes'],
                    ['value' => 'Ingeniería Informática'],
                    ['value' => 'Ingeniería de Redes y Telecomunicaciones'],
                    ['value' => 'Ingeniería de Telecomunicaciones'],
                    ['value' => 'Técnico Telecomunicaciones']
                ]
            ],
            [
                "grupo" => "si",
                'label' => 'Económicas',
                'datos' => [
                    ['value' => 'Economía'],
                    ['value' => 'Auditor Financiero'],
                    ['value' => 'Auxiliar Contable'],
                    ['value' => 'Auditor'],
                    ['value' => 'Contabilidad'],
                    ['value' => 'Ingeniería Financiera'],
                    ['value' => 'Ingeniería de Procesos'],
                    ['value' => 'Administración Financiera'],
                    ['value' => 'Perito Contable']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Administrativas',
                'datos' => [
                    ['value' => 'Administración de Empresas'],
                    ['value' => 'Administración de Recursos Humanos'],
                    ['value' => 'Ingeniería de Procesos y Contabilidad'],
                    ['value' => 'Administración de Hoteleria y Turismo'],
                    ['value' => 'Ingeniería de Producción'],
                    ['value' => 'Ingeniería de Gestión Empresarial'],
                    ['value' => 'Técnico Administrativo de Procesos'],
                    ['value' => 'Secretaria Ejecutiva'],
                    ['value' => 'Secretaria Comercial'],
                    ['value' => 'Perito Bancario'],
                    ['value' => 'Perito Administrativo'],
                    ['value' => 'Secretariado Administrativo']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Creativa e Innovación',
                'datos' => [
                    ['value' => 'Diseño Gráfico'],
                    ['value' => 'Artes'],
                    ['value' => 'Música'],
                    ['value' => 'Ingeniería de Sonido'],
                    ['value' => 'Ingeniería de Producción'],
                    ['value' => 'Artes de Baile'],
                    ['value' => 'Artes Musicales'],
                    ['value' => 'Historia de Arte'],
                    ['value' => 'Artes Manuales'],
                    ['value' => 'Diseño de Moda'],
                    ['value' => 'Wedding Planner'],
                    ['value' => 'Literatura'],
                    ['value' => 'Fotografía'],
                    ['value' => 'Producción Cinematografía'],
                    ['value' => 'Producción Multimedia']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Sociales',
                'datos' => [
                    ['value' => 'Psicología'],
                    ['value' => 'Sociología'],
                    ['value' => 'Comunicación Social y Estratégica'],
                    ['value' => 'Relaciones Corporativas'],
                    ['value' => 'Psicopedagogía'],
                    ['value' => 'Psicología Forense'],
                    ['value' => 'Psicología Empresarial'],
                    ['value' => 'Psicología Social Aplicada'],
                    ['value' => 'Ciencias Jurídicas'],
                    ['value' => 'Comunicación Pública'],
                    ['value' => 'Idiomas'],
                    ['value' => 'Filosofía'],
                    ['value' => 'Historia'],
                    ['value' => 'Periodismo'],
                    ['value' => 'Trabajo Social'],
                    ['value' => 'Educación Primaria'],
                    ['value' => 'Educación Secundaria'],
                    ['value' => 'Educación Unversitaria']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Medicina',
                'datos' => [
                    ['value' => 'Nutrición'],
                    ['value' => 'Enfermería'],
                    ['value' => 'Técnico Instrumentista'],
                    ['value' => 'Técnico por Especialidad'],
                    ['value' => 'Medicina General'],
                    ['value' => 'Cardiología'],
                    ['value' => 'Ginecología'],
                    ['value' => 'Pediatría'],
                    ['value' => 'Neonatología'],
                    ['value' => 'Traumatología'],
                    ['value' => 'Neurología'],
                    ['value' => 'Geriatría'],
                    ['value' => 'Oftalmología'],
                    ['value' => 'Otorrinolaringología'],
                    ['value' => 'Odontología'],
                    ['value' => 'Dermatología'],
                    ['value' => 'Epidemiología'],
                    ['value' => 'Neumología'],
                    ['value' => 'Médico Cirujano'],
                    ['value' => 'Médico Deportivo'],
                    ['value' => 'Médico Obstetra'],
                    ['value' => 'Médicina Laboral'],
                    ['value' => 'Médicina Preventiva'],
                    ['value' => 'Urología'],
                    ['value' => 'Médico Endocrinológo'],
                    ['value' => 'Médico Nefrólogo'],
                    ['value' => 'Médico en Toxología'],
                    ['value' => 'Médico Hematólogo'],
                    ['value' => 'Médico Radiólogo'],
                    ['value' => 'Médico Veterinario'],
                    ['value' => 'Zootecnista'],
                    ['value' => 'Médico Proctología'],
                    ['value' => 'Técnico Bioquímico'],
                    ['value' => 'Médico Reumatólogo'],
                    ['value' => 'Fisioterapia y Kinesiología'],
                    ['value' => 'Bioquímica y Farmacia'],
                    ['value' => 'Inmunología']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Servicios Comunitarios',
                'datos' => [
                    ['value' => 'Biología'],
                    ['value' => 'Administrador de Parque'],
                    ['value' => 'Policía Ciudadana']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Fuerzas Militares y Policiales',
                'datos' => [
                    ['value' => 'Policía'],
                    ['value' => 'Policía Militar'],
                    ['value' => 'Policía Montada'],
                    ['value' => 'Policía Caminera'],
                    ['value' => 'Milícia Armada'],
                    ['value' => 'Milícia Aérea'],
                    ['value' => 'Milícia Naval'],
                    ['value' => 'Milícia']
                ]
            ],
            [
                "grupo" => "si",
                "value" => "",
                'label' => 'Ciencias Políticas',
                'datos' => [
                    ['value' => 'Ciencias Políticas'],
                    ['value' => 'Relaciones Internacionales'],
                    ['value' => 'Gestión Pública']
                ]
            ]
        ];
        return $carreras;
    }
}
