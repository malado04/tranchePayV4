<?php

require('vendor/autoload.php');

// \Paydunya\Setup::setMasterKey("emDzaHBl-dcXF-SZc3-SRci-j3WLjKPGN6cT");
// \Paydunya\Setup::setPublicKey("live_public_ELQdvCiUu5V7hvcGyxt5eZvdQi0");
// \Paydunya\Setup::setPrivateKey("live_private_e7DpYgcKCwih047qikSnMdq7bGg");
// \Paydunya\Setup::setMode("live");
// \Paydunya\Setup::setToken("FWURYi4zCCZTN5FRl5ax");
\Paydunya\Setup::setMasterKey("emDzaHBl-dcXF-SZc3-SRci-j3WLjKPGN6cT");
\Paydunya\Setup::setPublicKey("test_public_hpYqnaAIWeFI272yUVSQSmpQhcp");
\Paydunya\Setup::setPrivateKey("test_private_eZGDVac9NxifgG8xFdxKIA1I1b5");
\Paydunya\Setup::setToken("I0MKv3vn4eCG1nB3RBr7");
\Paydunya\Setup::setMode("test"); // Optionnel. Utilisez cette option pour les paiements tests.
        
        //Configuration des informations de votr
//Configuration des informations de votre service/entreprise
\Paydunya\Checkout\Store::setName("Le site de TranchePay");
\Paydunya\Checkout\Store::setTagline("Le moyen de paiement par tranche");
\Paydunya\Checkout\Store::setPhoneNumber("774262038");
\Paydunya\Checkout\Store::setPostalAddress("Dakar Plateau - Etablissement kheweul");
\Paydunya\Checkout\Store::setWebsiteUrl("https://tranchepay.com");
\Paydunya\Checkout\Store::setLogoUrl("https://tranchepay.com/image/logo.jpeg");
\Paydunya\Checkout\Store::setCallbackUrl("https://tranchepay.com/public/paydunya/index.php");

// Vous pouvez mettre ici localhost pour vos tests de redirection en local
\Paydunya\Checkout\Store::setCancelUrl("http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/index.php");
\Paydunya\Checkout\Store::setReturnUrl("http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/confirm.php");