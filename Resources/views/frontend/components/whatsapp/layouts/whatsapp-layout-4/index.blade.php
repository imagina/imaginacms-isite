@if($editButton = true)
  <div id="whatsappIconFixed" class="whatsapp-layout-4 whatsapp-fixed"
       style="top:{{$top}}; bottom:{{$bottom}}; left: {{$left}}; right: {{$right}}">
    <div class="rotate">
      <div class="content-background">
          <x-isite::edit-link
            link="/iadmin/#/site/settings?module=isite&settings=whatsapp1,whatsapp2,whatsapp3"
            :tooltip="trans('isite::common.editLink.tooltipWhatsapp')"/>
        <x-isite::whatsapp layout="whatsapp-layout-2" icon="{{$icon}}" alignment="{{$alignment}}" size="{{ $size }}"
                           notNumber="{{$notNumber}}"/>
      </div>
    </div>
  </div>
@endif