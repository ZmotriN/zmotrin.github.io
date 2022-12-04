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



app.component('grostitre', {
    props: ['name', 'id'],
    data() {
        return {
        }
    },
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
        </div>
    `
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
    methods: {

    },
    template: `
        <div id="contents_table">
            <div class="contents_table__table">
                <a href="#top"><strong>Table des matières</strong></a>
                <ul v-html="list"></ul>
            </div>
        </div>
    `
});



app.mount('body');