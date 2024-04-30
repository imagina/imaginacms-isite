<div class="modal modal-menu fade {{$modalStyle}}" id="{{ $id }}menuModal" tabindex="-1" role="dialog"
     aria-hidden="true" aria-labelledby="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-scroll">
            <div class="modal-header rounded-0">
                <x-isite::logo name="logo1" central="central" imgClasses="mx-auto my-2"/>
                <button  type="button" class="close my-0" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-white"></i>
                </button>
            </div>
            <div class="modal-body">

                <nav class="navbar navbar-movil p-0">

                    <div class="collapse navbar-collapse show " id="{{ $id }}modalBody">
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<style>
@if(!empty($modalStyle))
/* header movil */
#{{$id}} .modal-menu.{{$modalStyle}} .modal-dialog {
    position: fixed;
    margin: auto;
    width: 100vw;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
    -ms-transform: translate3d(0%, 0, 0);
    -o-transform: translate3d(0%, 0, 0);
    transform: translate3d(0%, 0, 0);
}
#{{$id}} .modal-menu.{{$modalStyle}} .modal-content {
    height: 100%;
    overflow-y: auto;
    border-radius: 0;
}
#{{$id}} .modal-menu.{{$modalStyle}} .modal-header {
    padding: 5px 1rem;
    text-align: center;
    justify-content: center;
    & img {
        height: 70px;
        object-fit: contain;
        width: auto;
    }
}

#{{$id}} .modal-menu.{{$modalStyle}} .modal-body {
    padding: 0;
    & .filter {
     width: 20px;
     -o-object-fit: contain;
     object-fit: contain;
     margin-right: 0.5rem;
     margin-top: 2px;
    }
}
#{{$id}} .modal-menu.{{$modalStyle}} .close {
    font-size: 15px;
    text-shadow: none;
    opacity: 1;
    position: absolute;
    right: 20px;
    &:focus {
         outline: 0 !important;
    }
    & i {
     color: var(--dark) !important;
    }
}

#{{$id}} .modal-menu.{{$modalStyle}} .navbar-movil .navbar-nav {
    width: 100%;
}
#{{$id}} .modal-menu.{{$modalStyle}} .navbar-movil .nav-item .nav-link {
    font-size: {{$modalTextSize}}px;
    color: {{ !empty($modalColor1) ? $modalColor1 : 'var(--dark)' }};
    padding: 0.5rem 0.9rem;
    position: relative;
    text-align: left;
    border-bottom: 1px solid #dddddd;
    text-transform: {{$modalTextTransform}};
    &:hover {
         font-weight: bold;
         color: {{ !empty($modalColor2) ? $modalColor2 : 'var(--primary)' }};
    }
}
#{{$id}} .modal-menu.{{$modalStyle}} .navbar-movil .dropdown-menu {
    border: 0;
    border-bottom: 1px solid #dddddd;
    padding: 0.8rem 1.3rem;
    border-radius: 0;
    margin-top: 0;
    transition: .2s;
    & .nav-link {
      border: 0 !important;
      &:hover {
        font-weight: bold;
      }
    }
}
/* end  header movil */
@if($modalStyle=='estilo2')
#{{$id}} .modal-menu.{{$modalStyle}} .navbar-movil .nav-item .nav-link:hover {
    background-color: {{ !empty($modalColor2) ? $modalColor2 : 'var(--primary)' }};
    color: #ffffff;
}
@endif

@if($modalStyle=='estilo3')
#{{$id}} .modal-menu.{{$modalStyle}} .modal-header {
     background-color: {{ !empty($modalColor2) ? $modalColor2 : 'var(--primary)' }};
}
#{{$id}} .modal-menu.{{$modalStyle}} .close i {
     color: #ffffff !important;
 }
#{{$id}} .modal-menu.{{$modalStyle}} .navbar-movil .nav-item .nav-link:hover {
     background-color: {{ !empty($modalColor2) ? $modalColor2 : 'var(--primary)' }};
     color: #ffffff;
 }
@endif

/* Scroll Menu */
#{{ $id }} .modal-menu .modal-scroll::-webkit-scrollbar {
     width: 9px;
 }
/* Track */
#{{ $id }} .modal-menu .modal-scroll::-webkit-scrollbar-track {
     background: #f1f1f1;
 }
/* Handle */
#{{ $id }} .modal-menu .modal-scroll::-webkit-scrollbar-thumb {
     background: #888;
 }
/* Handle on hover */
#{{ $id }} .modal-menu .modal-scroll::-webkit-scrollbar-thumb:hover {
     background: #555;
 }
@endif
</style>
