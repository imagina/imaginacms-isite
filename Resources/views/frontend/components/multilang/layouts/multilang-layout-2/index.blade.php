<div id="multilanglayout2" class="multilang {{$multiflagClasses}}">
  <form>
    <label for="inputState">
        <span class="{{$classSelectOut}}">{{ LaravelLocalization::getCurrentLocale()}}</span>
        @include('isite::frontend.components.multilang.partials.image', array(
          'styleFlag' => !empty($flagStyles) ? $flagStyles : 'width: 35px; height: 33px; object-fit: cover;',
          'classFlag' => !empty($flagClasses) ? $flagClasses : 'rounded-circle mx-2',
          'locale' => LaravelLocalization::getCurrentLocale())
        )
    </label>
    <select id="inputState" class="{{$classSelect}}">
      @foreach($locales as $locale)
        <option href="/{{$locale}}"
          {{ LaravelLocalization::getCurrentLocale() == $locale ? "selected" : "" }} value="{{$locale}}">
          {{$locale}}
        </option>
      @endforeach
    </select>
  </form>
</div>