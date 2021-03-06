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
    <script type="text/javascript">
        function calcul()
        {
            var prix = Number(document.getElementById("prix").value);
            var mois = $("#delaipaye option:selected").attr("id");
            if(mois == "mois1") {
                montantpayer = Number(prix + (prix*0.05));
            }
            else if(mois == "mois2") {
                montantpayer = Number(prix + (prix*0.07));
            }
            else if(mois == "mois3") {
                montantpayer = Number(prix +(prix*0.1));
            } 
            else if(mois == "mois0") {
                montantpayer = Number(prix);
            }  
            document.getElementById("montantpayer").value = montantpayer;
            document.getElementById("montantpayerinput").value = montantpayer;
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

            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Acceuil</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{ route('listecommande') }}" >
                    <span>Commande</span>
                </a> 
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="#" >
                    <span>Retrait argent</span>
                </a> 
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <li class="nav-item jaune">
                <a class="nav-link collapsed" href="{{route('aide')}}" >
                    <span>Aide</span>
                </a> 
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item jaune">
            <a class="nav-link collapsed" href="tel:+221338238469" >
                    <span>Service client</span>
            </a> 
            </li>
                        
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed jaune" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Inviter un ami</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item " href="#"><i class="far fa-comment-alt"></i> SMS</a>
                        <a class="collapse-item " href="#"><i class="fas fa-envelope"></i> Email</a>
                        <a class="collapse-item " href="https://wa.me/?text= Bonjour, j???aimerais vous inviter ?? rejoindre tranchepay+https%3A%2F%2Fwww.tranchepay.com&app_absent=0">
                            <i class="fab fa-whatsapp"></i> Whatsapp
                        </a>
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
                    
                <!-- Declaration des variables globale -->
                @php
                    $prixdesP=0;
                    $mtverset=0;
                    $mtversement=0;
                @endphp
                <!-- Calcul montant total des produits du commercant et le motant total des premieres versement des produits  -->
                @foreach ($listecommandesclient as $commandes)
                    @if(Auth::user()->id == $commandes->user_id)
                        @php
                            $prixdesP = $prixdesP + $commandes->prix;
                        @endphp
                    @endif
                @endforeach
                    
                    <div class="d-sm-inline-block form-inline navbar-search btn btn-success" style="width:250px">
                        Solde = {{$prixdesP}} F CFA
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
                                <a class="dropdown-item" href="{{ route('modifiermdpc') }}">
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
                <div class="container">
                    <h2 class="texte">ENREGISTRER UNE COMANDE</h2>
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
                        <div class="col-md-1"></div>
                        
                        <div class="col-md-5">
                            <form control="" class="form-group" method="post" id="formulaire" action="{{route('creercommande')}}">
                            @csrf
                                <input type="text"  name="nomproduit" class="form-control input" placeholder="Nom du produit" required="required">
                                <input type="text" name="nomclient" class="form-control input" placeholder="Nom complet client" required="required">
                                <input type="number" id="client_id" name="client_id" class="form-control input" placeholder="Num??ro t??l??phone (Num??ro du client TranchePay)" required="required">
                                @php
                                    
                                @endphp
                                <input type="text" name="adresselivraison" class="form-control input" placeholder="Adresse de livraison (Facultatif)">
    
                        </div> 
                        <div class="col-md-5">
                                <input type="number" name="prix" class="form-control input" placeholder="Prix du produit" id="prix" oninput="calcul()" required="required">
                                <input type="number" name="montantverset" class="form-control input" placeholder="Montant premier versement" required="required">
                                <select class="form-select form-select-sm form-control input" aria-label=".form-select-sm example" name="delaipaye" id="delaipaye" oninput="calcul()" required="required">
                                    <option value="" id="mois0">Vous souhaitez payer en combien de temps ?</option>
                                    @php
                                        $mois1 = date("Y-m-d H:i:s",strtotime('+30 days'));
                                        $mois2 = date("Y-m-d H:i:s",strtotime('+61 days'));
                                        $mois3 = date("Y-m-d H:i:s",strtotime('+91 days'));
                                    @endphp
                                    <option value="{{$mois1}}" id="mois1">1 Mois (5% de commission pour 1 mois)</option>
                                    <option value="{{$mois2}}" id="mois2">2 Mois (7% de commission pour 2 mois)</option>
                                    <option value="{{$mois3}}" id="mois3">3 Mois (10% de commission pour 3 mois)</option>
                                </select>
                                @php
                                @endphp
                                <input type="number" name="montantpayer" id="montantpayerinput" style="display:none;" >
                                <output id="montantpayer"class="form-control input" placeholder="Montant Total (A calculer)"  required="required">
                        </div>
                        <div class="col-md-12">
                            <div align="center" >
                                <input  onclick="clientid()"  type="submit"name="VALIDER" value="ENREGISTRER" class="btn btnduform">
                            </div>
                        </div>

                            </form>
                    </div>
                    <!-- Page Heading -->
        
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
    
            <script type="text/javascript">
                function clientid()
                {
                    var client='client';
                    var test='0';
                    var client_id = Number(document.getElementById("client_id").value);
                    <?php foreach ($listeclient as $client) { ?> 
                    if( client_id == <?php echo $client->telephone;?> && client == <?php echo $client->type;?> )
                    {
                        document.getElementById("client_id").value = <?php echo $client->id;?>;
                        test='1';
                    }
                    <?php } ?>
                    if (test == '0')
                    {
                        alert('Ce numero n\'est pas du type client');
                        document.getElementById("client_id").value = '';
                    }
                }
            </script>
    
</body>

</html>