/******************************************************
 *                     Main App                       *
 ******************************************************/
const app = Vue.createApp({
    data() { return { tableOfContents: [] } },
    methods: {
        addToTableOfContents(id, name) {
            this.tableOfContents.push({
                id: id,
                name: name,
            });
        },
    }
});


/******************************************************
 *           Composante Table des matières            *
 ******************************************************/
app.component('tabledesmatieres', {
    data() { return { list: '' } },
    created() {
        this.$nextTick(() => {
            let lis = '';
            this.$root.tableOfContents.forEach(el => { lis += '<li><a href="#' + el.id + '">' + el.name + '</a></li>'; });
            this.list = lis;
        });
    },
    template: `
        <div id="contents_table">
            <div class="contents_table__table">
                <a href="#top"><strong>Table des matières</strong></a>
                <ul v-html="list"></ul>
            </div>
        </div>`
});


/******************************************************
 *               Composante Gros Titre                *
 ******************************************************/
app.component('grostitre', {
    props: ['name', 'id'],
    created() {
        this.$root.addToTableOfContents(this.id, this.name);
    },
    methods: {
        click(event) {
            var link = window.location.origin + window.location.pathname + '#' + this.id;
            navigator.clipboard.writeText(link);
            let target = event.currentTarget;
            target.classList.add('copied');
            setTimeout(() => {
                target.classList.remove('copied');
            }, 1000);
        },
    },
    template: `
        <div class="title">
            <a :id="this.id"></a>
            <h1>{{ this.name }}</h1>
            <div class="chain" @click="click($event)"><svg viewBox="0 0 24 24"><path d="M17 7h-4v2h4c1.65 0 3 1.35 3 3s-1.35 3-3 3h-4v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5zm-6 8H7c-1.65 0-3-1.35-3-3s1.35-3 3-3h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-2zm-3-4h8v2H8z"></path></svg></div>
            <div class="linkcopied">Lien copié &#x2713;</div>
        </div>`
});


/******************************************************
 *                 Composante Codepen                 *
 ******************************************************/
app.component('codepen', {
    props: ['id', 'title'],
    data() {
        return {
            user: 'ZmotriN',
            theme: '39618',
        }
    },
    template: `
        <iframe
            :src="'https://codepen.io/' + user + '/embed/' + id + '?default-tab=html%2Cresult&theme-id=' + theme"    
            class="codepen"
            scrolling="no"
            frameborder="no"
            loading="lazy"
            allowtransparency="true"
            allowfullscreen="true"
        ></iframe>`
});


/******************************************************
 *                Composante Exercice                 *
 ******************************************************/
app.component('exercice', {
    props: ['id'],
    data() {
        let exroot = '/cours/shared/exercices/' + this.id + '/';
        let exdetails = syncjson(exroot + 'details.json');
        let url = typeof exdetails.url == 'undefined' ? exroot : exdetails.url;
        return {
            name: exdetails.name,
            description: exdetails.description,
            url: url
        }
    },
    template: `
        <a class="exercice" target="_blank" :href="this.url">
            <div class="exercice-container">
                <div class="exercice-thumb" :style="'background-image: url(\\'/cours/shared/exercices/' + this.id + '/images/thumb.jpg\\')'"></div>
                <div class="exercice-abstract">
                    <em>EXERCICE</em><br>
                    <span class="exercice-title">{{ name }}</span><br>
                    <span class="exercice-description">{{ description }}</span>
                </div>
            </div>
        </a>`
});


/******************************************************
 *                Composante Doclink                  *
 ******************************************************/
app.component('doclink', {
    props: ['title', 'href', 'spacer'],
    data() {
        let site = '';
        
        try {
            let url = new URL(this.href);
            switch(url.hostname) {
                case 'www.w3schools.com': site = 'w3schools'; break;
                case 'developer.mozilla.org': site = 'mozilla'; break;
                case 'codepen.io': site = 'codepen'; break;
            }
        } catch(e) { site = ''; }
        
        if(this.spacer == 'true') {
            site += ' spacer';
        }
        return { class: site }
    },
    template: `
        <a :class="'doclink ' + this.class" target="_blank" :href="this.href">
            <div class="doclink-container">
                <div class="doclink-icon"></div>
                <span class="doclink-title">{{ title }}</span>
            </div>
        </a>`
});


/******************************************************
 *                  Composante Dots                   *
 ******************************************************/
app.component('dots', {
    template: `
        <div class="spacer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor">
                <rect width="256" height="128" fill="none"/>
                <circle cx="128" cy="128" r="6"/>
                <circle cx="64" cy="128" r="6"/>
                <circle cx="192" cy="128" r="6"/>
            </svg>
        </div>`
});


/******************************************************
 *                  Composante Clip                   *
 ******************************************************/
app.component('clip', {
    props: ['src'],
    data() {
        let name = this.src.split('.').shift();
        let id = name.split('/').pop();
        let details = syncjson(name + '.json');
        let track = undefined;
        details.media.track.forEach(elm => { if(elm['@type'] == 'Video') { track = elm; }});
        if(track == undefined) return {};
        else return {
            id: id,
            name: name,
            width: track.Width,
            height: track.Height
        }
    },
    template: `
        <video
            :id="this.id"
            :width="this.width"
            :height="this.height"
            :poster="this.name + '.jpg'"
            data-setup='{"fluid": true}'
            class="video-js"
            controls
            preload="auto"
        >
            <source :src="this.src" type="video/mp4" />
        </video>`
});


/******************************************************
 *                Composante Checklist                *
 ******************************************************/
app.component('checklist', {
    props: ['id'],
    data() {
        let listdata = syncjson(this.id + '.json');
        if(!listdata) return {};
        let cookieValue = localStorage.getItem(this.cookiename());
        if(typeof cookieValue == 'string') {
            var checks = cookieValue.split(',').map((val) => { return parseInt(val); });
            if(checks.length != listdata.list.length){
                checks = [];
                listdata.list.forEach(() => { checks.push(0); });
            }
        } else {
            var checks = [];
            listdata.list.forEach(() => { checks.push(0); });
        }
        return {
            list: listdata.list,
            checks: checks,
            progressbar: null
         }
    },
    created() {
        this.$nextTick(() => {
            this.progressbar = document.getElementById(this.id + '-progressbar');
            this.updateProgressBar();
        });
    },
    methods: {
        cookiename() {
            let hash = cyrb53(window.location.pathname);
            return 'exercice-' + this.id + '-' + hash;
        },
        click(event,i) {
            let target = event.currentTarget;
            if(this.checks[i]) {
                this.checks[i] = 0;
                target.classList.remove('checked');
            } else {
                this.checks[i] = 1;
                target.classList.add('checked');
            }
            this.updateProgressBar();
            localStorage.setItem(this.cookiename(), this.checks.join(','));
        },
        updateProgressBar() {
            let total = 0;
            this.checks.forEach(val => { total += val; });
            let progress = (total / this.checks.length * 100).toFixed(0);
            this.progressbar.style.backgroundSize = progress + '% 100%';
        }
    },
    template: `
        <div class="checklist">
            <div :id="this.id + '-progressbar'" class="progressbar"></div>
            <ol>
                <li v-for="(line, i) in this.list" :class="this.checks[i]?'checked':''" @click="click($event,i)">{{ line }}</li>
            </ol>
        </div>`
});



/******************************************************
 *                     Mount App                      *
 ******************************************************/
app.mount('body');