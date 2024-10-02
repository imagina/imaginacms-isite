<style>
    #{{ $id }} .modal-link {
        background-color: #ffffff;
        color: var(--primary);
        font-size: 1.125rem;
        padding: 29px 15px;
        text-transform: uppercase;
        text-decoration: none;
        display: block;
    }
    #{{ $id }}  i {
        font-style: normal;
    }
    #{{ $id }} .modal-menu .modal-dialog {
        position: fixed;
        margin: auto;
        width: 100vw;
        height: 100%;
        overflow-y: hidden;
    }
    #{{ $id }} .modal-menu .modal-content {
         height: 100%;
         overflow-y: auto;
         border: 0;
         border-radius: 0;
     }
    #{{ $id }} .modal-menu .modal-header {
         padding: 5px 1rem;
         text-align: center;
         justify-content: center;
     }
    #{{ $id }} .modal-menu .modal-header .modal-logo {
         height: 70px;
         object-fit: contain;
         width: auto;
     }
    #{{ $id }} .modal-menu .modal-title {
         font-weight: 700;
         color: #444444;
         font-size: 1rem;
         padding: .5rem 1rem;
         border-bottom: 1px solid #ebebeb;
     }
    #{{ $id }} .modal-menu .modal-body {
         padding: 0;
         overflow-y: auto;
     }
    #{{ $id }} .modal-menu .modal-body .nav-item {
         border-bottom: 1px solid #ebebeb;
     }
    #{{ $id }} .modal-menu .modal-body .nav-item .nav-link {
         position: relative;
         padding: 0.5rem 40px .5rem 1rem;
         color: #444444;
         font-size: 1rem;
         display: flex;
         align-items: start;
     }
    #{{ $id }} .modal-menu .modal-body .nav-item .nav-link:hover {
         background-color: #ebebeb;
     }
    #{{ $id }} .modal-menu .modal-body .nav-item .nav-link:hover .arrow {
         font-weight: bold;
     }
    #{{ $id }} .modal-menu .modal-body .nav-item .nav-link .arrow:before {
         content: "\f105";
         font-family: "FontAwesome";
         position: absolute;
         right: 1rem;
         top: 50%;
         transform: translateY(-50%);
     }
    #{{ $id }} .modal-menu .modal-body .nav-item .nav-link .filter {
         width: 20px;
         -o-object-fit: contain;
         object-fit: contain;
         margin-right: 0.5rem;
         margin-top: 2px;
     }
    #{{ $id }} .modal-menu .close {
         font-size: 15px;
         text-shadow: none;
         opacity: 1;
         position: absolute;
         right: 20px;
         color: #444444;
     }

    @media (min-width: 576px){
        #{{ $id }} .modal-menu .modal-dialog {
            max-width: 320px;
        }
    }

    /* Style Sub menu */
    #{{ $id }} .modal-dialog-submenu {
         position: absolute;
         left: 320px;
         top: 0;
         width: 500px;
         height: 100vh;
     }
    #{{ $id }} .modal-dialog-submenu .modal-content-panel  {
         width: 100%;
         display: none;
         padding: 15px;
         border: 1px solid #ccc;
         background-color: #ededed;
         height: 100%;
         overflow-y: auto;
     }

    #{{ $id }} .modal-dialog-submenu .modal-content-panel  .modal-content-chilfren  {
         list-style: none;
         position: relative !important;
         min-width: auto !important;
         left: 0 !important;
         border: 0 !important;
         padding: 0 !important;
         visibility: visible;
         opacity: 1;
     }
    #{{ $id }} .modal-dialog-submenu .modal-content-panel .modal-content-chilfren .nav-link  {
         color: #444444;
         text-transform: capitalize;
         padding: 0 0 2px 0;
         font-size: 0.875rem;
         font-weight: bold;
         margin-bottom: 10px;
         position: relative;
     }
    #{{ $id }} .modal-dialog-submenu .modal-content-panel .modal-content-chilfren .nav-link:hover  {
         background-color: #ededed;
         color: #444444;
     }
    #{{ $id }} .modal-dialog-submenu h3 {
         font-size: 1.125rem;
         font-weight: bold;
         margin-bottom: 20px;
         border-bottom: 2px solid #374450;
         padding-bottom: 5px;
         color: var(--primary);
     }
    #{{ $id }} .modal-dialog-submenu h3 a {
         color: var(--dark);
     }
    #{{ $id }} .dropdown-submenu {
         padding: 0 0.5rem 0.5rem 0.5rem;
     }
    #{{ $id }} .modal-dialog-submenu .modal-content-panel .modal-content-chilfren .dropdown-submenu a {
         font-weight: 400;
         display: block;
         padding: 0 0.5rem;
         color: var(--dark);
         font-size: 0.875rem;
     }
    #{{ $id }} .modal-dialog-submenu .modal-content-panel .modal-content-chilfren .dropdown-submenu a:hover {
         color: var(--primary);
     }

    /* movil */
    #{{ $id }} button:focus {
        outline: 0 !important;
    }
    #{{ $id }} .nav-movil .navbar-nav .dropdown > .nav-link .arrow:before {
         content: "\f105"; /*content: "\f061";*/
         font-family: "FontAwesome";
     }
    #{{ $id }} .nav-movil .navbar-nav .dropdown.show > .nav-link .arrow:before {
         content: "\f107"; /* content: "\f063";*/
         font-family: "FontAwesome";
     }
    #{{$id}} .btn-link-icon-menu {
         position: absolute;
         color var(--primary);
         right: 15px; top: 50%;
         transform: translateY(-50%);
        &:hover {
         color: #444444;
        }
    }
    #{{ $id }} .modal-menu .modal-body .nav-item.dropdown.show .btn-link-icon-menu {
         transform: none;
         top: 9px;
    }
    #{{ $id }} .nav-movil .navbar-nav .dropdown-menu {
         position: relative !important;
         transform: none !important;
         transition: .2s;
         margin: 0;
         padding: 0;
         background-color: #ebebeb;
         border-radius: 0;
     }

    #{{ $id }} .nav-movil .navbar-nav .dropdown-menu .frame-dropdown {
         padding: 20px 0 10px 35px;
         list-style: none;
     }

    #{{ $id }} .nav-movil .navbar-nav .dropdown-menu .frame-dropdown .nav-link {
         color: #444444;
         padding: 0px 0 15px 0;
         border-bottom: 0;
     }

    #{{ $id }} .nav-movil .navbar-nav .dropdown-menu .frame-dropdown .dropdown-submenu {
         padding: 0 0.5rem 0 0.5rem;
     }
    #{{ $id }} .nav-movil .navbar-nav .dropdown-menu .frame-dropdown .dropdown-submenu a {
         font-weight: 400;
         display: block;
         padding: 0 0.6rem 9px;
         color: #333333;
         font-size: 0.875rem;
     }
    #{{ $id }} .nav-movil .navbar-nav .dropdown-menu .frame-dropdown a:hover {
         color: var(--primary);
         font-weight: bold;
         text-decoration: none;
     }

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

</style>