function syncjson(url) {
    try {
        const request = new XMLHttpRequest();
        request.open('GET', url, false);
        request.send(null);
        var elms = JSON.parse(request.responseText);
        return elms;
    } catch(e) {
        return false;
    }
}
