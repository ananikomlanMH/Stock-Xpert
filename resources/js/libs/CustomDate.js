import flatpickr from "flatpickr";
const French = require("flatpickr/dist/l10n/fr.js").default.fr;
import 'flatpickr/dist/flatpickr.min.css'

flatpickr.localize(French);
export function customDate(){
    flatpickr("input[type=date]", {
        altInput: true,
        altFormat: "d/m/Y",
        dateFormat: "Y-m-d",
        allowInput: true
    });
}