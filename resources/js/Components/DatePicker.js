import flatpickr from "flatpickr";
const French = require("flatpickr/dist/l10n/fr.js").default.fr;
import 'flatpickr/dist/flatpickr.min.css'
flatpickr.localize(French);

export class DatePicker extends HTMLInputElement{

    connectedCallback(){

        let min = this.dataset.mindate
        let max = this.dataset.maxdate

        if (min !== undefined && max !== undefined){
            this.date = flatpickr(this, {
                altInput: true,
                altFormat: "d/m/Y",
                dateFormat: "Y-m-d",
                allowInput: true,
                enable: [
                    {
                        from: min,
                        to: max
                    }
                ],
                // disable: [
                //     function(date) {
                //         // return true to disable
                //         return (date.getDay() === 0);
                //
                //     }
                // ],
                locale: {
                    "firstDayOfWeek": 1 // start week on Monday
                }
            });
        }else{
            this.date = flatpickr(this, {
                altInput: true,
                altFormat: "d/m/Y",
                dateFormat: "Y-m-d",
                allowInput: true,
                // disable: [
                //     function(date) {
                //         // return true to disable
                //         return (date.getDay() === 0);
                //
                //     }
                // ],
                locale: {
                    "firstDayOfWeek": 1 // start week on Monday
                }
            });
        }

    }

    disconnectedCallback(){
        this.date.destroy()
    }
}

export class DatePickerTwo extends HTMLInputElement{

    connectedCallback(){
        this.date = flatpickr(this, {
            altInput: true,
            mode: "range",
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            allowInput: true
        });
    }

    disconnectedCallback(){
        this.date.destroy()
    }
}
export class TimePicker extends HTMLInputElement{

    connectedCallback(){
        this.date = flatpickr(this, {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            minTime: "08:00",
            maxTime: "17:30",
            time_24hr: true,
        });
    }

    disconnectedCallback(){
        this.date.destroy()
    }
}
