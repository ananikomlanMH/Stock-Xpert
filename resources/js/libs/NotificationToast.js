import Notify from 'simple-notify'
import 'simple-notify/dist/simple-notify.min.css'

export default function NotificationToast(type, msg) {
    new Notify
    ({
        status: type,
        title: 'STOCK-XPERT | '+ new Date().getFullYear(),
        text: msg,
        effect: 'slide',
        speed: 300,
        customClass: '',
        customIcon: '',
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 4500,
        gap: 20,
        distance: 20,
        type: 1,
        position: 'x-center bottom',
        customWrapper: '',
    });
}