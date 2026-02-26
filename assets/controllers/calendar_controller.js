import { Controller } from '@hotwired/stimulus';
import { createCalendar, createViewMonthGrid } from '@schedule-x/calendar';
import '@schedule-x/theme-default/dist/index.css';
import 'temporal-polyfill/global';
import axios from 'axios';

export default class extends Controller {
    connect() {
        const calendar = createCalendar({
            views: [createViewMonthGrid()],
            locale: 'de-DE',
            callbacks: {
                fetchEvents: (range) => this.fetchEvents(range), // holt events
                onEventClick: (calendarEvent) => this.onEventClick(calendarEvent), // wird aufgerufen, wenn ein event geklickt wird
            }
        });

        calendar.render(this.element);
    }

    /**
     * async -> damit wir die events nachträglich holen können.
     * Mittels axios die Events aus der API abfragen.
     * Wir schicken "range.start" und "range.end" als GET-Parameter an die API mit.
     * Zurückgelieferte events werden dann Konvertiert und in das "events"-Array geschrieben.
     * */
    async fetchEvents(range) {
        const { data } = await axios.get('/api/events', {
            params: {
                start: range.start,
                end: range.end
            }
        });

        return this.convertEvents(data);
    }

    /**
     * Wird aufgerufen, wenn ein Event geklickt wird.
     * Es wird die URL zum Event mit der ID erweitert.
     * Simple Lösung (ohne Modal Fenster), aber funktioniert.
     */
    onEventClick(calendarEvent) {
        const id = calendarEvent.id;
        if (!id) return;
        window.location.href = `/events/${id}`;
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

