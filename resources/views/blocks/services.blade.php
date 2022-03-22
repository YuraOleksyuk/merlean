@php
  $services = get_field('services');
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
@endphp

@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section class="services" @if($blockId) id="{{$blockId}}" @endif>
    <div class="container">
      <h2 class="title">{{ get_field('title') }}</h2>
      <div class="services__list services__list--{{sizeof($services)}}">
        @foreach($services as $key => $service)
          <div class="services__item">
            @if($service['icon'])
              <div class="services__icon">
                <img src="{{ $service['icon']['url'] }}" alt="{{ $service['icon']['alt'] }}">
              </div>
            @endif
            <h2 class="services__title @if(sizeof($services) === 7 && $key === 0) services__title--static @endif">{{$service['title'] }}</h2>
            @if(sizeof($services) === 7 && $key === 0)
              <div class="services__subtitle">{!! substr(strip_tags($service['text']), 0, 110) . '...' !!}</div>
              <div class="services__text services__text--big">
                <h3 class="services__title">{{$service['title'] }}</h3>
                <div class="content">{!! $service['text'] !!}</div>
              </div>
            @else
              <div class="services__text">
                <div class="services__text--content">
                  {!! $service['text'] !!}
                </div>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
@else
  <img src="{{ get_template_directory_uri() }}/assets/images/blocks/landing-hero.jpg" alt="">
@endif
