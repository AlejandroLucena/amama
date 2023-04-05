<!-- resumen -->
<div class="mx-auto my-12 md:mt-8">
    
        <x-elements.title.section title="{!! __('Formación <span class=\'font-bold\'>100% Online</span>') !!}"/>

    <div class="flex flex-wrap justify-center py-8 lg:container lg:mx-auto">
        <x-cards.resumen size="md:w-1/4" :img="asset('images/resumen/resumen_01.svg')"
            title="{!! __('Temarios totalmente actualizados') !!}"
            description="{!! __('Contenido actualizado para que puedas estar al día en todo el temario') !!}">
        </x-cards.resumen>
        <x-cards.resumen size="md:w-1/4" :img="asset('images/resumen/resumen_02.svg')"
            title="{!! __('Vídeos explicativos de cada tema') !!}"
            description="{!! __('Sus presentaciones en las que además encontrarás resúmenes de cada uno de los temas') !!}">
        </x-cards.resumen>
        <x-cards.resumen size="md:w-1/4" :img="asset('images/resumen/resumen_03.svg')"
            title="{!! __('Más de 10.000 preguntas tipo test') !!}"
            description="{!! __('Con sus respuestas correspondientes') !!}">
        </x-cards.resumen>
        <x-cards.resumen size="md:w-1/4" :img="asset('images/resumen/resumen_04.svg')" title="{!! __('Cuaderno del alumno') !!}"
            description="{!! __('Donde podrás controlar los aciertos y los fallos de cada pregunta contestada') !!}">
        </x-cards.resumen>
    </div>
</div>
<!-- end resumen -->