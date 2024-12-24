<div class="single-widgets widget_thumb_post">
  <h4 class="title">{{ $config['name'] }}</h4>
  <ul>
    <?php
    $posts = \App\Models\Blog::select('*')
    ->orderBy('id', 'desc')
    ->limit(5)
    ->get();
    ?>
    @foreach ($posts as $post)
    <?php 
    $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($post->name)));
    if(empty($post->img))
      $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH . $post->img);
    else
      $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH."dp.png");?>
    <li>
      <span class="left">
       <img class="img-thumbnail float-left mr-1"
       data-src="{{ $image }}"
       src="{{ $image }}"
       width="90" alt="{{ $post->name }}">
     </span>
     <span class="right">
      <a class="small" href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}"><b>{{ $post->name }}</b></a>
    </span>
  </li>
  @endforeach
</ul>
</div>
