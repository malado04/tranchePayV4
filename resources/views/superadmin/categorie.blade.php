<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TRANCHE PAY</title>
    <link rel="icon" href="{{asset ('image/logo.jpeg')}}">
    
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/logo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/moncss.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{asset('css/bootstraptableau.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset ('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bgnavouzin sidebar  sidebar-dark " id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a style="background-color:rgb(255,221,0)" class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div  > 
                     <img src="{{asset ('image/logo.jpeg')}}" class="logo" alt="">
                </div> 
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Acceuil</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item jaune ">
                <a class="nav-link collapsed" href="{{ route('pageadmin') }}" >
                    <span>Admin </span>
                </a> 
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pageclient') }}" >
                    <span>Client </span>
                </a> 
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item jaune jaunehover">
                <a class="nav-link collapsed" href="{{ route('pagecategorie') }}" >
                    <span>Categorie </span>
                </a> 
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pagepartenaire') }}" >
                    <span>Partenaire</span>
                </a> 
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pagecommercant') }}" >
                    <span>Commercant</span>
                </a> 
            </li>
            
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pageaide') }}" >
                    <span>Aide</span>
                </a> 
            </li>
            
            <hr class="sidebar-divider">

            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pagefinancement') }}" >
                    <span>Financement </span>
                </a> 
            </li>
            
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pageversement') }}" >
                    <span>Versement</span>
                </a> 
            </li>
            
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('pagecommande') }}" >
                    <span>Commande</span>
                </a> 
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed jaune" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <span>Inviter un ami</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item " href="#"><i class="far fa-comment-alt"></i> SMS</a>
                        <a class="collapse-item " href="#"><i class="fas fa-envelope"></i> Email</a>
                        <a class="collapse-item " href="#"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                        <!-- <a class="collapse-item " href="#"><i class="fab fa-facebook"></i> Facebook</a>
                        <a class="collapse-item " href="#"><i class="fab fa-instagram"></i> Instagram</a>
                        <a class="collapse-item " href="#"><i class="fab fa-twitter"></i> Twitter</a> -->
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    @php
                        $mttpaye=0;
                        $mt1versment=0;
                        $mtversement=0;
                    @endphp
                    <!-- Calcul montant total des produits  et le motant total des premieres versement  -->
                    @foreach ($listecommande as $commandes)
                            @php
                                $mttpaye = $mttpaye + $commandes->montantpayer;
                                $mt1versment = $mt1versment + $commandes->montantverset;
                            @endphp
                    @endforeach
                    <!-- Calcul montant total des versement  -->
                    @foreach ($listeversement as $versement)
                            @php
                                $mtversement = $mtversement + $versement->verset;
                            @endphp
                    @endforeach
                
                    <div class="d-sm-inline-block form-inline navbar-search btn btn-success" style="width:350px">
                        Solde tranche pay =  {{$mttpaye - $mt1versment - $mtversement}} F CFA <br>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
                                @if(Auth::user()->image=='')
                                    <img class="img-profile rounded-circle" src="{{asset ('template/img/undraw_profile.svg')}}">
                                @else
                                    <img src="{{asset ('logo/'.Auth::user()->image)}}" class="img-profile rounded-circle">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('modifiersuperadmin') }}">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 fas fa-sm fa-fw mr-2 text-gray-400" ></i>
                                    Modifier mot de passe
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Deconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">Voulez vous vraiment quitter la session</div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal" style="width: 100px">Annuler</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                <button class="btn btn-danger" style="width: 100px">OUI</button>
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr class="sidebar-divider">
    <div class="row textealigner">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <H1>Listes des categories</H1>
            @if(session()->has("successDelete"))
                <div class="alert alert-success center" >
                    <h6 > {{session()->get('successDelete')}}</h6>
                </div>
            @endif
            @if(session()->has("accessActiver"))
                <div class="alert alert-success center" >
                    <h6 > {{session()->get('accessActiver')}}</h6>
                </div>
            @endif
            @if(session()->has("accessDesactiver"))
                <div class="alert alert-danger center" >
                    <h6 > {{session()->get('accessDesactiver')}}</h6>
                </div>
            @endif
            <a href="{{route('creercategorie')}}" class="h1transaction btn btn-warning">Creer categorie</a>
        </div>
        <div class="col-md-3"></div>
    </div>
    
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listecategorie as $categorie)
                                <tr>
                                    <th>
                                        <img src="{{asset ('icon/'.$categorie->icon)}}" width="50px" height="50px" alt="logo">
                                    </th>
                                    <th>{{$categorie->libelle}}</th>
                                    <th>
                                        <a class="btn btn-info" href="{{route('seditcategorie',['scategorie'=>$categorie->id])}}" style="width:40px"> <i class="fas fa-user-edit"></i>  <a>

                                        <a href="#" class="btn btn-danger" style="width:40px" onclick="if(confirm('Voulez vous vraiment supprimer cette categorie?'))
                                        {getElementById('form-{{$categorie->id}}').submit()}"><i class="fas fa-trash-alt"></i></a>
                                        <form id="form-{{$categorie->id}}"action="{{route('ssupprimercategorie',['ssuppcategorie'=>$categorie->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3"></div>
                </div>

        





    
    <!-- Bootstrap core JavaScript-->

    <script src="{{asset ('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="{{asset ('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="{{asset ('template/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset ('template/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('template/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset ('template/js/demo/chart-pie-demo.js')}}"></script>
    
    
    <script src="{{asset ('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset ('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset ('js/dataTables.bootstrap5.min.js')}}"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>

</body>

</html>