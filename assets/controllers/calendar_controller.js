import { Controller } from '@hotwired/stimulus';
import { createCalendar, createViewMonthGrid } from '@schedule-x/calendar'
import '@schedule-x/theme-default/dist/index.css'
import 'temporal-polyfill/global'

export default class extends Controller {
    static values = {
        events: Array
    }
    connect() {
        /**
         * Convert the date string to a Temporal.ZonedDateTime
         */
        const dateEvents = this.eventsValue.map(event => ({
            ...event,
                start: this.convert(event.start),
                end: this.convert(event.end)
        }));

        /**
         * Create the calendar
         */
        const calendar = createCalendar({
            views: [createViewMonthGrid()],
            locale: 'de-DE',
            events: dateEvents,
        });

        calendar.render(this.element);
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

