// assets/controllers/popover_controller.js
import { Controller } from '@hotwired/stimulus';
import { Popover } from 'bootstrap';

// Connects to data-controller="popover"
export default class extends Controller {
  connect() {
    this.initializePopovers();
  }

  initializePopovers() {
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');

    popoverTriggerList.forEach(popoverTriggerEl => {

      new Popover(popoverTriggerEl, {
        trigger: 'click',
        placement: 'top',
        content: popoverTriggerEl.getAttribute('data-popover-content')
      });

    });
  }
}
