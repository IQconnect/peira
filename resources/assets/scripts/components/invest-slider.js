var Flickity = require('flickity-as-nav-for');
import 'flickity-fade';

const CONFIG = {
    ELEM: '.invest-slider__carousel',
    CELL: '.invest-slider__cell',
    NAV: '.invest-slider__nav-carousel',
    NAV_CELL: '.invest-slider__nav-cell',
    SITCHER: '[data-invest-slider-index]',
    WRAPPER: '[data-invest-slider]',
    CLASS: '-is-active',
};

const InvestSlider = {
    init() {
        const { ELEM, NAV, SITCHER, WRAPPER, CLASS} = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        this.nav = document.querySelectorAll(NAV);
        this.switcher = document.querySelectorAll(SITCHER);
        this.wrapper = document.querySelector(WRAPPER);
        
        this.class = CLASS;

        this.sliderArray = [];
        this.navArray = [];

        console.log('Init invest-slider', this.wrapper)

        if (this.elem) {
            this.slider();
            this.addEvent();
        }
    },

    slider() {
        const { NAV_CELL, CELL} = CONFIG;

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
                asNavFor: element,
            });

            console.log('index', index)

            this.sliderArray.push(this.slider);
            this.navArray.push(this.sliderNav);

            setTimeout(() => {
                this.resize();
            }, 1000)
        });
    },

    resize() {
        this.sliderArray.forEach(element => {
            element.resize();
        })

        this.navArray.forEach(element => {
            element.resize();
        })
    },

    addEvent() {
        this.switcher.forEach(element => {
            element.addEventListener('click', e => {
                const $this = e.currentTarget;
                this.switcher.forEach(element => {element.classList.remove(this.class)});
                $this.classList.add(this.class);
                this.wrapper.dataset.investSlider = $this.dataset.investSliderIndex;
                this.resize();
            });
        });
    },
};

export default InvestSlider;