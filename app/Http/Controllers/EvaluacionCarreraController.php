<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EvaluacionCarreraController extends Controller
{
    public function getArrayCarreras()
    {
        $html = '<select name="profesion" class="input_data" type="text" required="">
<option value="">-- Seleccione una opción --</option><optgroup label="Ingeniería Civiles y Petroleras"><option value="Ingeniería Civil">Ingeniería Civil</option><option value="Ingeniería de la Construcción">Ingeniería de la Construcción</option>
<option value="Técnico de Construcción">Técnico de Construcción</option><option value="Supervisor de Construcción">Supervisor de Construcción</option><option value="Contratista de Construcción">Contratista de Construcción</option>
<option value="Ingeniería Geológica">Ingeniería Geológica</option><option value="Ingeniería Petrolera">Ingeniería Petrolera</option><option value="Técnico Geólogo">Técnico Geólogo</option><option value="Topógrafo">Topógrafo</option>
<option value="Arquitectura">Arquitectura</option><option value="Diseño de Interiores">Diseño de Interiores</option><option value="Ingeniería Hidraúlico">Ingeniería Hidraúlico</option><option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
<option value="Ingeniería Mecánica">Ingeniería Mecánica</option><option value="Ingeniería Electromecánica">Ingeniería Electromecánica</option><option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option><option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
<option value="Ingeniería Robótica">Ingeniería Robótica</option><option value="Ingeniería Industrial">Ingeniería Industrial</option><option value="Ingeniería Aeronaútica">Ingeniería Aeronaútica</option><option value="Ingeniería Agronómica">Ingeniería Agronómica</option>
</optgroup><optgroup label="Comerciales"><option value="Ingeniería Comercial">Ingeniería Comercial</option><option value="Comercio Internacional">Comercio Internacional</option><option value="Comercio Exterior">Comercio Exterior</option><option value="Técnico Aduanero">Técnico Aduanero</option>
<option value="Técnico de Comercio Exterior">Técnico de Comercio Exterior</option><option value="Perito de Comercio Exterior">Perito de Comercio Exterior</option><option value="Marketing">Marketing</option><option value="Negocios Internacionales">Negocios Internacionales</option><option value="Relaciones Públicas">Relaciones Públicas</option>
<option value="Digital Business">Digital Business</option><option value="Marketing e Investigación de Mercado">Marketing e Investigación de Mercado</option><option value="Gestión Comercial">Gestión Comercial</option><option value="Diseño Industrial y Desarrollo de Productos">Diseño Industrial y Desarrollo de Productos</option>
</optgroup><optgroup label="Sistemas y Tecnología"><option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option><option value="Ingeniería de Redes">Ingeniería de Redes</option><option value="Ingeniería Informática">Ingeniería Informática</option><option value="Ingeniería de Redes y Telecomunicaciones">Ingeniería de Redes y Telecomunicaciones</option>
<option value="Ingeniería de Telecomunicaciones">Ingeniería de Telecomunicaciones</option><option value="Técnico Telecomunicaciones">Técnico Telecomunicaciones</option></optgroup><optgroup label="Económicas"><option value="Economía">Economía</option><option value="Auditor Financiero">Auditor Financiero</option>
<option value="Auxiliar Contable">Auxiliar Contable</option><option value="Auditor">Auditor</option><option value="Contabilidad">Contabilidad</option><option value="Ingeniería Financiera">Ingeniería Financiera</option><option value="Ingeniería de Procesos">Ingeniería de Procesos</option><option value="Administración Financiera">Administración Financiera</option><option value="Perito Contable">Perito Contable</option></optgroup><optgroup label="Administrativas"><option value="Administración de Empresas">Administración de Empresas</option><option value="Administración de Recursos Humanos">Administración de Recursos Humanos</option>
<option value="Ingeniería de Procesos y Contabilidad">Ingeniería de Procesos y Contabilidad</option><option value="Administración de Hoteleria y Turismo">Administración de Hoteleria y Turismo</option><option value="Ingeniería de Producción">Ingeniería de Producción</option><option value="Ingeniería de Gestión Empresarial">Ingeniería de Gestión Empresarial</option><option value="Técnico Administrativo de Procesos">Técnico Administrativo de Procesos</option>
<option value="Secretaria Ejecutiva">Secretaria Ejecutiva</option><option value="Secretaria Comercial">Secretaria Comercial</option><option value="Perito Bancario">Perito Bancario</option><option value="Perito Administrativo">Perito Administrativo</option><option value="Secretariado Administrativo">Secretariado Administrativo</option></optgroup><optgroup label="Creativa e Innovación">
<option value="Diseño Gráfico">Diseño Gráfico</option><option value="Artes">Artes</option><option value="Música">Música</option><option value="Ingeniería de Sonido">Ingeniería de Sonido</option><option value="Ingeniería de Producción">Ingeniería de Producción</option><option value="Artes de Baile">Artes de Baile</option><option value="Artes Musicales">Artes Musicales</option><option value="Historia de Arte">Historia de Arte</option>
<option value="Artes Manuales">Artes Manuales</option><option value="Diseño de Moda">Diseño de Moda</option><option value="Wedding Planner">Wedding Planner</option><option value="Literatura">Literatura</option><option value="Fotografía">Fotografía</option><option value="Producción Cinematografía">Producción Cinematografía</option><option value="Producción Multimedia">Producción Multimedia</option></optgroup><optgroup label="Sociales"><option value="Psicología">Psicología</option>
<option value="Sociología">Sociología</option><option value="Comunicación Social y Estratégica">Comunicación Social y Estratégica</option><option value="Relaciones Corporativas">Relaciones Corporativas</option><option value="Psicopedagogía">Psicopedagogía</option><option value="Psicología Forense">Psicología Forense</option><option value="Psicología Empresarial">Psicología Empresarial</option><option value="Psicología Social Aplicada">Psicología Social Aplicada</option><option value="Ciencias Jurídicas">Ciencias Jurídicas</option>
<option value="Comunicación Pública">Comunicación Pública</option><option value="Idiomas">Idiomas</option><option value="Filosofía">Filosofía</option><option value="Historia">Historia</option><option value="Periodismo">Periodismo</option><option value="Trabajo Social">Trabajo Social</option><option value="Educación Primaria">Educación Primaria</option><option value="Educación Secundaria">Educación Secundaria</option>
<option value="Educación Unversitaria">Educación Unversitaria</option></optgroup><optgroup label="Medicina"><option value="Nutrición">Nutrición</option><option value="Enfermería">Enfermería</option><option value="Técnico Instrumentista">Técnico Instrumentista</option><option value="Técnico por Especialidad">Técnico por Especialidad</option><option value="Medicina General">Medicina General</option><option value="Cardiología">Cardiología</option>
<option value="Ginecología">Ginecología</option><option value="Pediatría">Pediatría</option><option value="Neonatología">Neonatología</option><option value="Traumatología">Traumatología</option><option value="Neurología">Neurología</option><option value="Geriatría">Geriatría</option><option value="Oftalmología">Oftalmología</option><option value="Otorrinolaringología">Otorrinolaringología</option>
<option value="Odontología">Odontología</option><option value="Dermatología">Dermatología</option><option value="Epidemiología">Epidemiología</option><option value="Neumología">Neumología</option><option value="Médico Cirujano">Médico Cirujano</option><option value="Médico Deportivo">Médico Deportivo</option><option value="Médico Obstetra">Médico Obstetra</option><option value="Médicina Laboral">Médicina Laboral</option>
<option value="Médicina Preventiva">Médicina Preventiva</option><option value="Urología">Urología</option><option value="Médico Endocrinológo">Médico Endocrinológo</option><option value="Médico Nefrólogo">Médico Nefrólogo</option><option value="Médico en Toxología">Médico en Toxología</option><option value="Médico Hematólogo">Médico Hematólogo</option><option value="Médico Radiólogo">Médico Radiólogo</option><option value="Médico Veterinario">Médico Veterinario</option><option value="Zootecnista">Zootecnista</option><option value="Médico Proctología">Médico Proctología</option>
<option value="Técnico Bioquímico">Técnico Bioquímico</option><option value="Médico Reumatólogo">Médico Reumatólogo</option><option value="Fisioterapia y Kinesiología">Fisioterapia y Kinesiología</option><option value="Bioquímica y Farmacia">Bioquímica y Farmacia</option><option value="Inmunología">Inmunología</option></optgroup><optgroup label="Servicios Comunitarios"><option value="Biología">Biología</option><option value="Administrador de Parque">Administrador de Parque</option><option value="Policía Ciudadana">Policía Ciudadana</option></optgroup>
<optgroup label="Fuerzas Militares y Policiales"><option value="Policía">Policía</option><option value="Policía Militar">Policía Militar</option><option value="Policía Montada">Policía Montada</option><option value="Policía Caminera">Policía Caminera</option><option value="Milícia Armada">Milícia Armada</option><option value="Milícia Aérea">Milícia Aérea</option><option value="Milícia Naval">Milícia Naval</option><option value="Milícia">Milícia</option></optgroup>
<optgroup label="Ciencias Políticas"><option value="Ciencias Políticas">Ciencias Políticas</option><option value="Relaciones Internacionales">Relaciones Internacionales</option><option value="Gestión Pública">Gestión Pública</option></optgroup></select>';

        // Usamos DOMDocument para parsear el HTML

        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        // Inicializamos el array
        $result = [];

        // Recorremos los optgroups
        foreach ($dom->getElementsByTagName('optgroup') as $optgroup) {
            $label = $optgroup->getAttribute('label');
            $group = ["label" => $label, "datos" => []];

            // Recorremos las opciones dentro de cada optgroup
            foreach ($optgroup->getElementsByTagName('option') as $option) {
                $value = $option->getAttribute('value');
                $group["datos"][] = ["value" => $value];
            }

            // Añadimos el grupo al array resultante
            $result[] = $group;
        }

        return $result;
    }
}
