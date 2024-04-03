const bind = (elm, evt, clb) => {
    if(typeof elm == 'string') {
        document.querySelectorAll(elm).forEach((item) => {
            item.addEventListener(evt, clb);
        });
    } else {
        elm.addEventListener(evt, clb);
    }
}

const query = (selector, all=false) => {
    if(all) return document.querySelectorAll(selector);
    else return document.querySelector(selector);
}