@php
  $list = get_field('list');
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
@endphp
@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section @if($blockId) id="{{$blockId}}" @endif class="our-clients">
    <div class="container container--lg our-clients__container">
      <h2 class="title title--m0">{{ get_field('title') }}</h2>
      @if($list)
        <div class="our-clients__list swiper">
          <div class="swiper-wrapper">
            @foreach($list as $listItem)
              @if($listItem['logo'])
                <div class="our-clients__item swiper-slide">
                  <img src="{{ $listItem['logo']['url'] }}" alt="{{ $listItem['logo']['alt'] }}">
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
