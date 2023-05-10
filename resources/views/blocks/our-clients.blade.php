@php
  $list = get_field('list');
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
  $hideBlock = get_field('hide');
  $blockDisplayProperty = $hideBlock ? 'no_display' : '';
@endphp
@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section @if($blockId) id="{{$blockId}}" @endif class="our-clients {{ $blockDisplayProperty }}">
    <div class="container">
      <h2 class="title">{{ get_field('title') }}</h2>
      @if($list)
        <div class="our-clients__list swiper">
          <div class="swiper-wrapper">
            @foreach($list as $listItem)
              @if($listItem['logo'])
                <div class="our-clients__item swiper-slide">
                  @if($listItem['hyperlink'])
                    <a href="{{ $listItem['hyperlink'] }}" rel="noopener nofollow" target="_blank">
                      <img src="{{ $listItem['logo']['url'] }}" alt="{{ $listItem['logo']['alt'] }}">
                    </a>
                  @else
                    <img src="{{ $listItem['logo']['url'] }}" alt="{{ $listItem['logo']['alt'] }}">
                  @endif
                </div>
              @endif
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </section>
@else
  <img src="{{ get_template_directory_uri() }}/assets/images/blocks/landing-hero.jpg" alt="">
@endif
