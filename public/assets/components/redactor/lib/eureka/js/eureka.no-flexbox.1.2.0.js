if(Modernizr !== undefined && Modernizr.flexbox == false) {
    link = document.createElement("link");
    link.href = MODx.config.assets_url + 'components/redactor/lib/eureka/css/eureka.no-flexbox.0.0.0.min.css';
    link.type = "text/css";
    link.rel = "stylesheet";
    link.media = "screen";

    document.getElementsByTagName("head")[0].appendChild(link);
}
