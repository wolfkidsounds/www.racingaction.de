import { Controller } from '@hotwired/stimulus';
import { createCalendar, createViewMonthGrid } from '@schedule-x/calendar';
import '@schedule-x/theme-default/dist/index.css';
import 'temporal-polyfill/global';
import axios from 'axios';

export default class extends Controller {
    connect() {
        this.events = []; // Leeres Events Array

        axios.get('/api/events') // von /api/events abfragen
            .then(response => {
                console.log(response.data);
                this.events = this.convertEvents(response.data); // Events in das Events array schreiben (direkt konvertiert)
                this.createCalendar(this.events); // Kalendar erstellen
            })
            .catch(error => console.log(error));
    }

    createCalendar(events) {
        const calendar = createCalendar({
            views: [createViewMonthGrid()],
            locale: 'de-DE',
            events: events,
        });

        calendar.render(this.element);
    }

    /**
    * Convert the date string to a Temporal.ZonedDateTime
    */
    convertEvents(events) {
        return events.map(event => ({
            ...event,
                start: this.convert(event.start),
                end: this.convert(event.end)
        }));
    }

    /**
     * Convert a date string to a Temporal.ZonedDateTime
     * @param {String} dateString
     * @returns {Temporal.ZonedDateTime}
     */
    convert(dateString) {
        const [date, time] = dateString.split(' ');
        const [year, month, day] = date.split('-');
        const [hour, minute] = time.split(':');
        return Temporal.ZonedDateTime.from({
            year: parseInt(year),
            month: parseInt(month),
            day: parseInt(day),
            hour: parseInt(hour),
            minute: parseInt(minute),
            timeZone: 'UTC',
        })
    }
}

