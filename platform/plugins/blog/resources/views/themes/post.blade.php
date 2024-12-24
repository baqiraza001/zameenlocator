<div>
    <h5>{{ $post->name }}</h5>
    {!! Theme::breadcrumb()->render() !!}
</div>
<header>
    <h3>{{ $post->name }}</h3>
    <div>
        @if (!$category)
            <span>
                <a href="{{ URL('blogs/'.$categorySlug) }}">{{ $category->category }}</a>
            </span>
        @endif
    </div>
</header>
<div class='ck-content'>
    {!! BaseHelper::clean($post->content) !!}
</div>
<br />
{!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}

@php $relatedPosts = get_related_posts($post->getKey(), 2); @endphp

@if ($relatedPosts->isNotEmpty())
    <footer>
        @foreach ($relatedPosts as $relatedItem)
            <div>
                <article>
                    <div><a href="{{ $relatedItem->url }}"></a>
                        <img src="{{ RvMedia::getImageUrl($relatedItem->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $relatedItem->name }}">
                    </div>
                    <header><a href="{{ $relatedItem->url }}"> {{ $relatedItem->name }}</a></header>
                </article>
            </div>
        @endforeach
    </footer>
@endif
