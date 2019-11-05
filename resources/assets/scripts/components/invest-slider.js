var Flickity = require('flickity');
import 'flickity-fade';
import 'flickity-as-nav-for';

const CONFIG = {
    ELEM: '.invest-slider__carousel',
    CELL: '.invest-slider__cell',
    NAV: '.invest-slider__nav-carousel',
    NAV_CELL: '.invest-slider__nav-cell',
};

const InvestSlider = {
    init() {
        const { ELEM, CELL, NAV, NAV_CELL } = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        this.nav = document.querySelectorAll(NAV);

        this.sliderArray = [];
        this.navArray= [];

        console.log('Init invest-slider', this.elem)

        if (this.elem) {
            this.elem.forEach((element, index) => {
                this.slider = new Flickity(element, {
                    pageDots: false,
                    prevNextButtons: true,
                    cellSelector: CELL,
                    wrapAround: true,
                    fade: false,
                });

                this.sliderNav = new Flickity(this.nav[index], {
                    pageDots: false,
                    prevNextButtons: true,
                    cellSelector: NAV_CELL,
                    wrapAround: true,
                    fade: false,
                    asNavFor: ELEM,
                });

                console.log('index', index)

                this.sliderArray.push(this.slider);
                this.navArray.push(this.sliderNav);

                setTimeout(() => {
                    this.resize();
                }, 2000)
            });
        }
    },

    resize() {
        this.sliderArray.forEach(element => {
            element.resize();
        })

        this.navArray.forEach(element => {
            element.resize();
        })
    },
};

export default InvestSlider;