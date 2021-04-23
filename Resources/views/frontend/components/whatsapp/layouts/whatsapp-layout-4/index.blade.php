<div id="whatsappIconFixed" class="whatsapp-layout-4 whatsapp-fixed"
     style="top:{{$top}}; bottom:{{$bottom}}; left: {{$left}}; right: {{$right}}">
  <div class="rotate">
    <div class="content-background">
      <x-isite::whatsapp layout="whatsapp-layout-2" icon="{{$icon}}" alignment="{{$alignment}}" size="{{ $size }}"
                         notNumber="{{$notNumber}}"/>
    </div>
  </div>
</div>