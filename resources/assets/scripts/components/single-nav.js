import IsInViewPort from '../util/IsInViewPort'
import elementInViewport from '../util/elementInViewport'

const CONFIG = {
    ELEM: '[data-single-nav]',
    CLASS: '-is-active',
    SECTIONS: '[data-single-section]',
}

const SingleNav = {
    init() {
        const { ELEM, CLASS, SECTIONS } = CONFIG;

        this.elem = document.querySelectorAll(ELEM);
        this.sections = document.querySelectorAll(SECTIONS);
        this.allowScroll = true;

        this.class = CLASS;
        if(this.elem.length) {
          this.addEvent();
        }
    },

    addEvent() {
        this.elem.forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();

                this.allowScroll = false;

                const $this = e.currentTarget;

                this.elem.forEach(element => { element.classList.remove(this.class) });

                $this.classList.add(this.class);

                const name = $this.getAttribute('href');
                let offset = $(`#${name}`).offset().top;

                if (name == 'galeria') offset = offset - 50;

                $('html, body').animate({
                    scrollTop: offset,
                }, 800);

                setTimeout(()=> {
                    this.allowScroll = true;
                }, 900)
            })
        });

        window.addEventListener('scroll', () => {
            this.sections.forEach((elem, index) => {
                if(this.allowScroll) {
                    if (IsInViewPort(elem)) {
                        this.elem.forEach(element => { element.classList.remove(this.class) });
                        this.elem[index].classList.add(this.class)
                    }

                    else if(elementInViewport(elem)) {
                        this.elem.forEach(element => { element.classList.remove(this.class) });
                        this.elem[index].classList.add(this.class)
                    }
                }
            })
        });
    },
};

export default SingleNav;
