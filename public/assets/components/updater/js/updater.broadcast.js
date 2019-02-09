// Only do anything if jQuery isn't defined
if (typeof jQuery == 'undefined') {
  if (typeof $ == 'function') {
        thisPageUsingOtherJSLibrary = true;
    }
    function getScript(url, success) {
        var script     = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
            done = false;
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            };
        };
        head.appendChild(script);
    };

    getScript('/assets/components/updater/js/jquery.min.js', function() {
        if (typeof jQuery=='undefined') {
        } else {
            updaterBroadcastMain();

        }

    });

} else { // jQuery was already loaded

    updaterBroadcastMain();
}

function updaterBroadcastMain() {
    $(document).ready(function() {
        var broadcast = updaterMsg;
        console.log("Broadcast: " + broadcast['text']);
        var alertBox = $("<div class='broadcast'><span>" + broadcast['text'] +"</span></div>");
        alertBox.addClass( broadcast['type'] );
        var closeIcon = $("<a class='close'><i class='icon' title='Yep. Got it.'> </i></a>");
        closeIcon.find("i").addClass( "icon-times-circle icon-lg" );
        closeIcon.click(function() {
           alertBox.fadeOut(400);
            broadcast = "";
        });
        var symbol =$('<span class="symbol"><i class="icon icon-lg"></i></span>');
        symbol.find("i").addClass( broadcast['icon'] );
        symbol.append( broadcast['icon-label']+": ");

        alertBox.prepend( symbol );

        alertBox.append(closeIcon);
        $("body").append(alertBox);
        alertBox.fadeIn(1000);


    });
}