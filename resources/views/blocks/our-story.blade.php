@php
  $people = get_field('people');
  $blockId = isset($block) && array_key_exists('anchor', $block) ? $block['anchor'] : '';
  $hideBlock = get_field('hide');
  $blockDisplayProperty = $hideBlock ? 'no_display' : '';
@endphp
@if(!get_field('is_example') && (get_field('visability') != 'hidden' || is_admin()))
  <section class="our-story {{ $blockDisplayProperty }}" @if($blockId) id="{{$blockId}}" @endif>
    <div class="container our-story__container our-story__container--{{sizeof($people)}}">
      <div class="our-story__content">
        <h2 class="title">{{ get_field('title') }}</h2>
        <div class="content">
          {!! get_field('content') !!}
        </div>
      </div>
      <div class="our-story__people our-story__people--{{sizeof($people)}}">
        @foreach($people as $peopleItem)
          <div class="our-story__item our-story__item--{{sizeof($people)}}">
            @if($peopleItem['image'])
              <div class="our-story__item-thumb">
                <img src="{{ $peopleItem['image']['url'] }}" alt="{{ $peopleItem['image']['alt'] }}">
              </div>
            @endif
            @if($peopleItem['linkedin_url'])
              <div class="our-story__people-container">
                <a href="{{$peopleItem['linkedin_url']}}" target="_blank" rel="noopener nofollow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                    <path d="M24.5 0H1.5C0.946875 0 0.5 0.446875 0.5 1V24C0.5 24.5531 0.946875 25 1.5 25H24.5C25.0531 25 25.5 24.5531 25.5 24V1C25.5 0.446875 25.0531 0 24.5 0ZM7.91562 21.3031H4.20625V9.37187H7.91562V21.3031ZM6.0625 7.74063C5.63727 7.74063 5.22159 7.61453 4.86802 7.37828C4.51446 7.14204 4.23889 6.80626 4.07616 6.41339C3.91343 6.02053 3.87085 5.58824 3.95381 5.17118C4.03677 4.75412 4.24154 4.37103 4.54222 4.07035C4.8429 3.76966 5.226 3.56489 5.64306 3.48194C6.06011 3.39898 6.49241 3.44156 6.88527 3.60428C7.27813 3.76701 7.61391 4.04258 7.85016 4.39615C8.0864 4.74971 8.2125 5.16539 8.2125 5.59062C8.20937 6.77812 7.24687 7.74063 6.0625 7.74063ZM21.8031 21.3031H18.0969V15.5C18.0969 14.1156 18.0719 12.3375 16.1688 12.3375C14.2406 12.3375 13.9438 13.8438 13.9438 15.4V21.3031H10.2406V9.37187H13.7969V11.0031H13.8469C14.3406 10.0656 15.55 9.075 17.3563 9.075C21.1125 9.075 21.8031 11.5469 21.8031 14.7594V21.3031Z" fill="#20303C"/>
                  </svg>
                </a>
                <div>
                  <h3 class="our-story__people-title">{{ $peopleItem['title'] }}</h3>
                  <p class="our-story__people-text">{{ $peopleItem['text'] }}</p>
                </div>

              </div>
            @else
              <h3 class="our-story__people-title">{{ $peopleItem['title'] }}</h3>
              <p class="our-story__people-text">{{ $peopleItem['text'] }}</p>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
@else
  <img src="{{ get_template_directory_uri() }}/assets/images/blocks/landing-hero.jpg" alt="">
@endif
