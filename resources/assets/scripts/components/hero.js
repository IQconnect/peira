var Flickity = require('flickity');
import 'flickity-fade';

const CONFIG = {
    ELEM: '.hero__carousel',
    CELL: '.hero__cell',
};

const Hero = {
    init() {
        const { ELEM, CELL } = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        console.log('Init hero', this.elem)
        if (this.elem) {
            this.elem.forEach(element => {
                this.slider = new Flickity(element, {
                    pageDots: false,
                    prevNextButtons: true,
                    cellSelector: CELL,
                    wrapAround: true,
                    autoPlay: 3000,
                    fade: false,
                    arrowShape: 'M18 45 41 24 34 17 0 50 34 83 41 76 18 55 100 55 100 45 18 45ZM14 50',
                });

                setTimeout(() => {
                    this.slider.resize();
                }, 1000)
            });
        }
    },
};

export default Hero;