var Flickity = require('flickity');
import 'flickity-fade';

const CONFIG = {
    ELEM: '.invest__carousel',
    CELL: '.invest__cell',
    TRIGGER: '[data-invest-gallery]',
};

const Invest = {
    init() {
        const { ELEM, TRIGGER } = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        this.trigger = document.querySelectorAll(TRIGGER);
        this.sliders = [];

        this.class = '-is-active';

        console.log('Init invest', this.elem)
        if (this.elem) {
            this.slide();
            this.addEvents();
        }
    },

    slide() {
        const { CELL } = CONFIG;

        this.elem.forEach(element => {
            const slider = new Flickity(element, {
                pageDots: false,
                prevNextButtons: false,
                cellSelector: CELL,
                autoPlay: false,
                fade: true,
            });

            setTimeout(() => {
                slider.resize();
                console.log('resize');
            }, 1000)

            this.sliders.push(slider);
        });
    },

    addEvents() {
        this.trigger.forEach(element => {
            element.addEventListener('click', (e) => {
                const $this = e.currentTarget;

                this.trigger.forEach(element => {
                    if(element.dataset.investIndex == $this.dataset.investIndex) {
                        element.children[0].classList.remove(this.class);
                    }
                });

                $this.children[0].classList.add(this.class);
                console.log('click', this.slider)

                this.sliders[$this.dataset.investIndex].select( $this.dataset.investGallery );
            })
        });
    },
};

export default Invest;