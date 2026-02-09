import { Controller } from '@hotwired/stimulus';
import calendarjs from '@calendarjs/ce';
import '@calendarjs/ce/dist/style.css';


export default class extends Controller {
    connect() {
        const { Calendar } = calendarjs;
        Calendar(this.element, {
            type: 'inline',
            value: new Date()
        });
    }
}