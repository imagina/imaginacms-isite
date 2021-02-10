<button class="btn btn-primary" onclick="printContent{{ $containerName }}();">
    <i class="{{ $icon }}"></i> {{ $text  }}
</button>

@section('scripts-owl')
  @parent
  <script type="text/javascript">
    function printContent{{ $containerName }}(){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById('{{ $containerId }}').innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
@stop
