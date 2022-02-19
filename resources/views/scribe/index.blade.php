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
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
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
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="commerciaux-management">
                    <a href="#commerciaux-management">Commerciaux management</a>
                </li>
                                    <ul id="tocify-subheader-commerciaux-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="commerciaux-management-GETapi-commercials--id-">
                        <a href="#commerciaux-management-GETapi-commercials--id-">Show Commercial by id.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commerciaux-management-GETapi-commercials">
                        <a href="#commerciaux-management-GETapi-commercials">Get all Commerciaux.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commerciaux-management-POSTapi-commercials">
                        <a href="#commerciaux-management-POSTapi-commercials">Add a new Commercial.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commerciaux-management-PUTapi-commercials--id-">
                        <a href="#commerciaux-management-PUTapi-commercials--id-">Add a new Commercial.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="commerciaux-management-DELETEapi-commercials--id-">
                        <a href="#commerciaux-management-DELETEapi-commercials--id-">Delete commercial account.</a>
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
        <li>Last updated: February 19 2022</li>
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
<p>Authenticate requests to this API's endpoints by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="account-management">Account management</h1>

    

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
    \"token\": \"qui\",
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
    "token": "qui",
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
            'token' =&gt; 'qui',
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
    "token": "qui",
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
               value="qui"
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
    --form "file=@C:\Users\tchou\AppData\Local\Temp\php5FE7.tmp" </code></pre></div>


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
body.append('file', document.querySelector('input[name="file"]').files[0]);

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
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php5FE7.tmp', 'r')
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
  'file': open('C:\Users\tchou\AppData\Local\Temp\php5FE7.tmp', 'rb')
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
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWUyMThhMzA4ODhmZDZhMTJiMGUxYjI4NDY0Njc0MzFhZTAzMzQwODI2ODcwYTNiOGRmMDJjZGJmYzk1MTEzNjE0YTJkZTgxZTAxMmMzZjAiLCJpYXQiOjE2NDUxMDAxODAuNTgxNTYyLCJuYmYiOjE2NDUxMDAxODAuNTgxNTY2LCJleHAiOjE2NDc2OTIxODAuNTY2NDg2LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.fG6kq7zeAIlKhCd1rHWoKkqoB2O38pHrP4aMmgPY41mxztquA2FlZEFboMx6qlhAyr54WBQKcEP2LKu-n_qFEcFI2KOIY3xGUvNM8eOBc2SPWgmESxH-t1VeJ0Sec7kT73oDWlzC66XFXa6hvaIcqwxwhQ0UGgl7NeeVHWgcQ1Hc97FJJobPZMsQy5jyU0Ud41b5LXzLdnH0WFn29eGNt5Tw3hg-HxYdUBbvb9g0rdfGOn11IYHooyzFl0mQvDnjt-2sODHAW3fQ3VBCP4wgJPuyFGGfp2gEooupETNcpj6_-XGusjCwkwST1zL59T2hBMXZpseozGfYD66EohfeS04KDUTYXLOX6Zi4xAvlJyXqo4112EEww0pwHOCz1LeLHCfaBuIMmtfGZwLhtF7J6xRqrY_9V4cMWbdguWvpNENFyg-sgH0DXxIawY72MzEFcIzfczdQTmURoDD7vpkyQZHr8lZYLU1dZnLK-74mImXnuMsTb8G7XTcATi4gvf7_240gPpY0xRkyEVt0Pw35NYwh-VrQYee5lvXuT9RlJUAineFaTRkIpz3aDnAF2uQ1BBwIeZGS3xfllnDTp8kemOSQQRwLbiYmHQj2xMjicGQGK3umvKOq7UtY4fFYnpabAMdQkxLaF73a5S1Zf3-CiNEH4JHiZ6UbxtYHp3Qfw1M&quot;,
        &quot;user&quot;: {
            &quot;email&quot;: &quot;infos@geo.sm&quot;,
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;phone&quot;: &quot;699999997&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T12:16:16.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-02-17T12:16:16.000000Z&quot;,
            &quot;id&quot;: 3,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;user&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 3,
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
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
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
        &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGE2ZWRlYzY5OGM2NTcxYzg5NjkyN2QzMmYyYzRiMzE4NDA1MWFiMWM1ODM1NjQyMDEyODY0YzEzYWNmNDM5N2JlNDU3Njg4NzdiMWNjMzAiLCJpYXQiOjE2NDUxMDA2NjQuOTA0NTU3LCJuYmYiOjE2NDUxMDA2NjQuOTA0NTYsImV4cCI6MTY0NzY5MjY2NC45MDAxODQsInN1YiI6IjMiLCJzY29wZXMiOltdfQ.WBpakLxW0HADFThmYnz0q7EuyLYUoWRbmNFWAlzONvEfwWN8RtfWJN5It4dFWzY1IXi6yfIT6ND5P9IO0ihum61pnExgIYSmTn_r1Y43CR2ng8YZXXJT7Tx3mb3tOoy26fnF0sr2WV7wfP5GxPRLpqbGWxmHhfaP8nu2sjt7xoODl1bY7VDqv5Mt_onSxyWrRVWx6ClYd1DWbBvX3Cdc97GPitRqw_F15kQi7H-rdaqz9WbxLbCBjQHrPU_kkZfHc_yUbmhBgaua4VztKtQ5VgYeEFZhlls_cej-XfSq3owj9FVrhQsjWtlYjOk3M9RghPji-s6NeCawhFmJ1y-uEQDIKaLDW9uk3U5UwJ67ZK2ki2vjmVaaK-x72DBAtrVKILqZF1XysLbz6hZEqtLngldRIrYvbb_L7SyuaupYKgCoVUozbQbtadKGAv_QHEEtH6d7T2BUwfNJbnyk1WuY8r-B1gArKgkwAW71-NwVKRF50X-r3yrmWPMJG9Bo8b6ndupWptRNyrzlS1CSgT5cqt9hL51BjcsiLAqmopXoY2G-Nl5gR2egcJpDzTJzdeXCnAihzDsA0arlm0GZr6UZtBSOuKXY0FBLtDWaU19ZS6sZdNAI_BKz-3QYc-hY3uIE263ZQNRt159qMNovGsSbb56l_aFhMEV39uMiivNycwo&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;infos@geo.sm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-02-17T12:16:39.000000Z&quot;,
            &quot;phone&quot;: &quot;699999997&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: null,
            &quot;created_at&quot;: &quot;2022-02-17T12:16:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T12:16:39.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;user&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 3,
                        &quot;role_id&quot;: 4,
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
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;infos@geo.sm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-02-17T12:16:39.000000Z&quot;,
            &quot;phone&quot;: &quot;699999997&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: null,
            &quot;created_at&quot;: &quot;2022-02-17T12:16:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T12:16:39.000000Z&quot;
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
    --form "file=@C:\Users\tchou\AppData\Local\Temp\php6007.tmp" </code></pre></div>


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
body.append('file', document.querySelector('input[name="file"]').files[0]);

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
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php6007.tmp', 'r')
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
  'file': open('C:\Users\tchou\AppData\Local\Temp\php6007.tmp', 'rb')
}
payload = {
    "name": "Gautier",
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
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
               data-endpoint="POSTapi-user-update--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
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
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;isSuperAdmin&quot;: true,
            &quot;idUser&quot;: 1,
            &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@position.cm&quot;,
                &quot;email_verified_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                &quot;phone&quot;: &quot;699999999&quot;,
                &quot;fcmToken&quot;: null,
                &quot;imageProfil&quot;: null,
                &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;admin&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 1,
                            &quot;role_id&quot;: 1,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;isSuperAdmin&quot;: false,
            &quot;idUser&quot;: 2,
            &quot;created_at&quot;: &quot;2022-02-17T10:40:40.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T10:40:40.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Gautier&quot;,
                &quot;email&quot;: &quot;bt@geo.sm&quot;,
                &quot;email_verified_at&quot;: &quot;2022-02-17T10:40:58.000000Z&quot;,
                &quot;phone&quot;: &quot;699999998&quot;,
                &quot;fcmToken&quot;: null,
                &quot;imageProfil&quot;: &quot;/storage/uploads/admins/profils/1645094432_images.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-02-17T10:40:32.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-02-17T10:40:58.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;admin&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 2,
                            &quot;role_id&quot;: 1,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;isSuperAdmin&quot;: false,
            &quot;idUser&quot;: 5,
            &quot;created_at&quot;: &quot;2022-02-17T16:33:35.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T16:33:35.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Gautier Admin&quot;,
                &quot;email&quot;: &quot;tchoukouahaborris@outlook.fr&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;phone&quot;: &quot;699999996&quot;,
                &quot;fcmToken&quot;: null,
                &quot;imageProfil&quot;: &quot;/storage/uploads/admins/profils/1645115599_images.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-02-17T16:33:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-02-17T16:33:19.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;admin&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 5,
                            &quot;role_id&quot;: 1,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        }
    ],
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
    --form "file=@C:\Users\tchou\AppData\Local\Temp\php6057.tmp" </code></pre></div>


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
body.append('file', document.querySelector('input[name="file"]').files[0]);

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
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php6057.tmp', 'r')
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
  'file': open('C:\Users\tchou\AppData\Local\Temp\php6057.tmp', 'rb')
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
        &quot;idUser&quot;: 5,
        &quot;updated_at&quot;: &quot;2022-02-17T16:33:35.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-02-17T16:33:35.000000Z&quot;,
        &quot;id&quot;: 3,
        &quot;user&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Gautier Admin&quot;,
            &quot;email&quot;: &quot;tchoukouahaborris@outlook.fr&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;phone&quot;: &quot;699999996&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/admins/profils/1645115599_images.jpg&quot;,
            &quot;created_at&quot;: &quot;2022-02-17T16:33:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T16:33:19.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;admin&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 1,
                        &quot;role_id&quot;: 1,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
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
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
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
        &quot;id&quot;: 2,
        &quot;isSuperAdmin&quot;: false,
        &quot;idUser&quot;: 2,
        &quot;created_at&quot;: &quot;2022-02-17T10:40:40.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-02-17T10:40:40.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-02-17T10:40:58.000000Z&quot;,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/admins/profils/1645094432_images.jpg&quot;,
            &quot;created_at&quot;: &quot;2022-02-17T10:40:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T10:40:58.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;admin&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 1,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
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
    --form "file=@C:\Users\tchou\AppData\Local\Temp\php6077.tmp" </code></pre></div>


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
body.append('file', document.querySelector('input[name="file"]').files[0]);

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
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php6077.tmp', 'r')
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
  'file': open('C:\Users\tchou\AppData\Local\Temp\php6077.tmp', 'rb')
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
        &quot;id&quot;: 2,
        &quot;isSuperAdmin&quot;: false,
        &quot;idUser&quot;: 2,
        &quot;created_at&quot;: &quot;2022-02-17T10:40:40.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-02-17T10:40:40.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Gautier Admin 10&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;email_verified_at&quot;: &quot;2022-02-17T10:40:58.000000Z&quot;,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/admins/profils/1645118009_Image1.png&quot;,
            &quot;created_at&quot;: &quot;2022-02-17T10:40:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-17T17:13:29.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;admin&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-17T10:38:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 2,
                        &quot;role_id&quot;: 1,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
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
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
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
<p>&quot;required if update image(change the PUT method of the request by the POST method)&quot;</p>
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

        <h1 id="commerciaux-management">Commerciaux management</h1>

    <p>APIs for managing Admin</p>

            <h2 id="commerciaux-management-GETapi-commercials--id-">Show Commercial by id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-commercials--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/commercials/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercials/2"
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
    'http://localhost:8000/api/commercials/2',
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

url = 'http://localhost:8000/api/commercials/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-commercials--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;idUser&quot;: 3,
        &quot;numeroCni&quot;: 1256987,
        &quot;numeroBadge&quot;: 1325,
        &quot;ville&quot;: &quot;Douala&quot;,
        &quot;quartier&quot;: &quot;Melen&quot;,
        &quot;actif&quot;: true,
        &quot;sexe&quot;: &quot;Masculin&quot;,
        &quot;whatsapp&quot;: 699999999,
        &quot;diplome&quot;: &quot;BAC&quot;,
        &quot;tailleTshirt&quot;: &quot;XXL&quot;,
        &quot;age&quot;: 25,
        &quot;deleted_at&quot;: null,
        &quot;created_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/commerciaux/profils/1645269905_images.jpg&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;commercial&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 3,
                        &quot;role_id&quot;: 2,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Commercial&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-commercials--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-commercials--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercials--id-"></code></pre>
</span>
<span id="execution-error-GETapi-commercials--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercials--id-"></code></pre>
</span>
<form id="form-GETapi-commercials--id-" data-method="GET"
      data-path="api/commercials/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-commercials--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-commercials--id-"
                    onclick="tryItOut('GETapi-commercials--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-commercials--id-"
                    onclick="cancelTryOut('GETapi-commercials--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-commercials--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/commercials/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-commercials--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-commercials--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-commercials--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the commercial.</p>
            </p>
                    </form>

            <h2 id="commerciaux-management-GETapi-commercials">Get all Commerciaux.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-commercials">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/commercials" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercials"
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
    'http://localhost:8000/api/commercials',
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

url = 'http://localhost:8000/api/commercials'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-commercials">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;idUser&quot;: 3,
            &quot;numeroCni&quot;: 1256987,
            &quot;numeroBadge&quot;: 1325,
            &quot;ville&quot;: &quot;Douala&quot;,
            &quot;quartier&quot;: &quot;Melen&quot;,
            &quot;actif&quot;: true,
            &quot;sexe&quot;: &quot;Masculin&quot;,
            &quot;whatsapp&quot;: 699999999,
            &quot;diplome&quot;: &quot;BAC&quot;,
            &quot;tailleTshirt&quot;: &quot;XXL&quot;,
            &quot;age&quot;: 25,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Gautier&quot;,
                &quot;email&quot;: &quot;bt@geo.sm&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;phone&quot;: &quot;699999998&quot;,
                &quot;fcmToken&quot;: null,
                &quot;imageProfil&quot;: &quot;/storage/uploads/commerciaux/profils/1645269905_images.jpg&quot;,
                &quot;deleted_at&quot;: null,
                &quot;created_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;commercial&quot;,
                        &quot;guard_name&quot;: &quot;api&quot;,
                        &quot;created_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;model_id&quot;: 3,
                            &quot;role_id&quot;: 2,
                            &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                        }
                    }
                ]
            }
        }
    ],
    &quot;message&quot;: &quot;Liste des Commerciaux&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-commercials" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-commercials"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercials"></code></pre>
</span>
<span id="execution-error-GETapi-commercials" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercials"></code></pre>
</span>
<form id="form-GETapi-commercials" data-method="GET"
      data-path="api/commercials"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-commercials', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-commercials"
                    onclick="tryItOut('GETapi-commercials');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-commercials"
                    onclick="cancelTryOut('GETapi-commercials');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-commercials" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/commercials</code></b>
        </p>
                <p>
            <label id="auth-GETapi-commercials" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-commercials"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="commerciaux-management-POSTapi-commercials">Add a new Commercial.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-commercials">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/commercials" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "name=Gautier" \
    --form "email=gautier@position.cm" \
    --form "phone=699999999" \
    --form "numeroCni=1256987" \
    --form "numeroBadge=1234568" \
    --form "ville=Douala" \
    --form "quartier=Melen" \
    --form "sexe=Masculin" \
    --form "whatsapp=699999999" \
    --form "diplome=BAC" \
    --form "tailleTshirt=XXL" \
    --form "age=25" \
    --form "password=gautier123" \
    --form "file=@C:\Users\tchou\AppData\Local\Temp\php6088.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercials"
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
body.append('phone', '699999999');
body.append('numeroCni', '1256987');
body.append('numeroBadge', '1234568');
body.append('ville', 'Douala');
body.append('quartier', 'Melen');
body.append('sexe', 'Masculin');
body.append('whatsapp', '699999999');
body.append('diplome', 'BAC');
body.append('tailleTshirt', 'XXL');
body.append('age', '25');
body.append('password', 'gautier123');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/commercials',
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
                'name' =&gt; 'phone',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'numeroCni',
                'contents' =&gt; '1256987'
            ],
            [
                'name' =&gt; 'numeroBadge',
                'contents' =&gt; '1234568'
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
                'name' =&gt; 'sexe',
                'contents' =&gt; 'Masculin'
            ],
            [
                'name' =&gt; 'whatsapp',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'diplome',
                'contents' =&gt; 'BAC'
            ],
            [
                'name' =&gt; 'tailleTshirt',
                'contents' =&gt; 'XXL'
            ],
            [
                'name' =&gt; 'age',
                'contents' =&gt; '25'
            ],
            [
                'name' =&gt; 'password',
                'contents' =&gt; 'gautier123'
            ],
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php6088.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercials'
files = {
  'file': open('C:\Users\tchou\AppData\Local\Temp\php6088.tmp', 'rb')
}
payload = {
    "name": "Gautier",
    "email": "gautier@position.cm",
    "phone": 699999999,
    "numeroCni": 1256987,
    "numeroBadge": 1234568,
    "ville": "Douala",
    "quartier": "Melen",
    "sexe": "Masculin",
    "whatsapp": 699999999,
    "diplome": "BAC",
    "tailleTshirt": "XXL",
    "age": 25,
    "password": "gautier123"
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

<span id="example-responses-POSTapi-commercials">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;numeroCni&quot;: &quot;1256987&quot;,
        &quot;numeroBadge&quot;: &quot;1325&quot;,
        &quot;ville&quot;: &quot;Douala&quot;,
        &quot;quartier&quot;: &quot;Melen&quot;,
        &quot;sexe&quot;: &quot;Masculin&quot;,
        &quot;whatsapp&quot;: &quot;699999999&quot;,
        &quot;diplome&quot;: &quot;BAC&quot;,
        &quot;tailleTshirt&quot;: &quot;XXL&quot;,
        &quot;age&quot;: &quot;25&quot;,
        &quot;idUser&quot;: 3,
        &quot;updated_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
        &quot;id&quot;: 1,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gautier&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/commerciaux/profils/1645269905_images.jpg&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;commercial&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 3,
                        &quot;role_id&quot;: 2,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Cr&eacute;ation du commercial reussie&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-commercials" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-commercials"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-commercials"></code></pre>
</span>
<span id="execution-error-POSTapi-commercials" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-commercials"></code></pre>
</span>
<form id="form-POSTapi-commercials" data-method="POST"
      data-path="api/commercials"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-commercials', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-commercials"
                    onclick="tryItOut('POSTapi-commercials');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-commercials"
                    onclick="cancelTryOut('POSTapi-commercials');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-commercials" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/commercials</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-commercials" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-commercials"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-commercials"
               value="Gautier"
               data-component="body" hidden>
    <br>
<p>the name of the commercial.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-commercials"
               value="gautier@position.cm"
               data-component="body" hidden>
    <br>
<p>the email of the commercial.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="POSTapi-commercials"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>The phone number of the commercial.</p>
        </p>
                <p>
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
               data-endpoint="POSTapi-commercials"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
        </p>
                <p>
            <b><code>numeroCni</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="numeroCni"
               data-endpoint="POSTapi-commercials"
               value="1256987"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>numeroBadge</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="numeroBadge"
               data-endpoint="POSTapi-commercials"
               value="1234568"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>ville</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="ville"
               data-endpoint="POSTapi-commercials"
               value="Douala"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>quartier</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="quartier"
               data-endpoint="POSTapi-commercials"
               value="Melen"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>sexe</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sexe"
               data-endpoint="POSTapi-commercials"
               value="Masculin"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>whatsapp</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="whatsapp"
               data-endpoint="POSTapi-commercials"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>diplome</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="diplome"
               data-endpoint="POSTapi-commercials"
               value="BAC"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>tailleTshirt</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="tailleTshirt"
               data-endpoint="POSTapi-commercials"
               value="XXL"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>age</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="age"
               data-endpoint="POSTapi-commercials"
               value="25"
               data-component="body" hidden>
    <br>
<p>required.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-commercials"
               value="gautier123"
               data-component="body" hidden>
    <br>
<p>the password of the commercial.</p>
        </p>
        </form>

            <h2 id="commerciaux-management-PUTapi-commercials--id-">Add a new Commercial.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-commercials--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/commercials/6" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey" \
    --form "name=Gautier" \
    --form "phone=699999999" \
    --form "numeroCni=1256987" \
    --form "numeroBadge=1234568" \
    --form "ville=Douala" \
    --form "quartier=Melen" \
    --form "sexe=Masculin" \
    --form "whatsapp=699999999" \
    --form "diplome=BAC" \
    --form "tailleTshirt=XXL" \
    --form "age=25" \
    --form "_method=PUT" \
    --form "file=@C:\Users\tchou\AppData\Local\Temp\php6046.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercials/6"
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
body.append('numeroCni', '1256987');
body.append('numeroBadge', '1234568');
body.append('ville', 'Douala');
body.append('quartier', 'Melen');
body.append('sexe', 'Masculin');
body.append('whatsapp', '699999999');
body.append('diplome', 'BAC');
body.append('tailleTshirt', 'XXL');
body.append('age', '25');
body.append('_method', 'PUT');
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/commercials/6',
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
                'name' =&gt; 'numeroCni',
                'contents' =&gt; '1256987'
            ],
            [
                'name' =&gt; 'numeroBadge',
                'contents' =&gt; '1234568'
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
                'name' =&gt; 'sexe',
                'contents' =&gt; 'Masculin'
            ],
            [
                'name' =&gt; 'whatsapp',
                'contents' =&gt; '699999999'
            ],
            [
                'name' =&gt; 'diplome',
                'contents' =&gt; 'BAC'
            ],
            [
                'name' =&gt; 'tailleTshirt',
                'contents' =&gt; 'XXL'
            ],
            [
                'name' =&gt; 'age',
                'contents' =&gt; '25'
            ],
            [
                'name' =&gt; '_method',
                'contents' =&gt; 'PUT'
            ],
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\tchou\AppData\Local\Temp\php6046.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercials/6'
files = {
  'file': open('C:\Users\tchou\AppData\Local\Temp\php6046.tmp', 'rb')
}
payload = {
    "name": "Gautier",
    "phone": 699999999,
    "numeroCni": "1256987",
    "numeroBadge": "1234568",
    "ville": "Douala",
    "quartier": "Melen",
    "sexe": "Masculin",
    "whatsapp": "699999999",
    "diplome": "BAC",
    "tailleTshirt": "XXL",
    "age": "25",
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

<span id="example-responses-PUTapi-commercials--id-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;idUser&quot;: 3,
        &quot;numeroCni&quot;: 1256987,
        &quot;numeroBadge&quot;: 1325,
        &quot;ville&quot;: &quot;Douala&quot;,
        &quot;quartier&quot;: &quot;Melen&quot;,
        &quot;actif&quot;: true,
        &quot;sexe&quot;: &quot;Masculin&quot;,
        &quot;whatsapp&quot;: 699999999,
        &quot;diplome&quot;: &quot;BAC&quot;,
        &quot;tailleTshirt&quot;: &quot;XXL&quot;,
        &quot;age&quot;: 25,
        &quot;deleted_at&quot;: null,
        &quot;created_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-02-19T11:25:11.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gautier 2000&quot;,
            &quot;email&quot;: &quot;bt@geo.sm&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;phone&quot;: &quot;699999998&quot;,
            &quot;fcmToken&quot;: null,
            &quot;imageProfil&quot;: &quot;/storage/uploads/commerciaux/profils/1645269905_images.jpg&quot;,
            &quot;deleted_at&quot;: null,
            &quot;created_at&quot;: &quot;2022-02-19T11:25:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-02-19T19:10:29.000000Z&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;commercial&quot;,
                    &quot;guard_name&quot;: &quot;api&quot;,
                    &quot;created_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2022-02-18T10:11:34.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;model_id&quot;: 3,
                        &quot;role_id&quot;: 2,
                        &quot;model_type&quot;: &quot;App\\Models\\User&quot;
                    }
                }
            ]
        }
    },
    &quot;message&quot;: &quot;Update Success&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-commercials--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-commercials--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-commercials--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-commercials--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-commercials--id-"></code></pre>
</span>
<form id="form-PUTapi-commercials--id-" data-method="PUT"
      data-path="api/commercials/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-commercials--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-commercials--id-"
                    onclick="tryItOut('PUTapi-commercials--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-commercials--id-"
                    onclick="cancelTryOut('PUTapi-commercials--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-commercials--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/commercials/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-commercials--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-commercials--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-commercials--id-"
               value="6"
               data-component="url" hidden>
    <br>
<p>The ID of the commercial.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-commercials--id-"
               value="Gautier"
               data-component="body" hidden>
    <br>
<p>the name of the commercial.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="phone"
               data-endpoint="PUTapi-commercials--id-"
               value="699999999"
               data-component="body" hidden>
    <br>
<p>The phone number of the commercial.</p>
        </p>
                <p>
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
               data-endpoint="PUTapi-commercials--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>Profile Image.</p>
        </p>
                <p>
            <b><code>numeroCni</code></b>&nbsp;&nbsp;<small>int.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="numeroCni"
               data-endpoint="PUTapi-commercials--id-"
               value="1256987"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>numeroBadge</code></b>&nbsp;&nbsp;<small>int.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="numeroBadge"
               data-endpoint="PUTapi-commercials--id-"
               value="1234568"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>ville</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="ville"
               data-endpoint="PUTapi-commercials--id-"
               value="Douala"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>quartier</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="quartier"
               data-endpoint="PUTapi-commercials--id-"
               value="Melen"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>sexe</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sexe"
               data-endpoint="PUTapi-commercials--id-"
               value="Masculin"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>whatsapp</code></b>&nbsp;&nbsp;<small>int.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="whatsapp"
               data-endpoint="PUTapi-commercials--id-"
               value="699999999"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>diplome</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="diplome"
               data-endpoint="PUTapi-commercials--id-"
               value="BAC"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>tailleTshirt</code></b>&nbsp;&nbsp;<small>string.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="tailleTshirt"
               data-endpoint="PUTapi-commercials--id-"
               value="XXL"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>age</code></b>&nbsp;&nbsp;<small>int.</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="age"
               data-endpoint="PUTapi-commercials--id-"
               value="25"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>_method</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="_method"
               data-endpoint="PUTapi-commercials--id-"
               value="PUT"
               data-component="body" hidden>
    <br>
<p>&quot;required if update image(change the PUT method of the request by the POST method)&quot;</p>
        </p>
        </form>

            <h2 id="commerciaux-management-DELETEapi-commercials--id-">Delete commercial account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-commercials--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/commercials/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "X-Authorization: apiKey"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercials/2"
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
    'http://localhost:8000/api/commercials/2',
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

url = 'http://localhost:8000/api/commercials/2'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'X-Authorization': 'apiKey'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-commercials--id-">
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
<span id="execution-results-DELETEapi-commercials--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-commercials--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-commercials--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-commercials--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-commercials--id-"></code></pre>
</span>
<form id="form-DELETEapi-commercials--id-" data-method="DELETE"
      data-path="api/commercials/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","X-Authorization":"apiKey"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-commercials--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-commercials--id-"
                    onclick="tryItOut('DELETEapi-commercials--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-commercials--id-"
                    onclick="cancelTryOut('DELETEapi-commercials--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-commercials--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/commercials/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-commercials--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-commercials--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-commercials--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>the id of the commercial.</p>
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
