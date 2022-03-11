<div class="option option-{{$option->id}} mb-4 {{$childrenClasses}}">

  <div class="title">
    <a
      class="item {{$position}} @if($position == 1 & $firstIsExpanded) {{$firstIsExpanded ? '' : 'collapsed'}} @else {{$isExpanded ? '' : 'collapsed'}} @endif"
      data-toggle="collapse" href="#collapseOption-{{$option->id}}" role="button"
      aria-expanded="@if($position == 1 & $firstIsExpanded) {{$firstIsExpanded ? 'true' : 'false'}} @else {{$isExpanded ? 'true' : 'false'}}  @endif"
      aria-controls="collapseOption-{{$option->id}}">

      <h5 class="position-relative p-3 border-top border-bottom">
        {{$option->title}}
      </h5>

    </a>
  </div>

  <div class="content position-relative">
    <div
      class="collapse @if($position == 1 & $firstIsExpanded) {{$firstIsExpanded ? 'show' : ''}} @else {{$isExpanded ? 'show' : ''}} @endif"
      id="collapseOption-{{$option->id}}">
      <div class="row">
        <div class="col-12">

          <div class="list-option-values">
            @php($children = $option->children)

            @if($children->isNotEmpty())
              @foreach($children as $option)

                <div class="mr-2 mb-2 tagBoxs">

                  <input
                    type="checkbox"
                    name="{{$name}}{{$option->id}}"
                    id="{{$name}}{{$option->id}}"
                    value="{{$option->id}}"
                    wire:model="selectedOptions">

                  <label for="{{$name}}{{$option->id}}">
                    <span>{{$option->name ?? $option->title}}</span>
                  </label>

                </div>

              @endforeach
            @endif

          </div>

        </div>
      </div>
    </div>

  </div>
  <style>
      .option .item h5:after {
          font-family: FontAwesome;
          content: "\f107";
          color: grey;
          float: right;
      }

      .option .item.collapsed h5:after {
          content: "\f105";
      }
  </style>
</div>