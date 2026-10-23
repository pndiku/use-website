<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>{{ $siteContent['site_name'] ?? config('app.name') }} News</title>
    <link>{{ url('/news') }}</link>
    <description>Latest news</description>
    <language>en</language>
    <atom:link href="{{ route('news.feed') }}" rel="self" type="application/rss+xml"/>
    @foreach($articles as $article)
    <item>
      <title><![CDATA[{{ $article->title }}]]></title>
      <link>{{ route('news.article', $article->slug) }}</link>
      <guid isPermaLink="true">{{ route('news.article', $article->slug) }}</guid>
      <pubDate>{{ $article->getDisplayDate()->toRssString() }}</pubDate>
      <description><![CDATA[{!! str_replace(']]>', ']]]]><![CDATA[>', strip_tags($article->content)) !!}@if($article->file_url)<br><br>Download: {{ $article->file_url }}@endif]]></description>
      @if($article->image_url)
      <enclosure url="{{ $article->image_url }}" type="image/jpeg" length="0"/>
      @endif
    </item>
    @endforeach
  </channel>
</rss>
