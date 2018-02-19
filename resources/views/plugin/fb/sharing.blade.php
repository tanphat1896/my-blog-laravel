{{--<div id="fb-root"></div>--}}
{{--<script>(function(d, s, id) {--}}
  {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
  {{--if (d.getElementById(id)) return;--}}
  {{--js = d.createElement(s); js.id = id;--}}
  {{--js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';--}}
  {{--fjs.parentNode.insertBefore(js, fjs);--}}
{{--}(document, 'script', 'facebook-jssdk'));</script>--}}

{{--<div class="fb-share-button" data-href="{{ route('blog.show', $post->slug) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fblog%2Flap-trinh-php-1&amp;src=sdkpreparse">Chia sẻ</a></div>--}}

<a class="ui mini circular facebook icon button"
   href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.show', $post->slug) }}&display=popup&ref=plugin&src=share_button"
   onclick="return !window.open(this.href, 'Facebook', 'width=640,height=400')">
    <i class="facebook f icon"></i>
</a>