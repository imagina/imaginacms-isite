<div id="multilanglayout2" class="multilang {{$multiflagClasses}}">
    <form class="form-inline mb-0">
        <label for="inputState" class="mb-0">
            <span class="{{$classSelectOut}}">{{ LaravelLocalization::getCurrentLocale()}}</span>
            @include('isite::frontend.components.multilang.partials.image', array(
              'styleFlag' => !empty($flagStyles) ? $flagStyles : 'width: 35px; height: 33px; object-fit: cover;',
              'classFlag' => !empty($flagClasses) ? $flagClasses : 'rounded-circle mx-2',
              'locale' => LaravelLocalization::getCurrentLocale())
            )
        </label>
        <select id="inputState" class="{{$classSelect}}">
            @foreach($locales as $locale)
                <option value="{{setLocaleInUrl($locale)}}"
                        {{ LaravelLocalization::getCurrentLocale() == $locale ? "selected" : "" }}>
                    {{$locale}}
                </option>
            @endforeach
        </select>
    </form>
</div>
@section('scripts')
    @parent
    <script>
        // Obtener el elemento select
        let selectElement = document.getElementById('inputState');
        // Escuchar el evento change del select
        selectElement.addEventListener('change', function() {
            // Obtener el valor seleccionado
            let selectedValue = this.value;
            // Redireccionar a la URL correspondiente
            window.location.href = selectedValue;
        });
    </script>
@stop