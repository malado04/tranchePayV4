<!DOCTYPE html>
<html lang="en">
@php
        $tversement=0;
        $m1verset=0;
        $mcommande=0;
        $mtversetparc=0;
        $input=0;
    @endphp
    <!-- Calcul montant total verset du client et le motant total des commandes du client  -->
    @foreach ($listecommandesclient as $commandes)
        @if($commandes->id == $_GET['enregistrercommande'])
            @php
                $mcommande = $commandes->montantpayer;
                $m1verset = $commandes->montantverset;
            @endphp
        @endif
    @endforeach 
    <!-- Calcul montant total des versement du client -->
    @foreach ($listeversement as $versement)
        @if($_GET['enregistrercommande'] == $versement->enregistrercommande_id)
            @php
                $mtversetparc = $mtversetparc + $versement->verset;
            @endphp
        @endif
    @endforeach
    @php
        $tversement = $m1verset + $mtversetparc;
        $input = $mcommande - $tversement;
    @endphp

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
    <link href="{{asset ('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/moncss.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        function testvaleur()
        {
            var verset = Number(document.getElementById("versett").value);
            var vers= Number(<?php echo $input ?>);
            var zero= Number(0);
            if(verset > vers ) 
            {
                alert ( 'Il vous reste ' + vers + ' a verset sur cette commande') ;
                document.getElementById("versett").value = "";
            }
            else if(verset < zero)
            {
                alert ( 'Veuillez entrez un motant compris entre 0 et ' + vers) ;
                document.getElementById("versett").value = "";
            }
            else if(verset < vers)
            {
                document.getElementById("versett").value = verset;
            }
        }
    </script>
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

            <!-- Divider -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('listeversement') }}" >
                    <span>Versements </span>
                </a> 
            </li>
            
            <hr class="sidebar-divider">

            <li class="nav-item jaune jaunehover">
                <a class="nav-link collapsed" href="{{ route('mescommandes') }}" >
                    <span>Commandes </span>
                </a> 
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('demandefinancement') }}" >
                    <span>Demande de financement </span>
                </a> 
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="#" >
                    <span>Déplafonnement</span>
                </a> 
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="#" >
                    <span>Utiliser un code promotionnel </span>
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
                        <a class="collapse-item " href="https://wa.me/?text= Bonjour, j’aimerais vous inviter à rejoindre tranchepay+https%3A%2F%2Fwww.tranchepay.com&app_absent=0">
                            <i class="fab fa-whatsapp"></i> Whatsapp
                        </a>
                        <!-- <a class="collapse-item " href="#"><i class="fab fa-facebook"></i> Facebook</a>
                        <a class="collapse-item " href="#"><i class="fab fa-instagram"></i> Instagram</a>
                        <a class="collapse-item " href="#"><i class="fab fa-twitter"></i> Twitter</a> -->
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed jaune" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Service</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('aideclient')}}">Aide</a>
                        <a class="collapse-item" href="tel:+221338238469" > Service client </a> 
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
                <!-- Declaration des variables globale -->
                @php
                    $mtmontantverset=0;
                    $mttoutcommmande=0;
                    $mtversetclient=0;
                @endphp
                <!-- Calcul montant total verset du client et le motant total des commandes du client  -->
                @foreach ($listecommandesclient as $commandes)
                    @if(Auth::user()->id == $commandes->client_id)
                        @php
                            $mtmontantverset = $mtmontantverset + $commandes->montantverset;
                            $mttoutcommmande = $mttoutcommmande + $commandes->montantpayer;
                        @endphp
                    @endif
                @endforeach 
                <!-- Calcul montant total des versement du client -->
                @foreach ($listeversement as $versement)
                    @if(Auth::user()->id == $versement->user_id)
                        @php
                            $mtversetclient = $mtversetclient + $versement->verset;
                        @endphp
                    @endif
                @endforeach
                    
                    <div class="d-sm-inline-block form-inline navbar-search btn btn-danger" style="width:250px">
                        Montant dû = {{$mttoutcommmande - $mtmontantverset - $mtversetclient}} F CFA
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
                                <a class="dropdown-item" href="{{ route('modifiermdp') }}">
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
                <!-- End of Topbar -->
                    
                <div class="container">
                    <h2 class="texte">Effectuer un versement</h2>
                    @if(session()->has("succescreate"))
                    <div class="alert alert-success  text-center form-control "  >
                        {{session()->get('succescreate')}}
                    </div>
                    @else
                    @foreach ($errors->all() as $error)
                        <p> {{$error}} </p>
                    @endforeach
                    @endif

                    <div class="row bg-white" > 
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <form control="" class="form-group" method="post" action="{{route('versement')}} ">
                            @csrf
                            <h6 >Vous allez verset pour la commande N° <?php echo $_GET['enregistrercommande'];?></h6>
                            <input type="number" id="versett" name="verset" class="form-control input" placeholder="Montant a verset"  required="required">
                            <input type="hidden" name="enregistrercommande_id" value="<?php echo $_GET['enregistrercommande'];?>" >
                        </div>
                        <div class="col-md-12">
                            <div align="center" >
                                <input onclick="testvaleur()" type="submit" name="VALIDER" value="ENREGISTRER" class="btn btnduform">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                            </form>
                    </div>  
                </div>
                



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

</body>

</html>