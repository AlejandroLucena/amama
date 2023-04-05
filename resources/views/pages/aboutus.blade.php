<x-page-layout>

	<!-- Main content -->
	<x-slot name="pagetitle">
		<x-elements.title.page title="{{ __('Asesoría Jurídica') }}" />
	</x-slot>

    <div class="container max-w-3xl mx-auto">
		<div class="flex flex-wrap -m-4">
			<div class="p-4 md:w-2/3">
				<h2 class="font-bold text-3xl py-4">Asesoria JMC</h2>

				<p>Formamos para afrontar con el mayor de los éxitos una oposición muy enriquecedora en el plano
					profesional y personal, y que con nuestros métodos sencillos y prácticos de enseñanza alcanzarás la
					meta que tanto deseas.</p>

				<p>Hemos preparado:</p>

				<ul class="list-disc pl-4">
					<li>Temarios totalmente actualizados.</li>
					<li>Vídeos explicativos de cada tema con sus presentaciones en las que además encontrarás resúmenes
						de cada uno de los temas.</li>
					<li>Más de 10.000 preguntas tipo test con sus respuestas correspondientes.</li>
					<li>Cuaderno del alumno, donde podrás controlar los aciertos y los fallos de cada pregunta
						contestada.</li>
					<li>Puedes consultar los temarios, vídeos y cuestionarios con sus respuestas todas las veces que lo
						desees.</li>
				</ul>

				<p>Contarás con profesionales altamente cualificados y con la formación adecuada en las asignaturas
					jurídicas, de idiomas y psicología, éstas últimas de capital importancia para superar la oposición.
					Con nuestro equipo de profesores descubrirás una formación muy práctica con la que lograrás triunfar
					con éxito en esta oposición.</p>

				<h2 class="font-bold text-3xl py-4">Nuestro Equipo</h2>

				<p class="font-bold text-xl py-3">Jose María Caballero</p>

				<ul class="list-disc pl-4">
					<li>Licenciado en Derecho y Abogado en ejercicio.</li>
					<li>Título de Director de Seguridad y Jefe de Seguridad.</li>
					<li>Experto titulado de Salas Centralizadoras Servicios de Emergencia.</li>
					<li>Suboficial en activo de la Guardia Civil con 38 años de servicio, siempre en Unidades
						Operativas.</li>
				</ul>
				<p>Igualmente tenemos formación personalizada en las Áreas de preparación física, de Psicología e
					Idiomas, con tratamiento personalizado.</p>
			</div>
			<div class="p-4 md:w-1/3">
				<img src="{{ asset('images/jose_maria_caballero.jpg' )}}" width="100%">
			</div>

		</div>
	</div>

	<!-- end Main content -->
</x-page-layout>