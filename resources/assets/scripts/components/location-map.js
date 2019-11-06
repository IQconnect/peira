/* eslint-disable */

import IsInViewPort from '../util/IsInViewPort';
import 'jquery';

const loadGoogleMapsApi = require('load-google-maps-api')

const CONFIG = {
    ELEM: '[location-map]',
    TRIGGER: '[data-location-map-elem]',
    CLASS: '-is-active',
    LIST: '[data-location-map-list]',
    HIDE_CLASS: '-is-hidden',
    CATS: '[data-location-map-cats]',
};

const locationMap = {
    init() {
        const { ELEM, TRIGGER, LIST, CATS, CLASS, HIDE_CLASS } = CONFIG;

        this.elem = document.querySelector(ELEM);
        this.trigger = document.querySelectorAll(TRIGGER);
        this.list = document.querySelector(LIST);
        this.cats = document.querySelectorAll(CATS);

        this.class = CLASS;
        this.classHide = HIDE_CLASS;

        this.markersArray = [];
        this.map;

        console.log('init');
        if (this.elem) {
            this.initMap();
            this.addEvents();
        }
    },

    initMap() {
        const mapStyle = [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#bdbdbd"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#dadada"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                ]
            },
            {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c9c9c9"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            }
        ];

        const elem = this.elem;
        const markersArray = this.markersArray;
        const selectFlag = (name) => { this.selectFlag(name) };
        const myMap = [];

        loadGoogleMapsApi().then(function (googleMaps) {
            const map = new googleMaps.Map(elem, {
                center: {
                    lat: Number(elem.dataset.lat),
                    lng: Number(elem.dataset.lng),
                },
                zoom: 19,
            });

            myMap.push(map);

            const mainFlag = new googleMaps.Marker({
                position: {
                    lat: Number(elem.dataset.lat),
                    lng: Number(elem.dataset.lng),
                },
                map: map,
                icon: elem.dataset.icon,
            });

            console.log(elem.dataset.markers);


            const json_markers = JSON.parse(elem.dataset.markers);


            json_markers.forEach(marker => {
                console.log('marker /n', marker);

                const icon = {
                    url: marker.icon,
                }

                var contentString = `
                <div id="marker-content">
                    ${marker.name}
                </div>`;
          
                var infowindow = new googleMaps.InfoWindow({
                    content: contentString
                });

                const flag = new googleMaps.Marker({
                    position: {
                        lat: Number(marker.lat),
                        lng: Number(marker.lng),
                    },
                    map: map,
                    title: marker.name,
                    icon: icon,
                    cat: marker.cat,
                    visible: true,
                });

                markersArray.push(flag);
                console.log('flag', flag.getPosition());

                googleMaps.event.addListener(flag, 'mouseover', function () {
                    infowindow.open(map,flag);
                });

                googleMaps.event.addListener(flag, 'mouseout', function () {
                    infowindow.close(map,flag);
                });

            });
        }).catch(function (error) {
            console.error(error)
        });

        this.markersArray = markersArray;
        this.map = myMap;
        console.log('map', this.map)
    },

    selectFlag(name) {

        this.markersArray.forEach(flag => {
            console.log(flag.title, name);

            if (flag.title == name) {
                flag.setIcon(flag.iconActive);
                this.map[0].setZoom(flag.zoom);
                // this.map[0].setZoom(flag.zoom);
                this.map[0].panTo(flag.getPosition());
            }

            else {
                console.log('remove flag');
                flag.setIcon(flag.iconInactive);
            }
        });

        this.trigger.forEach(elem => {

            if (elem.dataset.locationMapElem == name) {
                elem.classList.add(this.class);
                if (IsInViewPort(elem)) {
                    console.log('true');
                }

                else {
                    console.log('false');

                    let top = elem.getBoundingClientRect().y;
                    let offset = -window.innerHeight / 5;
                    if (top < 0) {
                        offset = -200;
                    }

                    top = $(window).scrollTop() + top + offset;

                    console.log('top: ', top, '| height: ', elem.offsetHeight, '| elemTop: ', elem.getBoundingClientRect().top, '| offset: ', offset);
                    const body = $("html, body");
                    body.stop().animate({ scrollTop: top }, 500, 'swing', function () {

                    });
                }
            }

            else {
                //add to current target
                elem.classList.remove(this.class);
            }
        })

    },

    addEvents() {
        this.trigger.forEach((elem) => {
            elem.addEventListener('click', (e) => {
                const $this = e.currentTarget;

                if (window.innerWidth < 993) {
                    window.location = $this.querySelector('.locations-list__button').getAttribute('href');
                }

                else {
                    this.selectFlag($this.dataset.locationMapElem);
                }
            })
        });

        this.cats.forEach((elem) => {
            elem.addEventListener('click', (e) => {
                const $this = e.currentTarget;

                this.cats.forEach((elem) => { elem.classList.remove(this.class) });
                $this.classList.add(this.class);

                const cat = $this.dataset.locationMapCats;

                this.selectCat(cat)
            })
        })

    },

    selectCat(cat) {
        console.log(cat);

        this.list.classList.add(this.classHide);

        this.trigger.forEach((elem) => {
            if (elem.dataset.locationMapElemCat == cat || cat == 'all') {
                setTimeout(() => {
                    elem.classList.remove(this.classHide)
                }, 400)
            }

            else {
                setTimeout(() => {
                    elem.classList.add(this.classHide)
                }, 400)
            }
        });

        //visible: true

        this.markersArray.forEach(flag => {
            console.log(flag.cat, cat);
            flag.setIcon(flag.iconInactive);

            if (flag.cat == cat || cat == 'all') {
                flag.visible = true;
            }

            else {
                flag.visible = false;
            }
        });

        setTimeout(() => {
            this.list.classList.remove(this.classHide);
            this.map[0].panBy(0, 1);
            this.map[0].setZoom(11);
        }, 500)
    },
}

export default locationMap;