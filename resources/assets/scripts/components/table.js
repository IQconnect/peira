import 'jquery';
import 'tablesorter';

const CONFING = {
    TABLE: '[data-table]',
    NAV: '[data-table-nav]',
    CLASS: {
        active: '-is-active',
    },
};

const Table = {
    init() {
        console.log('table');

        const { TABLE, NAV, CLASS } = CONFING;

        this.table = document.querySelector(TABLE);
        this.nav = document.querySelectorAll(NAV);

        this.class = CLASS;

        this.tablesorter();
        this.addEvent();
    },

    tablesorter() {
        $('table').tablesorter();
    },

    addEvent() {
        this.nav.forEach(element => {
            element.addEventListener('click', e => this.changePage(e));
        });
    },

    changePage(e) {
        const $this = e.currentTarget;
        console.log(e.currentTarget);

        // Change button class
        this.nav.forEach(element => { element.classList.remove(this.class.active) })
        $this.classList.add(this.class.active);

        // Change page
        let num = $this.dataset.tableNav;

        if (num == 'next') {
            num = parseInt(this.table.dataset.table) > this.nav.length - 3 ? 1 : parseInt(this.table.dataset.table) + 1;
        }

        else if (num == 'prev') {
            num = parseInt(this.table.dataset.table) - 1 == 0 ? this.nav.length - 2 : parseInt(this.table.dataset.table) - 1;
        }

        this.table.dataset.table = num;
        console.log(num, this.nav.length);
    },
}

export default Table;