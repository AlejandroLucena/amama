<x-page-layout>

    <x-slot name="pagetitle">
        <x-elements.title.page title="{!!__('Contacto') !!}" />
    </x-slot>

    <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/3 text-center pt-20 md:pt-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-20 md:w-20 mx-auto" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>

            <div class="text-2xl font-bold">
                {{ __("Dirección")}}
            </div>

            <div class="description">
                {{ \Config::get('app.general.address')}}
            </div>
        </div>

        <div class="w-full md:w-1/3 text-center pt-20 md:pt-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-20 md:w-20 mx-auto" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>

            <div class="text-2xl font-bold">
                {{ __("Teléfono de contacto")}}
            </div>

            <div class="description">
                {{ __("Teléfono")}}: <a
                    href="tel:{{ \Config::get('app.general.phone')}}">{{ \Config::get('app.general.phone')}}</a>
            </div>
        </div>

        <div class="w-full md:w-1/3 text-center pt-20 md:pt-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-20 md:w-20 mx-auto" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>

            <div class="text-2xl font-bold">
                {{ __("E-Mail de contacto")}}
            </div>

            <div class="description">
                <a href="mailto:{{ \Config::get('app.general.email')}}">{{ \Config::get('app.general.email')}}</a>
            </div>
        </div>
    </>

    <section class="text-gray-600 body-font mx-auto">
        <div class="container px-5 py-24 mx-auto">

            <div class="w-full mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full md:w-1/2">
                        <x-elements.forms.input
                            value=""
                            title="{{ __('Nombre') }}"
                            type="text"
                            id="name"
                            name="name"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-second-500 focus:bg-white focus:ring-2 focus:ring-second-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder=""
                            value=""
                        />
                    </div>
                    <div class="p-2 w-full md:w-1/2">
                        <x-elements.forms.input
                            value=""
                            title="{{ __('Email') }}"
                            type="email"
                            id="email"
                            name="email"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-second-500 focus:bg-white focus:ring-2 focus:ring-second-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder=""
                            value=""
                        />
                    </div>
                    <div class="p-2 w-full">
                        <x-elements.forms.input
                            value=""
                            title="{{ __('Mensaje') }}"
                            type="textarea"
                            id="message"
                            name="message"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-second-500 focus:bg-white focus:ring-2 focus:ring-second-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                            placeholder=""
                        />
                    </div>
                    <div class="p-2 w-full">
                        <x-elements.buttons.form size="md:w-1/6 w-full" label="{!! __('Enviar') !!}"></x-elements.buttons.form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>


</x-page-layout>