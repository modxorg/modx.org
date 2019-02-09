try {
    document.createElement('div').classList.add('foo')
} catch(e) {
    document.write('<script src="' + MODx.config.assets_url + 'components/redactor/lib/eureka/js/vendor/dom4.js' + '"><\/script>');
}