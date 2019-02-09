var buttonId = "[[+updater.button_id]]";

console.log("Refreshing core updates. "+buttonId)

var button = document.getElementById("updater-button-"+buttonId);

console.log("Text: " + button.textContent);
if (button.addEventListener) {
    button.addEventListener("click", updater_handleRefreshClick, false);
} else {
    button.attachEvent('onclick', updater_handleRefreshClick);
}

function updater_handleRefreshClick() {
    var UPDATER_REFRESH_CORE_URL = '/connectors/updater/updater.cron.php';

    console.log('[Updater] on demand refreshing core data');

    var http = new XMLHttpRequest();
    http.open("POST", UPDATER_REFRESH_CORE_URL, true);
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            console.log("[Updater] successfully refreshed data.");
            document.location.reload();
        } else {
            console.warn("[Updater] could not refresh core data. An error occured.")
        }
    };
    http.send();
}

function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
}