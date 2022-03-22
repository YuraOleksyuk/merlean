@php
  $btn = get_field('button');
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
@endphp

@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section @if($blockId) id="{{$blockId}}" @endif class="contact-us" id="contact">
    <div class="container contact-us__container">
      <h2 class="contact-us__title">{!! get_field('title') !!}</h2>
      @if($btn)
        <div class="contact-us__btn">
          <div class="contact-us__svg">
            <svg id="contactUsSvg" xmlns="http://www.w3.org/2000/svg" width="653" height="170" viewBox="0 0 653 170" fill="none">
              <path class="stroke contact-us__line" d="M1 102.501L81.8484 72.2852C88.5331 69.7869 94.896 76.6281 91.9206 83.1145L77.3628 114.85C75.9472 117.937 72.7378 119.793 69.3569 119.481L18.1871 114.763C12.0794 114.2 7.63608 120.437 10.1632 126.026L27.2118 163.729C29.0291 167.748 33.7564 169.538 37.7798 167.73L126.018 128.088C130.306 126.161 132.016 120.97 129.714 116.872L111.46 84.3807C109.956 81.7032 107.01 79.9895 104.048 80.7979C98.3529 82.3516 94.9443 85.9637 102.5 91.0009C114.5 99.0009 127 95.0013 134 72.5013C141 50.0013 107 46.5013 120.5 56.0013C133.738 65.3171 150.823 48.1884 156.195 34.7908C156.406 34.2649 156.642 33.771 156.958 33.3008C182.833 -5.15284 307.012 -17.6274 474.5 43.9998C539.523 67.9251 597 72.5013 652.5 65.5013" stroke="#6104D7" stroke-width="2"/>
            </svg>
          </div>
          <a href="{{ $btn['url'] }}" @if($btn['target']) target="{{ $btn['target'] }}" @endif class="btn">{{ $btn['title'] }}</a>
        </div>
      @endif
    </div>
  </section>
@else
  <img src="{{ get_template_directory_uri() }}/assets/images/blocks/landing-hero.jpg" alt="">
@endif
