
const app = Vue.createApp({
    data() {
        return {
            tableOfContents: []
        }
    },
    methods: {
        addToTableOfContents(id, name) {
            this.tableOfContents.push({
                id: id,
                name: name,
            });
        },
    }
});



app.component('tabledesmatieres', {
    data() {
        return {
            list: '',
        }
    },
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



app.component('grostitre', {
    props: ['name', 'id'],
    created() {
        this.$root.addToTableOfContents(this.id, this.name)
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




app.component('codepen', {
    props: ['id', 'title'],
    data() {
        return {
            user: 'ZmotriN',
            // theme: 'light',
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


app.component('exercice', {
    props: ['id'],
    data() {
        let exroot = '/cours/shared/exercices/' + this.id + '/';
        let exjson = exroot + 'details.json';
        let exdetails = syncjson(exjson);
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
                <div class="exercice-thumb" :style="'background-image: url(\\'/cours/shared/exercices/' + this.id + '/thumb.jpg\\')'"></div>
                <div class="exercice-abstract">
                    <em>EXERCICE</em><br>
                    <span class="exercice-title">{{ name }}</span><br>
                    <span class="exercice-description">{{ description }}</span>
                </div>
            </div>
        </a>`
});



app.component('doclink', {
    props: ['title', 'href'],
    data() {
        let site = '';
        let url = new URL(this.href);
        // console.log(url.hostname);
        switch(url.hostname) {
            case 'www.w3schools.com': site = 'w3schools'; break;
            case 'developer.mozilla.org': site = 'mozilla'; break;
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



app.mount('body');