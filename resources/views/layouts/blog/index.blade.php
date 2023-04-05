<x-blog-layout>

    <x-slot name="pagetitle">
        <x-elements.title.page title="Blog" />
    </x-slot>

    <x-elements.title.section title="{!! __('<span class=\'font-bold\'>Categorías</span>') !!}" />

    <div class="container mx-auto">

        <section class="text-gray-600 body-font w-full">
            <div class="container px-5 md:py-24 mx-auto">
                <div class="flex flex-wrap -mx-4 -my-8 ">
                    @forelse($postcategories as $postcategory)
                    <x-frontend.postcategories.links.default :postcategory="$postcategory" />
                    @empty
                    {!! __("No hay posts publicados") !!}
                    @endforelse
                </div>
            </div>
        </section>

        <x-elements.title.section title="{!! __('Últimas <span class=\'font-bold\'>Noticias</span>') !!}" />

        <section class="text-gray-600 body-font w-full">
            <div class="container px-5 md:py-24 mx-auto">
                <div class="flex flex-wrap -mx-4 -my-8 ">
                    @forelse($posts as $post)
                    <x-frontend.posts.template.default :post="$post"></x-frontend.posts.template.default>
                    @empty
                    {{ __("No hay posts publicados") }}
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-blog-layout>