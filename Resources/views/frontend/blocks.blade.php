@extends('isite::frontend.layouts.blank')

@section("content")
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">
        <x-isite::block :blockConfig="$blockConfig"/>
      </div>
    </div>
  </div>
@stop
