import { Calendar } from '@fullcalendar/core'
import interactionPlugin from '@fullcalendar/interaction'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import multiMonthPlugin from '@fullcalendar/multimonth'
import frLocale from '@fullcalendar/core/locales/fr';
import tippy from "tippy.js";
import "tippy.js/animations/shift-away.css";
import "tippy.js/animations/shift-away-extreme.css";
import "tippy.js/animations/shift-away-subtle.css";
import "tippy.js/themes/translucent.css";
import "tippy.js/dist/tippy.css";

export class calendar extends HTMLDivElement{

    connectedCallback(){
        this.div = new Calendar(this, {
            plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, multiMonthPlugin ],
            locale: frLocale,
            timeZone: 'local',
            // height: 'calc(100vh - 90px)',
            expandRows: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'multiMonthYear,dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            initialView: 'dayGridMonth',
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            selectable: true,
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            eventDidMount: function(info) {
                let desc = info.event.extendedProps.description
                if (desc !== undefined && desc.trim() !== "")
                {
                    let tooltip = tippy(info.el, {
                        content: desc,
                        allowHTML: true,
                        animation: "shift-away",
                        placement: "bottom",
                        theme: "translucent",
                        interactive: true
                    });
                }
            },
            events: calendarEvents,
            eventClassNames: "JS_Call_Url_Get_Form"

        })

        this.div.render()
    }

    disconnectedCallback(){
        this.div.destroy()
    }
}