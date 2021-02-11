<button class="btn btn-primary" onclick="printContent('{{ $containerId }}');" title="{{ $text }} (Ctrl+P)">
    <i class="{{ $icon }}"></i> {{ $text  }}
</button>
<script type="text/javascript">
  $(function(){
    //handles Ctrl+P (print dialog)
    $(document).on('keydown', function(e) {
      var kc = e.which || e.keyCode;

      if (e.ctrlKey && String.fromCharCode(kc).toUpperCase() == "P") {
        e.preventDefault();
        printContent('{{ $containerId }}')
      }
    });
  });
</script>
@once
@section('scripts-owl')
  @parent
  <script type="text/javascript">
    function printContent(containerId){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(containerId).innerHTML;
      var printHeader = '{!! Theme::style('css/secondary.css?v='.config('app.version')) !!}\n'
      document.body.innerHTML = printHeader + printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
@stop
@endonce
