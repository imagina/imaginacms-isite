@if(!empty($logo))
  <div class="relative-position">
    <x-isite::edit-link link="/iadmin/#/site/settings?settings={{$settingName}}&module={{$moduleName}}"
                        :tooltip="trans('isite::common.editLink.tooltipLogo')"/>

    <x-media::single-image :alt="setting('core::site-name')" :title="setting('core::site-name')"
                           :url="$to" :isMedia="true" :zone="$zone" :imgClasses="$imgClasses" :linkClasses="$linkClasses"
                           :mediaFiles="$logo->mediaFiles()"/>
  </div>
@endif

