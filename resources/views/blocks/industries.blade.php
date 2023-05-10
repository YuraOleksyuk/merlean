@php
  $industries = get_field('industries');
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
  $hideBlock = get_field('hide');
  $blockDisplayProperty = $hideBlock ? 'no_display' : '';
@endphp

@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section @if($blockId) id="{{$blockId}}" @endif class="industries {{ $blockDisplayProperty }}">
    <div class="container industries__container">
      <h2 class="title">{{ get_field('title') }}</h2>
      @if($industries)
        <div class="industries__list">
          @foreach($industries as $industrie)
            <div class="industries__item">
              <div class="industries__icon">
                @if($industrie['icon'])
                  <img src="{{ $industrie['icon']['url'] }}" alt="{{ $industrie['icon']['alt'] }}">
                @endif
              </div>

              <h3 class="industries__title">{{ $industrie['title'] }}</h3>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </section>
@else
  <img src="{{ get_template_directory_uri() }}/assets/images/blocks/landing-hero.jpg" alt="">
@endif
