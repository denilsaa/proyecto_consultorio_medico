import './bootstrap';

import 'flowbite';
import 'animate.css';

//import Datepicker from 'flowbite-datepicker';
import Datepicker from 'flowbite-datepicker/Datepicker';
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';
import es from "../../node_modules/flowbite-datepicker/js/i18n/locales/es.js";
window.Datepicker = Datepicker;
window.DateRangePicker = DateRangePicker;
window.Datepicker.locales.es = es;

