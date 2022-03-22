<footer class="footer">
  <div class="container footer__container {{ \App\Controllers\App::getPageType() }}">
    <div class="footer__logo">
      @php
        $footerLogo = get_field('footer_logo', 'options');
      @endphp
      @if($footerLogo)
        <div class="custom-logo-link">
          <img src="{{$footerLogo['url']}}" alt="{{$footerLogo['alt']}}">
        </div>
      @endif
    </div>
    <div class="footer__help">
      @php
        $contactPhone = get_field('contact_phone', 'option');
        $contactEmail = get_field('contact_email', 'option');
        $contactPhoneText = '';
        $locale = get_locale();

        if($locale == 'es_ES') {
            $contactPhoneText = get_field('contact_phone_text_es', 'option');
        } else if ($locale == 'it_IT') {
            $contactPhoneText = get_field('contact_phone_text_it', 'option');
        } else if ($locale == 'et') {
            $contactPhoneText = get_field('contact_phone_text_et', 'option');
        } else {
            $contactPhoneText = get_field('contact_phone_text_en', 'option');
        }
      @endphp
      <a href="mailto:{{$contactEmail}}" class="link">{{$contactEmail}}</a>
      <div class="phone-group">
        @if($contactPhoneText)
          <span>{{ $contactPhoneText }}</span>
        @endif
        @if($contactPhone)
          <a href="tel:{{$contactPhone}}" class="link">{{$contactPhone}}</a>
        @endif
      </div>
    </div>
    <div class="footer__consulting">
      @php
        $facebookUrl = get_field('facebook_url', 'options');
        $linkedinUrl = get_field('linkedin_url', 'options');
        $emailConsulting = get_field('email_consulting', 'options');
      @endphp

      <div class="footer__links">
        @if($facebookUrl)
          <a href="{{$facebookUrl}}" target="_blank" rel="noopener nofollow">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M18.625 0.625H1.375C0.960156 0.625 0.625 0.960156 0.625 1.375V18.625C0.625 19.0398 0.960156 19.375 1.375 19.375H18.625C19.0398 19.375 19.375 19.0398 19.375 18.625V1.375C19.375 0.960156 19.0398 0.625 18.625 0.625ZM16.4594 6.09766H14.9617C13.7875 6.09766 13.5602 6.65547 13.5602 7.47578V9.28281H16.3633L15.9977 12.1117H13.5602V19.375H10.6375V12.1141H8.19297V9.28281H10.6375V7.19687C10.6375 4.77578 12.1164 3.45625 14.2773 3.45625C15.3133 3.45625 16.2016 3.53359 16.4617 3.56875V6.09766H16.4594Z" fill="#20303C"/>
            </svg>
          </a>
        @endif
        @if($linkedinUrl)
          <a href="{{$linkedinUrl}}" target="_blank" rel="noopener nofollow">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M18.625 0.625H1.375C0.960156 0.625 0.625 0.960156 0.625 1.375V18.625C0.625 19.0398 0.960156 19.375 1.375 19.375H18.625C19.0398 19.375 19.375 19.0398 19.375 18.625V1.375C19.375 0.960156 19.0398 0.625 18.625 0.625ZM6.18672 16.6023H3.40469V7.65391H6.18672V16.6023ZM4.79688 6.43047C4.47795 6.43047 4.16619 6.3359 3.90102 6.15871C3.63584 5.98153 3.42917 5.72969 3.30712 5.43505C3.18507 5.1404 3.15314 4.81618 3.21536 4.50339C3.27758 4.19059 3.43115 3.90327 3.65667 3.67776C3.88218 3.45225 4.1695 3.29867 4.48229 3.23645C4.79509 3.17423 5.11931 3.20617 5.41395 3.32821C5.7086 3.45026 5.96044 3.65694 6.13762 3.92211C6.3148 4.18729 6.40937 4.49905 6.40937 4.81797C6.40703 5.70859 5.68516 6.43047 4.79688 6.43047ZM16.6023 16.6023H13.8227V12.25C13.8227 11.2117 13.8039 9.87812 12.3766 9.87812C10.9305 9.87812 10.7078 11.0078 10.7078 12.175V16.6023H7.93047V7.65391H10.5977V8.87734H10.6352C11.0055 8.17422 11.9125 7.43125 13.2672 7.43125C16.0844 7.43125 16.6023 9.28516 16.6023 11.6945V16.6023Z" fill="#20303C"/>
            </svg>
          </a>
        @endif
        @if($emailConsulting)
          <a href="mailto:{{$emailConsulting}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="none">
              <path d="M20.75 0.75H1.25C0.835156 0.75 0.5 1.08516 0.5 1.5V16.5C0.5 16.9148 0.835156 17.25 1.25 17.25H20.75C21.1648 17.25 21.5 16.9148 21.5 16.5V1.5C21.5 1.08516 21.1648 0.75 20.75 0.75ZM19.8125 3.34687V15.5625H2.1875V3.34687L1.54063 2.84297L2.46172 1.65938L3.46484 2.43984H18.5375L19.5406 1.65938L20.4617 2.84297L19.8125 3.34687ZM18.5375 2.4375L11 8.29688L3.4625 2.4375L2.45938 1.65703L1.53828 2.84062L2.18516 3.34453L10.1914 9.56953C10.4217 9.74841 10.7049 9.84551 10.9965 9.84551C11.2881 9.84551 11.5713 9.74841 11.8016 9.56953L19.8125 3.34687L20.4594 2.84297L19.5383 1.65938L18.5375 2.4375Z" fill="#20303C"/>
            </svg>
          </a>
        @endif
      </div>
      @php
        $consultingText = '';
        $locale = get_locale();
        if($locale == 'es_ES') {
            $consultingText = get_field('consulting_text_es', 'option');
        } else if ($locale == 'it_IT') {
            $consultingText = get_field('consulting_text_it', 'option');
        } else if ($locale == 'et') {
            $consultingText = get_field('consulting_text_et', 'option');
        } else {
            $consultingText = get_field('consulting_text_en', 'option');
        }
      @endphp
      <span class="footer__consulting-text">{{$consultingText}}</span>
    </div>
  </div>
</footer>
