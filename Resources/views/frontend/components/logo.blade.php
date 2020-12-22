@if(!empty($logo))
  <x-media::single-image :alt="setting('core::site-name')" :title="setting('core::site-name')" :
                      :url="$to" :isMedia="true" :zone="$zone"
                      :mediaFiles="$logo->mediaFiles()"/>
@endif

