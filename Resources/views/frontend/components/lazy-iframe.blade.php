@php
  // Ensure attributes is an array
  $attributes = $attributes ?? [];

  // Extract class if exists, and merge with "lazy-iframe"
  $class = 'lazy-iframe ' . ($attributes['class'] ?? '');

  // Convert attributes array to an HTML string
  $attrString = collect($attributes)
      ->except('class') // Exclude class from the array (already merged)
      ->map(fn($value, $key) => "$key=\"$value\"")
      ->implode(' ');
@endphp

<div class="iframe-wrapper" style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%;">
  {{-- Loading Placeholder (Bootstrap Spinner) --}}
  <div class="iframe-loader d-flex justify-content-center align-items-center"
       style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #f8f9fa;">
    <div class="spinner-grow text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  {{-- Hidden iframe (revealed after load) --}}
  <iframe class="{{ trim($class) }}" data-src="{{ $src }}" style="position: absolute; top: 0; left: 0;
        width: 100%; height: 100%; opacity: 0; transition: opacity 0.3s;" {!! $attrString !!}>
  </iframe>
</div>

@once
  @section('scripts-owl')
    @parent
    <script>
      window.addEventListener("load", function () {
        setTimeout(() => {
          document.querySelectorAll(".lazy-iframe").forEach(iframe => {
            iframe.src = iframe.getAttribute("data-src");

            // Show iframe and hide loader when it's fully loaded
            iframe.onload = function() {
              iframe.style.opacity = "1"; // Fade in iframe
              iframe.previousElementSibling.style.display = "none"; // Hide loader
            };
          });
        }, 100);
      });
    </script>
  @stop
@endonce
