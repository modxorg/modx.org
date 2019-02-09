<html>
    <head>
        <title>MODX Updater package notification</title>
    </head>

<body>

<style type="text/css">
    html {
        padding: 0;
        margin: 0;
        background-color: #F2F2F2;
    }
    * {
        box-sizing: border-box;
    }
    body {
        font: 400 1em/1.5 "Helvetica Neue",Helvetica,Arial,Tahoma,sans-serif;
        color: #53595F;
        margin: 0;
        padding: 0;
    }
    .wrap {
        max-width: 800px;
        margin: 2em auto;
        padding: 2em 3.2336em;
        background-color: #F0F0F0;
        border-radius: 3px;

        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
    }
    h1 {
        margin-top:0;
        margin-bottom: 0;
    }
    .core,
    .packages {
        font-weight: bold;
        padding: 1em 1.6168em;
        background-color: #E4E9EE;
        /* background-color: #32AB9A;
         background-image: linear-gradient(#32AB9A, #00948E);
         color: white;
        */
        color: #696969;
        font-size: 1.25em;
        text-align:center;

        margin-bottom: 2em;
    }
    footer {
        margin-top: 2em;
        font-size: 0.75em;
        color: #696969;

    }
    a {
        text-wrap: avoid;
        word-wrap: normal;
        white-space:nowrap;
    }
    .modx-logo {
        float:right;
        width: 5em;
        height: 5em;
    }
    .head {
        overflow: auto;
    }
</style>

<div class="wrap">
    <div class="head">
        [[-+logodata:isnot=``:then=`
            <img class="modx-logo" src="data:image/png;base64,[[!+logodata]]" />
        `:else=`
        `]]
        <img class="modx-logo" src="[[!++site_url]]assets/components/updater/img/modx-icon-color.svg" />
        <h1>
            [[+updater.packages_names_update:isnot=``:then=`
                Package updates available
            `:else=`
                [[+updater.packages_names_install:isnot=``:then=`
                    Package installations pending
                `:else=`
                    Uups. Something is wrong with package notification.
                `]]
            `]]
        </h1>
    </div>
    [[+updater.packages_names_update:isnot=``:then=`
        <p>
            There are package updates available for the following packages:
        </p>
        <div class="packages">
            [[+updater.packages_names_update:nl2br:default=`No package`]]
        </div>
    `:else=`<p>No packages to update.</p>`]]

    [[+updater.packages_names_install:isnot=``:then=`
        <p>
            These packages are downloaded but not yet installed:
        </p>
        <div class="packages">
            [[+updater.packages_names_install:nl2br:default=`No package`]]
        </div>
    `:else=`<p>No pending package installations are detected.</p>`]]

    <p>
        Please review your site <a href="[[~[[++site_start]]? &scheme=`full`]]">[[!++site_name]]</a>.
    </p>

    <footer>
        This email is send to you because either your email address is added as a PackageAdmin adress OR
        you have the permission granted to receive these notifications.
    </footer>
</div>
</body>
</html>