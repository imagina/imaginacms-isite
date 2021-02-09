<button class="btn btn-primary" onclick="print{{ $containerName }}();">
    <i class="{{ $icon }}"></i> {{ $text  }}
</button>
@section('scripts')
  @parent
  <script>
    function print{{ $containerName }}() {
      var data = $('{{ $container }}').html();
      var myWindow = window.open('', '{{ $text }}');
      myWindow.document.write("<html><head><title>{{ $text }}</title>");
      myWindow.document.write('{!! Theme::style('css/main.css?v='.config('app.version')) !!}');
      myWindow.document.write('{!! Theme::style('css/secondary.css?v='.config('app.version')) !!}');
      myWindow.document.write(data);
      myWindow.document.close(); // necessary for IE >= 10
      myWindow.onload=function(){ // necessary if the div contain images

        myWindow.focus(); // necessary for IE >= 10
        myWindow.print();
        myWindow.close();
      };
    }
  </script>
@stop
