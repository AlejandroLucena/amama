<x-blog-layout>

    <x-frontend.posts.title :title="$post->title"></x-frontend.posts.title>

    <x-frontend.breadcrumbs :postcategory="$post->postcategory" :post="$post" />
    <div class="container mx-auto">

        <x-frontend.posts.content :post="$post"></x-frontend.posts.content>
    </div>
</x-blog-layout>