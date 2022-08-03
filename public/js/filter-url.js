function refresh() {
    var urlBase = window.location.href.split('?')[0];
    return window.location = urlBase;
}

function checkOutUrl(param, value) {
    let url = window.location.href;
    if (!value) {
        return window.location = url;
    } else {
        var urlBase = window.location.href.split('?')[0];
        // url.includes('&' + params);
        if (url.indexOf('&' + param) !== -1 && url.indexOf('?' + param) !== -1) {
            return window.location = url;
        } else if (url.indexOf('&' + param) === -1 && url.indexOf('?' + param) !== -1) {
            return window.location = urlBase + '?' + param + "=" + value;
        } else if (url.indexOf('&' + param) === -1 && url.indexOf('?' + param) === -1 &&   url.indexOf('?') !== -1 ) {
            return window.location = url + '&' + param + "=" + value;
        } else if (url.indexOf('?' + param) === -1) {
            return window.location = urlBase + '?' + param + "=" + value;
        }else if(url.indexOf('&' + param) === -1 && url.indexOf('?' + param) === -1){
            return window.location = url + '?' + param + "=" + value;
        }
    }

}