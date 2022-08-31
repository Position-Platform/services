<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Services Position</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
                    body .content .python-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.23.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.23.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
            <img src="https://service.geo.sm/var/www/logo-nom.png" alt="logo" class="logo" style="padding-top: 10px;" width="230px"/>
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                                            <button type="button" class="lang-button" data-language-name="python">python</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="abonnement-management">
                    <a href="#abonnement-management">Abonnement management</a>
                </li>
                                    <ul id="tocify-subheader-abonnement-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="abonnement-management-GETapi-abonnements">
                        <a href="#abonnement-management-GETapi-abonnements">Get all Subscription.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="abonnement-management-GETapi-abonnements--id-">
                        <a href="#abonnement-management-GETapi-abonnements--id-">Show Subscription by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="abonnement-management-POSTapi-abonnements">
                        <a href="#abonnement-management-POSTapi-abonnements">Add a new Subscription.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="abonnement-management-PUTapi-abonnements--id-">
                        <a href="#abonnement-management-PUTapi-abonnements--id-">Update Subscription.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="abonnement-management-DELETEapi-abonnements--id-">
                        <a href="#abonnement-management-DELETEapi-abonnements--id-">Delete subscription.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="account-management">
                    <a href="#account-management">Account management</a>
                </li>
                                    <ul id="tocify-subheader-account-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-password-forgot">
                        <a href="#account-management-POSTapi-auth-password-forgot">Forgot Password</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-DELETEapi-user-delete--id-">
                        <a href="#account-management-DELETEapi-user-delete--id-">Delete user account.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-password-reset">
                        <a href="#account-management-POSTapi-auth-password-reset">Reset Password</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-register">
                        <a href="#account-management-POSTapi-auth-register">Register a new user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-login">
                        <a href="#account-management-POSTapi-auth-login">Login a new user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-GETapi-auth-logout">
                        <a href="#account-management-GETapi-auth-logout">Logout a user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-GETapi-user-me">
                        <a href="#account-management-GETapi-user-me">get User Account.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-user-update--id-">
                        <a href="#account-management-POSTapi-user-update--id-">Update user account.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-register-facebook">
                        <a href="#account-management-POSTapi-auth-register-facebook">Facebook Connect.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-register-twitter">
                        <a href="#account-management-POSTapi-auth-register-twitter">Twitter Connect.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-POSTapi-auth-register-google">
                        <a href="#account-management-POSTapi-auth-register-google">Google Connect.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="account-management-GETapi-favoris">
                        <a href="#account-management-GETapi-favoris">Get Favorites</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-management">
                    <a href="#admin-management">Admin management</a>
                </li>
                                    <ul id="tocify-subheader-admin-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-management-GETapi-admins">
                        <a href="#admin-management-GETapi-admins">Get all Admin.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="admin-management-POSTapi-admins">
                        <a href="#admin-management-POSTapi-admins">Add a new admin.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="admin-management-GETapi-admins--id-">
                        <a href="#admin-management-GETapi-admins--id-">Show Admin by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="admin-management-PUTapi-admins--id-">
                        <a href="#admin-management-PUTapi-admins--id-">Update admin account.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="admin-management-DELETEapi-admins--id-">
                        <a href="#admin-management-DELETEapi-admins--id-">Delete admin account.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="building-management">
                    <a href="#building-management">Building management</a>
                </li>
                                    <ul id="tocify-subheader-building-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="building-management-DELETEapi-batiments--id-">
                        <a href="#building-management-DELETEapi-batiments--id-">Delete Building.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="building-management-GETapi-batiments">
                        <a href="#building-management-GETapi-batiments">Get all Building.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="building-management-POSTapi-batiments">
                        <a href="#building-management-POSTapi-batiments">Add a new Building.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="building-management-GETapi-batiments--id-">
                        <a href="#building-management-GETapi-batiments--id-">Show Building by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="building-management-PUTapi-batiments--id-">
                        <a href="#building-management-PUTapi-batiments--id-">Update Building.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="building-management-POSTapi-add-batiments">
                        <a href="#building-management-POSTapi-add-batiments">Add Complet Batiment Process.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="category-management">
                    <a href="#category-management">Category management</a>
                </li>
                                    <ul id="tocify-subheader-category-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="category-management-GETapi-categories">
                        <a href="#category-management-GETapi-categories">Get all Category.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-GETapi-categories--id-">
                        <a href="#category-management-GETapi-categories--id-">Show Category by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-POSTapi-categories">
                        <a href="#category-management-POSTapi-categories">Add a new Category.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-PUTapi-categories--id-">
                        <a href="#category-management-PUTapi-categories--id-">Update Category.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-DELETEapi-categories--id-">
                        <a href="#category-management-DELETEapi-categories--id-">Delete Category.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-GETapi-search-categories">
                        <a href="#category-management-GETapi-search-categories">Search Category.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="comment-management">
                    <a href="#comment-management">Comment management</a>
                </li>
                                    <ul id="tocify-subheader-comment-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="comment-management-GETapi-commentaires">
                        <a href="#comment-management-GETapi-commentaires">Get all Comment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="comment-management-POSTapi-commentaires">
                        <a href="#comment-management-POSTapi-commentaires">Add a new Comment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="comment-management-GETapi-commentaires--id-">
                        <a href="#comment-management-GETapi-commentaires--id-">Show Comment by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="comment-management-PUTapi-commentaires--id-">
                        <a href="#comment-management-PUTapi-commentaires--id-">Update Comment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="comment-management-DELETEapi-commentaires--id-">
                        <a href="#comment-management-DELETEapi-commentaires--id-">Delete Comment.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="commodites-management">
                    <a href="#commodites-management">Commodites management</a>
                </li>
                                    <ul id="tocify-subheader-commodites-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="commodites-management-GETapi-commodites">
                        <a href="#commodites-management-GETapi-commodites">Get all Commodites.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commodites-management-GETapi-commodites--id-">
                        <a href="#commodites-management-GETapi-commodites--id-">Show Commodite by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commodites-management-POSTapi-commodites">
                        <a href="#commodites-management-POSTapi-commodites">Add a new Commodite.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commodites-management-PUTapi-commodites--id-">
                        <a href="#commodites-management-PUTapi-commodites--id-">Update Commodite.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commodites-management-DELETEapi-commodites--id-">
                        <a href="#commodites-management-DELETEapi-commodites--id-">Delete Commodite.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-9" class="tocify-header">
                <li class="tocify-item level-1" data-unique="establishment-management">
                    <a href="#establishment-management">Establishment management</a>
                </li>
                                    <ul id="tocify-subheader-establishment-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="establishment-management-GETapi-etablissements">
                        <a href="#establishment-management-GETapi-etablissements">Get all establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-POSTapi-etablissements">
                        <a href="#establishment-management-POSTapi-etablissements">Add a new establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-PUTapi-etablissements--id-">
                        <a href="#establishment-management-PUTapi-etablissements--id-">Update Establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-DELETEapi-etablissements--id-">
                        <a href="#establishment-management-DELETEapi-etablissements--id-">Delete Establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-GETapi-etablissements--id-">
                        <a href="#establishment-management-GETapi-etablissements--id-">Show Establishment by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-GETapi-search-etablissements">
                        <a href="#establishment-management-GETapi-search-etablissements">Search Establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-POSTapi-favoris-add">
                        <a href="#establishment-management-POSTapi-favoris-add">Add Favorite Establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-POSTapi-favoris-remove">
                        <a href="#establishment-management-POSTapi-favoris-remove">Remove Favorite Establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-GETapi-search-etablissements-filter">
                        <a href="#establishment-management-GETapi-search-etablissements-filter">Search Establishment by Filter.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-PUTapi-etablissements-vues--id-">
                        <a href="#establishment-management-PUTapi-etablissements-vues--id-">Update vues Establishment.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="establishment-management-GETapi-count-etablissements">
                        <a href="#establishment-management-GETapi-count-etablissements">GET api/count/etablissements</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-10" class="tocify-header">
                <li class="tocify-item level-1" data-unique="picture-management">
                    <a href="#picture-management">Picture management</a>
                </li>
                                    <ul id="tocify-subheader-picture-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="picture-management-POSTapi-images">
                        <a href="#picture-management-POSTapi-images">Add a new picture.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="picture-management-PUTapi-images--id-">
                        <a href="#picture-management-PUTapi-images--id-">Update Picture.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="picture-management-DELETEapi-images--id-">
                        <a href="#picture-management-DELETEapi-images--id-">Delete Picture.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-11" class="tocify-header">
                <li class="tocify-item level-1" data-unique="schedule-management">
                    <a href="#schedule-management">Schedule management</a>
                </li>
                                    <ul id="tocify-subheader-schedule-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="schedule-management-POSTapi-horaires">
                        <a href="#schedule-management-POSTapi-horaires">Add a new schedule.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="schedule-management-PUTapi-horaires--id-">
                        <a href="#schedule-management-PUTapi-horaires--id-">Update Schedule.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="schedule-management-DELETEapi-horaires--id-">
                        <a href="#schedule-management-DELETEapi-horaires--id-">Delete Schedule.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-12" class="tocify-header">
                <li class="tocify-item level-1" data-unique="subcategory-management">
                    <a href="#subcategory-management">SubCategory management</a>
                </li>
                                    <ul id="tocify-subheader-subcategory-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="subcategory-management-GETapi-souscategories">
                        <a href="#subcategory-management-GETapi-souscategories">Get all SubCategory.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="subcategory-management-GETapi-souscategories--id-">
                        <a href="#subcategory-management-GETapi-souscategories--id-">Show SubCategory by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="subcategory-management-POSTapi-souscategories">
                        <a href="#subcategory-management-POSTapi-souscategories">Add a new SubCategory.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="subcategory-management-PUTapi-souscategories--id-">
                        <a href="#subcategory-management-PUTapi-souscategories--id-">Update SubCategory.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="subcategory-management-DELETEapi-souscategories--id-">
                        <a href="#subcategory-management-DELETEapi-souscategories--id-">Delete Category.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="subcategory-management-GETapi-search-souscategories">
                        <a href="#subcategory-management-GETapi-search-souscategories">Search SubCategory.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-13" class="tocify-header">
                <li class="tocify-item level-1" data-unique="tracking-management">
                    <a href="#tracking-management">Tracking management</a>
                </li>
                                    <ul id="tocify-subheader-tracking-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="tracking-management-POSTapi-trackings">
                        <a href="#tracking-management-POSTapi-trackings">Add a new Tracking.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="tracking-management-POSTapi-tracking">
                        <a href="#tracking-management-POSTapi-tracking">Add a new Tracking.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-14" class="tocify-header">
                <li class="tocify-item level-1" data-unique="typecommodite-management">
                    <a href="#typecommodite-management">TypeCommodite management</a>
                </li>
                                    <ul id="tocify-subheader-typecommodite-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="typecommodite-management-GETapi-typecommodites">
                        <a href="#typecommodite-management-GETapi-typecommodites">Get all Type Commodite.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="typecommodite-management-GETapi-typecommodites--id-">
                        <a href="#typecommodite-management-GETapi-typecommodites--id-">Show Type Commodite by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="typecommodite-management-POSTapi-typecommodites">
                        <a href="#typecommodite-management-POSTapi-typecommodites">Add a new Type Commodite.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="typecommodite-management-PUTapi-typecommodites--id-">
                        <a href="#typecommodite-management-PUTapi-typecommodites--id-">Update Type Commodite.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="typecommodite-management-DELETEapi-typecommodites--id-">
                        <a href="#typecommodite-management-DELETEapi-typecommodites--id-">Delete Category.</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: August 31 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Documentation des services de Position</p>
<p>Cette documentation vise à fournir toutes les informations dont vous avez besoin pour travailler avec notre API.</p>
<aside>Au fur et à mesure que vous faites défiler la page, vous verrez des exemples de code pour travailler avec l'API dans différents langages de programmation dans la zone sombre à droite (ou dans le contenu sur mobile).
Vous pouvez changer la langue utilisée à l'aide des onglets situés en haut à droite (ou à partir du menu de navigation situé en haut à gauche sur mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="abonnement-management">Abonnement management</h1>

    <p>APIs for managing Abonnements</p>

            <h2 id="abonnement-management-GETapi-abonnements">Get all Subscription.</h2>

<p>
</p>



<span id="example-requests-GETapi-abonnements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/abonnements" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/abonnements"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/abonnements',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/abonnements'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-abonnements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;abonnements&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;free&quot;,
                &quot;prix&quot;: 0,
                &quot;type&quot;: &quot;year&quot;,
                &quot;duree&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Abonnements&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-abonnements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-abonnements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-abonnements"></code></pre>
</span>
<span id="execution-error-GETapi-abonnements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-abonnements"></code></pre>
</span>
<form id="form-GETapi-abonnements" data-method="GET"
      data-path="api/abonnements"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-abonnements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-abonnements"
                    onclick="tryItOut('GETapi-abonnements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-abonnements"
                    onclick="cancelTryOut('GETapi-abonnements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-abonnements" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/abonnements</code></b>
        </p>
                    </form>

            <h2 id="abonnement-management-GETapi-abonnements--id-">Show Subscription by id.</h2>

<p>
</p>



<span id="example-requests-GETapi-abonnements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/abonnements/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/abonnements/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/abonnements/2',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/abonnements/2'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-abonnements--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;abonnement&quot;: {
            &quot;id&quot;: 1,
            &quot;nom&quot;: &quot;free&quot;,
            &quot;prix&quot;: 0,
            &quot;type&quot;: &quot;year&quot;,
            &quot;duree&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Abonnement&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-abonnements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-abonnements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-abonnements--id-"></code></pre>
</span>
<span id="execution-error-GETapi-abonnements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-abonnements--id-"></code></pre>
</span>
<form id="form-GETapi-abonnements--id-" data-method="GET"
      data-path="api/abonnements/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-abonnements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-abonnements--id-"
                    onclick="tryItOut('GETapi-abonnements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-abonnements--id-"
                    onclick="cancelTryOut('GETapi-abonnements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-abonnements--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/abonnements/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-abonnements--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the subscription.</p>
            </p>
                    </form>

            <h2 id="abonnement-management-POSTapi-abonnements">Add a new Subscription.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-abonnements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/abonnements" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"nom\": \"Smart\",
    \"prix\": 5000,
    \"duree\": 1,
    \"type\": \"year\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/abonnements"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "nom": "Smart",
    "prix": 5000,
    "duree": 1,
    "type": "year"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/abonnements',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'nom' =&gt; 'Smart',
            'prix' =&gt; 5000,
            'duree' =&gt; 1,
            'type' =&gt; 'year',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/abonnements'
payload = {
    "nom": "Smart",
    "prix": 5000,
    "duree": 1,
    "type": "year"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-abonnements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;abonnement&quot;: {
            &quot;nom&quot;: &quot;Smart&quot;,
            &quot;prix&quot;: 5000,
            &quot;duree&quot;: 1,
            &quot;updated_at&quot;: &quot;2022-08-31T00:21:26.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T00:21:26.000000Z&quot;,
            &quot;id&quot;: 2
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de l'abonnement reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-abonnements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-abonnements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-abonnements"></code></pre>
</span>
<span id="execution-error-POSTapi-abonnements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-abonnements"></code></pre>
</span>
<form id="form-POSTapi-abonnements" data-method="POST"
      data-path="api/abonnements"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-abonnements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-abonnements"
                    onclick="tryItOut('POSTapi-abonnements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-abonnements"
                    onclick="cancelTryOut('POSTapi-abonnements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-abonnements" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/abonnements</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-abonnements" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-abonnements"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-abonnements"
               value="Smart"
               data-component="body" hidden>
    <br>
<p>the name of the subscription.</p>
        </p>
                <p>
            <b><code>prix</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="prix"
               data-endpoint="POSTapi-abonnements"
               value="5000"
               data-component="body" hidden>
    <br>
<p>the price of the subscription.</p>
        </p>
                <p>
            <b><code>duree</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="duree"
               data-endpoint="POSTapi-abonnements"
               value="1"
               data-component="body" hidden>
    <br>
<p>duration of the subscription.</p>
        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="type"
               data-endpoint="POSTapi-abonnements"
               value="year"
               data-component="body" hidden>
    <br>
<p>Type of subscription(Year by default).</p>
        </p>
        </form>

            <h2 id="abonnement-management-PUTapi-abonnements--id-">Update Subscription.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-abonnements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/abonnements/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"nom\": \"Smart\",
    \"prix\": 5000,
    \"duree\": 1,
    \"type\": \"year\",
    \"_method\": \"PUT\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/abonnements/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "nom": "Smart",
    "prix": 5000,
    "duree": 1,
    "type": "year",
    "_method": "PUT"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/abonnements/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'nom' =&gt; 'Smart',
            'prix' =&gt; 5000,
            'duree' =&gt; 1,
            'type' =&gt; 'year',
            '_method' =&gt; 'PUT',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/abonnements/2'
payload = {
    "nom": "Smart",
    "prix": 5000,
    "duree": 1,
    "type": "year",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-abonnements--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;abonnement&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Smart&quot;,
            &quot;prix&quot;: 5000,
            &quot;type&quot;: &quot;year&quot;,
            &quot;duree&quot;: 2,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T00:21:26.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T00:27:19.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-abonnements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-abonnements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-abonnements--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-abonnements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-abonnements--id-"></code></pre>
</span>
<form id="form-PUTapi-abonnements--id-" data-method="PUT"
      data-path="api/abonnements/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-abonnements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-abonnements--id-"
                    onclick="tryItOut('PUTapi-abonnements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-abonnements--id-"
                    onclick="cancelTryOut('PUTapi-abonnements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-abonnements--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/abonnements/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-abonnements--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-abonnements--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-abonnements--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the subscription.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-abonnements--id-"
               value="Smart"
               data-component="body" hidden>
    <br>
<p>the name of the subscription.</p>
        </p>
                <p>
            <b><code>prix</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="prix"
               data-endpoint="PUTapi-abonnements--id-"
               value="5000"
               data-component="body" hidden>
    <br>
<p>the price of the subscription.</p>
        </p>
                <p>
            <b><code>duree</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="duree"
               data-endpoint="PUTapi-abonnements--id-"
               value="1"
               data-component="body" hidden>
    <br>
<p>duration of the subscription.</p>
        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="type"
               data-endpoint="PUTapi-abonnements--id-"
               value="year"
               data-component="body" hidden>
    <br>
<p>Type of subscription(Year by default).</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-abonnements--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="abonnement-management-DELETEapi-abonnements--id-">Delete subscription.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-abonnements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/abonnements/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/abonnements/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/abonnements/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/abonnements/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-abonnements--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-abonnements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-abonnements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-abonnements--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-abonnements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-abonnements--id-"></code></pre>
</span>
<form id="form-DELETEapi-abonnements--id-" data-method="DELETE"
      data-path="api/abonnements/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-abonnements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-abonnements--id-"
                    onclick="tryItOut('DELETEapi-abonnements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-abonnements--id-"
                    onclick="cancelTryOut('DELETEapi-abonnements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-abonnements--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/abonnements/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-abonnements--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-abonnements--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-abonnements--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the subscription.</p>
            </p>
                    </form>

        <h1 id="account-management">Account management</h1>

    <p>APIs for managing facebook user</p>

            <h2 id="account-management-POSTapi-auth-password-forgot">Forgot Password</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-password-forgot">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/password/forgot" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"email\": \"gautier@position.cm\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/password/forgot"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "email": "gautier@position.cm"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/password/forgot',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'email' =&gt; 'gautier@position.cm',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/password/forgot'
payload = {
    "email": "gautier@position.cm"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-password-forgot">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Un lien de reinitialisation vous a &eacute;t&eacute; envoy&eacute; par mail.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-password-forgot" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-password-forgot"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-password-forgot"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-password-forgot" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-password-forgot"></code></pre>
</span>
<form id="form-POSTapi-auth-password-forgot" data-method="POST"
      data-path="api/auth/password/forgot"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-password-forgot', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-password-forgot"
                    onclick="tryItOut('POSTapi-auth-password-forgot');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-password-forgot"
                    onclick="cancelTryOut('POSTapi-auth-password-forgot');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-password-forgot" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/password/forgot</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-password-forgot"
               value="gautier@position.cm"
               data-component="body" hidden>
    <br>
<p>the email of the user.</p>
        </p>
        </form>

            <h2 id="account-management-DELETEapi-user-delete--id-">Delete user account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-user-delete--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/user/delete/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user/delete/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/user/delete/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/user/delete/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-user-delete--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-user-delete--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-user-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-user-delete--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-user-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-user-delete--id-"></code></pre>
</span>
<form id="form-DELETEapi-user-delete--id-" data-method="DELETE"
      data-path="api/user/delete/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-user-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-user-delete--id-"
                    onclick="tryItOut('DELETEapi-user-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-user-delete--id-"
                    onclick="cancelTryOut('DELETEapi-user-delete--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-user-delete--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/user/delete/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-user-delete--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-user-delete--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-user-delete--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the admin.</p>
            </p>
                    </form>

            <h2 id="account-management-POSTapi-auth-password-reset">Reset Password</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-password-reset">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"email\": \"gautier@position.cm\",
    \"token\": \"iste\",
    \"password\": \"gautier124\",
    \"password_confirmation\": \"gautier124\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/password/reset"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "email": "gautier@position.cm",
    "token": "iste",
    "password": "gautier124",
    "password_confirmation": "gautier124"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/password/reset',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'email' =&gt; 'gautier@position.cm',
            'token' =&gt; 'iste',
            'password' =&gt; 'gautier124',
            'password_confirmation' =&gt; 'gautier124',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/password/reset'
payload = {
    "email": "gautier@position.cm",
    "token": "iste",
    "password": "gautier124",
    "password_confirmation": "gautier124"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-password-reset">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Password has been successfully changed&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-password-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-password-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-password-reset"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-password-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-password-reset"></code></pre>
</span>
<form id="form-POSTapi-auth-password-reset" data-method="POST"
      data-path="api/auth/password/reset"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-password-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-password-reset"
                    onclick="tryItOut('POSTapi-auth-password-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-password-reset"
                    onclick="cancelTryOut('POSTapi-auth-password-reset');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-password-reset" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/password/reset</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-password-reset"
               value="gautier@position.cm"
               data-component="body" hidden>
    <br>
<p>the email of the user.</p>
        </p>
                <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-password-reset"
               value="iste"
               data-component="body" hidden>
    <br>
<p>token give in mail.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-password-reset"
               value="gautier124"
               data-component="body" hidden>
    <br>
<p>the new password of the user.</p>
        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="POSTapi-auth-password-reset"
               value="gautier124"
               data-component="body" hidden>
    <br>
<p>the password confirmation of the user.</p>
        </p>
        </form>

            <h2 id="account-management-POSTapi-auth-register">Register a new user.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/register" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "name=Gautier" \
    --form "email=gautier@position.cm" \
    --form "password=gautier123" \
    --form "phone=699999999" \
    --form "image_profil=@C:\Users\tchou\AppData\Local\Temp\php204A.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('name', 'Gautier');
body.append('email', 'gautier@position.cm');
body.append('password', 'gautier123');
body.append('phone', '699999999');
body.append('image_profil', document.querySelector('input[name="image_profil"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/register',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'Gautier'
            ],
            [
                'name' =&gt; 'email',
                'contents' =&gt; 'gautier@position.cm'
            ],
            [
                'name' =&gt; 'password',
                'contents' =&gt; 'gautier123'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'image_profil',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php204A.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/register'
files = {
  'image_profil': open('C:\Users\tchou\AppData\Local\Temp\php204A.tmp', 'rb')
}
payload = {
    "name": "Gautier",
    "email": "gautier@position.cm",
    "password": "gautier123",
    "phone": 699999999
}
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWEwZGM3NGJkM2E5YTYxODJhOTIyMjljYjY3MTc5Njg1MzJlOWJjZTExNjA1MDMyOTM5MTc0ZTg3ZGNmYWVkYThkZDU2YTVhMjc2Y2FmOTgiLCJpYXQiOjE2NjE5MDQ2MzQuMjc2OTU3LCJuYmYiOjE2NjE5MDQ2MzQuMjc2OTY4LCJleHAiOjE2NjQ0OTY2MzQuMjY2MDQzLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.aaLypNDRJ9acP-Iq2oU6MazHXfqx7venzCnYh47lmI3gckzt0Tl5mtA2_VJyH9Nuo59TSVl_FDCrgsq6jepVxu1X1TN7EvoJ4gta4TkYucK3eLIxuSyzv-i-PBDM3l8kpXWe-br-7lXyjlLWREj7UE8FL8gC2gPdZm52pexYvaeqhcg-pzAkKqqjHvEJeqAIBvrRJnFcZY5w3194z4KTdw5AIJb5KIXaVvq36vcGm8Gb9KY17l4t5w1fyfxmBM9-SP9u_Ex7ips7wS7OgEcx6HCcahWiNm2doSMMlZIcPOYCWLpqS-uqdRGKxskmVfRMwxuwSWxhiGIfzp4KJUNIfkgOXnHrDvZHno6cGoeh-efpgFU0HayzNtnrxGScFWcGGwCioBc_jm_FhrwjYKLNRKv3PSOSfhpxSqgomGag7-e4oSGHszvCbImhH0agc_GPjdtylEC7MI9PUxaIBvWgMp8jV8mAZHPY6WdVVsgcz__dnUs1LvEq9wTeNkHaLUt5REnpatOCwLBw5nFv03Z70upCtUmdUf0u9A-gkj-L_Q5dRkUs_OJEBcJql6Yrlwv_jHFAPYexWBBxMjzceSx0nuRgM3h3kL8ePXHUnPqe1KrLCX1iQoc8Pn6pXxL_CoxcLpEYMXfrdlN-7kMl8rnJfMx5YF6LIedLFUTEkUIAg1Y&quot;,
        &quot;user&quot;: {
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;id&quot;: 2,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;user&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 4,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation r&eacute;ussie verifiez vos mails.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register"></code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-auth-register"
               value="Gautier"
               data-component="body" hidden>
    <br>
<p>the name of the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-register"
               value="gautier@position.cm"
               data-component="body" hidden>
    <br>
<p>the email of the user.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-register"
               value="gautier123"
               data-component="body" hidden>
    <br>
<p>the password of the user.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="POSTapi-auth-register"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>The phone number of the user.</p>
        </p>
                <p>
            <b><code>image_profil</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="image_profil"
               data-endpoint="POSTapi-auth-register"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
        </p>
        </form>

            <h2 id="account-management-POSTapi-auth-login">Login a new user.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"email\": \"gautier@position.cm\",
    \"password\": \"gautier123\",
    \"phone\": 699999999
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "email": "gautier@position.cm",
    "password": "gautier123",
    "phone": 699999999
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'email' =&gt; 'gautier@position.cm',
            'password' =&gt; 'gautier123',
            'phone' =&gt; 699999999,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/login'
payload = {
    "email": "gautier@position.cm",
    "password": "gautier123",
    "phone": 699999999
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDhjNDYwZWE0MDYyMjAwODY2MGFkMDAxZGFiODRhOTc5ZTk1NDY1NTEzYTE5MzNkNjJiZGUyMDQ1MThlNDcwNDFlODJjY2M0MmM4NmYwMDAiLCJpYXQiOjE2NjE5MDQ0OTUuMzc2ODQsIm5iZiI6MTY2MTkwNDQ5NS4zNzY4NDYsImV4cCI6MTY2NDQ5NjQ5NS4zNTk0NjgsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.i1gxqRdmcbPlAU8f_8f3fOaWisXCpIa9KyDclzkv9BnfHxQ2EabyNF8gj4KTw5xfALpH8LlEH-eD0xtMN05gfdS2XyyHDMCIimlhM1Xzto03Pm-mwGPnChkig8UozBnBng8K0kdnSqvA6bLvzfCqOTxvXCMekrM05g8G7Vd0cN_d1RgBHWDRTagMy1iJ655YlizxitdIvxw8VZm-qs8qSDp-LxhMxy8qHpmW2RPLGpJlWAes9NMU9t1lzSPyPCQ85GRH68CgZvyB1axChDlyjOWLpc0SH-gshrDSwq2mwQi36zkezGkxKd6An-WTU5zhLlMbsOYSzhtQqNmu1tAJvMZd_FOBIzGrSXWmuQprmwp_zTY9_RKrEvRQ9gcj2NE6rmHKGXP4SGDJ5w0UOkiaBFd6fvs0qz22q1ZQzWhMrMNWWmqR-MhLyHYBHzS0viVzzHK5h3BLLKwK-MfeOB8obgbrYWqrwuLuSxI3YA-NJJB4zYSg1htMQH2pN-wQlk-BzpB31bZnHyVzjyOvgB-mGEmDyMLJYC5qE5BY7opwHN7PpvaE8TvovtBtDoq0H5Nws0dS-VYldv87yHTPdkV9-eCzWuZBQvWHGNYm9acVP9uDenTLv_qlr5vz312EwCE-8hgWgiN7Pq5AKpFgJISlYV8q2iumDRfJG6XYb3JGLHI&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Admin&quot;,
            &quot;email&quot;: &quot;admin@position.cm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;fcm_token&quot;: null,
            &quot;image_profil&quot;: null,
            &quot;abonnement_id&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;admin&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 1,
                        &quot;role_id&quot;: 1,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Connexion r&eacute;ussie.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-login"
               value="gautier@position.cm"
               data-component="body" hidden>
    <br>
<p>if phone not found the email of the user.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="gautier123"
               data-component="body" hidden>
    <br>
<p>the password of the user.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="POSTapi-auth-login"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>if email not found The phone number of the user.</p>
        </p>
        </form>

            <h2 id="account-management-GETapi-auth-logout">Logout a user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/auth/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/auth/logout',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/logout'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Deconnexion r&eacute;ussie.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-logout"></code></pre>
</span>
<span id="execution-error-GETapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-logout"></code></pre>
</span>
<form id="form-GETapi-auth-logout" data-method="GET"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-logout"
                    onclick="tryItOut('GETapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-logout"
                    onclick="cancelTryOut('GETapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <p>
            <label id="auth-GETapi-auth-logout" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-auth-logout"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="account-management-GETapi-user-me">get User Account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/user/me',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/user/me'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-user-me">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Admin&quot;,
            &quot;email&quot;: &quot;admin@position.cm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;fcm_token&quot;: null,
            &quot;image_profil&quot;: null,
            &quot;abonnement_id&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;admin&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 1,
                        &quot;role_id&quot;: 1,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Utilisateur&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-me"></code></pre>
</span>
<span id="execution-error-GETapi-user-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-me"></code></pre>
</span>
<form id="form-GETapi-user-me" data-method="GET"
      data-path="api/user/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user-me"
                    onclick="tryItOut('GETapi-user-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user-me"
                    onclick="cancelTryOut('GETapi-user-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/me</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user-me" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-user-me"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="account-management-POSTapi-user-update--id-">Update user account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-user-update--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/user/update/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "name=Gautier" \
    --form "phone=699999999" \
    --form "_method=PUT" \
    --form "image_profil=@C:\Users\tchou\AppData\Local\Temp\php2202.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user/update/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('name', 'Gautier');
body.append('phone', '699999999');
body.append('_method', 'PUT');
body.append('image_profil', document.querySelector('input[name="image_profil"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/user/update/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'Gautier'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'image_profil',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2202.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/user/update/2'
files = {
  'image_profil': open('C:\Users\tchou\AppData\Local\Temp\php2202.tmp', 'rb')
}
payload = {
    "name": "Gautier",
    "phone": 699999999,
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-update--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gautier Boris&quot;,
            &quot;email&quot;: &quot;infos@geo.sm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-02-17T12:16:39.000000Z&quot;,
            &quot;phone&quot;: &quot;699999997&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/users/profils/1645102266_images.jpg&quot;,
            &quot;created_at&quot;: &quot;2022-02-17T12:16:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T12:51:06.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Utilisateur&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-user-update--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-update--id-"></code></pre>
</span>
<span id="execution-error-POSTapi-user-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-update--id-"></code></pre>
</span>
<form id="form-POSTapi-user-update--id-" data-method="POST"
      data-path="api/user/update/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-update--id-"
                    onclick="tryItOut('POSTapi-user-update--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-update--id-"
                    onclick="cancelTryOut('POSTapi-user-update--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-update--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/update/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-user-update--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-user-update--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-user-update--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the admin.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-user-update--id-"
               value="Gautier"
               data-component="body" hidden>
    <br>
<p>the name of the user.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="POSTapi-user-update--id-"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>The phone number of the user.</p>
        </p>
                <p>
            <b><code>image_profil</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="image_profil"
               data-endpoint="POSTapi-user-update--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="POSTapi-user-update--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="account-management-POSTapi-auth-register-facebook">Facebook Connect.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register-facebook">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/register/facebook" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"token\": \"vnjudioplodikebgfdti2fk\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register/facebook"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "token": "vnjudioplodikebgfdti2fk"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/register/facebook',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'token' =&gt; 'vnjudioplodikebgfdti2fk',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/register/facebook'
payload = {
    "token": "vnjudioplodikebgfdti2fk"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register-facebook">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWEwZGM3NGJkM2E5YTYxODJhOTIyMjljYjY3MTc5Njg1MzJlOWJjZTExNjA1MDMyOTM5MTc0ZTg3ZGNmYWVkYThkZDU2YTVhMjc2Y2FmOTgiLCJpYXQiOjE2NjE5MDQ2MzQuMjc2OTU3LCJuYmYiOjE2NjE5MDQ2MzQuMjc2OTY4LCJleHAiOjE2NjQ0OTY2MzQuMjY2MDQzLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.aaLypNDRJ9acP-Iq2oU6MazHXfqx7venzCnYh47lmI3gckzt0Tl5mtA2_VJyH9Nuo59TSVl_FDCrgsq6jepVxu1X1TN7EvoJ4gta4TkYucK3eLIxuSyzv-i-PBDM3l8kpXWe-br-7lXyjlLWREj7UE8FL8gC2gPdZm52pexYvaeqhcg-pzAkKqqjHvEJeqAIBvrRJnFcZY5w3194z4KTdw5AIJb5KIXaVvq36vcGm8Gb9KY17l4t5w1fyfxmBM9-SP9u_Ex7ips7wS7OgEcx6HCcahWiNm2doSMMlZIcPOYCWLpqS-uqdRGKxskmVfRMwxuwSWxhiGIfzp4KJUNIfkgOXnHrDvZHno6cGoeh-efpgFU0HayzNtnrxGScFWcGGwCioBc_jm_FhrwjYKLNRKv3PSOSfhpxSqgomGag7-e4oSGHszvCbImhH0agc_GPjdtylEC7MI9PUxaIBvWgMp8jV8mAZHPY6WdVVsgcz__dnUs1LvEq9wTeNkHaLUt5REnpatOCwLBw5nFv03Z70upCtUmdUf0u9A-gkj-L_Q5dRkUs_OJEBcJql6Yrlwv_jHFAPYexWBBxMjzceSx0nuRgM3h3kL8ePXHUnPqe1KrLCX1iQoc8Pn6pXxL_CoxcLpEYMXfrdlN-7kMl8rnJfMx5YF6LIedLFUTEkUIAg1Y&quot;,
        &quot;user&quot;: {
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;id&quot;: 2,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;user&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 4,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation r&eacute;ussie verifiez vos mails.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register-facebook" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register-facebook"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register-facebook"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register-facebook" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register-facebook"></code></pre>
</span>
<form id="form-POSTapi-auth-register-facebook" data-method="POST"
      data-path="api/auth/register/facebook"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register-facebook', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register-facebook"
                    onclick="tryItOut('POSTapi-auth-register-facebook');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register-facebook"
                    onclick="cancelTryOut('POSTapi-auth-register-facebook');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register-facebook" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register/facebook</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-register-facebook"
               value="vnjudioplodikebgfdti2fk"
               data-component="body" hidden>
    <br>
<p>the facebook user token.</p>
        </p>
        </form>

            <h2 id="account-management-POSTapi-auth-register-twitter">Twitter Connect.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register-twitter">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/register/twitter" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"token\": \"vnjudioplodikebgfdti2fk\",
    \"secret\": \"vnjudioplodikebgfdti2fk\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register/twitter"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "token": "vnjudioplodikebgfdti2fk",
    "secret": "vnjudioplodikebgfdti2fk"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/register/twitter',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'token' =&gt; 'vnjudioplodikebgfdti2fk',
            'secret' =&gt; 'vnjudioplodikebgfdti2fk',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/register/twitter'
payload = {
    "token": "vnjudioplodikebgfdti2fk",
    "secret": "vnjudioplodikebgfdti2fk"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register-twitter">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWEwZGM3NGJkM2E5YTYxODJhOTIyMjljYjY3MTc5Njg1MzJlOWJjZTExNjA1MDMyOTM5MTc0ZTg3ZGNmYWVkYThkZDU2YTVhMjc2Y2FmOTgiLCJpYXQiOjE2NjE5MDQ2MzQuMjc2OTU3LCJuYmYiOjE2NjE5MDQ2MzQuMjc2OTY4LCJleHAiOjE2NjQ0OTY2MzQuMjY2MDQzLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.aaLypNDRJ9acP-Iq2oU6MazHXfqx7venzCnYh47lmI3gckzt0Tl5mtA2_VJyH9Nuo59TSVl_FDCrgsq6jepVxu1X1TN7EvoJ4gta4TkYucK3eLIxuSyzv-i-PBDM3l8kpXWe-br-7lXyjlLWREj7UE8FL8gC2gPdZm52pexYvaeqhcg-pzAkKqqjHvEJeqAIBvrRJnFcZY5w3194z4KTdw5AIJb5KIXaVvq36vcGm8Gb9KY17l4t5w1fyfxmBM9-SP9u_Ex7ips7wS7OgEcx6HCcahWiNm2doSMMlZIcPOYCWLpqS-uqdRGKxskmVfRMwxuwSWxhiGIfzp4KJUNIfkgOXnHrDvZHno6cGoeh-efpgFU0HayzNtnrxGScFWcGGwCioBc_jm_FhrwjYKLNRKv3PSOSfhpxSqgomGag7-e4oSGHszvCbImhH0agc_GPjdtylEC7MI9PUxaIBvWgMp8jV8mAZHPY6WdVVsgcz__dnUs1LvEq9wTeNkHaLUt5REnpatOCwLBw5nFv03Z70upCtUmdUf0u9A-gkj-L_Q5dRkUs_OJEBcJql6Yrlwv_jHFAPYexWBBxMjzceSx0nuRgM3h3kL8ePXHUnPqe1KrLCX1iQoc8Pn6pXxL_CoxcLpEYMXfrdlN-7kMl8rnJfMx5YF6LIedLFUTEkUIAg1Y&quot;,
        &quot;user&quot;: {
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;id&quot;: 2,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;user&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 4,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation r&eacute;ussie verifiez vos mails.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register-twitter" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register-twitter"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register-twitter"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register-twitter" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register-twitter"></code></pre>
</span>
<form id="form-POSTapi-auth-register-twitter" data-method="POST"
      data-path="api/auth/register/twitter"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register-twitter', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register-twitter"
                    onclick="tryItOut('POSTapi-auth-register-twitter');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register-twitter"
                    onclick="cancelTryOut('POSTapi-auth-register-twitter');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register-twitter" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register/twitter</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-register-twitter"
               value="vnjudioplodikebgfdti2fk"
               data-component="body" hidden>
    <br>
<p>the twitter user token.</p>
        </p>
                <p>
            <b><code>secret</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="secret"
               data-endpoint="POSTapi-auth-register-twitter"
               value="vnjudioplodikebgfdti2fk"
               data-component="body" hidden>
    <br>
<p>the twitter user secret token.</p>
        </p>
        </form>

            <h2 id="account-management-POSTapi-auth-register-google">Google Connect.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register-google">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/register/google" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"token\": \"vnjudioplodikebgfdti2fk\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register/google"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "token": "vnjudioplodikebgfdti2fk"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/register/google',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'token' =&gt; 'vnjudioplodikebgfdti2fk',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/auth/register/google'
payload = {
    "token": "vnjudioplodikebgfdti2fk"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register-google">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWEwZGM3NGJkM2E5YTYxODJhOTIyMjljYjY3MTc5Njg1MzJlOWJjZTExNjA1MDMyOTM5MTc0ZTg3ZGNmYWVkYThkZDU2YTVhMjc2Y2FmOTgiLCJpYXQiOjE2NjE5MDQ2MzQuMjc2OTU3LCJuYmYiOjE2NjE5MDQ2MzQuMjc2OTY4LCJleHAiOjE2NjQ0OTY2MzQuMjY2MDQzLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.aaLypNDRJ9acP-Iq2oU6MazHXfqx7venzCnYh47lmI3gckzt0Tl5mtA2_VJyH9Nuo59TSVl_FDCrgsq6jepVxu1X1TN7EvoJ4gta4TkYucK3eLIxuSyzv-i-PBDM3l8kpXWe-br-7lXyjlLWREj7UE8FL8gC2gPdZm52pexYvaeqhcg-pzAkKqqjHvEJeqAIBvrRJnFcZY5w3194z4KTdw5AIJb5KIXaVvq36vcGm8Gb9KY17l4t5w1fyfxmBM9-SP9u_Ex7ips7wS7OgEcx6HCcahWiNm2doSMMlZIcPOYCWLpqS-uqdRGKxskmVfRMwxuwSWxhiGIfzp4KJUNIfkgOXnHrDvZHno6cGoeh-efpgFU0HayzNtnrxGScFWcGGwCioBc_jm_FhrwjYKLNRKv3PSOSfhpxSqgomGag7-e4oSGHszvCbImhH0agc_GPjdtylEC7MI9PUxaIBvWgMp8jV8mAZHPY6WdVVsgcz__dnUs1LvEq9wTeNkHaLUt5REnpatOCwLBw5nFv03Z70upCtUmdUf0u9A-gkj-L_Q5dRkUs_OJEBcJql6Yrlwv_jHFAPYexWBBxMjzceSx0nuRgM3h3kL8ePXHUnPqe1KrLCX1iQoc8Pn6pXxL_CoxcLpEYMXfrdlN-7kMl8rnJfMx5YF6LIedLFUTEkUIAg1Y&quot;,
        &quot;user&quot;: {
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T00:10:27.000000Z&quot;,
            &quot;id&quot;: 2,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;user&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 4,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation r&eacute;ussie verifiez vos mails.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register-google" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register-google"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register-google"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register-google" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register-google"></code></pre>
</span>
<form id="form-POSTapi-auth-register-google" data-method="POST"
      data-path="api/auth/register/google"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register-google', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register-google"
                    onclick="tryItOut('POSTapi-auth-register-google');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register-google"
                    onclick="cancelTryOut('POSTapi-auth-register-google');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register-google" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register/google</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-register-google"
               value="vnjudioplodikebgfdti2fk"
               data-component="body" hidden>
    <br>
<p>the google user token.</p>
        </p>
        </form>

            <h2 id="account-management-GETapi-favoris">Get Favorites</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-favoris">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/favoris" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/favoris"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/favoris',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/favoris'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-favoris">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
            &quot;batiment_id&quot;: 3,
            &quot;indication_adresse&quot;: &quot;Face station&quot;,
            &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
            &quot;site_internet&quot;: &quot;www.site.com&quot;,
            &quot;nom_manager&quot;: &quot;Mical&quot;,
            &quot;contact_manager&quot;: &quot;Mical&quot;,
            &quot;user_id&quot;: 1,
            &quot;etage&quot;: 1,
            &quot;cover&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/1661912359_about2.jpg&quot;,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;whatsapp1&quot;: &quot;699999999&quot;,
            &quot;whatsapp2&quot;: &quot;699999998&quot;,
            &quot;description&quot;: &quot;Super etablissement.&quot;,
            &quot;osm_id&quot;: null,
            &quot;services&quot;: &quot;OM;MOMO&quot;,
            &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
            &quot;vues&quot;: 2,
            &quot;logo&quot;: null,
            &quot;logo_map&quot;: null,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T02:37:33.000000Z&quot;,
            &quot;batiment&quot;: {
                &quot;id&quot;: 3,
                &quot;user_id&quot;: 1,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;nombre_niveau&quot;: &quot;3&quot;,
                &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                &quot;longitude&quot;: &quot;11.229207&quot;,
                &quot;latitude&quot;: &quot;4.078288&quot;,
                &quot;image&quot;: null,
                &quot;indication&quot;: &quot;derrierre station&quot;,
                &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                &quot;ville&quot;: &quot;Douala&quot;,
                &quot;commune&quot;: &quot;Douala 3&quot;,
                &quot;quartier&quot;: &quot;Nyalla&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
            },
            &quot;sous_categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Boutiques&quot;,
                    &quot;categorie_id&quot;: 1,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;etablissement_id&quot;: 2,
                        &quot;sous_categorie_id&quot;: 1
                    },
                    &quot;categorie&quot;: {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Achats&quot;,
                        &quot;shortname&quot;: &quot;Achats&quot;,
                        &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                        &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                        &quot;vues&quot;: 0,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                }
            ],
            &quot;commodites&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Wifi +&quot;,
                    &quot;type_commodite_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;etablissement_id&quot;: 2,
                        &quot;commodite_id&quot;: 1
                    }
                }
            ],
            &quot;images&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;etablissement_id&quot;: 2,
                    &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                }
            ],
            &quot;horaires&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;etablissement_id&quot;: 2,
                    &quot;jour&quot;: &quot;mardi&quot;,
                    &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;etablissement_id&quot;: 2,
                    &quot;jour&quot;: &quot;lundi&quot;,
                    &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                }
            ],
            &quot;commentaires&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;user_id&quot;: 1,
                    &quot;etablissement_id&quot;: 2,
                    &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                    &quot;rating&quot;: 4,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Admin&quot;,
                        &quot;email&quot;: &quot;admin@position.cm&quot;,
                        &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;phone&quot;: &quot;699999999&quot;,
                        &quot;fcm_token&quot;: null,
                        &quot;image_profil&quot;: null,
                        &quot;abonnement_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                    }
                }
            ],
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@position.cm&quot;,
                &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;fcm_token&quot;: null,
                &quot;image_profil&quot;: null,
                &quot;abonnement_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
            }
        }
    ],
    &quot;message&quot;: &quot;Favorites&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-favoris" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-favoris"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-favoris"></code></pre>
</span>
<span id="execution-error-GETapi-favoris" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-favoris"></code></pre>
</span>
<form id="form-GETapi-favoris" data-method="GET"
      data-path="api/favoris"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-favoris', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-favoris"
                    onclick="tryItOut('GETapi-favoris');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-favoris"
                    onclick="cancelTryOut('GETapi-favoris');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-favoris" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/favoris</code></b>
        </p>
                <p>
            <label id="auth-GETapi-favoris" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-favoris"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="admin-management">Admin management</h1>

    <p>APIs for managing Admin</p>

            <h2 id="admin-management-GETapi-admins">Get all Admin.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admins">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/admins" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admins"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/admins',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/admins'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-admins">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;admins&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;isSuperAdmin&quot;: true,
                &quot;user_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin&quot;,
                    &quot;email&quot;: &quot;admin@position.cm&quot;,
                    &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;fcm_token&quot;: null,
                    &quot;image_profil&quot;: null,
                    &quot;abonnement_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;roles&quot;: [
                        {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;admin&quot;,
                            &quot;guard_name&quot;: &quot;api&quot;,
                            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;pivot&quot;: {
                                &quot;model_id&quot;: 1,
                                &quot;role_id&quot;: 1,
                                &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                            }
                        }
                    ]
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Admins&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admins"></code></pre>
</span>
<span id="execution-error-GETapi-admins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admins"></code></pre>
</span>
<form id="form-GETapi-admins" data-method="GET"
      data-path="api/admins"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admins"
                    onclick="tryItOut('GETapi-admins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admins"
                    onclick="cancelTryOut('GETapi-admins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admins" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admins</code></b>
        </p>
                <p>
            <label id="auth-GETapi-admins" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-admins"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="admin-management-POSTapi-admins">Add a new admin.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-admins">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/admins" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "name=Gautier" \
    --form "email=gautier@position.cm" \
    --form "password=gautier123" \
    --form "phone=699999999" \
    --form "image_profil=@C:\Users\tchou\AppData\Local\Temp\php23C8.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admins"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('name', 'Gautier');
body.append('email', 'gautier@position.cm');
body.append('password', 'gautier123');
body.append('phone', '699999999');
body.append('image_profil', document.querySelector('input[name="image_profil"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/admins',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'Gautier'
            ],
            [
                'name' =&gt; 'email',
                'contents' =&gt; 'gautier@position.cm'
            ],
            [
                'name' =&gt; 'password',
                'contents' =&gt; 'gautier123'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'image_profil',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php23C8.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/admins'
files = {
  'image_profil': open('C:\Users\tchou\AppData\Local\Temp\php23C8.tmp', 'rb')
}
payload = {
    "name": "Gautier",
    "email": "gautier@position.cm",
    "password": "gautier123",
    "phone": 699999999
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-admins">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;admin&quot;: {
            &quot;user_id&quot;: 3,
            &quot;updated_at&quot;: &quot;2022-08-31T00:33:24.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T00:33:24.000000Z&quot;,
            &quot;id&quot;: 2,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Gautier Admin&quot;,
                &quot;email&quot;: &quot;tchoukouahaboris@gmail.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;phone&quot;: &quot;699999997&quot;,
                &quot;fcm_token&quot;: null,
                &quot;image_profil&quot;: null,
                &quot;abonnement_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T00:33:18.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T00:33:18.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;admin&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 3,
                            &quot;role_id&quot;: 1,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de l'admin reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-admins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admins"></code></pre>
</span>
<span id="execution-error-POSTapi-admins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admins"></code></pre>
</span>
<form id="form-POSTapi-admins" data-method="POST"
      data-path="api/admins"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admins"
                    onclick="tryItOut('POSTapi-admins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admins"
                    onclick="cancelTryOut('POSTapi-admins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admins" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admins</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-admins" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-admins"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-admins"
               value="Gautier"
               data-component="body" hidden>
    <br>
<p>the name of the admin.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-admins"
               value="gautier@position.cm"
               data-component="body" hidden>
    <br>
<p>the email of the admin.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-admins"
               value="gautier123"
               data-component="body" hidden>
    <br>
<p>the password of the admin.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="POSTapi-admins"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>The phone number of the admin.</p>
        </p>
                <p>
            <b><code>image_profil</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="image_profil"
               data-endpoint="POSTapi-admins"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
        </p>
        </form>

            <h2 id="admin-management-GETapi-admins--id-">Show Admin by id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-admins--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/admins/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admins/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/admins/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/admins/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-admins--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;admin&quot;: {
            &quot;id&quot;: 1,
            &quot;isSuperAdmin&quot;: true,
            &quot;user_id&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@position.cm&quot;,
                &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;fcm_token&quot;: null,
                &quot;image_profil&quot;: null,
                &quot;abonnement_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;admin&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 1,
                            &quot;role_id&quot;: 1,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        }
    },
    &quot;message&quot;: &quot;Admin&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admins--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admins--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admins--id-"></code></pre>
</span>
<span id="execution-error-GETapi-admins--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admins--id-"></code></pre>
</span>
<form id="form-GETapi-admins--id-" data-method="GET"
      data-path="api/admins/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admins--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admins--id-"
                    onclick="tryItOut('GETapi-admins--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admins--id-"
                    onclick="cancelTryOut('GETapi-admins--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admins--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admins/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-admins--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-admins--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-admins--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the admin.</p>
            </p>
                    </form>

            <h2 id="admin-management-PUTapi-admins--id-">Update admin account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-admins--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/admins/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "name=Gautier" \
    --form "phone=699999999" \
    --form "isSuperAdmin=true" \
    --form "_method=PUT" \
    --form "image_profil=@C:\Users\tchou\AppData\Local\Temp\php23E8.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admins/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('name', 'Gautier');
body.append('phone', '699999999');
body.append('isSuperAdmin', 'true');
body.append('_method', 'PUT');
body.append('image_profil', document.querySelector('input[name="image_profil"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/admins/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'Gautier'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'isSuperAdmin',
                'contents' =&gt; 'true'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'image_profil',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php23E8.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/admins/2'
files = {
  'image_profil': open('C:\Users\tchou\AppData\Local\Temp\php23E8.tmp', 'rb')
}
payload = {
    "name": "Gautier",
    "phone": 699999999,
    "isSuperAdmin": "true",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-admins--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;admin&quot;: {
            &quot;id&quot;: 2,
            &quot;isSuperAdmin&quot;: &quot;false&quot;,
            &quot;user_id&quot;: 3,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T00:33:24.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T00:58:14.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Gautier Admin +&quot;,
                &quot;email&quot;: &quot;tchoukouahaboris@gmail.com&quot;,
                &quot;email_verified_at&quot;: &quot;2022-08-31T00:34:14.000000Z&quot;,
                &quot;phone&quot;: &quot;699999992&quot;,
                &quot;fcm_token&quot;: null,
                &quot;image_profil&quot;: null,
                &quot;abonnement_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T00:33:18.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T00:56:43.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;admin&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 3,
                            &quot;role_id&quot;: 1,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-admins--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admins--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admins--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-admins--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admins--id-"></code></pre>
</span>
<form id="form-PUTapi-admins--id-" data-method="PUT"
      data-path="api/admins/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admins--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admins--id-"
                    onclick="tryItOut('PUTapi-admins--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admins--id-"
                    onclick="cancelTryOut('PUTapi-admins--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admins--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admins/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admins/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-admins--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-admins--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-admins--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the admin.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-admins--id-"
               value="Gautier"
               data-component="body" hidden>
    <br>
<p>the name of the user.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="PUTapi-admins--id-"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>The phone number of the user.</p>
        </p>
                <p>
            <b><code>isSuperAdmin</code></b>&nbsp;&nbsp;<small>bool.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="isSuperAdmin"
               data-endpoint="PUTapi-admins--id-"
               value="true"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image_profil</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="image_profil"
               data-endpoint="PUTapi-admins--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-admins--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="admin-management-DELETEapi-admins--id-">Delete admin account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-admins--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/admins/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admins/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/admins/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/admins/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admins--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-admins--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admins--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admins--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-admins--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admins--id-"></code></pre>
</span>
<form id="form-DELETEapi-admins--id-" data-method="DELETE"
      data-path="api/admins/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admins--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admins--id-"
                    onclick="tryItOut('DELETEapi-admins--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admins--id-"
                    onclick="cancelTryOut('DELETEapi-admins--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admins--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admins/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-admins--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-admins--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-admins--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the admin.</p>
            </p>
                    </form>

        <h1 id="building-management">Building management</h1>

    

            <h2 id="building-management-DELETEapi-batiments--id-">Delete Building.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-batiments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/batiments/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/batiments/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/batiments/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/batiments/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-batiments--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-batiments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-batiments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-batiments--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-batiments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-batiments--id-"></code></pre>
</span>
<form id="form-DELETEapi-batiments--id-" data-method="DELETE"
      data-path="api/batiments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-batiments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-batiments--id-"
                    onclick="tryItOut('DELETEapi-batiments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-batiments--id-"
                    onclick="cancelTryOut('DELETEapi-batiments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-batiments--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/batiments/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-batiments--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-batiments--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-batiments--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the building.</p>
            </p>
                    </form>

            <h2 id="building-management-GETapi-batiments">Get all Building.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-batiments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/batiments?user_id=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/batiments"
);

const params = {
    "user_id": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/batiments',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'user_id'=&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/batiments'
params = {
  'user_id': '10',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-batiments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;batiments&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;user_id&quot;: 1,
                &quot;nom&quot;: &quot;Sogefi Update&quot;,
                &quot;nombre_niveau&quot;: &quot;3&quot;,
                &quot;code&quot;: &quot;BATIMENT_MELEN_0569&quot;,
                &quot;longitude&quot;: &quot;13&quot;,
                &quot;latitude&quot;: &quot;7&quot;,
                &quot;image&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_MELEN_0569/1661907810_sparky-dash-high-five.gif&quot;,
                &quot;indication&quot;: &quot;Face Total&quot;,
                &quot;rue&quot;: &quot;Rue du Centre&quot;,
                &quot;ville&quot;: &quot;Douala&quot;,
                &quot;commune&quot;: &quot;Douala IV&quot;,
                &quot;quartier&quot;: &quot;Deido&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:03:30.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:07:08.000000Z&quot;,
                &quot;etablissements&quot;: []
            },
            {
                &quot;id&quot;: 3,
                &quot;user_id&quot;: 1,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;nombre_niveau&quot;: &quot;3&quot;,
                &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                &quot;longitude&quot;: &quot;11.229207&quot;,
                &quot;latitude&quot;: &quot;4.078288&quot;,
                &quot;image&quot;: null,
                &quot;indication&quot;: &quot;derrierre station&quot;,
                &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                &quot;ville&quot;: &quot;Douala&quot;,
                &quot;commune&quot;: &quot;Douala 3&quot;,
                &quot;quartier&quot;: &quot;Nyalla&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;etablissements&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                        &quot;batiment_id&quot;: 3,
                        &quot;indication_adresse&quot;: &quot;Face station&quot;,
                        &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                        &quot;site_internet&quot;: &quot;www.site.com&quot;,
                        &quot;nom_manager&quot;: &quot;Mical&quot;,
                        &quot;contact_manager&quot;: &quot;Mical&quot;,
                        &quot;user_id&quot;: 1,
                        &quot;etage&quot;: 1,
                        &quot;cover&quot;: null,
                        &quot;phone&quot;: &quot;699999999&quot;,
                        &quot;whatsapp1&quot;: &quot;699999999&quot;,
                        &quot;whatsapp2&quot;: &quot;699999998&quot;,
                        &quot;description&quot;: &quot;bel etablissement&quot;,
                        &quot;osm_id&quot;: null,
                        &quot;services&quot;: &quot;OM;MOMO&quot;,
                        &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                        &quot;vues&quot;: 0,
                        &quot;logo&quot;: null,
                        &quot;logo_map&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                        &quot;isFavoris&quot;: false,
                        &quot;moyenne&quot;: 4,
                        &quot;avis&quot;: 1,
                        &quot;count&quot;: [
                            {
                                &quot;count&quot;: 1,
                                &quot;rating&quot;: 4
                            }
                        ],
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Admin&quot;,
                            &quot;email&quot;: &quot;admin@position.cm&quot;,
                            &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;phone&quot;: &quot;699999999&quot;,
                            &quot;fcm_token&quot;: null,
                            &quot;image_profil&quot;: null,
                            &quot;abonnement_id&quot;: 1,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;abonnement&quot;: {
                                &quot;id&quot;: 1,
                                &quot;nom&quot;: &quot;free&quot;,
                                &quot;prix&quot;: 0,
                                &quot;type&quot;: &quot;year&quot;,
                                &quot;duree&quot;: 1,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                            }
                        },
                        &quot;sous_categories&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;nom&quot;: &quot;Boutiques&quot;,
                                &quot;categorie_id&quot;: 1,
                                &quot;logourl&quot;: null,
                                &quot;logourlmap&quot;: null,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                                &quot;pivot&quot;: {
                                    &quot;etablissement_id&quot;: 2,
                                    &quot;sous_categorie_id&quot;: 1
                                },
                                &quot;categorie&quot;: {
                                    &quot;id&quot;: 1,
                                    &quot;nom&quot;: &quot;Achats&quot;,
                                    &quot;shortname&quot;: &quot;Achats&quot;,
                                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                                    &quot;vues&quot;: 0,
                                    &quot;deleted_at&quot;: null,
                                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                                }
                            }
                        ],
                        &quot;commodites&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;nom&quot;: &quot;Wifi +&quot;,
                                &quot;type_commodite_id&quot;: 1,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                                &quot;pivot&quot;: {
                                    &quot;etablissement_id&quot;: 2,
                                    &quot;commodite_id&quot;: 1
                                }
                            }
                        ],
                        &quot;horaires&quot;: [
                            {
                                &quot;id&quot;: 3,
                                &quot;etablissement_id&quot;: 2,
                                &quot;jour&quot;: &quot;mardi&quot;,
                                &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                            },
                            {
                                &quot;id&quot;: 2,
                                &quot;etablissement_id&quot;: 2,
                                &quot;jour&quot;: &quot;lundi&quot;,
                                &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                            }
                        ],
                        &quot;images&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;etablissement_id&quot;: 2,
                                &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                            }
                        ],
                        &quot;commentaires&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;user_id&quot;: 1,
                                &quot;etablissement_id&quot;: 2,
                                &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                                &quot;rating&quot;: 4,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                                &quot;user&quot;: {
                                    &quot;id&quot;: 1,
                                    &quot;name&quot;: &quot;Admin&quot;,
                                    &quot;email&quot;: &quot;admin@position.cm&quot;,
                                    &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                                    &quot;phone&quot;: &quot;699999999&quot;,
                                    &quot;fcm_token&quot;: null,
                                    &quot;image_profil&quot;: null,
                                    &quot;abonnement_id&quot;: 1,
                                    &quot;deleted_at&quot;: null,
                                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                                }
                            }
                        ]
                    }
                ]
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Batiments&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-batiments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-batiments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-batiments"></code></pre>
</span>
<span id="execution-error-GETapi-batiments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-batiments"></code></pre>
</span>
<form id="form-GETapi-batiments" data-method="GET"
      data-path="api/batiments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-batiments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-batiments"
                    onclick="tryItOut('GETapi-batiments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-batiments"
                    onclick="cancelTryOut('GETapi-batiments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-batiments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/batiments</code></b>
        </p>
                <p>
            <label id="auth-GETapi-batiments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-batiments"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-batiments"
               value="10"
               data-component="query" hidden>
    <br>
<p>id of user conncted .</p>
            </p>
                </form>

            <h2 id="building-management-POSTapi-batiments">Add a new Building.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-batiments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/batiments" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nombre_niveau=3" \
    --form "code=BATIMENT_MELEN_0569" \
    --form "longitude=minus" \
    --form "latitude=velit" \
    --form "ville=Douala" \
    --form "commune=Yaounde IV" \
    --form "quartier=Melen" \
    --form "nom=Sogefi" \
    --form "indication=Rue de melen" \
    --form "rue=Rue de Melen" \
    --form "image=@C:\Users\tchou\AppData\Local\Temp\php2251.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/batiments"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nombre_niveau', '3');
body.append('code', 'BATIMENT_MELEN_0569');
body.append('longitude', 'minus');
body.append('latitude', 'velit');
body.append('ville', 'Douala');
body.append('commune', 'Yaounde IV');
body.append('quartier', 'Melen');
body.append('nom', 'Sogefi');
body.append('indication', 'Rue de melen');
body.append('rue', 'Rue de Melen');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/batiments',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nombre_niveau',
                'contents' =&gt; '3'
            ],
            [
                'name' =&gt; 'code',
                'contents' =&gt; 'BATIMENT_MELEN_0569'
            ],
            [
                'name' =&gt; 'longitude',
                'contents' =&gt; 'minus'
            ],
            [
                'name' =&gt; 'latitude',
                'contents' =&gt; 'velit'
            ],
            [
                'name' =&gt; 'ville',
                'contents' =&gt; 'Douala'
            ],
            [
                'name' =&gt; 'commune',
                'contents' =&gt; 'Yaounde IV'
            ],
            [
                'name' =&gt; 'quartier',
                'contents' =&gt; 'Melen'
            ],
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Sogefi'
            ],
            [
                'name' =&gt; 'indication',
                'contents' =&gt; 'Rue de melen'
            ],
            [
                'name' =&gt; 'rue',
                'contents' =&gt; 'Rue de Melen'
            ],
            [
                'name' =&gt; 'image',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2251.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/batiments'
files = {
  'image': open('C:\Users\tchou\AppData\Local\Temp\php2251.tmp', 'rb')
}
payload = {
    "nombre_niveau": 3,
    "code": "BATIMENT_MELEN_0569",
    "longitude": "minus",
    "latitude": "velit",
    "ville": "Douala",
    "commune": "Yaounde IV",
    "quartier": "Melen",
    "nom": "Sogefi",
    "indication": "Rue de melen",
    "rue": "Rue de Melen"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-batiments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;batiment&quot;: {
            &quot;nom&quot;: &quot;Sogefi&quot;,
            &quot;nombre_niveau&quot;: &quot;3&quot;,
            &quot;code&quot;: &quot;BATIMENT_MELEN_0569&quot;,
            &quot;longitude&quot;: &quot;13&quot;,
            &quot;latitude&quot;: &quot;7&quot;,
            &quot;indication&quot;: &quot;Face Total&quot;,
            &quot;rue&quot;: &quot;Rue du Centre&quot;,
            &quot;ville&quot;: &quot;Douala&quot;,
            &quot;commune&quot;: &quot;Douala IV&quot;,
            &quot;quartier&quot;: &quot;Deido&quot;,
            &quot;image&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_MELEN_0569/1661907810_sparky-dash-high-five.gif&quot;,
            &quot;user_id&quot;: 1,
            &quot;updated_at&quot;: &quot;2022-08-31T01:03:30.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T01:03:30.000000Z&quot;,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation du batiment reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-batiments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-batiments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-batiments"></code></pre>
</span>
<span id="execution-error-POSTapi-batiments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-batiments"></code></pre>
</span>
<form id="form-POSTapi-batiments" data-method="POST"
      data-path="api/batiments"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-batiments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-batiments"
                    onclick="tryItOut('POSTapi-batiments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-batiments"
                    onclick="cancelTryOut('POSTapi-batiments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-batiments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/batiments</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-batiments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-batiments"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nombre_niveau</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="nombre_niveau"
               data-endpoint="POSTapi-batiments"
               value="3"
               data-component="body" hidden>
    <br>
<p>the number of levels in the building.</p>
        </p>
                <p>
            <b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="code"
               data-endpoint="POSTapi-batiments"
               value="BATIMENT_MELEN_0569"
               data-component="body" hidden>
    <br>
<p>the building code.</p>
        </p>
                <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="longitude"
               data-endpoint="POSTapi-batiments"
               value="minus"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="latitude"
               data-endpoint="POSTapi-batiments"
               value="velit"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>ville</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="ville"
               data-endpoint="POSTapi-batiments"
               value="Douala"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>commune</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="commune"
               data-endpoint="POSTapi-batiments"
               value="Yaounde IV"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>quartier</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="quartier"
               data-endpoint="POSTapi-batiments"
               value="Melen"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-batiments"
               value="Sogefi"
               data-component="body" hidden>
    <br>
<p>the name of the Building.</p>
        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="image"
               data-endpoint="POSTapi-batiments"
               value=""
               data-component="body" hidden>
    <br>
<p>Building Image.</p>
        </p>
                <p>
            <b><code>indication</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="indication"
               data-endpoint="POSTapi-batiments"
               value="Rue de melen"
               data-component="body" hidden>
    <br>
<p>indication of the location of the building.</p>
        </p>
                <p>
            <b><code>rue</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="rue"
               data-endpoint="POSTapi-batiments"
               value="Rue de Melen"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="building-management-GETapi-batiments--id-">Show Building by id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-batiments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/batiments/2?user_id=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/batiments/2"
);

const params = {
    "user_id": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/batiments/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'user_id'=&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/batiments/2'
params = {
  'user_id': '10',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-batiments--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;batiment&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 1,
            &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
            &quot;nombre_niveau&quot;: &quot;3&quot;,
            &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
            &quot;longitude&quot;: &quot;11.229207&quot;,
            &quot;latitude&quot;: &quot;4.078288&quot;,
            &quot;image&quot;: null,
            &quot;indication&quot;: &quot;derrierre station&quot;,
            &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
            &quot;ville&quot;: &quot;Douala&quot;,
            &quot;commune&quot;: &quot;Douala 3&quot;,
            &quot;quartier&quot;: &quot;Nyalla&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;etablissements&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                    &quot;batiment_id&quot;: 3,
                    &quot;indication_adresse&quot;: &quot;Face station&quot;,
                    &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                    &quot;site_internet&quot;: &quot;www.site.com&quot;,
                    &quot;nom_manager&quot;: &quot;Mical&quot;,
                    &quot;contact_manager&quot;: &quot;Mical&quot;,
                    &quot;user_id&quot;: 1,
                    &quot;etage&quot;: 1,
                    &quot;cover&quot;: null,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;whatsapp1&quot;: &quot;699999999&quot;,
                    &quot;whatsapp2&quot;: &quot;699999998&quot;,
                    &quot;description&quot;: &quot;bel etablissement&quot;,
                    &quot;osm_id&quot;: null,
                    &quot;services&quot;: &quot;OM;MOMO&quot;,
                    &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                    &quot;vues&quot;: 0,
                    &quot;logo&quot;: null,
                    &quot;logo_map&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;isFavoris&quot;: false,
                    &quot;moyenne&quot;: 4,
                    &quot;avis&quot;: 1,
                    &quot;count&quot;: [
                        {
                            &quot;count&quot;: 1,
                            &quot;rating&quot;: 4
                        }
                    ],
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Admin&quot;,
                        &quot;email&quot;: &quot;admin@position.cm&quot;,
                        &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;phone&quot;: &quot;699999999&quot;,
                        &quot;fcm_token&quot;: null,
                        &quot;image_profil&quot;: null,
                        &quot;abonnement_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;abonnement&quot;: {
                            &quot;id&quot;: 1,
                            &quot;nom&quot;: &quot;free&quot;,
                            &quot;prix&quot;: 0,
                            &quot;type&quot;: &quot;year&quot;,
                            &quot;duree&quot;: 1,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                        }
                    },
                    &quot;sous_categories&quot;: [
                        {
                            &quot;id&quot;: 1,
                            &quot;nom&quot;: &quot;Boutiques&quot;,
                            &quot;categorie_id&quot;: 1,
                            &quot;logourl&quot;: null,
                            &quot;logourlmap&quot;: null,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                            &quot;pivot&quot;: {
                                &quot;etablissement_id&quot;: 2,
                                &quot;sous_categorie_id&quot;: 1
                            },
                            &quot;categorie&quot;: {
                                &quot;id&quot;: 1,
                                &quot;nom&quot;: &quot;Achats&quot;,
                                &quot;shortname&quot;: &quot;Achats&quot;,
                                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                                &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                                &quot;vues&quot;: 0,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                            }
                        }
                    ],
                    &quot;commodites&quot;: [
                        {
                            &quot;id&quot;: 1,
                            &quot;nom&quot;: &quot;Wifi +&quot;,
                            &quot;type_commodite_id&quot;: 1,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                            &quot;pivot&quot;: {
                                &quot;etablissement_id&quot;: 2,
                                &quot;commodite_id&quot;: 1
                            }
                        }
                    ],
                    &quot;horaires&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;etablissement_id&quot;: 2,
                            &quot;jour&quot;: &quot;mardi&quot;,
                            &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                        },
                        {
                            &quot;id&quot;: 2,
                            &quot;etablissement_id&quot;: 2,
                            &quot;jour&quot;: &quot;lundi&quot;,
                            &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                        }
                    ],
                    &quot;images&quot;: [
                        {
                            &quot;id&quot;: 1,
                            &quot;etablissement_id&quot;: 2,
                            &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                        }
                    ],
                    &quot;commentaires&quot;: [
                        {
                            &quot;id&quot;: 1,
                            &quot;user_id&quot;: 1,
                            &quot;etablissement_id&quot;: 2,
                            &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                            &quot;rating&quot;: 4,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                            &quot;user&quot;: {
                                &quot;id&quot;: 1,
                                &quot;name&quot;: &quot;Admin&quot;,
                                &quot;email&quot;: &quot;admin@position.cm&quot;,
                                &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                                &quot;phone&quot;: &quot;699999999&quot;,
                                &quot;fcm_token&quot;: null,
                                &quot;image_profil&quot;: null,
                                &quot;abonnement_id&quot;: 1,
                                &quot;deleted_at&quot;: null,
                                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                            }
                        }
                    ]
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Batiment&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-batiments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-batiments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-batiments--id-"></code></pre>
</span>
<span id="execution-error-GETapi-batiments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-batiments--id-"></code></pre>
</span>
<form id="form-GETapi-batiments--id-" data-method="GET"
      data-path="api/batiments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-batiments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-batiments--id-"
                    onclick="tryItOut('GETapi-batiments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-batiments--id-"
                    onclick="cancelTryOut('GETapi-batiments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-batiments--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/batiments/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-batiments--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-batiments--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-batiments--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the building.</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-batiments--id-"
               value="10"
               data-component="query" hidden>
    <br>
<p>id of user conncted .</p>
            </p>
                </form>

            <h2 id="building-management-PUTapi-batiments--id-">Update Building.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-batiments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/batiments/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Sogefi" \
    --form "nombre_niveau=3" \
    --form "longitude=laboriosam" \
    --form "latitude=maxime" \
    --form "indication=Rue de melen" \
    --form "rue=Rue de Melen" \
    --form "ville=Douala" \
    --form "quartier=Melen" \
    --form "commune=Yaounde IV" \
    --form "_method=PUT" \
    --form "image=@C:\Users\tchou\AppData\Local\Temp\php2263.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/batiments/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Sogefi');
body.append('nombre_niveau', '3');
body.append('longitude', 'laboriosam');
body.append('latitude', 'maxime');
body.append('indication', 'Rue de melen');
body.append('rue', 'Rue de Melen');
body.append('ville', 'Douala');
body.append('quartier', 'Melen');
body.append('commune', 'Yaounde IV');
body.append('_method', 'PUT');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/batiments/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Sogefi'
            ],
            [
                'name' =&gt; 'nombre_niveau',
                'contents' =&gt; '3'
            ],
            [
                'name' =&gt; 'longitude',
                'contents' =&gt; 'laboriosam'
            ],
            [
                'name' =&gt; 'latitude',
                'contents' =&gt; 'maxime'
            ],
            [
                'name' =&gt; 'indication',
                'contents' =&gt; 'Rue de melen'
            ],
            [
                'name' =&gt; 'rue',
                'contents' =&gt; 'Rue de Melen'
            ],
            [
                'name' =&gt; 'ville',
                'contents' =&gt; 'Douala'
            ],
            [
                'name' =&gt; 'quartier',
                'contents' =&gt; 'Melen'
            ],
            [
                'name' =&gt; 'commune',
                'contents' =&gt; 'Yaounde IV'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'image',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2263.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/batiments/2'
files = {
  'image': open('C:\Users\tchou\AppData\Local\Temp\php2263.tmp', 'rb')
}
payload = {
    "nom": "Sogefi",
    "nombre_niveau": 3,
    "longitude": "laboriosam",
    "latitude": "maxime",
    "indication": "Rue de melen",
    "rue": "Rue de Melen",
    "ville": "Douala",
    "quartier": "Melen",
    "commune": "Yaounde IV",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-batiments--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;batiment&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;nom&quot;: &quot;Sogefi Update&quot;,
            &quot;nombre_niveau&quot;: &quot;3&quot;,
            &quot;code&quot;: &quot;BATIMENT_MELEN_0569&quot;,
            &quot;longitude&quot;: &quot;13&quot;,
            &quot;latitude&quot;: &quot;7&quot;,
            &quot;image&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_MELEN_0569/1661907810_sparky-dash-high-five.gif&quot;,
            &quot;indication&quot;: &quot;Face Total&quot;,
            &quot;rue&quot;: &quot;Rue du Centre&quot;,
            &quot;ville&quot;: &quot;Douala&quot;,
            &quot;commune&quot;: &quot;Douala IV&quot;,
            &quot;quartier&quot;: &quot;Deido&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:03:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:07:08.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-batiments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-batiments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-batiments--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-batiments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-batiments--id-"></code></pre>
</span>
<form id="form-PUTapi-batiments--id-" data-method="PUT"
      data-path="api/batiments/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-batiments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-batiments--id-"
                    onclick="tryItOut('PUTapi-batiments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-batiments--id-"
                    onclick="cancelTryOut('PUTapi-batiments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-batiments--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/batiments/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/batiments/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-batiments--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-batiments--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-batiments--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the building.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-batiments--id-"
               value="Sogefi"
               data-component="body" hidden>
    <br>
<p>the name of the Building.</p>
        </p>
                <p>
            <b><code>nombre_niveau</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="nombre_niveau"
               data-endpoint="PUTapi-batiments--id-"
               value="3"
               data-component="body" hidden>
    <br>
<p>the number of levels in the building.</p>
        </p>
                <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="longitude"
               data-endpoint="PUTapi-batiments--id-"
               value="laboriosam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="latitude"
               data-endpoint="PUTapi-batiments--id-"
               value="maxime"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="image"
               data-endpoint="PUTapi-batiments--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>Building Image.</p>
        </p>
                <p>
            <b><code>indication</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="indication"
               data-endpoint="PUTapi-batiments--id-"
               value="Rue de melen"
               data-component="body" hidden>
    <br>
<p>indication of the location of the building.</p>
        </p>
                <p>
            <b><code>rue</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="rue"
               data-endpoint="PUTapi-batiments--id-"
               value="Rue de Melen"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>ville</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="ville"
               data-endpoint="PUTapi-batiments--id-"
               value="Douala"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>quartier</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="quartier"
               data-endpoint="PUTapi-batiments--id-"
               value="Melen"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>commune</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="commune"
               data-endpoint="PUTapi-batiments--id-"
               value="Yaounde IV"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-batiments--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="building-management-POSTapi-add-batiments">Add Complet Batiment Process.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-add-batiments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/add/batiments" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"batiment\": \"nam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/add/batiments"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "batiment": "nam"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/add/batiments',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'batiment' =&gt; 'nam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/add/batiments'
payload = {
    "batiment": "nam"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-add-batiments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;batiment&quot;: {
            &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
            &quot;nombre_niveau&quot;: &quot;3&quot;,
            &quot;longitude&quot;: &quot;11.229207&quot;,
            &quot;latitude&quot;: &quot;4.078288&quot;,
            &quot;indication&quot;: &quot;derrierre station&quot;,
            &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
            &quot;ville&quot;: &quot;Douala&quot;,
            &quot;commune&quot;: &quot;Douala 3&quot;,
            &quot;quartier&quot;: &quot;Nyalla&quot;,
            &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
            &quot;user_id&quot;: 1,
            &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;id&quot;: 3,
            &quot;etablissement&quot;: {
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;indication_adresse&quot;: &quot;Face station&quot;,
                &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                &quot;site_internet&quot;: &quot;www.site.com&quot;,
                &quot;user_id&quot;: 1,
                &quot;etage&quot;: &quot;1&quot;,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;whatsapp1&quot;: &quot;699999999&quot;,
                &quot;whatsapp2&quot;: &quot;699999998&quot;,
                &quot;description&quot;: &quot;bel etablissement&quot;,
                &quot;nom_manager&quot;: &quot;Mical&quot;,
                &quot;contact_manager&quot;: &quot;Mical&quot;,
                &quot;services&quot;: &quot;OM;MOMO&quot;,
                &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                &quot;batiment_id&quot;: 3,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;id&quot;: 2
            }
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation des batiments reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-add-batiments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-add-batiments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-add-batiments"></code></pre>
</span>
<span id="execution-error-POSTapi-add-batiments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-add-batiments"></code></pre>
</span>
<form id="form-POSTapi-add-batiments" data-method="POST"
      data-path="api/add/batiments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-add-batiments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-add-batiments"
                    onclick="tryItOut('POSTapi-add-batiments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-add-batiments"
                    onclick="cancelTryOut('POSTapi-add-batiments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-add-batiments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/add/batiments</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-add-batiments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-add-batiments"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>batiment</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="batiment"
               data-endpoint="POSTapi-add-batiments"
               value="nam"
               data-component="body" hidden>
    <br>
<p>example in  storage/responses/batiment.json</p>
        </p>
        </form>

        <h1 id="category-management">Category management</h1>

    <p>APIs for managing Category</p>

            <h2 id="category-management-GETapi-categories">Get all Category.</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/categories',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/categories'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;Administrations&quot;,
                &quot;shortname&quot;: &quot;Administration&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-administration.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-administration.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 23,
                        &quot;nom&quot;: &quot;Administrations&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 24,
                        &quot;nom&quot;: &quot;Ambassades et Consulats&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 25,
                        &quot;nom&quot;: &quot;Associations, syndicats&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 26,
                        &quot;nom&quot;: &quot;Douane, Agences&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 27,
                        &quot;nom&quot;: &quot;Minis&egrave;res&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 28,
                        &quot;nom&quot;: &quot;O.N.G &amp; Organisations Internationales&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 29,
                        &quot;nom&quot;: &quot;Offices Nationaux&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 30,
                        &quot;nom&quot;: &quot;Poste&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 31,
                        &quot;nom&quot;: &quot;S&eacute;curit&eacute; Sociale&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 32,
                        &quot;nom&quot;: &quot;Institution publique&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 3,
                &quot;nom&quot;: &quot;Agriculture&quot;,
                &quot;shortname&quot;: &quot;Agriculture&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-agriculture.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-agriculture.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 33,
                        &quot;nom&quot;: &quot;Mat&eacute;riels et Produits agricoles&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 34,
                        &quot;nom&quot;: &quot;Agricole, Produits Chimiques&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 35,
                        &quot;nom&quot;: &quot;Agriculture&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 36,
                        &quot;nom&quot;: &quot;Equipements et Mat&eacute;riel agricoles&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 37,
                        &quot;nom&quot;: &quot;Agro-Alimentaire&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 38,
                        &quot;nom&quot;: &quot;Agro-Industrie&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 39,
                        &quot;nom&quot;: &quot;Elevage&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 40,
                        &quot;nom&quot;: &quot;Elevage - Consultants&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Achats&quot;,
                &quot;shortname&quot;: &quot;Achats&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Boutiques&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;nom&quot;: &quot;Brocante&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 3,
                        &quot;nom&quot;: &quot;Supermarch&eacute;&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;nom&quot;: &quot;Epicerie&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 5,
                        &quot;nom&quot;: &quot;Blanchisseries et Pressings&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;nom&quot;: &quot;Centre Commercial&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 7,
                        &quot;nom&quot;: &quot;Maison et Jardin&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;nom&quot;: &quot;Hifi, t&eacute;l&eacute;phonie&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 9,
                        &quot;nom&quot;: &quot;Fleuriste&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 10,
                        &quot;nom&quot;: &quot;Boulangerie, P&acirc;tisserie&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 11,
                        &quot;nom&quot;: &quot;Caviste&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 12,
                        &quot;nom&quot;: &quot;Tabac&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 13,
                        &quot;nom&quot;: &quot;Jouets et jeux&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 14,
                        &quot;nom&quot;: &quot;Magasin de sport&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 15,
                        &quot;nom&quot;: &quot;Ameublement et Mobilier&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 16,
                        &quot;nom&quot;: &quot;Fournitures de Bureaux&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 17,
                        &quot;nom&quot;: &quot;Mobilier de Bureaux&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 18,
                        &quot;nom&quot;: &quot;Mobilier de Jardin&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 19,
                        &quot;nom&quot;: &quot;V&ecirc;tements&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 20,
                        &quot;nom&quot;: &quot;Chaussures&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 21,
                        &quot;nom&quot;: &quot;Bijoux et accessoires&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 22,
                        &quot;nom&quot;: &quot;Pu&eacute;riculture&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                ]
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Categories&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories"></code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                    </form>

            <h2 id="category-management-GETapi-categories--id-">Show Category by id.</h2>

<p>
</p>



<span id="example-requests-GETapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/categories/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/categories/2',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/categories/2'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-categories--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categorie&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Administrations&quot;,
            &quot;shortname&quot;: &quot;Administration&quot;,
            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-administration.svg&quot;,
            &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-administration.svg&quot;,
            &quot;vues&quot;: 0,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;sous_categories&quot;: [
                {
                    &quot;id&quot;: 23,
                    &quot;nom&quot;: &quot;Administrations&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 24,
                    &quot;nom&quot;: &quot;Ambassades et Consulats&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 25,
                    &quot;nom&quot;: &quot;Associations, syndicats&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 26,
                    &quot;nom&quot;: &quot;Douane, Agences&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 27,
                    &quot;nom&quot;: &quot;Minis&egrave;res&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 28,
                    &quot;nom&quot;: &quot;O.N.G &amp; Organisations Internationales&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 29,
                    &quot;nom&quot;: &quot;Offices Nationaux&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 30,
                    &quot;nom&quot;: &quot;Poste&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 31,
                    &quot;nom&quot;: &quot;S&eacute;curit&eacute; Sociale&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                },
                {
                    &quot;id&quot;: 32,
                    &quot;nom&quot;: &quot;Institution publique&quot;,
                    &quot;categorie_id&quot;: 2,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Categorie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--id-"></code></pre>
</span>
<span id="execution-error-GETapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--id-"></code></pre>
</span>
<form id="form-GETapi-categories--id-" data-method="GET"
      data-path="api/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories--id-"
                    onclick="tryItOut('GETapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories--id-"
                    onclick="cancelTryOut('GETapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-categories--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the category.</p>
            </p>
                    </form>

            <h2 id="category-management-POSTapi-categories">Add a new Category.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Achat" \
    --form "shortname=aliquam" \
    --form "logourl=@C:\Users\tchou\AppData\Local\Temp\php2418.tmp" \
    --form "logourlmap=@C:\Users\tchou\AppData\Local\Temp\php2419.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Achat');
body.append('shortname', 'aliquam');
body.append('logourl', document.querySelector('input[name="logourl"]').files[0]);
body.append('logourlmap', document.querySelector('input[name="logourlmap"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/categories',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Achat'
            ],
            [
                'name' =&gt; 'shortname',
                'contents' =&gt; 'aliquam'
            ],
            [
                'name' =&gt; 'logourl',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2418.tmp', 'r')
            ],
            [
                'name' =&gt; 'logourlmap',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2419.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/categories'
files = {
  'logourl': open('C:\Users\tchou\AppData\Local\Temp\php2418.tmp', 'rb'),
  'logourlmap': open('C:\Users\tchou\AppData\Local\Temp\php2419.tmp', 'rb')
}
payload = {
    "nom": "Achat",
    "shortname": "aliquam"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categorie&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Administrations&quot;,
            &quot;shortname&quot;: &quot;Administration&quot;,
            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-administration.svg&quot;,
            &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-administration.svg&quot;,
            &quot;vues&quot;: 0,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de la cat&eacute;gorie reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categories"></code></pre>
</span>
<span id="execution-error-POSTapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categories"></code></pre>
</span>
<form id="form-POSTapi-categories" data-method="POST"
      data-path="api/categories"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-categories"
                    onclick="tryItOut('POSTapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-categories"
                    onclick="cancelTryOut('POSTapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-categories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categories</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-categories" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-categories"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-categories"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name of the category.</p>
        </p>
                <p>
            <b><code>shortname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shortname"
               data-endpoint="POSTapi-categories"
               value="aliquam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>logourl</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourl"
               data-endpoint="POSTapi-categories"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the category</p>
        </p>
                <p>
            <b><code>logourlmap</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourlmap"
               data-endpoint="POSTapi-categories"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the category</p>
        </p>
        </form>

            <h2 id="category-management-PUTapi-categories--id-">Update Category.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/categories/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Achat" \
    --form "vues=true" \
    --form "_method=PUT" \
    --form "logourl=@C:\Users\tchou\AppData\Local\Temp\php20B8.tmp" \
    --form "logourlmap=@C:\Users\tchou\AppData\Local\Temp\php20B9.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Achat');
body.append('vues', 'true');
body.append('_method', 'PUT');
body.append('logourl', document.querySelector('input[name="logourl"]').files[0]);
body.append('logourlmap', document.querySelector('input[name="logourlmap"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/categories/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Achat'
            ],
            [
                'name' =&gt; 'vues',
                'contents' =&gt; 'true'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'logourl',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php20B8.tmp', 'r')
            ],
            [
                'name' =&gt; 'logourlmap',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php20B9.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/categories/2'
files = {
  'logourl': open('C:\Users\tchou\AppData\Local\Temp\php20B8.tmp', 'rb'),
  'logourlmap': open('C:\Users\tchou\AppData\Local\Temp\php20B9.tmp', 'rb')
}
payload = {
    "nom": "Achat",
    "vues": "true",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-categories--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categorie&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Administrations&quot;,
            &quot;shortname&quot;: &quot;Administration&quot;,
            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-administration.svg&quot;,
            &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-administration.svg&quot;,
            &quot;vues&quot;: 0,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-categories--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-categories--id-"></code></pre>
</span>
<form id="form-PUTapi-categories--id-" data-method="PUT"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-categories--id-"
                    onclick="tryItOut('PUTapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-categories--id-"
                    onclick="cancelTryOut('PUTapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-categories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-categories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-categories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-categories--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the category.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-categories--id-"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name of the category.</p>
        </p>
                <p>
            <b><code>vues</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="vues"
               data-endpoint="PUTapi-categories--id-"
               value="true"
               data-component="body" hidden>
    <br>
<p>count view.</p>
        </p>
                <p>
            <b><code>logourl</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourl"
               data-endpoint="PUTapi-categories--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the category</p>
        </p>
                <p>
            <b><code>logourlmap</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourlmap"
               data-endpoint="PUTapi-categories--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the category</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-categories--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="category-management-DELETEapi-categories--id-">Delete Category.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/categories/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/categories/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/categories/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-categories--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categories--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categories--id-"></code></pre>
</span>
<form id="form-DELETEapi-categories--id-" data-method="DELETE"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-categories--id-"
                    onclick="tryItOut('DELETEapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-categories--id-"
                    onclick="cancelTryOut('DELETEapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-categories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-categories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-categories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-categories--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the category.</p>
            </p>
                    </form>

            <h2 id="category-management-GETapi-search-categories">Search Category.</h2>

<p>
</p>



<span id="example-requests-GETapi-search-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/search/categories?q=piscine" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/search/categories"
);

const params = {
    "q": "piscine",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/search/categories',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'q'=&gt; 'piscine',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/search/categories'
params = {
  'q': 'piscine',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-search-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;Administrations&quot;,
                &quot;shortname&quot;: &quot;Administration&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-administration.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-administration.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 23,
                        &quot;nom&quot;: &quot;Administrations&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 24,
                        &quot;nom&quot;: &quot;Ambassades et Consulats&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 25,
                        &quot;nom&quot;: &quot;Associations, syndicats&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 26,
                        &quot;nom&quot;: &quot;Douane, Agences&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 27,
                        &quot;nom&quot;: &quot;Minis&egrave;res&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 28,
                        &quot;nom&quot;: &quot;O.N.G &amp; Organisations Internationales&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 29,
                        &quot;nom&quot;: &quot;Offices Nationaux&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 30,
                        &quot;nom&quot;: &quot;Poste&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 31,
                        &quot;nom&quot;: &quot;S&eacute;curit&eacute; Sociale&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 32,
                        &quot;nom&quot;: &quot;Institution publique&quot;,
                        &quot;categorie_id&quot;: 2,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 3,
                &quot;nom&quot;: &quot;Agriculture&quot;,
                &quot;shortname&quot;: &quot;Agriculture&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-agriculture.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-agriculture.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 33,
                        &quot;nom&quot;: &quot;Mat&eacute;riels et Produits agricoles&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 34,
                        &quot;nom&quot;: &quot;Agricole, Produits Chimiques&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 35,
                        &quot;nom&quot;: &quot;Agriculture&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 36,
                        &quot;nom&quot;: &quot;Equipements et Mat&eacute;riel agricoles&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 37,
                        &quot;nom&quot;: &quot;Agro-Alimentaire&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 38,
                        &quot;nom&quot;: &quot;Agro-Industrie&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 39,
                        &quot;nom&quot;: &quot;Elevage&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 40,
                        &quot;nom&quot;: &quot;Elevage - Consultants&quot;,
                        &quot;categorie_id&quot;: 3,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Achats&quot;,
                &quot;shortname&quot;: &quot;Achats&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Boutiques&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;nom&quot;: &quot;Brocante&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 3,
                        &quot;nom&quot;: &quot;Supermarch&eacute;&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;nom&quot;: &quot;Epicerie&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 5,
                        &quot;nom&quot;: &quot;Blanchisseries et Pressings&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;nom&quot;: &quot;Centre Commercial&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 7,
                        &quot;nom&quot;: &quot;Maison et Jardin&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;nom&quot;: &quot;Hifi, t&eacute;l&eacute;phonie&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 9,
                        &quot;nom&quot;: &quot;Fleuriste&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 10,
                        &quot;nom&quot;: &quot;Boulangerie, P&acirc;tisserie&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 11,
                        &quot;nom&quot;: &quot;Caviste&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 12,
                        &quot;nom&quot;: &quot;Tabac&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 13,
                        &quot;nom&quot;: &quot;Jouets et jeux&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 14,
                        &quot;nom&quot;: &quot;Magasin de sport&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 15,
                        &quot;nom&quot;: &quot;Ameublement et Mobilier&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 16,
                        &quot;nom&quot;: &quot;Fournitures de Bureaux&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 17,
                        &quot;nom&quot;: &quot;Mobilier de Bureaux&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 18,
                        &quot;nom&quot;: &quot;Mobilier de Jardin&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 19,
                        &quot;nom&quot;: &quot;V&ecirc;tements&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 20,
                        &quot;nom&quot;: &quot;Chaussures&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 21,
                        &quot;nom&quot;: &quot;Bijoux et accessoires&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 22,
                        &quot;nom&quot;: &quot;Pu&eacute;riculture&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                ]
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Categories&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-search-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-search-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-search-categories"></code></pre>
</span>
<span id="execution-error-GETapi-search-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-search-categories"></code></pre>
</span>
<form id="form-GETapi-search-categories" data-method="GET"
      data-path="api/search/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-search-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-search-categories"
                    onclick="tryItOut('GETapi-search-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-search-categories"
                    onclick="cancelTryOut('GETapi-search-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-search-categories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/search/categories</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>q</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="q"
               data-endpoint="GETapi-search-categories"
               value="piscine"
               data-component="query" hidden>
    <br>
<p>search value.</p>
            </p>
                </form>

        <h1 id="comment-management">Comment management</h1>

    

            <h2 id="comment-management-GETapi-commentaires">Get all Comment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-commentaires">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/commentaires" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commentaires"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commentaires',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commentaires'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-commentaires">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commentaires&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;user_id&quot;: 1,
                &quot;etablissement_id&quot;: 2,
                &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                &quot;rating&quot;: 4,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                &quot;etablissement&quot;: {
                    &quot;id&quot;: 2,
                    &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                    &quot;batiment_id&quot;: 3,
                    &quot;indication_adresse&quot;: &quot;Face station&quot;,
                    &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                    &quot;site_internet&quot;: &quot;www.site.com&quot;,
                    &quot;nom_manager&quot;: &quot;Mical&quot;,
                    &quot;contact_manager&quot;: &quot;Mical&quot;,
                    &quot;user_id&quot;: 1,
                    &quot;etage&quot;: 1,
                    &quot;cover&quot;: null,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;whatsapp1&quot;: &quot;699999999&quot;,
                    &quot;whatsapp2&quot;: &quot;699999998&quot;,
                    &quot;description&quot;: &quot;bel etablissement&quot;,
                    &quot;osm_id&quot;: null,
                    &quot;services&quot;: &quot;OM;MOMO&quot;,
                    &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                    &quot;vues&quot;: 0,
                    &quot;logo&quot;: null,
                    &quot;logo_map&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
                },
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin&quot;,
                    &quot;email&quot;: &quot;admin@position.cm&quot;,
                    &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;fcm_token&quot;: null,
                    &quot;image_profil&quot;: null,
                    &quot;abonnement_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Commentaires&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-commentaires" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-commentaires"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commentaires"></code></pre>
</span>
<span id="execution-error-GETapi-commentaires" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commentaires"></code></pre>
</span>
<form id="form-GETapi-commentaires" data-method="GET"
      data-path="api/commentaires"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-commentaires', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-commentaires"
                    onclick="tryItOut('GETapi-commentaires');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-commentaires"
                    onclick="cancelTryOut('GETapi-commentaires');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-commentaires" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/commentaires</code></b>
        </p>
                <p>
            <label id="auth-GETapi-commentaires" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-commentaires"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="comment-management-POSTapi-commentaires">Add a new Comment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-commentaires">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/commentaires" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"etablissement_id\": 2,
    \"commentaire\": \"J\'aime ce lieu\",
    \"rating\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commentaires"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "etablissement_id": 2,
    "commentaire": "J'aime ce lieu",
    "rating": 3
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/commentaires',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'etablissement_id' =&gt; 2,
            'commentaire' =&gt; 'J\'aime ce lieu',
            'rating' =&gt; 3,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commentaires'
payload = {
    "etablissement_id": 2,
    "commentaire": "J'aime ce lieu",
    "rating": 3
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-commentaires">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commentaire&quot;: {
            &quot;user_id&quot;: 1,
            &quot;etablissement_id&quot;: 2,
            &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
            &quot;rating&quot;: 3,
            &quot;updated_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation du commentaire reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-commentaires" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-commentaires"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-commentaires"></code></pre>
</span>
<span id="execution-error-POSTapi-commentaires" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-commentaires"></code></pre>
</span>
<form id="form-POSTapi-commentaires" data-method="POST"
      data-path="api/commentaires"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-commentaires', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-commentaires"
                    onclick="tryItOut('POSTapi-commentaires');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-commentaires"
                    onclick="cancelTryOut('POSTapi-commentaires');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-commentaires" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/commentaires</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-commentaires" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-commentaires"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>etablissement_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etablissement_id"
               data-endpoint="POSTapi-commentaires"
               value="2"
               data-component="body" hidden>
    <br>
<p>the id of the Establishment.</p>
        </p>
                <p>
            <b><code>commentaire</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="commentaire"
               data-endpoint="POSTapi-commentaires"
               value="J'aime ce lieu"
               data-component="body" hidden>
    <br>
<p>user comment.</p>
        </p>
                <p>
            <b><code>rating</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="rating"
               data-endpoint="POSTapi-commentaires"
               value="3"
               data-component="body" hidden>
    <br>
<p>rating.</p>
        </p>
        </form>

            <h2 id="comment-management-GETapi-commentaires--id-">Show Comment by id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-commentaires--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/commentaires/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commentaires/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commentaires/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commentaires/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-commentaires--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commentaire&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;etablissement_id&quot;: 2,
            &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
            &quot;rating&quot;: 4,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
            &quot;etablissement&quot;: {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;batiment_id&quot;: 3,
                &quot;indication_adresse&quot;: &quot;Face station&quot;,
                &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                &quot;site_internet&quot;: &quot;www.site.com&quot;,
                &quot;nom_manager&quot;: &quot;Mical&quot;,
                &quot;contact_manager&quot;: &quot;Mical&quot;,
                &quot;user_id&quot;: 1,
                &quot;etage&quot;: 1,
                &quot;cover&quot;: null,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;whatsapp1&quot;: &quot;699999999&quot;,
                &quot;whatsapp2&quot;: &quot;699999998&quot;,
                &quot;description&quot;: &quot;bel etablissement&quot;,
                &quot;osm_id&quot;: null,
                &quot;services&quot;: &quot;OM;MOMO&quot;,
                &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                &quot;vues&quot;: 0,
                &quot;logo&quot;: null,
                &quot;logo_map&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
            },
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@position.cm&quot;,
                &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;fcm_token&quot;: null,
                &quot;image_profil&quot;: null,
                &quot;abonnement_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;Commentaire&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-commentaires--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-commentaires--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commentaires--id-"></code></pre>
</span>
<span id="execution-error-GETapi-commentaires--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commentaires--id-"></code></pre>
</span>
<form id="form-GETapi-commentaires--id-" data-method="GET"
      data-path="api/commentaires/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-commentaires--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-commentaires--id-"
                    onclick="tryItOut('GETapi-commentaires--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-commentaires--id-"
                    onclick="cancelTryOut('GETapi-commentaires--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-commentaires--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/commentaires/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-commentaires--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-commentaires--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-commentaires--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the comment.</p>
            </p>
                    </form>

            <h2 id="comment-management-PUTapi-commentaires--id-">Update Comment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-commentaires--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/commentaires/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"commentaire\": \"J\'aime ce lieu\",
    \"rating\": 3,
    \"_method\": \"PUT\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commentaires/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "commentaire": "J'aime ce lieu",
    "rating": 3,
    "_method": "PUT"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/commentaires/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'commentaire' =&gt; 'J\'aime ce lieu',
            'rating' =&gt; 3,
            '_method' =&gt; 'PUT',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commentaires/2'
payload = {
    "commentaire": "J'aime ce lieu",
    "rating": 3,
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-commentaires--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commentaire&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;etablissement_id&quot;: 2,
            &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
            &quot;rating&quot;: 4,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-commentaires--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-commentaires--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-commentaires--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-commentaires--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-commentaires--id-"></code></pre>
</span>
<form id="form-PUTapi-commentaires--id-" data-method="PUT"
      data-path="api/commentaires/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-commentaires--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-commentaires--id-"
                    onclick="tryItOut('PUTapi-commentaires--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-commentaires--id-"
                    onclick="cancelTryOut('PUTapi-commentaires--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-commentaires--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/commentaires/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/commentaires/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-commentaires--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-commentaires--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-commentaires--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the comment.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>commentaire</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="commentaire"
               data-endpoint="PUTapi-commentaires--id-"
               value="J'aime ce lieu"
               data-component="body" hidden>
    <br>
<p>user comment.</p>
        </p>
                <p>
            <b><code>rating</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="rating"
               data-endpoint="PUTapi-commentaires--id-"
               value="3"
               data-component="body" hidden>
    <br>
<p>rating.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-commentaires--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="comment-management-DELETEapi-commentaires--id-">Delete Comment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-commentaires--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/commentaires/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commentaires/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/commentaires/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commentaires/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-commentaires--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-commentaires--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-commentaires--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-commentaires--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-commentaires--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-commentaires--id-"></code></pre>
</span>
<form id="form-DELETEapi-commentaires--id-" data-method="DELETE"
      data-path="api/commentaires/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-commentaires--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-commentaires--id-"
                    onclick="tryItOut('DELETEapi-commentaires--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-commentaires--id-"
                    onclick="cancelTryOut('DELETEapi-commentaires--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-commentaires--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/commentaires/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-commentaires--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-commentaires--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-commentaires--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the comment.</p>
            </p>
                    </form>

        <h1 id="commodites-management">Commodites management</h1>

    <p>APIs for managing Commodite</p>

            <h2 id="commodites-management-GETapi-commodites">Get all Commodites.</h2>

<p>
</p>



<span id="example-requests-GETapi-commodites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/commodites" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commodites"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commodites',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commodites'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-commodites">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commodites&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Wifi&quot;,
                &quot;type_commodite_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                &quot;type_commodite&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Commodites&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-commodites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-commodites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commodites"></code></pre>
</span>
<span id="execution-error-GETapi-commodites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commodites"></code></pre>
</span>
<form id="form-GETapi-commodites" data-method="GET"
      data-path="api/commodites"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-commodites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-commodites"
                    onclick="tryItOut('GETapi-commodites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-commodites"
                    onclick="cancelTryOut('GETapi-commodites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-commodites" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/commodites</code></b>
        </p>
                    </form>

            <h2 id="commodites-management-GETapi-commodites--id-">Show Commodite by id.</h2>

<p>
</p>



<span id="example-requests-GETapi-commodites--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/commodites/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commodites/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commodites/2',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commodites/2'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-commodites--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commodite&quot;: {
            &quot;id&quot;: 1,
            &quot;nom&quot;: &quot;Wifi&quot;,
            &quot;type_commodite_id&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
            &quot;type_commodite&quot;: {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;Commodite&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-commodites--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-commodites--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commodites--id-"></code></pre>
</span>
<span id="execution-error-GETapi-commodites--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commodites--id-"></code></pre>
</span>
<form id="form-GETapi-commodites--id-" data-method="GET"
      data-path="api/commodites/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-commodites--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-commodites--id-"
                    onclick="tryItOut('GETapi-commodites--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-commodites--id-"
                    onclick="cancelTryOut('GETapi-commodites--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-commodites--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/commodites/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-commodites--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id commodite.</p>
            </p>
                    </form>

            <h2 id="commodites-management-POSTapi-commodites">Add a new Commodite.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-commodites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/commodites" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"nom\": \"Achat\",
    \"type_commodite_id\": 5
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commodites"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "nom": "Achat",
    "type_commodite_id": 5
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/commodites',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'nom' =&gt; 'Achat',
            'type_commodite_id' =&gt; 5,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commodites'
payload = {
    "nom": "Achat",
    "type_commodite_id": 5
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-commodites">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commodite&quot;: {
            &quot;nom&quot;: &quot;Wifi&quot;,
            &quot;type_commodite_id&quot;: 1,
            &quot;updated_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
            &quot;id&quot;: 1,
            &quot;type_commodite&quot;: {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de la Commodit&eacute; reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-commodites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-commodites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-commodites"></code></pre>
</span>
<span id="execution-error-POSTapi-commodites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-commodites"></code></pre>
</span>
<form id="form-POSTapi-commodites" data-method="POST"
      data-path="api/commodites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-commodites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-commodites"
                    onclick="tryItOut('POSTapi-commodites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-commodites"
                    onclick="cancelTryOut('POSTapi-commodites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-commodites" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/commodites</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-commodites" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-commodites"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-commodites"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name commodite.</p>
        </p>
                <p>
            <b><code>type_commodite_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="type_commodite_id"
               data-endpoint="POSTapi-commodites"
               value="5"
               data-component="body" hidden>
    <br>
<p>the id TypeCommodite.</p>
        </p>
        </form>

            <h2 id="commodites-management-PUTapi-commodites--id-">Update Commodite.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-commodites--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/commodites/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"nom\": \"Achat\",
    \"_method\": \"PUT\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commodites/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "nom": "Achat",
    "_method": "PUT"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/commodites/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'nom' =&gt; 'Achat',
            '_method' =&gt; 'PUT',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commodites/2'
payload = {
    "nom": "Achat",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-commodites--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;commodite&quot;: {
            &quot;id&quot;: 1,
            &quot;nom&quot;: &quot;Wifi +&quot;,
            &quot;type_commodite_id&quot;: 1,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
            &quot;type_commodite&quot;: {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-commodites--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-commodites--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-commodites--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-commodites--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-commodites--id-"></code></pre>
</span>
<form id="form-PUTapi-commodites--id-" data-method="PUT"
      data-path="api/commodites/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-commodites--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-commodites--id-"
                    onclick="tryItOut('PUTapi-commodites--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-commodites--id-"
                    onclick="cancelTryOut('PUTapi-commodites--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-commodites--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/commodites/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-commodites--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-commodites--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-commodites--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id commodite.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-commodites--id-"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name commodite.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-commodites--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="commodites-management-DELETEapi-commodites--id-">Delete Commodite.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-commodites--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/commodites/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commodites/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/commodites/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commodites/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-commodites--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-commodites--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-commodites--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-commodites--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-commodites--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-commodites--id-"></code></pre>
</span>
<form id="form-DELETEapi-commodites--id-" data-method="DELETE"
      data-path="api/commodites/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-commodites--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-commodites--id-"
                    onclick="tryItOut('DELETEapi-commodites--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-commodites--id-"
                    onclick="cancelTryOut('DELETEapi-commodites--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-commodites--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/commodites/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-commodites--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-commodites--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-commodites--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id commodite.</p>
            </p>
                    </form>

        <h1 id="establishment-management">Establishment management</h1>

    <p>APIs for managing Establishment</p>

            <h2 id="establishment-management-GETapi-etablissements">Get all establishment.</h2>

<p>
</p>



<span id="example-requests-GETapi-etablissements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/etablissements?user_id=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/etablissements"
);

const params = {
    "user_id": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/etablissements',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'user_id'=&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/etablissements'
params = {
  'user_id': '1',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-etablissements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissements&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;batiment_id&quot;: 3,
                &quot;indication_adresse&quot;: &quot;Face station&quot;,
                &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                &quot;site_internet&quot;: &quot;www.site.com&quot;,
                &quot;nom_manager&quot;: &quot;Mical&quot;,
                &quot;contact_manager&quot;: &quot;Mical&quot;,
                &quot;user_id&quot;: 1,
                &quot;etage&quot;: 1,
                &quot;cover&quot;: null,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;whatsapp1&quot;: &quot;699999999&quot;,
                &quot;whatsapp2&quot;: &quot;699999998&quot;,
                &quot;description&quot;: &quot;bel etablissement&quot;,
                &quot;osm_id&quot;: null,
                &quot;services&quot;: &quot;OM;MOMO&quot;,
                &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                &quot;vues&quot;: 0,
                &quot;logo&quot;: null,
                &quot;logo_map&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;isFavoris&quot;: false,
                &quot;moyenne&quot;: 4,
                &quot;avis&quot;: 1,
                &quot;count&quot;: [
                    {
                        &quot;count&quot;: 1,
                        &quot;rating&quot;: 4
                    }
                ],
                &quot;batiment&quot;: {
                    &quot;id&quot;: 3,
                    &quot;user_id&quot;: 1,
                    &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                    &quot;nombre_niveau&quot;: &quot;3&quot;,
                    &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                    &quot;longitude&quot;: &quot;11.229207&quot;,
                    &quot;latitude&quot;: &quot;4.078288&quot;,
                    &quot;image&quot;: null,
                    &quot;indication&quot;: &quot;derrierre station&quot;,
                    &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                    &quot;ville&quot;: &quot;Douala&quot;,
                    &quot;commune&quot;: &quot;Douala 3&quot;,
                    &quot;quartier&quot;: &quot;Nyalla&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
                },
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Boutiques&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;etablissement_id&quot;: 2,
                            &quot;sous_categorie_id&quot;: 1
                        },
                        &quot;categorie&quot;: {
                            &quot;id&quot;: 1,
                            &quot;nom&quot;: &quot;Achats&quot;,
                            &quot;shortname&quot;: &quot;Achats&quot;,
                            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                            &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                            &quot;vues&quot;: 0,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                        }
                    }
                ],
                &quot;commodites&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Wifi +&quot;,
                        &quot;type_commodite_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;etablissement_id&quot;: 2,
                            &quot;commodite_id&quot;: 1
                        }
                    }
                ],
                &quot;images&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;etablissement_id&quot;: 2,
                        &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                    }
                ],
                &quot;horaires&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;etablissement_id&quot;: 2,
                        &quot;jour&quot;: &quot;mardi&quot;,
                        &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;etablissement_id&quot;: 2,
                        &quot;jour&quot;: &quot;lundi&quot;,
                        &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                    }
                ],
                &quot;commentaires&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;user_id&quot;: 1,
                        &quot;etablissement_id&quot;: 2,
                        &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                        &quot;rating&quot;: 4,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Admin&quot;,
                            &quot;email&quot;: &quot;admin@position.cm&quot;,
                            &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;phone&quot;: &quot;699999999&quot;,
                            &quot;fcm_token&quot;: null,
                            &quot;image_profil&quot;: null,
                            &quot;abonnement_id&quot;: 1,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                        }
                    }
                ],
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin&quot;,
                    &quot;email&quot;: &quot;admin@position.cm&quot;,
                    &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;fcm_token&quot;: null,
                    &quot;image_profil&quot;: null,
                    &quot;abonnement_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;abonnement&quot;: {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;free&quot;,
                        &quot;prix&quot;: 0,
                        &quot;type&quot;: &quot;year&quot;,
                        &quot;duree&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                    }
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Etablissements&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-etablissements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-etablissements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-etablissements"></code></pre>
</span>
<span id="execution-error-GETapi-etablissements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-etablissements"></code></pre>
</span>
<form id="form-GETapi-etablissements" data-method="GET"
      data-path="api/etablissements"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-etablissements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-etablissements"
                    onclick="tryItOut('GETapi-etablissements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-etablissements"
                    onclick="cancelTryOut('GETapi-etablissements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-etablissements" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/etablissements</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-etablissements"
               value="1"
               data-component="query" hidden>
    <br>
<p>id of user.</p>
            </p>
                </form>

            <h2 id="establishment-management-POSTapi-etablissements">Add a new establishment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-etablissements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/etablissements" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Sogefi" \
    --form "etage=3" \
    --form "phone=699999999" \
    --form "whatsapp1=699999999" \
    --form "services=OM;MOMO" \
    --form "idSousCategorie=1,2,3" \
    --form "batiment_id=2" \
    --form "idCommodite=1,2,3" \
    --form "indication_adresse=Rue de Melen" \
    --form "code_postal=59684" \
    --form "site_internet=sogefi.cm." \
    --form "description=Super etablissement." \
    --form "nom_manager=Nom Manager." \
    --form "contact_manager=699999999." \
    --form "whatsapp2=699999999" \
    --form "osm_id=111259658236" \
    --form "ameliorations=Site internet,videos" \
    --form "cover=@C:\Users\tchou\AppData\Local\Temp\php22C2.tmp" \
    --form "logo=@C:\Users\tchou\AppData\Local\Temp\php22C3.tmp" \
    --form "logo_map=@C:\Users\tchou\AppData\Local\Temp\php22D3.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/etablissements"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Sogefi');
body.append('etage', '3');
body.append('phone', '699999999');
body.append('whatsapp1', '699999999');
body.append('services', 'OM;MOMO');
body.append('idSousCategorie', '1,2,3');
body.append('batiment_id', '2');
body.append('idCommodite', '1,2,3');
body.append('indication_adresse', 'Rue de Melen');
body.append('code_postal', '59684');
body.append('site_internet', 'sogefi.cm.');
body.append('description', 'Super etablissement.');
body.append('nom_manager', 'Nom Manager.');
body.append('contact_manager', '699999999.');
body.append('whatsapp2', '699999999');
body.append('osm_id', '111259658236');
body.append('ameliorations', 'Site internet,videos');
body.append('cover', document.querySelector('input[name="cover"]').files[0]);
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('logo_map', document.querySelector('input[name="logo_map"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/etablissements',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Sogefi'
            ],
            [
                'name' =&gt; 'etage',
                'contents' =&gt; '3'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'whatsapp1',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'services',
                'contents' =&gt; 'OM;MOMO'
            ],
            [
                'name' =&gt; 'idSousCategorie',
                'contents' =&gt; '1,2,3'
            ],
            [
                'name' =&gt; 'batiment_id',
                'contents' =&gt; '2'
            ],
            [
                'name' =&gt; 'idCommodite',
                'contents' =&gt; '1,2,3'
            ],
            [
                'name' =&gt; 'indication_adresse',
                'contents' =&gt; 'Rue de Melen'
            ],
            [
                'name' =&gt; 'code_postal',
                'contents' =&gt; '59684'
            ],
            [
                'name' =&gt; 'site_internet',
                'contents' =&gt; 'sogefi.cm.'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Super etablissement.'
            ],
            [
                'name' =&gt; 'nom_manager',
                'contents' =&gt; 'Nom Manager.'
            ],
            [
                'name' =&gt; 'contact_manager',
                'contents' =&gt; '699999999.'
            ],
            [
                'name' =&gt; 'whatsapp2',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'osm_id',
                'contents' =&gt; '111259658236'
            ],
            [
                'name' =&gt; 'ameliorations',
                'contents' =&gt; 'Site internet,videos'
            ],
            [
                'name' =&gt; 'cover',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php22C2.tmp', 'r')
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php22C3.tmp', 'r')
            ],
            [
                'name' =&gt; 'logo_map',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php22D3.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/etablissements'
files = {
  'cover': open('C:\Users\tchou\AppData\Local\Temp\php22C2.tmp', 'rb'),
  'logo': open('C:\Users\tchou\AppData\Local\Temp\php22C3.tmp', 'rb'),
  'logo_map': open('C:\Users\tchou\AppData\Local\Temp\php22D3.tmp', 'rb')
}
payload = {
    "nom": "Sogefi",
    "etage": 3,
    "phone": "699999999",
    "whatsapp1": "699999999",
    "services": "OM;MOMO",
    "idSousCategorie": "1,2,3",
    "batiment_id": 2,
    "idCommodite": "1,2,3",
    "indication_adresse": "Rue de Melen",
    "code_postal": "59684",
    "site_internet": "sogefi.cm.",
    "description": "Super etablissement.",
    "nom_manager": "Nom Manager.",
    "contact_manager": "699999999.",
    "whatsapp2": "699999999",
    "osm_id": "111259658236",
    "ameliorations": "Site internet,videos"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-etablissements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissement&quot;: {
            &quot;nom&quot;: &quot;Sogefi&quot;,
            &quot;indication_adresse&quot;: &quot;Rue de Melen&quot;,
            &quot;code_postal&quot;: &quot;59684&quot;,
            &quot;site_internet&quot;: &quot;sogefi.cm.&quot;,
            &quot;etage&quot;: &quot;3&quot;,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;whatsapp1&quot;: &quot;699999999&quot;,
            &quot;whatsapp2&quot;: &quot;699999999&quot;,
            &quot;description&quot;: &quot;Super etablissement.&quot;,
            &quot;osm_id&quot;: &quot;111259&quot;,
            &quot;services&quot;: &quot;OM;MOMO&quot;,
            &quot;ameliorations&quot;: &quot;Site internet,videos&quot;,
            &quot;nom_manager&quot;: &quot;Nom Manager.&quot;,
            &quot;contact_manager&quot;: &quot;699999999.&quot;,
            &quot;user_id&quot;: 1,
            &quot;cover&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/Sogefi/1661912590_google-io.jpg&quot;,
            &quot;logo&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/Sogefi/1661912590_icon-list-alimentation.svg&quot;,
            &quot;logo_map&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/Sogefi/1661912590_pin-energy.svg&quot;,
            &quot;batiment_id&quot;: 3,
            &quot;updated_at&quot;: &quot;2022-08-31T02:23:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T02:23:10.000000Z&quot;,
            &quot;id&quot;: 3
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de l'etablissement reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-etablissements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-etablissements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-etablissements"></code></pre>
</span>
<span id="execution-error-POSTapi-etablissements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-etablissements"></code></pre>
</span>
<form id="form-POSTapi-etablissements" data-method="POST"
      data-path="api/etablissements"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-etablissements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-etablissements"
                    onclick="tryItOut('POSTapi-etablissements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-etablissements"
                    onclick="cancelTryOut('POSTapi-etablissements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-etablissements" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/etablissements</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-etablissements" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-etablissements"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-etablissements"
               value="Sogefi"
               data-component="body" hidden>
    <br>
<p>the name of the establishment.</p>
        </p>
                <p>
            <b><code>etage</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etage"
               data-endpoint="POSTapi-etablissements"
               value="3"
               data-component="body" hidden>
    <br>
<p>floor number of the establishment.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="POSTapi-etablissements"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>Phone Numer.</p>
        </p>
                <p>
            <b><code>whatsapp1</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="whatsapp1"
               data-endpoint="POSTapi-etablissements"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>whatsapp number.</p>
        </p>
                <p>
            <b><code>services</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="services"
               data-endpoint="POSTapi-etablissements"
               value="OM;MOMO"
               data-component="body" hidden>
    <br>
<p>department of the establishment.</p>
        </p>
                <p>
            <b><code>idSousCategorie</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="idSousCategorie"
               data-endpoint="POSTapi-etablissements"
               value="1,2,3"
               data-component="body" hidden>
    <br>
<p>ids of sous categories.</p>
        </p>
                <p>
            <b><code>batiment_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="batiment_id"
               data-endpoint="POSTapi-etablissements"
               value="2"
               data-component="body" hidden>
    <br>
<p>the id of the Building.</p>
        </p>
                <p>
            <b><code>idCommodite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="idCommodite"
               data-endpoint="POSTapi-etablissements"
               value="1,2,3"
               data-component="body" hidden>
    <br>
<p>ids of commodites.</p>
        </p>
                <p>
            <b><code>indication_adresse</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="indication_adresse"
               data-endpoint="POSTapi-etablissements"
               value="Rue de Melen"
               data-component="body" hidden>
    <br>
<p>precise address of the establishment.</p>
        </p>
                <p>
            <b><code>code_postal</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="code_postal"
               data-endpoint="POSTapi-etablissements"
               value="59684"
               data-component="body" hidden>
    <br>
<p>postal code.</p>
        </p>
                <p>
            <b><code>site_internet</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site_internet"
               data-endpoint="POSTapi-etablissements"
               value="sogefi.cm."
               data-component="body" hidden>
    <br>
<p>website.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-etablissements"
               value="Super etablissement."
               data-component="body" hidden>
    <br>
<p>establishment description</p>
        </p>
                <p>
            <b><code>nom_manager</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom_manager"
               data-endpoint="POSTapi-etablissements"
               value="Nom Manager."
               data-component="body" hidden>
    <br>
<p>establishment manager name</p>
        </p>
                <p>
            <b><code>contact_manager</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="contact_manager"
               data-endpoint="POSTapi-etablissements"
               value="699999999."
               data-component="body" hidden>
    <br>
<p>establishment manager contact</p>
        </p>
                <p>
            <b><code>cover</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="cover"
               data-endpoint="POSTapi-etablissements"
               value=""
               data-component="body" hidden>
    <br>
<p>establishment Image.</p>
        </p>
                <p>
            <b><code>whatsapp2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="whatsapp2"
               data-endpoint="POSTapi-etablissements"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>other whatsapp number.</p>
        </p>
                <p>
            <b><code>osm_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="osm_id"
               data-endpoint="POSTapi-etablissements"
               value="111259658236"
               data-component="body" hidden>
    <br>
<p>OSM Data Id.</p>
        </p>
                <p>
            <b><code>ameliorations</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="ameliorations"
               data-endpoint="POSTapi-etablissements"
               value="Site internet,videos"
               data-component="body" hidden>
    <br>
<p>improvements.</p>
        </p>
                <p>
            <b><code>logo</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="logo"
               data-endpoint="POSTapi-etablissements"
               value=""
               data-component="body" hidden>
    <br>
<p>establishment Logo.</p>
        </p>
                <p>
            <b><code>logo_map</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="logo_map"
               data-endpoint="POSTapi-etablissements"
               value=""
               data-component="body" hidden>
    <br>
<p>establishment Logo in map.</p>
        </p>
        </form>

            <h2 id="establishment-management-PUTapi-etablissements--id-">Update Establishment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-etablissements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/etablissements/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Sogefi" \
    --form "indication_adresse=Rue de Melen" \
    --form "code_postal=59684" \
    --form "site_internet=sogefi.cm." \
    --form "description=Super etablissement." \
    --form "etage=3" \
    --form "phone=699999999" \
    --form "whatsapp1=699999999" \
    --form "whatsapp2=699999999" \
    --form "osm_id=111259658236" \
    --form "services=OM;MOMO" \
    --form "ameliorations=Site internet,videos" \
    --form "vues=true" \
    --form "_method=PUT" \
    --form "cover=@C:\Users\tchou\AppData\Local\Temp\php2316.tmp" \
    --form "logo=@C:\Users\tchou\AppData\Local\Temp\php2317.tmp" \
    --form "logo_map=@C:\Users\tchou\AppData\Local\Temp\php2318.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/etablissements/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Sogefi');
body.append('indication_adresse', 'Rue de Melen');
body.append('code_postal', '59684');
body.append('site_internet', 'sogefi.cm.');
body.append('description', 'Super etablissement.');
body.append('etage', '3');
body.append('phone', '699999999');
body.append('whatsapp1', '699999999');
body.append('whatsapp2', '699999999');
body.append('osm_id', '111259658236');
body.append('services', 'OM;MOMO');
body.append('ameliorations', 'Site internet,videos');
body.append('vues', 'true');
body.append('_method', 'PUT');
body.append('cover', document.querySelector('input[name="cover"]').files[0]);
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('logo_map', document.querySelector('input[name="logo_map"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/etablissements/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Sogefi'
            ],
            [
                'name' =&gt; 'indication_adresse',
                'contents' =&gt; 'Rue de Melen'
            ],
            [
                'name' =&gt; 'code_postal',
                'contents' =&gt; '59684'
            ],
            [
                'name' =&gt; 'site_internet',
                'contents' =&gt; 'sogefi.cm.'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Super etablissement.'
            ],
            [
                'name' =&gt; 'etage',
                'contents' =&gt; '3'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'whatsapp1',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'whatsapp2',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'osm_id',
                'contents' =&gt; '111259658236'
            ],
            [
                'name' =&gt; 'services',
                'contents' =&gt; 'OM;MOMO'
            ],
            [
                'name' =&gt; 'ameliorations',
                'contents' =&gt; 'Site internet,videos'
            ],
            [
                'name' =&gt; 'vues',
                'contents' =&gt; 'true'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'cover',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2316.tmp', 'r')
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2317.tmp', 'r')
            ],
            [
                'name' =&gt; 'logo_map',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2318.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/etablissements/2'
files = {
  'cover': open('C:\Users\tchou\AppData\Local\Temp\php2316.tmp', 'rb'),
  'logo': open('C:\Users\tchou\AppData\Local\Temp\php2317.tmp', 'rb'),
  'logo_map': open('C:\Users\tchou\AppData\Local\Temp\php2318.tmp', 'rb')
}
payload = {
    "nom": "Sogefi",
    "indication_adresse": "Rue de Melen",
    "code_postal": "59684",
    "site_internet": "sogefi.cm.",
    "description": "Super etablissement.",
    "etage": 3,
    "phone": "699999999",
    "whatsapp1": "699999999",
    "whatsapp2": "699999999",
    "osm_id": "111259658236",
    "services": "OM;MOMO",
    "ameliorations": "Site internet,videos",
    "vues": "true",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-etablissements--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissement&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
            &quot;batiment_id&quot;: 3,
            &quot;indication_adresse&quot;: &quot;Face station&quot;,
            &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
            &quot;site_internet&quot;: &quot;www.site.com&quot;,
            &quot;nom_manager&quot;: &quot;Mical&quot;,
            &quot;contact_manager&quot;: &quot;Mical&quot;,
            &quot;user_id&quot;: 1,
            &quot;etage&quot;: 1,
            &quot;cover&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/1661912359_about2.jpg&quot;,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;whatsapp1&quot;: &quot;699999999&quot;,
            &quot;whatsapp2&quot;: &quot;699999998&quot;,
            &quot;description&quot;: &quot;Super etablissement.&quot;,
            &quot;osm_id&quot;: null,
            &quot;services&quot;: &quot;OM;MOMO&quot;,
            &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
            &quot;vues&quot;: 1,
            &quot;logo&quot;: null,
            &quot;logo_map&quot;: null,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T02:19:19.000000Z&quot;,
            &quot;batiment&quot;: {
                &quot;id&quot;: 3,
                &quot;user_id&quot;: 1,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;nombre_niveau&quot;: &quot;3&quot;,
                &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                &quot;longitude&quot;: &quot;11.229207&quot;,
                &quot;latitude&quot;: &quot;4.078288&quot;,
                &quot;image&quot;: null,
                &quot;indication&quot;: &quot;derrierre station&quot;,
                &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                &quot;ville&quot;: &quot;Douala&quot;,
                &quot;commune&quot;: &quot;Douala 3&quot;,
                &quot;quartier&quot;: &quot;Nyalla&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-etablissements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-etablissements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-etablissements--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-etablissements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-etablissements--id-"></code></pre>
</span>
<form id="form-PUTapi-etablissements--id-" data-method="PUT"
      data-path="api/etablissements/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-etablissements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-etablissements--id-"
                    onclick="tryItOut('PUTapi-etablissements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-etablissements--id-"
                    onclick="cancelTryOut('PUTapi-etablissements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-etablissements--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/etablissements/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-etablissements--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-etablissements--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-etablissements--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Establishment.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-etablissements--id-"
               value="Sogefi"
               data-component="body" hidden>
    <br>
<p>the name of the establishment.</p>
        </p>
                <p>
            <b><code>indication_adresse</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="indication_adresse"
               data-endpoint="PUTapi-etablissements--id-"
               value="Rue de Melen"
               data-component="body" hidden>
    <br>
<p>precise address of the establishment.</p>
        </p>
                <p>
            <b><code>code_postal</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="code_postal"
               data-endpoint="PUTapi-etablissements--id-"
               value="59684"
               data-component="body" hidden>
    <br>
<p>postal code.</p>
        </p>
                <p>
            <b><code>site_internet</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site_internet"
               data-endpoint="PUTapi-etablissements--id-"
               value="sogefi.cm."
               data-component="body" hidden>
    <br>
<p>website.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="PUTapi-etablissements--id-"
               value="Super etablissement."
               data-component="body" hidden>
    <br>
<p>establishment description</p>
        </p>
                <p>
            <b><code>cover</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="cover"
               data-endpoint="PUTapi-etablissements--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>establishment Image.</p>
        </p>
                <p>
            <b><code>etage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="etage"
               data-endpoint="PUTapi-etablissements--id-"
               value="3"
               data-component="body" hidden>
    <br>
<p>floor number of the establishment.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="PUTapi-etablissements--id-"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>Phone Numer.</p>
        </p>
                <p>
            <b><code>whatsapp1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="whatsapp1"
               data-endpoint="PUTapi-etablissements--id-"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>whatsapp number.</p>
        </p>
                <p>
            <b><code>whatsapp2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="whatsapp2"
               data-endpoint="PUTapi-etablissements--id-"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>other whatsapp number.</p>
        </p>
                <p>
            <b><code>osm_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="osm_id"
               data-endpoint="PUTapi-etablissements--id-"
               value="111259658236"
               data-component="body" hidden>
    <br>
<p>OSM Data Id.</p>
        </p>
                <p>
            <b><code>services</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="services"
               data-endpoint="PUTapi-etablissements--id-"
               value="OM;MOMO"
               data-component="body" hidden>
    <br>
<p>department of the establishment.</p>
        </p>
                <p>
            <b><code>ameliorations</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="ameliorations"
               data-endpoint="PUTapi-etablissements--id-"
               value="Site internet,videos"
               data-component="body" hidden>
    <br>
<p>improvements.</p>
        </p>
                <p>
            <b><code>vues</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="vues"
               data-endpoint="PUTapi-etablissements--id-"
               value="true"
               data-component="body" hidden>
    <br>
<p>count view.</p>
        </p>
                <p>
            <b><code>logo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logo"
               data-endpoint="PUTapi-etablissements--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>establishment Logo.</p>
        </p>
                <p>
            <b><code>logo_map</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logo_map"
               data-endpoint="PUTapi-etablissements--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>establishment Logo Map.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-etablissements--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="establishment-management-DELETEapi-etablissements--id-">Delete Establishment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-etablissements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/etablissements/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/etablissements/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/etablissements/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/etablissements/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-etablissements--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-etablissements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-etablissements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-etablissements--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-etablissements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-etablissements--id-"></code></pre>
</span>
<form id="form-DELETEapi-etablissements--id-" data-method="DELETE"
      data-path="api/etablissements/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-etablissements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-etablissements--id-"
                    onclick="tryItOut('DELETEapi-etablissements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-etablissements--id-"
                    onclick="cancelTryOut('DELETEapi-etablissements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-etablissements--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/etablissements/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-etablissements--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-etablissements--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-etablissements--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Establishment.</p>
            </p>
                    </form>

            <h2 id="establishment-management-GETapi-etablissements--id-">Show Establishment by id.</h2>

<p>
</p>



<span id="example-requests-GETapi-etablissements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/etablissements/2?user_id=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/etablissements/2"
);

const params = {
    "user_id": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/etablissements/2',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'user_id'=&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/etablissements/2'
params = {
  'user_id': '1',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-etablissements--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissement&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
            &quot;batiment_id&quot;: 3,
            &quot;indication_adresse&quot;: &quot;Face station&quot;,
            &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
            &quot;site_internet&quot;: &quot;www.site.com&quot;,
            &quot;nom_manager&quot;: &quot;Mical&quot;,
            &quot;contact_manager&quot;: &quot;Mical&quot;,
            &quot;user_id&quot;: 1,
            &quot;etage&quot;: 1,
            &quot;cover&quot;: null,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;whatsapp1&quot;: &quot;699999999&quot;,
            &quot;whatsapp2&quot;: &quot;699999998&quot;,
            &quot;description&quot;: &quot;bel etablissement&quot;,
            &quot;osm_id&quot;: null,
            &quot;services&quot;: &quot;OM;MOMO&quot;,
            &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
            &quot;vues&quot;: 0,
            &quot;logo&quot;: null,
            &quot;logo_map&quot;: null,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;isFavoris&quot;: false,
            &quot;moyenne&quot;: 4,
            &quot;avis&quot;: 1,
            &quot;count&quot;: [
                {
                    &quot;count&quot;: 1,
                    &quot;rating&quot;: 4
                }
            ],
            &quot;batiment&quot;: {
                &quot;id&quot;: 3,
                &quot;user_id&quot;: 1,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;nombre_niveau&quot;: &quot;3&quot;,
                &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                &quot;longitude&quot;: &quot;11.229207&quot;,
                &quot;latitude&quot;: &quot;4.078288&quot;,
                &quot;image&quot;: null,
                &quot;indication&quot;: &quot;derrierre station&quot;,
                &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                &quot;ville&quot;: &quot;Douala&quot;,
                &quot;commune&quot;: &quot;Douala 3&quot;,
                &quot;quartier&quot;: &quot;Nyalla&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
            },
            &quot;sous_categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Boutiques&quot;,
                    &quot;categorie_id&quot;: 1,
                    &quot;logourl&quot;: null,
                    &quot;logourlmap&quot;: null,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;etablissement_id&quot;: 2,
                        &quot;sous_categorie_id&quot;: 1
                    },
                    &quot;categorie&quot;: {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Achats&quot;,
                        &quot;shortname&quot;: &quot;Achats&quot;,
                        &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                        &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                        &quot;vues&quot;: 0,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                    }
                }
            ],
            &quot;commodites&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Wifi +&quot;,
                    &quot;type_commodite_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;etablissement_id&quot;: 2,
                        &quot;commodite_id&quot;: 1
                    }
                }
            ],
            &quot;images&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;etablissement_id&quot;: 2,
                    &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                }
            ],
            &quot;horaires&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;etablissement_id&quot;: 2,
                    &quot;jour&quot;: &quot;mardi&quot;,
                    &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;etablissement_id&quot;: 2,
                    &quot;jour&quot;: &quot;lundi&quot;,
                    &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                }
            ],
            &quot;commentaires&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;user_id&quot;: 1,
                    &quot;etablissement_id&quot;: 2,
                    &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                    &quot;rating&quot;: 4,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Admin&quot;,
                        &quot;email&quot;: &quot;admin@position.cm&quot;,
                        &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;phone&quot;: &quot;699999999&quot;,
                        &quot;fcm_token&quot;: null,
                        &quot;image_profil&quot;: null,
                        &quot;abonnement_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                    }
                }
            ],
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@position.cm&quot;,
                &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;fcm_token&quot;: null,
                &quot;image_profil&quot;: null,
                &quot;abonnement_id&quot;: 1,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                &quot;abonnement&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;free&quot;,
                    &quot;prix&quot;: 0,
                    &quot;type&quot;: &quot;year&quot;,
                    &quot;duree&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                }
            }
        }
    },
    &quot;message&quot;: &quot;Etablissement&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-etablissements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-etablissements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-etablissements--id-"></code></pre>
</span>
<span id="execution-error-GETapi-etablissements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-etablissements--id-"></code></pre>
</span>
<form id="form-GETapi-etablissements--id-" data-method="GET"
      data-path="api/etablissements/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-etablissements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-etablissements--id-"
                    onclick="tryItOut('GETapi-etablissements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-etablissements--id-"
                    onclick="cancelTryOut('GETapi-etablissements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-etablissements--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/etablissements/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-etablissements--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Establishment.</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-etablissements--id-"
               value="1"
               data-component="query" hidden>
    <br>
<p>id of user.</p>
            </p>
                </form>

            <h2 id="establishment-management-GETapi-search-etablissements">Search Establishment.</h2>

<p>
</p>



<span id="example-requests-GETapi-search-etablissements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/search/etablissements?q=piscine&amp;user_id=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/search/etablissements"
);

const params = {
    "q": "piscine",
    "user_id": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/search/etablissements',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'q'=&gt; 'piscine',
            'user_id'=&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/search/etablissements'
params = {
  'q': 'piscine',
  'user_id': '1',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-search-etablissements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissements&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;batiment_id&quot;: 3,
                &quot;indication_adresse&quot;: &quot;Face station&quot;,
                &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                &quot;site_internet&quot;: &quot;www.site.com&quot;,
                &quot;nom_manager&quot;: &quot;Mical&quot;,
                &quot;contact_manager&quot;: &quot;Mical&quot;,
                &quot;user_id&quot;: 1,
                &quot;etage&quot;: 1,
                &quot;cover&quot;: null,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;whatsapp1&quot;: &quot;699999999&quot;,
                &quot;whatsapp2&quot;: &quot;699999998&quot;,
                &quot;description&quot;: &quot;bel etablissement&quot;,
                &quot;osm_id&quot;: null,
                &quot;services&quot;: &quot;OM;MOMO&quot;,
                &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                &quot;vues&quot;: 0,
                &quot;logo&quot;: null,
                &quot;logo_map&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;isFavoris&quot;: false,
                &quot;moyenne&quot;: 4,
                &quot;avis&quot;: 1,
                &quot;count&quot;: [
                    {
                        &quot;count&quot;: 1,
                        &quot;rating&quot;: 4
                    }
                ],
                &quot;batiment&quot;: {
                    &quot;id&quot;: 3,
                    &quot;user_id&quot;: 1,
                    &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                    &quot;nombre_niveau&quot;: &quot;3&quot;,
                    &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                    &quot;longitude&quot;: &quot;11.229207&quot;,
                    &quot;latitude&quot;: &quot;4.078288&quot;,
                    &quot;image&quot;: null,
                    &quot;indication&quot;: &quot;derrierre station&quot;,
                    &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                    &quot;ville&quot;: &quot;Douala&quot;,
                    &quot;commune&quot;: &quot;Douala 3&quot;,
                    &quot;quartier&quot;: &quot;Nyalla&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
                },
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Boutiques&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;etablissement_id&quot;: 2,
                            &quot;sous_categorie_id&quot;: 1
                        },
                        &quot;categorie&quot;: {
                            &quot;id&quot;: 1,
                            &quot;nom&quot;: &quot;Achats&quot;,
                            &quot;shortname&quot;: &quot;Achats&quot;,
                            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                            &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                            &quot;vues&quot;: 0,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                        }
                    }
                ],
                &quot;commodites&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Wifi +&quot;,
                        &quot;type_commodite_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;etablissement_id&quot;: 2,
                            &quot;commodite_id&quot;: 1
                        }
                    }
                ],
                &quot;images&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;etablissement_id&quot;: 2,
                        &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                    }
                ],
                &quot;horaires&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;etablissement_id&quot;: 2,
                        &quot;jour&quot;: &quot;mardi&quot;,
                        &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;etablissement_id&quot;: 2,
                        &quot;jour&quot;: &quot;lundi&quot;,
                        &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                    }
                ],
                &quot;commentaires&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;user_id&quot;: 1,
                        &quot;etablissement_id&quot;: 2,
                        &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                        &quot;rating&quot;: 4,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Admin&quot;,
                            &quot;email&quot;: &quot;admin@position.cm&quot;,
                            &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;phone&quot;: &quot;699999999&quot;,
                            &quot;fcm_token&quot;: null,
                            &quot;image_profil&quot;: null,
                            &quot;abonnement_id&quot;: 1,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                        }
                    }
                ],
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin&quot;,
                    &quot;email&quot;: &quot;admin@position.cm&quot;,
                    &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;fcm_token&quot;: null,
                    &quot;image_profil&quot;: null,
                    &quot;abonnement_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;abonnement&quot;: {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;free&quot;,
                        &quot;prix&quot;: 0,
                        &quot;type&quot;: &quot;year&quot;,
                        &quot;duree&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                    }
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Etablissements&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-search-etablissements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-search-etablissements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-search-etablissements"></code></pre>
</span>
<span id="execution-error-GETapi-search-etablissements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-search-etablissements"></code></pre>
</span>
<form id="form-GETapi-search-etablissements" data-method="GET"
      data-path="api/search/etablissements"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-search-etablissements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-search-etablissements"
                    onclick="tryItOut('GETapi-search-etablissements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-search-etablissements"
                    onclick="cancelTryOut('GETapi-search-etablissements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-search-etablissements" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/search/etablissements</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>q</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="q"
               data-endpoint="GETapi-search-etablissements"
               value="piscine"
               data-component="query" hidden>
    <br>
<p>search value.</p>
            </p>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-search-etablissements"
               value="1"
               data-component="query" hidden>
    <br>
<p>id of user.</p>
            </p>
                </form>

            <h2 id="establishment-management-POSTapi-favoris-add">Add Favorite Establishment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-favoris-add">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/favoris/add" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"etablissement_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/favoris/add"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "etablissement_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/favoris/add',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'etablissement_id' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/favoris/add'
payload = {
    "etablissement_id": 1
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-favoris-add">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;favorite&quot;: {
            &quot;etablissement_id&quot;: 2,
            &quot;user_id&quot;: 1,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Etablissement ajout&eacute; aux favoris&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-favoris-add" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-favoris-add"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-favoris-add"></code></pre>
</span>
<span id="execution-error-POSTapi-favoris-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-favoris-add"></code></pre>
</span>
<form id="form-POSTapi-favoris-add" data-method="POST"
      data-path="api/favoris/add"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-favoris-add', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-favoris-add"
                    onclick="tryItOut('POSTapi-favoris-add');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-favoris-add"
                    onclick="cancelTryOut('POSTapi-favoris-add');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-favoris-add" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/favoris/add</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-favoris-add" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-favoris-add"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>etablissement_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etablissement_id"
               data-endpoint="POSTapi-favoris-add"
               value="1"
               data-component="body" hidden>
    <br>
<p>.</p>
        </p>
        </form>

            <h2 id="establishment-management-POSTapi-favoris-remove">Remove Favorite Establishment.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-favoris-remove">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/favoris/remove" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"etablissement_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/favoris/remove"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "etablissement_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/favoris/remove',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'etablissement_id' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/favoris/remove'
payload = {
    "etablissement_id": 1
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-favoris-remove">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;favorite&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;etablissement_id&quot;: 2
        }
    },
    &quot;message&quot;: &quot;Etablissement retir&eacute; des favoris&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-favoris-remove" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-favoris-remove"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-favoris-remove"></code></pre>
</span>
<span id="execution-error-POSTapi-favoris-remove" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-favoris-remove"></code></pre>
</span>
<form id="form-POSTapi-favoris-remove" data-method="POST"
      data-path="api/favoris/remove"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-favoris-remove', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-favoris-remove"
                    onclick="tryItOut('POSTapi-favoris-remove');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-favoris-remove"
                    onclick="cancelTryOut('POSTapi-favoris-remove');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-favoris-remove" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/favoris/remove</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-favoris-remove" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-favoris-remove"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>etablissement_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etablissement_id"
               data-endpoint="POSTapi-favoris-remove"
               value="1"
               data-component="body" hidden>
    <br>
<p>.</p>
        </p>
        </form>

            <h2 id="establishment-management-GETapi-search-etablissements-filter">Search Establishment by Filter.</h2>

<p>
</p>



<span id="example-requests-GETapi-search-etablissements-filter">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/search/etablissements/filter?idCommodites=1%2C2%2C3&amp;user_id=10&amp;id_categorie=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/search/etablissements/filter"
);

const params = {
    "idCommodites": "1,2,3",
    "user_id": "10",
    "id_categorie": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/search/etablissements/filter',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'idCommodites'=&gt; '1,2,3',
            'user_id'=&gt; '10',
            'id_categorie'=&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/search/etablissements/filter'
params = {
  'idCommodites': '1,2,3',
  'user_id': '10',
  'id_categorie': '1',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-search-etablissements-filter">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissements&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;batiment_id&quot;: 3,
                &quot;indication_adresse&quot;: &quot;Face station&quot;,
                &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                &quot;site_internet&quot;: &quot;www.site.com&quot;,
                &quot;nom_manager&quot;: &quot;Mical&quot;,
                &quot;contact_manager&quot;: &quot;Mical&quot;,
                &quot;user_id&quot;: 1,
                &quot;etage&quot;: 1,
                &quot;cover&quot;: null,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;whatsapp1&quot;: &quot;699999999&quot;,
                &quot;whatsapp2&quot;: &quot;699999998&quot;,
                &quot;description&quot;: &quot;bel etablissement&quot;,
                &quot;osm_id&quot;: null,
                &quot;services&quot;: &quot;OM;MOMO&quot;,
                &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                &quot;vues&quot;: 0,
                &quot;logo&quot;: null,
                &quot;logo_map&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;isFavoris&quot;: false,
                &quot;moyenne&quot;: 4,
                &quot;avis&quot;: 1,
                &quot;count&quot;: [
                    {
                        &quot;count&quot;: 1,
                        &quot;rating&quot;: 4
                    }
                ],
                &quot;batiment&quot;: {
                    &quot;id&quot;: 3,
                    &quot;user_id&quot;: 1,
                    &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                    &quot;nombre_niveau&quot;: &quot;3&quot;,
                    &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                    &quot;longitude&quot;: &quot;11.229207&quot;,
                    &quot;latitude&quot;: &quot;4.078288&quot;,
                    &quot;image&quot;: null,
                    &quot;indication&quot;: &quot;derrierre station&quot;,
                    &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                    &quot;ville&quot;: &quot;Douala&quot;,
                    &quot;commune&quot;: &quot;Douala 3&quot;,
                    &quot;quartier&quot;: &quot;Nyalla&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
                },
                &quot;sous_categories&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Boutiques&quot;,
                        &quot;categorie_id&quot;: 1,
                        &quot;logourl&quot;: null,
                        &quot;logourlmap&quot;: null,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;etablissement_id&quot;: 2,
                            &quot;sous_categorie_id&quot;: 1
                        },
                        &quot;categorie&quot;: {
                            &quot;id&quot;: 1,
                            &quot;nom&quot;: &quot;Achats&quot;,
                            &quot;shortname&quot;: &quot;Achats&quot;,
                            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                            &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                            &quot;vues&quot;: 0,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                        }
                    }
                ],
                &quot;commodites&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Wifi +&quot;,
                        &quot;type_commodite_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;etablissement_id&quot;: 2,
                            &quot;commodite_id&quot;: 1
                        }
                    }
                ],
                &quot;images&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;etablissement_id&quot;: 2,
                        &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;
                    }
                ],
                &quot;horaires&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;etablissement_id&quot;: 2,
                        &quot;jour&quot;: &quot;mardi&quot;,
                        &quot;plage_horaire&quot;: &quot;07: 00-12: 00;13: 00-17: 00&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T02:05:59.000000Z&quot;
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;etablissement_id&quot;: 2,
                        &quot;jour&quot;: &quot;lundi&quot;,
                        &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
                    }
                ],
                &quot;commentaires&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;user_id&quot;: 1,
                        &quot;etablissement_id&quot;: 2,
                        &quot;commentaire&quot;: &quot;J'aime ce lieu&quot;,
                        &quot;rating&quot;: 4,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:56:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:58:07.000000Z&quot;,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Admin&quot;,
                            &quot;email&quot;: &quot;admin@position.cm&quot;,
                            &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;phone&quot;: &quot;699999999&quot;,
                            &quot;fcm_token&quot;: null,
                            &quot;image_profil&quot;: null,
                            &quot;abonnement_id&quot;: 1,
                            &quot;deleted_at&quot;: null,
                            &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                        }
                    }
                ],
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin&quot;,
                    &quot;email&quot;: &quot;admin@position.cm&quot;,
                    &quot;email_verified_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;phone&quot;: &quot;699999999&quot;,
                    &quot;fcm_token&quot;: null,
                    &quot;image_profil&quot;: null,
                    &quot;abonnement_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                    &quot;abonnement&quot;: {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;free&quot;,
                        &quot;prix&quot;: 0,
                        &quot;type&quot;: &quot;year&quot;,
                        &quot;duree&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-30T23:14:09.000000Z&quot;
                    }
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Etablissements&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-search-etablissements-filter" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-search-etablissements-filter"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-search-etablissements-filter"></code></pre>
</span>
<span id="execution-error-GETapi-search-etablissements-filter" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-search-etablissements-filter"></code></pre>
</span>
<form id="form-GETapi-search-etablissements-filter" data-method="GET"
      data-path="api/search/etablissements/filter"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-search-etablissements-filter', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-search-etablissements-filter"
                    onclick="tryItOut('GETapi-search-etablissements-filter');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-search-etablissements-filter"
                    onclick="cancelTryOut('GETapi-search-etablissements-filter');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-search-etablissements-filter" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/search/etablissements/filter</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>idCommodites</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="idCommodites"
               data-endpoint="GETapi-search-etablissements-filter"
               value="1,2,3"
               data-component="query" hidden>
    <br>
<p>.</p>
            </p>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-search-etablissements-filter"
               value="10"
               data-component="query" hidden>
    <br>
<p>id of user conncted .</p>
            </p>
                    <p>
                <b><code>id_categorie</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id_categorie"
               data-endpoint="GETapi-search-etablissements-filter"
               value="1"
               data-component="query" hidden>
    <br>
<p>id of categorie .</p>
            </p>
                </form>

            <h2 id="establishment-management-PUTapi-etablissements-vues--id-">Update vues Establishment.</h2>

<p>
</p>



<span id="example-requests-PUTapi-etablissements-vues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/etablissements/vues/veniam" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/etablissements/vues/veniam"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/etablissements/vues/veniam',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/etablissements/vues/veniam'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-etablissements-vues--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;etablissement&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
            &quot;batiment_id&quot;: 3,
            &quot;indication_adresse&quot;: &quot;Face station&quot;,
            &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
            &quot;site_internet&quot;: &quot;www.site.com&quot;,
            &quot;nom_manager&quot;: &quot;Mical&quot;,
            &quot;contact_manager&quot;: &quot;Mical&quot;,
            &quot;user_id&quot;: 1,
            &quot;etage&quot;: 1,
            &quot;cover&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/1661912359_about2.jpg&quot;,
            &quot;phone&quot;: &quot;699999999&quot;,
            &quot;whatsapp1&quot;: &quot;699999999&quot;,
            &quot;whatsapp2&quot;: &quot;699999998&quot;,
            &quot;description&quot;: &quot;Super etablissement.&quot;,
            &quot;osm_id&quot;: null,
            &quot;services&quot;: &quot;OM;MOMO&quot;,
            &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
            &quot;vues&quot;: 2,
            &quot;logo&quot;: null,
            &quot;logo_map&quot;: null,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T02:37:33.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Vues du Etablissement incr&eacute;ment&eacute;es&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-etablissements-vues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-etablissements-vues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-etablissements-vues--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-etablissements-vues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-etablissements-vues--id-"></code></pre>
</span>
<form id="form-PUTapi-etablissements-vues--id-" data-method="PUT"
      data-path="api/etablissements/vues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-etablissements-vues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-etablissements-vues--id-"
                    onclick="tryItOut('PUTapi-etablissements-vues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-etablissements-vues--id-"
                    onclick="cancelTryOut('PUTapi-etablissements-vues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-etablissements-vues--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/etablissements/vues/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="PUTapi-etablissements-vues--id-"
               value="veniam"
               data-component="url" hidden>
    <br>
<p>The ID of the vue.</p>
            </p>
                    <p>
                <b><code>etablissement_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etablissement_id"
               data-endpoint="PUTapi-etablissements-vues--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>.</p>
            </p>
                    </form>

            <h2 id="establishment-management-GETapi-count-etablissements">GET api/count/etablissements</h2>

<p>
</p>



<span id="example-requests-GETapi-count-etablissements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/count/etablissements" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/count/etablissements"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/count/etablissements',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/count/etablissements'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-count-etablissements">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;errors&quot;: [
        {
            &quot;message&quot;: &quot;Unauthorized&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-count-etablissements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-count-etablissements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-count-etablissements"></code></pre>
</span>
<span id="execution-error-GETapi-count-etablissements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-count-etablissements"></code></pre>
</span>
<form id="form-GETapi-count-etablissements" data-method="GET"
      data-path="api/count/etablissements"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-count-etablissements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-count-etablissements"
                    onclick="tryItOut('GETapi-count-etablissements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-count-etablissements"
                    onclick="cancelTryOut('GETapi-count-etablissements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-count-etablissements" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/count/etablissements</code></b>
        </p>
                    </form>

        <h1 id="picture-management">Picture management</h1>

    <p>APIs for managing Picture</p>

            <h2 id="picture-management-POSTapi-images">Add a new picture.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-images">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/images" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "etablissement_id=2" \
    --form "image_url=@C:\Users\tchou\AppData\Local\Temp\php2377.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/images"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('etablissement_id', '2');
body.append('image_url', document.querySelector('input[name="image_url"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/images',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'etablissement_id',
                'contents' =&gt; '2'
            ],
            [
                'name' =&gt; 'image_url',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2377.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/images'
files = {
  'image_url': open('C:\Users\tchou\AppData\Local\Temp\php2377.tmp', 'rb')
}
payload = {
    "etablissement_id": 2
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-images">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;image&quot;: {
            &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910671_flutter-3.png&quot;,
            &quot;etablissement_id&quot;: 2,
            &quot;updated_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de l'image reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-images" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-images"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-images"></code></pre>
</span>
<span id="execution-error-POSTapi-images" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-images"></code></pre>
</span>
<form id="form-POSTapi-images" data-method="POST"
      data-path="api/images"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-images', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-images"
                    onclick="tryItOut('POSTapi-images');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-images"
                    onclick="cancelTryOut('POSTapi-images');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-images" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/images</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-images" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-images"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>etablissement_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etablissement_id"
               data-endpoint="POSTapi-images"
               value="2"
               data-component="body" hidden>
    <br>
<p>the id of the Establishment.</p>
        </p>
                <p>
            <b><code>image_url</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
                <input type="file"
               name="image_url"
               data-endpoint="POSTapi-images"
               value=""
               data-component="body" hidden>
    <br>
<p>picture.</p>
        </p>
        </form>

            <h2 id="picture-management-PUTapi-images--id-">Update Picture.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-images--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/images/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "_method=PUT" \
    --form "image_url=@C:\Users\tchou\AppData\Local\Temp\php2388.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/images/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('_method', 'PUT');
body.append('image_url', document.querySelector('input[name="image_url"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/images/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'image_url',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2388.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/images/2'
files = {
  'image_url': open('C:\Users\tchou\AppData\Local\Temp\php2388.tmp', 'rb')
}
payload = {
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-images--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;image&quot;: {
            &quot;id&quot;: 1,
            &quot;etablissement_id&quot;: 2,
            &quot;image_url&quot;: &quot;/storage/uploads/batiments/images/BATIMENT_1013434286/BOUTIQUE DE MICAL/1661910783_project.png&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:51:11.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:53:03.000000Z&quot;,
            &quot;etablissement&quot;: {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                &quot;batiment_id&quot;: 3,
                &quot;indication_adresse&quot;: &quot;Face station&quot;,
                &quot;code_postal&quot;: &quot;BP 4326 Douala&quot;,
                &quot;site_internet&quot;: &quot;www.site.com&quot;,
                &quot;nom_manager&quot;: &quot;Mical&quot;,
                &quot;contact_manager&quot;: &quot;Mical&quot;,
                &quot;user_id&quot;: 1,
                &quot;etage&quot;: 1,
                &quot;cover&quot;: null,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;whatsapp1&quot;: &quot;699999999&quot;,
                &quot;whatsapp2&quot;: &quot;699999998&quot;,
                &quot;description&quot;: &quot;bel etablissement&quot;,
                &quot;osm_id&quot;: null,
                &quot;services&quot;: &quot;OM;MOMO&quot;,
                &quot;ameliorations&quot;: &quot;Ajouter des videos&quot;,
                &quot;vues&quot;: 0,
                &quot;logo&quot;: null,
                &quot;logo_map&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                &quot;batiment&quot;: {
                    &quot;id&quot;: 3,
                    &quot;user_id&quot;: 1,
                    &quot;nom&quot;: &quot;BOUTIQUE DE MICAL&quot;,
                    &quot;nombre_niveau&quot;: &quot;3&quot;,
                    &quot;code&quot;: &quot;BATIMENT_1013434286&quot;,
                    &quot;longitude&quot;: &quot;11.229207&quot;,
                    &quot;latitude&quot;: &quot;4.078288&quot;,
                    &quot;image&quot;: null,
                    &quot;indication&quot;: &quot;derrierre station&quot;,
                    &quot;rue&quot;: &quot;Rue de la Mairie&quot;,
                    &quot;ville&quot;: &quot;Douala&quot;,
                    &quot;commune&quot;: &quot;Douala 3&quot;,
                    &quot;quartier&quot;: &quot;Nyalla&quot;,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:32:38.000000Z&quot;
                }
            }
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-images--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-images--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-images--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-images--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-images--id-"></code></pre>
</span>
<form id="form-PUTapi-images--id-" data-method="PUT"
      data-path="api/images/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-images--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-images--id-"
                    onclick="tryItOut('PUTapi-images--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-images--id-"
                    onclick="cancelTryOut('PUTapi-images--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-images--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/images/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-images--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-images--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-images--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Picture.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>image_url</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="image_url"
               data-endpoint="PUTapi-images--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>picture.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-images--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="picture-management-DELETEapi-images--id-">Delete Picture.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-images--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/images/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/images/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/images/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/images/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-images--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-images--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-images--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-images--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-images--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-images--id-"></code></pre>
</span>
<form id="form-DELETEapi-images--id-" data-method="DELETE"
      data-path="api/images/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-images--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-images--id-"
                    onclick="tryItOut('DELETEapi-images--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-images--id-"
                    onclick="cancelTryOut('DELETEapi-images--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-images--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/images/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-images--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-images--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-images--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Picture.</p>
            </p>
                    </form>

        <h1 id="schedule-management">Schedule management</h1>

    <p>APIs for managing Schedule</p>

            <h2 id="schedule-management-POSTapi-horaires">Add a new schedule.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-horaires">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/horaires" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"horaires\": \"[{\\\"jour\\\": \\\"lundi\\\",\\\"etablissement_id\\\":1,\\\"plage_horaire\\\":\\\"07:00-12:00;13:00-17:00\\\"}]\",
    \"etablissement_id\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/horaires"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "horaires": "[{\"jour\": \"lundi\",\"etablissement_id\":1,\"plage_horaire\":\"07:00-12:00;13:00-17:00\"}]",
    "etablissement_id": 2
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/horaires',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'horaires' =&gt; '[{"jour": "lundi","etablissement_id":1,"plage_horaire":"07:00-12:00;13:00-17:00"}]',
            'etablissement_id' =&gt; 2,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/horaires'
payload = {
    "horaires": "[{\"jour\": \"lundi\",\"etablissement_id\":1,\"plage_horaire\":\"07:00-12:00;13:00-17:00\"}]",
    "etablissement_id": 2
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-horaires">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Cr&eacute;ation de l'horaire reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-horaires" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-horaires"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-horaires"></code></pre>
</span>
<span id="execution-error-POSTapi-horaires" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-horaires"></code></pre>
</span>
<form id="form-POSTapi-horaires" data-method="POST"
      data-path="api/horaires"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-horaires', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-horaires"
                    onclick="tryItOut('POSTapi-horaires');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-horaires"
                    onclick="cancelTryOut('POSTapi-horaires');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-horaires" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/horaires</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-horaires" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-horaires"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>horaires</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="horaires"
               data-endpoint="POSTapi-horaires"
               value="[{"jour": "lundi","etablissement_id":1,"plage_horaire":"07:00-12:00;13:00-17:00"}]"
               data-component="body" hidden>
    <br>
<p>horaire object.</p>
        </p>
                <p>
            <b><code>etablissement_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="etablissement_id"
               data-endpoint="POSTapi-horaires"
               value="2"
               data-component="body" hidden>
    <br>
<p>the id of the Establishment.</p>
        </p>
        </form>

            <h2 id="schedule-management-PUTapi-horaires--id-">Update Schedule.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-horaires--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/horaires/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"plage_horaire\": \"10:00-15:00;16:00-18:00\",
    \"_method\": \"PUT\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/horaires/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "plage_horaire": "10:00-15:00;16:00-18:00",
    "_method": "PUT"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/horaires/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'plage_horaire' =&gt; '10:00-15:00;16:00-18:00',
            '_method' =&gt; 'PUT',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/horaires/2'
payload = {
    "plage_horaire": "10:00-15:00;16:00-18:00",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-horaires--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;horaire&quot;: {
            &quot;id&quot;: 2,
            &quot;etablissement_id&quot;: 2,
            &quot;jour&quot;: &quot;lundi&quot;,
            &quot;plage_horaire&quot;: &quot;11:00-15:00;16:00-18:00&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:32:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T02:07:39.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-horaires--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-horaires--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-horaires--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-horaires--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-horaires--id-"></code></pre>
</span>
<form id="form-PUTapi-horaires--id-" data-method="PUT"
      data-path="api/horaires/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-horaires--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-horaires--id-"
                    onclick="tryItOut('PUTapi-horaires--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-horaires--id-"
                    onclick="cancelTryOut('PUTapi-horaires--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-horaires--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/horaires/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-horaires--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-horaires--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-horaires--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Schedule.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>plage_horaire</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="plage_horaire"
               data-endpoint="PUTapi-horaires--id-"
               value="10:00-15:00;16:00-18:00"
               data-component="body" hidden>
    <br>
<p>time slot.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-horaires--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="schedule-management-DELETEapi-horaires--id-">Delete Schedule.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-horaires--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/horaires/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/horaires/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/horaires/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/horaires/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-horaires--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-horaires--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-horaires--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-horaires--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-horaires--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-horaires--id-"></code></pre>
</span>
<form id="form-DELETEapi-horaires--id-" data-method="DELETE"
      data-path="api/horaires/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-horaires--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-horaires--id-"
                    onclick="tryItOut('DELETEapi-horaires--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-horaires--id-"
                    onclick="cancelTryOut('DELETEapi-horaires--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-horaires--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/horaires/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-horaires--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-horaires--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-horaires--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the Schedule.</p>
            </p>
                    </form>

        <h1 id="subcategory-management">SubCategory management</h1>

    <p>APIs for managing SubCategory</p>

            <h2 id="subcategory-management-GETapi-souscategories">Get all SubCategory.</h2>

<p>
</p>



<span id="example-requests-GETapi-souscategories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/souscategories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/souscategories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/souscategories',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/souscategories'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-souscategories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;sous_categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Boutiques&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;Brocante&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 3,
                &quot;nom&quot;: &quot;Supermarch&eacute;&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 4,
                &quot;nom&quot;: &quot;Epicerie&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 5,
                &quot;nom&quot;: &quot;Blanchisseries et Pressings&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 6,
                &quot;nom&quot;: &quot;Centre Commercial&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 7,
                &quot;nom&quot;: &quot;Maison et Jardin&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 8,
                &quot;nom&quot;: &quot;Hifi, t&eacute;l&eacute;phonie&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 9,
                &quot;nom&quot;: &quot;Fleuriste&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 10,
                &quot;nom&quot;: &quot;Boulangerie, P&acirc;tisserie&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Sous-Categories&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-souscategories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-souscategories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-souscategories"></code></pre>
</span>
<span id="execution-error-GETapi-souscategories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-souscategories"></code></pre>
</span>
<form id="form-GETapi-souscategories" data-method="GET"
      data-path="api/souscategories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-souscategories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-souscategories"
                    onclick="tryItOut('GETapi-souscategories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-souscategories"
                    onclick="cancelTryOut('GETapi-souscategories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-souscategories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/souscategories</code></b>
        </p>
                    </form>

            <h2 id="subcategory-management-GETapi-souscategories--id-">Show SubCategory by id.</h2>

<p>
</p>



<span id="example-requests-GETapi-souscategories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/souscategories/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/souscategories/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/souscategories/2',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/souscategories/2'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-souscategories--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;sous_categorie&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Brocante&quot;,
            &quot;categorie_id&quot;: 1,
            &quot;logourl&quot;: null,
            &quot;logourlmap&quot;: null,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;categorie&quot;: {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Achats&quot;,
                &quot;shortname&quot;: &quot;Achats&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;SousCategorie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-souscategories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-souscategories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-souscategories--id-"></code></pre>
</span>
<span id="execution-error-GETapi-souscategories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-souscategories--id-"></code></pre>
</span>
<form id="form-GETapi-souscategories--id-" data-method="GET"
      data-path="api/souscategories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-souscategories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-souscategories--id-"
                    onclick="tryItOut('GETapi-souscategories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-souscategories--id-"
                    onclick="cancelTryOut('GETapi-souscategories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-souscategories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/souscategories/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-souscategories--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the subcategory.</p>
            </p>
                    </form>

            <h2 id="subcategory-management-POSTapi-souscategories">Add a new SubCategory.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-souscategories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/souscategories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Achat" \
    --form "categorie_id=5" \
    --form "logourl=@C:\Users\tchou\AppData\Local\Temp\php2449.tmp" \
    --form "logourlmap=@C:\Users\tchou\AppData\Local\Temp\php244A.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/souscategories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Achat');
body.append('categorie_id', '5');
body.append('logourl', document.querySelector('input[name="logourl"]').files[0]);
body.append('logourlmap', document.querySelector('input[name="logourlmap"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/souscategories',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Achat'
            ],
            [
                'name' =&gt; 'categorie_id',
                'contents' =&gt; '5'
            ],
            [
                'name' =&gt; 'logourl',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php2449.tmp', 'r')
            ],
            [
                'name' =&gt; 'logourlmap',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php244A.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/souscategories'
files = {
  'logourl': open('C:\Users\tchou\AppData\Local\Temp\php2449.tmp', 'rb'),
  'logourlmap': open('C:\Users\tchou\AppData\Local\Temp\php244A.tmp', 'rb')
}
payload = {
    "nom": "Achat",
    "categorie_id": 5
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-souscategories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;sous_categorie&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Brocante&quot;,
            &quot;categorie_id&quot;: 1,
            &quot;logourl&quot;: null,
            &quot;logourlmap&quot;: null,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;categorie&quot;: {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Achats&quot;,
                &quot;shortname&quot;: &quot;Achats&quot;,
                &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                &quot;vues&quot;: 0,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
            }
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation de la Sous cat&eacute;gorie reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-souscategories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-souscategories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-souscategories"></code></pre>
</span>
<span id="execution-error-POSTapi-souscategories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-souscategories"></code></pre>
</span>
<form id="form-POSTapi-souscategories" data-method="POST"
      data-path="api/souscategories"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-souscategories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-souscategories"
                    onclick="tryItOut('POSTapi-souscategories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-souscategories"
                    onclick="cancelTryOut('POSTapi-souscategories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-souscategories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/souscategories</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-souscategories" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-souscategories"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-souscategories"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name of the subcategory.</p>
        </p>
                <p>
            <b><code>categorie_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="categorie_id"
               data-endpoint="POSTapi-souscategories"
               value="5"
               data-component="body" hidden>
    <br>
<p>the id of the category.</p>
        </p>
                <p>
            <b><code>logourl</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourl"
               data-endpoint="POSTapi-souscategories"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the subcategory</p>
        </p>
                <p>
            <b><code>logourlmap</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourlmap"
               data-endpoint="POSTapi-souscategories"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the subcategory</p>
        </p>
        </form>

            <h2 id="subcategory-management-PUTapi-souscategories--id-">Update SubCategory.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-souscategories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/souscategories/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "nom=Achat" \
    --form "idcategorie=5" \
    --form "_method=PUT" \
    --form "logourl=@C:\Users\tchou\AppData\Local\Temp\php245A.tmp" \
    --form "logourlmap=@C:\Users\tchou\AppData\Local\Temp\php245B.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/souscategories/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

const body = new FormData();
body.append('nom', 'Achat');
body.append('idcategorie', '5');
body.append('_method', 'PUT');
body.append('logourl', document.querySelector('input[name="logourl"]').files[0]);
body.append('logourlmap', document.querySelector('input[name="logourlmap"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/souscategories/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nom',
                'contents' =&gt; 'Achat'
            ],
            [
                'name' =&gt; 'idcategorie',
                'contents' =&gt; '5'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'logourl',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php245A.tmp', 'r')
            ],
            [
                'name' =&gt; 'logourlmap',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php245B.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/souscategories/2'
files = {
  'logourl': open('C:\Users\tchou\AppData\Local\Temp\php245A.tmp', 'rb'),
  'logourlmap': open('C:\Users\tchou\AppData\Local\Temp\php245B.tmp', 'rb')
}
payload = {
    "nom": "Achat",
    "idcategorie": 5,
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, files=files, data=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-souscategories--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categorie&quot;: {
            &quot;id&quot;: 2,
            &quot;nom&quot;: &quot;Administrations&quot;,
            &quot;shortname&quot;: &quot;Administration&quot;,
            &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-administration.svg&quot;,
            &quot;logourlmap&quot;: &quot;/images/categories/logo/map/pin-administration.svg&quot;,
            &quot;vues&quot;: 0,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-souscategories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-souscategories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-souscategories--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-souscategories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-souscategories--id-"></code></pre>
</span>
<form id="form-PUTapi-souscategories--id-" data-method="PUT"
      data-path="api/souscategories/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-souscategories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-souscategories--id-"
                    onclick="tryItOut('PUTapi-souscategories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-souscategories--id-"
                    onclick="cancelTryOut('PUTapi-souscategories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-souscategories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/souscategories/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-souscategories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-souscategories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-souscategories--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the subcategory.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-souscategories--id-"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name of the subcategory.</p>
        </p>
                <p>
            <b><code>logourl</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourl"
               data-endpoint="PUTapi-souscategories--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the subcategory</p>
        </p>
                <p>
            <b><code>logourlmap</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="logourlmap"
               data-endpoint="PUTapi-souscategories--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>the picture of the subcategory</p>
        </p>
                <p>
            <b><code>idcategorie</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="idcategorie"
               data-endpoint="PUTapi-souscategories--id-"
               value="5"
               data-component="body" hidden>
    <br>
<p>the id of the category.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-souscategories--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="subcategory-management-DELETEapi-souscategories--id-">Delete Category.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-souscategories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/souscategories/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/souscategories/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/souscategories/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/souscategories/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-souscategories--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-souscategories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-souscategories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-souscategories--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-souscategories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-souscategories--id-"></code></pre>
</span>
<form id="form-DELETEapi-souscategories--id-" data-method="DELETE"
      data-path="api/souscategories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-souscategories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-souscategories--id-"
                    onclick="tryItOut('DELETEapi-souscategories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-souscategories--id-"
                    onclick="cancelTryOut('DELETEapi-souscategories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-souscategories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/souscategories/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-souscategories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-souscategories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-souscategories--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the subcategory.</p>
            </p>
                    </form>

            <h2 id="subcategory-management-GETapi-search-souscategories">Search SubCategory.</h2>

<p>
</p>



<span id="example-requests-GETapi-search-souscategories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/search/souscategories?q=piscine" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/search/souscategories"
);

const params = {
    "q": "piscine",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/search/souscategories',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'query' =&gt; [
            'q'=&gt; 'piscine',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/search/souscategories'
params = {
  'q': 'piscine',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-search-souscategories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;sous_categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Boutiques&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 2,
                &quot;nom&quot;: &quot;Brocante&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 3,
                &quot;nom&quot;: &quot;Supermarch&eacute;&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 4,
                &quot;nom&quot;: &quot;Epicerie&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 5,
                &quot;nom&quot;: &quot;Blanchisseries et Pressings&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 6,
                &quot;nom&quot;: &quot;Centre Commercial&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 7,
                &quot;nom&quot;: &quot;Maison et Jardin&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 8,
                &quot;nom&quot;: &quot;Hifi, t&eacute;l&eacute;phonie&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 9,
                &quot;nom&quot;: &quot;Fleuriste&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 10,
                &quot;nom&quot;: &quot;Boulangerie, P&acirc;tisserie&quot;,
                &quot;categorie_id&quot;: 1,
                &quot;logourl&quot;: null,
                &quot;logourlmap&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                &quot;categorie&quot;: {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Achats&quot;,
                    &quot;shortname&quot;: &quot;Achats&quot;,
                    &quot;logourl&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;logourlmap&quot;: &quot;/images/categories/logo/icon-list-categorie-achats.svg&quot;,
                    &quot;vues&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-30T22:14:10.000000Z&quot;
                }
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Sous-Categories&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-search-souscategories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-search-souscategories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-search-souscategories"></code></pre>
</span>
<span id="execution-error-GETapi-search-souscategories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-search-souscategories"></code></pre>
</span>
<form id="form-GETapi-search-souscategories" data-method="GET"
      data-path="api/search/souscategories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-search-souscategories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-search-souscategories"
                    onclick="tryItOut('GETapi-search-souscategories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-search-souscategories"
                    onclick="cancelTryOut('GETapi-search-souscategories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-search-souscategories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/search/souscategories</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>q</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="q"
               data-endpoint="GETapi-search-souscategories"
               value="piscine"
               data-component="query" hidden>
    <br>
<p>search value.</p>
            </p>
                </form>

        <h1 id="tracking-management">Tracking management</h1>

    <p>APIs for managing Tracking</p>

            <h2 id="tracking-management-POSTapi-trackings">Add a new Tracking.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-trackings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/trackings" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"longitude\": \"12\",
    \"latitude\": \"4\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/trackings"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "longitude": "12",
    "latitude": "4"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/trackings',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'longitude' =&gt; '12',
            'latitude' =&gt; '4',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/trackings'
payload = {
    "longitude": "12",
    "latitude": "4"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-trackings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;tracking&quot;: {
            &quot;longitude&quot;: &quot;12&quot;,
            &quot;latitude&quot;: &quot;4&quot;,
            &quot;user_id&quot;: 1,
            &quot;updated_at&quot;: &quot;2022-08-31T02:11:30.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T02:11:30.000000Z&quot;,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Ajout de la position reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-trackings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-trackings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-trackings"></code></pre>
</span>
<span id="execution-error-POSTapi-trackings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-trackings"></code></pre>
</span>
<form id="form-POSTapi-trackings" data-method="POST"
      data-path="api/trackings"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-trackings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-trackings"
                    onclick="tryItOut('POSTapi-trackings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-trackings"
                    onclick="cancelTryOut('POSTapi-trackings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-trackings" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/trackings</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-trackings" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-trackings"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="longitude"
               data-endpoint="POSTapi-trackings"
               value="12"
               data-component="body" hidden>
    <br>
<p>longitude.</p>
        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="latitude"
               data-endpoint="POSTapi-trackings"
               value="4"
               data-component="body" hidden>
    <br>
<p>latitude.</p>
        </p>
        </form>

            <h2 id="tracking-management-POSTapi-tracking">Add a new Tracking.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-tracking">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/tracking" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"longitude\": \"12\",
    \"latitude\": \"4\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tracking"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "longitude": "12",
    "latitude": "4"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/tracking',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'longitude' =&gt; '12',
            'latitude' =&gt; '4',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/tracking'
payload = {
    "longitude": "12",
    "latitude": "4"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-tracking">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;tracking&quot;: {
            &quot;longitude&quot;: &quot;12&quot;,
            &quot;latitude&quot;: &quot;4&quot;,
            &quot;user_id&quot;: 1,
            &quot;updated_at&quot;: &quot;2022-08-31T02:11:30.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T02:11:30.000000Z&quot;,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Ajout de la position reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-tracking" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tracking"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tracking"></code></pre>
</span>
<span id="execution-error-POSTapi-tracking" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tracking"></code></pre>
</span>
<form id="form-POSTapi-tracking" data-method="POST"
      data-path="api/tracking"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tracking', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tracking"
                    onclick="tryItOut('POSTapi-tracking');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tracking"
                    onclick="cancelTryOut('POSTapi-tracking');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tracking" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tracking</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-tracking" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-tracking"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="longitude"
               data-endpoint="POSTapi-tracking"
               value="12"
               data-component="body" hidden>
    <br>
<p>longitude.</p>
        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="latitude"
               data-endpoint="POSTapi-tracking"
               value="4"
               data-component="body" hidden>
    <br>
<p>latitude.</p>
        </p>
        </form>

        <h1 id="typecommodite-management">TypeCommodite management</h1>

    <p>APIs for managing TypeCommodite</p>

            <h2 id="typecommodite-management-GETapi-typecommodites">Get all Type Commodite.</h2>

<p>
</p>



<span id="example-requests-GETapi-typecommodites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/typecommodites" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/typecommodites"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/typecommodites',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/typecommodites'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-typecommodites">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;types_commodites&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;,
                &quot;commodites&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;nom&quot;: &quot;Wifi +&quot;,
                        &quot;type_commodite_id&quot;: 1,
                        &quot;deleted_at&quot;: null,
                        &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;
                    }
                ]
            }
        ]
    },
    &quot;message&quot;: &quot;Liste des Types de Commodit&eacute;s&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-typecommodites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-typecommodites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-typecommodites"></code></pre>
</span>
<span id="execution-error-GETapi-typecommodites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-typecommodites"></code></pre>
</span>
<form id="form-GETapi-typecommodites" data-method="GET"
      data-path="api/typecommodites"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-typecommodites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-typecommodites"
                    onclick="tryItOut('GETapi-typecommodites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-typecommodites"
                    onclick="cancelTryOut('GETapi-typecommodites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-typecommodites" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/typecommodites</code></b>
        </p>
                    </form>

            <h2 id="typecommodite-management-GETapi-typecommodites--id-">Show Type Commodite by id.</h2>

<p>
</p>



<span id="example-requests-GETapi-typecommodites--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/typecommodites/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/typecommodites/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/typecommodites/2',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/typecommodites/2'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-typecommodites--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;type_commodite&quot;: {
            &quot;id&quot;: 1,
            &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;,
            &quot;commodites&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Wifi +&quot;,
                    &quot;type_commodite_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Type Commodite&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-typecommodites--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-typecommodites--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-typecommodites--id-"></code></pre>
</span>
<span id="execution-error-GETapi-typecommodites--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-typecommodites--id-"></code></pre>
</span>
<form id="form-GETapi-typecommodites--id-" data-method="GET"
      data-path="api/typecommodites/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-typecommodites--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-typecommodites--id-"
                    onclick="tryItOut('GETapi-typecommodites--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-typecommodites--id-"
                    onclick="cancelTryOut('GETapi-typecommodites--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-typecommodites--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/typecommodites/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-typecommodites--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the type commodite.</p>
            </p>
                    </form>

            <h2 id="typecommodite-management-POSTapi-typecommodites">Add a new Type Commodite.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-typecommodites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/typecommodites" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"nom\": \"Achat\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/typecommodites"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "nom": "Achat"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/typecommodites',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'nom' =&gt; 'Achat',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/typecommodites'
payload = {
    "nom": "Achat"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-typecommodites">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;type_commodite&quot;: {
            &quot;nom&quot;: &quot;Bien-&ecirc;tre&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
            &quot;id&quot;: 1
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation du type de commodit&eacute; reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-typecommodites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-typecommodites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-typecommodites"></code></pre>
</span>
<span id="execution-error-POSTapi-typecommodites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-typecommodites"></code></pre>
</span>
<form id="form-POSTapi-typecommodites" data-method="POST"
      data-path="api/typecommodites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-typecommodites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-typecommodites"
                    onclick="tryItOut('POSTapi-typecommodites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-typecommodites"
                    onclick="cancelTryOut('POSTapi-typecommodites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-typecommodites" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/typecommodites</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-typecommodites" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-typecommodites"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="POSTapi-typecommodites"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name of the type commodite.</p>
        </p>
        </form>

            <h2 id="typecommodite-management-PUTapi-typecommodites--id-">Update Type Commodite.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-typecommodites--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/typecommodites/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --data "{
    \"nom\": \"Achat\",
    \"_method\": \"PUT\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/typecommodites/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

let body = {
    "nom": "Achat",
    "_method": "PUT"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/typecommodites/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
        'json' =&gt; [
            'nom' =&gt; 'Achat',
            '_method' =&gt; 'PUT',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/typecommodites/2'
payload = {
    "nom": "Achat",
    "_method": "PUT"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-typecommodites--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;type_commodite&quot;: {
            &quot;id&quot;: 1,
            &quot;nom&quot;: &quot;Bien &ecirc;tre&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-08-31T01:22:35.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-31T01:23:56.000000Z&quot;,
            &quot;commodites&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;nom&quot;: &quot;Wifi +&quot;,
                    &quot;type_commodite_id&quot;: 1,
                    &quot;deleted_at&quot;: null,
                    &quot;created_at&quot;: &quot;2022-08-31T01:25:19.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-08-31T01:28:27.000000Z&quot;
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-typecommodites--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-typecommodites--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-typecommodites--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-typecommodites--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-typecommodites--id-"></code></pre>
</span>
<form id="form-PUTapi-typecommodites--id-" data-method="PUT"
      data-path="api/typecommodites/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-typecommodites--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-typecommodites--id-"
                    onclick="tryItOut('PUTapi-typecommodites--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-typecommodites--id-"
                    onclick="cancelTryOut('PUTapi-typecommodites--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-typecommodites--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/typecommodites/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-typecommodites--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-typecommodites--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-typecommodites--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the type commodite.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nom"
               data-endpoint="PUTapi-typecommodites--id-"
               value="Achat"
               data-component="body" hidden>
    <br>
<p>the name of the type commodite.</p>
        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-typecommodites--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update (change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="typecommodite-management-DELETEapi-typecommodites--id-">Delete Category.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-typecommodites--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/typecommodites/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/typecommodites/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Authorization": "apiKey",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/typecommodites/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'X-Authorization' =&gt; 'apiKey',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/typecommodites/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-typecommodites--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: &quot;&quot;,
    &quot;message&quot;: &quot;Delete Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-typecommodites--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-typecommodites--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-typecommodites--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-typecommodites--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-typecommodites--id-"></code></pre>
</span>
<form id="form-DELETEapi-typecommodites--id-" data-method="DELETE"
      data-path="api/typecommodites/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-typecommodites--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-typecommodites--id-"
                    onclick="tryItOut('DELETEapi-typecommodites--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-typecommodites--id-"
                    onclick="cancelTryOut('DELETEapi-typecommodites--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-typecommodites--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/typecommodites/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-typecommodites--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-typecommodites--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-typecommodites--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the type commodite.</p>
            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                                                        <button type="button" class="lang-button" data-language-name="python">python</button>
                            </div>
            </div>
</div>
</body>
</html>
