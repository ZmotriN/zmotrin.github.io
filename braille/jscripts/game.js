const speak = (txt) => {
    const synth = window.speechSynthesis;
    const voices = synth.getVoices();

    console.log(voices);

}

class Page {
    
}


const game = {

    init() {
        console.log("Game init!");

        // speak('test');
        return this;
    }
};

bind(window.speechSynthesis, 'voiceschanged', (evt) => {
    game.init();
});

// .init();