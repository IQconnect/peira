import 'jquery';
import 'tablesorter';

const CONFING = {
    TABLE: '[data-table]',
    PLANS: '[data-plans]',
    NAV: '[data-table-nav]',
    FLITR: '.filtr__input',
    SALE: '#sale',
    FREE: '#free',
    SORT: '[data-sort-invest]',
    SWITCHER : '[data-table-switcher]',
    CLASS: {
        active: '-is-active',
        switch: '-is-switched',
    },
};

const { TABLE, PLANS, NAV, CLASS, FLITR, SALE, FREE, SORT, SWITCHER } = CONFING;

const Table = {
    init() {

        this.table = document.querySelector(TABLE);
        this.plans = document.querySelector(PLANS);
        this.nav = document.querySelectorAll(NAV);
        this.filtr = document.querySelectorAll(FLITR);
        this.sale = document.querySelector(SALE);
        this.free = document.querySelector(FREE);
        this.sort = document.querySelector(SORT);
        this.switcher = document.querySelector(SWITCHER);

        if(this.table) {
            this.inputsVal = {};
            this.countRows = 0;
            this.colspan = this.table.querySelectorAll('th').length - 1;
            this.navLength = this.nav.length;

            this.defaultTable = this.table.querySelector('tbody');
            this.defaultTableContent = this.defaultTable.innerHTML;

            this.defaultPlans = this.plans;
            this.defaultPlansContent = this.defaultPlans.innerHTML;

            this.class = CLASS;

            this.tablesorter();
            this.addEvent();
        }
    },

    tablesorter() {
        $('table').tablesorter({
            sortRestart: true,
            sortReset: true,
        });

        const usersTable = $('.tablesorter');

        usersTable.trigger('update')
            .trigger('sorton', [usersTable.get(0).config.sortList])
            .trigger('appendCache')
            .trigger('applyWidgets');
    },

    addEvent() {
        this.nav.forEach(element => {
            element.addEventListener('click', e => this.changePage(e));
        });

        this.filtr.forEach(element => {
            element.addEventListener('change', e => this.filtrTable(e));
        });

        if (this.switcher) {
          this.switcher.addEventListener('click', e => this.switchView(e));
        }
    },

    changePage(e, myNum) {
        const $this = e.currentTarget;

        //console.log('this.navLength: ', this.navLength);

        // Change button class
        this.nav.forEach(element => { element.classList.remove(this.class.active) })

        if (myNum) {
            this.nav[myNum].classList.add(this.class.active);
            return this.table.dataset.table = myNum;
        }

        // Change page
        let num = $this.dataset.tableNav;

        if (num == 'next') {
            num = parseInt(this.table.dataset.table) + 1 == this.navLength - 1 ? 1 : parseInt(this.table.dataset.table) + 1;
        }

        else if (num == 'prev') {
            num = parseInt(this.table.dataset.table) - 1 == 0 ? this.navLength - 2 : parseInt(this.table.dataset.table) - 1;
        }

        else {
            $this.classList.add(this.class.active);
        }

        this.nav[num].classList.add(this.class.active);

        this.table.dataset.table = num;
        this.plans.dataset.plans = num;

        //console.log(num);
    },

    resetTable() {
        this.defaultTable.innerHTML = this.defaultTableContent;
        this.defaultPlans.innerHTML = this.defaultPlansContent;
    },

    newTableNav() {

        const navs = this.countRows / 10;

        if (this.countRows < 10) {
            this.nav[0].closest('nav').classList.add('-hide');
        }

        else {
            this.nav[0].closest('nav').classList.remove('-hide');
        }

        this.nav.forEach(element => {
            element.parentElement.classList.add('-hide');
        });

        //console.log('filtr', this.filtr);

        for (let index = 1; index < navs + 1; index++) {
            this.nav[index].parentElement.classList.remove('-hide');

            console.log('index', index, this.filtr[index].parentElement);

            this.navLength = index + 2;
        }
    },

    newTable() {
        const rows = this.defaultTable.querySelectorAll('tr');
        const plans = this.defaultPlans.querySelectorAll('li');
        const saleChecked = this.sale.checked;
        const freeChecked = this.free.checked;

        const isInArea = elem => {
            const area = parseInt(elem.dataset.area);
            return area >= this.inputsVal.area_from && area <= this.inputsVal.area_to;
        }

        const isInPrice = elem => {
            const price = parseInt(elem.dataset.price.replace(' ', ''));
            return price >= this.inputsVal.price_from && price <= this.inputsVal.price_to;
        }

        const isInRooms = elem => {
            const rooms = parseInt(elem.dataset.rooms);
            return rooms >= this.inputsVal.rooms_from && rooms <= this.inputsVal.rooms_to;
        }

        const isInFloor = elem => {
            const floor = parseInt(elem.dataset.floor);
            return floor >= this.inputsVal.floor_from && floor <= this.inputsVal.floor_to;
        }

        const isFree = (elem, saleChecked) => {
            const state = elem.dataset.state;

            if (this.inputsVal.free && saleChecked) {
                console.log('sale', saleChecked);
                if (state == 'free' || state == 'sale') {
                    return true;
                }
            }

            else if(this.inputsVal.free) {
              if (state == 'free') {
                return true;
              }
            }

            else {
                return true;
            }
        }

        const isSale = elem => {
            const sale = elem.dataset.price2 ? true : false;

            if (this.inputsVal.sale) {
                if (sale) {
                    return true;
                }
            }

            else {
                return true;
            }
        }

        const isInInvest = elem => {
          if(elem.dataset.district == 'OLIWKOWE') {
            if(this.inputsVal['oliwkowe-apartamenty'] == 1) {
              return true;
            }
          }

          if(elem.dataset.district == 'SREBRZYŃSKA PARK 1') {
            if(this.inputsVal['srebrzynska-park'] == 1) {
              return true;
            }
          }
          if(elem.dataset.district == 'SREBRZYŃSKA PARK 2') {
            if(this.inputsVal['srebrzynska-park'] == 1) {
              return true;
            }
          }
          if(elem.dataset.district == 'SREBRZYŃSKA PARK III') {
            if(this.inputsVal['srebrzynska-park'] == 1) {
              return true;
            }
          }
        }

        rows.forEach((elem) => {
            if (!isInInvest(elem)) elem.remove();
            if (!isInArea(elem)) elem.remove();
            if (!isInPrice(elem)) elem.remove();
            if (!isInRooms(elem)) elem.remove();
            if (!isInFloor(elem)) elem.remove();
            if (!isInFloor(elem)) elem.remove();

            if(saleChecked && freeChecked) {
              if (!isFree(elem, saleChecked)) elem.remove();
            }

            else {
              if (!isFree(elem, saleChecked)) elem.remove();
              if (!isSale(elem)) elem.remove();
            }
        });

        plans.forEach((elem) => {
          if (!isInArea(elem)) elem.remove();
          if (!isInPrice(elem)) elem.remove();
          if (!isInRooms(elem)) elem.remove();
          if (!isInFloor(elem)) elem.remove();
          if (!isInFloor(elem)) elem.remove();

          if(saleChecked && freeChecked) {
            if (!isFree(elem, saleChecked)) elem.remove();
          }

          else {
            if (!isFree(elem, saleChecked)) elem.remove();
            if (!isSale(elem)) elem.remove();
          }
      });

        this.countRows = this.defaultTable.querySelectorAll('tr').length;

        console.log('countRows', this.countRows);

        if (this.countRows == 0) {
            this.defaultTable.innerHTML = `<tr><td style='text-align: left;padding-left: 30px;' colspan='${this.colspan}'>Nie znaleziono mieszkań w danej konfiguracji<td></tr>`;
        }
    },

    updateCount() {
      const rows = this.defaultTable.querySelectorAll('tr');

      let saleCount = 0, freeCount = 0;

      console.log('rows', rows);

      rows.forEach(elem  => {
        const sale = elem.dataset.price2 ? true : false;
        const state = elem.dataset.state;

        if(sale) saleCount++;
        if(state == 'free') freeCount++;
      });

      this.sale.parentElement.querySelector('span').innerHTML = `(${saleCount})`;
      this.free.parentElement.querySelector('span').innerHTML = `(${freeCount})`;
    },

    setVals() {
        this.inputsVal = {};

        this.filtr.forEach(elem => {
            const val = elem.value == 'on' ? elem.checked : parseInt(elem.value);
            const name = elem.getAttribute('name');

            this.inputsVal[name] = val;
        })

        console.log('inputsVal: ', this.inputsVal);
    },

    filtrTable() {
        // ex functions
        this.resetTable();
        this.setVals();
        this.newTable();
        this.updateCount();
        this.newTableNav();
        this.changePage('', 1);
        this.tablesorter();
    },

    switchView() {
      this.switcher.closest('div').classList.toggle(this.class.switch);
      this.plans.classList.toggle(this.class.active);
      this.table.classList.toggle(this.class.active);
    },
}

export default Table;
