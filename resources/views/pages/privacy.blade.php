<x-page-layout>

    <x-slot name="pagetitle">
        <x-elements.title.page title="{{ __('Decalaración de privacidad') }}" />
    </x-slot>
    <div class="container max-w-3xl mx-auto">
        <p>El responsable del tratamiento de los datos personales del interesado le
            informa que estos datos serán
            tratados de conformidad con lo dispuesto en las normativas vigentes en protección de datos
            personales, el
            Reglamento (UE) 2016/679 de 27 de abril de 2016 (RGPD) y la Ley Orgánica 3/2018, de 5 de diciembre,
            de
            Protección de Datos Personales y garantía de los derechos digitales, por lo que se le facilita la
            siguiente
            información del tratamiento:</p>
        <ul>
            <li>En tanto en cuanto contamos con el consentimiento del interesado para el tratamiento de los
                datos
                personales, rige el apartado a) del punto 1) del artículo 6 del RGPD como base jurídica.</li>
            <li>Si el tratamiento de los datos personales es necesario para la ejecución de un contrato con el
                interesado o de medidas precontractuales rige el apartado b) del punto 1) del artículo 6 del
                RGPD.</li>
            <li>Si el tratamiento de los datos personales es consecuencia de una obligación legal por nuestra
                parte, nos
                remitimos al apartado c) del punto 1) del artículo 6 del RGPD.</li>
            <li>Si el tratamiento de los datos personales tiene como objeto proteger los intereses vitales del
                interesado o de otra persona natural, nos basamos en el apartado d) del punto 1) del artículo 6
                del
                RGPD.</li>
            <li>Si el tratamiento de los datos personales es necesario para cumplir una tarea de interés público
                o en el
                ejercicio de una obligación pública nos remitimos al apartado e) del punto 1) del artículo 6 del
                RGPD.
            </li>
            <li>Mientras que el tratamiento de los datos sea necesario para satisfacer los intereses legítimos
                del
                responsable o de un tercero sin poner en riesgo los intereses, los derechos o las libertades
                fundamentales del interesado, la base legal está establecida por el apartado f) del punto 1) del
                artículo 6 del RGPD.</li>
        </ul>

        <h2 class="text-2xl py-4">RESPONSABLE DEL TRATAMIENTO DE LOS DATOS:</h2>
        <p>NOMBRE DE LA EMPRESA: {{ Config::get('app.general.company') }}</p>
        <p>DOMICILIO: {{ Config::get('app.general.address') }}</p>
        <p>TELÉFONO: {{ Config::get('app.general.phone') }}</p>
        <p>CORREO ELECTRÓNICO: {{ Config::get('app.general.email') }}</p>

        <h2 class="text-2xl py-4">OBJETIVO:</h2>
        <p>El objetivo que se persigue con los datos personales aportados por el
            interesado es
            slio y exclusivamente el
            tratamiento como cliente en los apartados de Asesoría y de Formación, sin que deban ser utilizados
            por el
            responsable del tratamiento de los datos para usos distintos de los exclusivos de esta empresa:
            datos
            personales del alumno para su formación adecuada, datos personales de los clientes para su
            asesoramiento y
            defensa ante las administraciones públicas, órganos jurisdiccionales y entidades o personas
            jurídicas
            públicas o privadas.</p>

        <h2 class="text-2xl py-4">DURACIÓN O CONSERVACIÓN DE LOS DATOS:</h2>

        <p>Los datos personales aportados por los interesados serán conservados por
            los siguientes
            plazos:</p>
        <ul>
            <li>Alumnos: mientras dure su formación o hasta que el alumno desee abandonar ésta.</li>
            <li>Clientes de la Asesoría: Mientras exista relación contractual o personal entre el cliente y
                asesoría
                jurídica, o bien el mismo desee finalizar esa relación.</li>
        </ul>

        <h2 class="text-2xl py-4">DERECHOS DE LOS USUARIOS:</h2>
        <h3 class="text-xl py-4">Artículo 15 del RGPD.</h3>

        <p>El interesado tendrá derecho a obtener del responsable del tratamiento confirmación de
            si se están tratando o
            no datos personales que le conciernen y, en tal caso, derecho de acceso a los datos personales y a la
            siguiente información:</p>
        <ul>
            <li>los fines del tratamiento;</li>
            <li>las categorías de datos personales de que se trate;</li>
            <li>los destinatarios o las categorías de destinatarios a los que se comunicaron o serán comunicados los
                datos personales, en particular destinatarios en terceros u organizaciones internacionales;</li>
            <li>de ser posible, el plazo previsto de conservación de los datos personales o, de no ser posible, los
                criterios utilizados para determinar este plazo;</li>
            <li>la existencia del derecho a sliicitar del responsable la rectificación o supresión de datos
                personales o la limitación del tratamiento de datos personales relativos al interesado, o a oponerse
                a dicho tratamiento;</li>
            <li>el derecho a presentar una reclamación ante una autoridad de contrli;</li>
            <li>cuando los datos personales no se hayan obtenido del interesado, cualquier información disponible
                sobre su origen;</li>
            <li>la existencia de decisiones automatizadas, incluida la elaboración de perfiles, a que se refiere el
                artículo 22, apartados 1 y 4, y, al menos en tales casos, información significativa sobre la lógica
                aplicada, así como la importancia y las consecuencias previstas de dicho tratamiento para el
                interesado.</li>
        </ul>


        <h3 class="text-xl py-4">Artículo 16 RGPD:</h3>
        <p>El interesado tendrá derecho a obtener sin dilación indebida del responsable del
            tratamiento la
            rectificación de los datos personales inexactos que le conciernan. Teniendo en cuenta los fines del
            tratamiento, el interesado tendrá derecho a que se completen los datos personales que sean incompletos,
            inclusive mediante una declaración adicional.</p>

        <h3 class="text-xl py-4">Artículo 17 RGPD:</h3>
        <p>El interesado tendrá derecho a obtener sin dilación indebida del responsable del
            tratamiento la
            supresión de los datos personales que le conciernan, el cual estará obligado a suprimir sin
            dilación indebida los datos personales cuando concurra alguna de las circunstancias siguientes:
        </p>
        <ul>
            <li>los datos personales ya no sean necesarios en relación con los fines para los que fueron
                recogidos o tratados de otro modo;</li>
            <li>el interesado retire el consentimiento en que se basa el tratamiento de conformidad con el
                artículo 6, apartado 1, letra a), o el artículo 9, apartado 2, letra a), y este no se base
                en otro fundamento jurídico;</li>
            <li>el interesado se oponga al tratamiento con arreglo al artículo 21, apartado 1, y no
                prevalezcan otros motivos legítimos para el tratamiento, o el interesado se oponga al
                tratamiento con arreglo al artículo 21, apartado 2;</li>
            <li>los datos personales hayan sido tratados ilícitamente;</li>
            <li>los datos personales deban suprimirse para el cumplimiento de una obligación legal
                establecida en el Derecho de la Unión o de los Estados miembros que se aplique al
                responsable del tratamiento;</li>
            <li>los datos personales se hayan obtenido en relación con la oferta de servicios de la sociedad
                de la información mencionados en el artículo 8, apartado 1. </li>
        </ul>
    </div>
</x-page-layout>
