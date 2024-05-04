import { Controller } from '@hotwired/stimulus';
import { Calendar } from 'fullcalendar';

export default class extends Controller {
    connect() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap5',
        });

        calendar.render();
    }
}