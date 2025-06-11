<?php
	include('includes/header.php');
?>
<!-- Page Content -->
<div class="container" id="profiel" v-cloak>
    <div id="top-banner"></div>
    <div class="jumbotron my-4">
        <h1 class="text-center">Dating mit {{ profile.name }} aus {{ profile.city }}</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4 text-center">
                <img class="profile-pic" :src="profile.profile_image_big" :alt="'Dating im ' + profile.province + ' mit ' + profile.name" :title="'Profilbild von ' + profile.name">
            </div>
            <div class="col-sm-8">
                <h4>Über {{ profile.name }}:</h4>
                <p>{{ profile.aboutme }}</p>
                <h4>Persönliche Information:</h4>
                <ul class="list-group">
                    <li class="list-group-item">Bundesland: {{ profile.province }}</li>
                    <li class="list-group-item">Stadt: {{ profile.city }}</li>
                    <li class="list-group-item">Alter: {{ profile.age }}</li>
                    <li class="list-group-item">Familienstand: {{ profile.relationship }}</li>
                    <li class="list-group-item">Größe: {{ profile.length }}</li>
                </ul>
                <a :href="profile.url + '?ref=' + ref_id" class="btn btn-primary mt-1">Gratis Nachricht senden</a>
            </div>  
        </div><!-- /.row -->
    </div>
    <div id="footer-banner"></div>
</div><!-- Container -->

<script nonce="2726c7f26c">    
    var api_url= "https://23mlf01ccde23.com/profile/get0/9/";
    var ref_id= "32"; //de ref_id vd landingwebsite
</script>
<?php 
    $type = "profile";
    include('includes/footer.php'); 
?>