@php
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
  $hideBlock = get_field('hide');
  $blockDisplayProperty = $hideBlock ? 'no_display' : '';
  $reviews = get_field('reviews');
  $title = get_field('title');
@endphp

@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section class="reviews {{ $blockDisplayProperty }}" @if($blockId) id="{{$blockId}}" @endif>
    <div class="reviews__container">
      @if($title)
        <h2 class="title">{{ $title }}</h2>
      @endif
      <div class="reviews__list swiper">
      <div class="swiper-wrapper">
        @foreach($reviews as $key => $review)
        <div class="reviews__item swiper-slide">
          <h3 class="reviews__title">{{ $review['title'] }}</h3>
          <h4 class="reviews__subtitle">{{ $review['subtitle'] }}</h4>
          <blockquote class="reviews__quote">&quot;
            {{ $review['text'] }}
          &quot;</blockquote>
        </div>
        @endforeach
        </div>
      </div>

      <div class="swiper-button-prev reviews-button-prev"></div>
      <div class="swiper-button-next reviews-button-next"></div>
    </div>
  </section>
@else
  <img src="{{ get_template_directory_uri() }}/assets/images/blocks/landing-hero.jpg" alt="">
@endif
