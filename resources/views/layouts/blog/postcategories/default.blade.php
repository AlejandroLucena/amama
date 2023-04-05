<x-blog-layout>

    <x-frontend.postcategories.title :title="$postcategory->title" />

    <div class="container mx-auto">
        <div class="flex justify-center">
            <x-frontend.breadcrumbs :postcategory="$postcategory" :post="null" />
        </div>
        
        <div class="flex justify-center">
            <x-frontend.postcategories.related-posts :posts="$posts" />
        </div>

        <div class="flex flex-wrap">

            <x-frontend.postcategories.subcategories-nav :subcategories="$subcategories" />

        </div>
    </div>
</x-blog-layout>