const CONFIG = {
    ELEM: '[data-single-nav]',
    CLASS: '-is-active',
}

const SingleNav = {
    init() {
        const { ELEM, CLASS } = CONFIG;

        this.elem = document.querySelectorAll(ELEM);

        this.class = CLASS;

        this.addEvent();
    },

    addEvent() {
        this.elem.forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();

                const $this = e.currentTarget;

                this.elem.forEach(element => {element.classList.remove(this.class)});

                $this.classList.add(this.class);
            })
        });
    },
};

export default SingleNav;