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
    <link href="{{asset ('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/moncss.css')}}">

    


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

            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('mescommandes') }}" >
                    <span>Commandes </span>
                </a> 
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item jaune jaunehover">
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
                        <a class="collapse-item " href="#"><i class="fab fa-whatsapp"></i> Whatsapp</a>
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
                        <a class="collapse-item" href="#">Appeler le service client</a>
                    </div>
                </div>
            </li>
        </ul>        <!-- End of Sidebar -->

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
                    @if(Auth::user()->telephone == $commandes->numclient)
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
                                <img class="img-profile rounded-circle"
                                    src="{{asset ('template/img/undraw_profile.svg')}}">
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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 bold">
                        <div class="contenue" align="center">
                            <div class="info">
                                <a href="{{route('dashboard')}}"> 
                                    <img src="{{asset ('image/logo.jpeg')}}" class="form"> 
                                </a>         
                                <h4 style="text-align: center;">TRANCH PAY</h4>
                            </div>            
                            <div class="forme">
                                 @if(session()->has("succescreate"))
                                <div class="alert alert-success btn center"  >
                                    {{session()->get('succescreate')}}
                                </div>
                                @else
                                @foreach ($errors->all() as $error)
                                    <p> {{$error}} </p>

                                @endforeach
                                @endif
                                <h2 class="texte">DEMANDE DE FINANCEMENT</h2>
                                <form control="" class="form-group" method="post" action="{{route('creerfinancement')}}">
                                @csrf
                                    <!-- <div class="user"> -->
                                        <!-- <div .input-box> -->
                                            <input type="text" name="nomboutique" id="nomboutique" class="form-control input" placeholder="Nom de la boutique" required="required">
                                        <!-- </div>
                                        <div .input-box> -->
                                            <input type="text" name="nomproduit" class="form-control input" placeholder="Nom du produit" required="required">
                                        <!-- </div>
                                        <div .input-box> -->
                                            <input type="text" name="lienproduit" class="form-control input" placeholder="Lien du produit (Facultatif) " >
                                        <!-- </div>
                                        <div .input-box> -->
                                            <input type="text" name="adresseboutique" class="form-control input" placeholder="Adresse de la boutique (Facultatif)">
                                        <!-- </div>
                                        <div .input-box> -->
                                            <input type="text" name="adresselivraison" class="form-control input" placeholder="Adresse de livraison (Facultatif)">
                                        <!-- </div>
                                        <div .input-box> -->
                                            <input type="number" name="prix" class="form-control input" placeholder="PRIX" required="required">
                                        <!-- </div>
                                        <div .input-box> -->
                                            <input type="number" name="montantverset" class="form-control input" placeholder="Montant premier versement" required="required">
                                        <!-- </div>
                                        <div .input-box> -->
                                            <select class="form-select form-select-sm form-control input" aria-label=".form-select-sm example" name="nombremois" required="required">
                                                <option value="">Vous souhaitez payer en combien de temps ?</option>
                                                <option value="1mois">1 Mois (5% de commission pour 1 mois)</option>
                                                <option value="2mois">2 Mois (7% de commission pour 2 mois)</option>
                                                <option value="3mois">3 Mois (10% de commission pour 3 mois)</option>
                                            </select>
                                            <input type="number" name="montantpayer" class="form-control input" placeholder="Montant Total (A calculer)" required="required">
                                        <!-- </div>
                                        <div .input-box> -->
                                        <!-- </div> -->
                                        <!-- <div .input-box>
                                            <select name="" id="">
                                                <input type="text" name="adresseboutique" class="input" placeholder="Adresse de la boutique (Facultatif)" required="required">
                                            </select>
                                        </div> -->
                                    <!-- </div> -->
                                    <div align="center" >
                                        <input type="submit" name="VALIDER" value="VALIDER" class="btn btnduform">
                                    </div> 

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">Voulez vous vraiment quitter la session</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                <button class="btn btn-primary ">OUI</button>
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