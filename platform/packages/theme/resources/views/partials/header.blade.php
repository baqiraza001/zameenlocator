{!! SeoHelper::render() !!}

@if ($favicon = theme_option('favicon'))
<link rel="shortcut icon" href="{{ RvMedia::getImageUrl($favicon) }}">
@endif

@if (Theme::has('headerMeta'))
{!! Theme::get('headerMeta') !!}
@endif

{!! apply_filters('theme_front_meta', null) !!}

<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "WebSite",
		"name": "{{ rescue(fn() => SeoHelper::openGraph()->getProperty('site_name')) }}",
		"url": "{{ url('') }}"
	}
</script>

{!! Theme::asset()->styles() !!}
{!! Theme::asset()->container('after_header')->styles() !!}
{!! Theme::asset()->container('header')->scripts() !!}

{!! apply_filters(THEME_FRONT_HEADER, null) !!}

<script>
	window.siteUrl = "{{ route('public.index') }}";
</script>
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	(function(w, d, s, l, i) {
		w[l] = w[l] || [];
		w[l].push({
			'gtm.start': new Date().getTime(), event: 'gtm.js'
		});
		var f = d.getElementsByTagName(s)[0],
		j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
		j.async = true;
		j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
		f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-5DXPKKJ');
</script>