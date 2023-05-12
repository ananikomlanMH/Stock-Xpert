import $ from 'jquery'
import 'jquery-confirm'
import 'jquery-confirm/css/jquery-confirm.css'
import NotificationToast from "./NotificationToast";
import Turbolinks from "turbolinks";

export function CustomConfirm(formElement) {
    $.confirm({
        icon: 'fa fa-question',
        title: 'Confirmation',
        content: 'Voulez-vous supprimer cet enregistrement ? <br> Ce processus ne peut pas être annulé.',
        useBootstrap: false,
        boxWidth: '500px',
        // autoClose: 'Annuler|10000',
        theme: 'modern',
        closeIcon: true,
        animation: 'scale',
        type: 'red',
        buttons: {
            Supprimer: {
                btnClass: 'btn__confirm__delete',
                action: function() {
                    let url = formElement.action;
                    axios({
                        method: 'post',
                        url: url,
                        responseType: 'json',
                        data:  formElement.type === undefined ? new FormData(formElement) : []
                    })
                        .then(function (response) {
                            let data = response.data

                            let redirect_url = data?.redirection
                            let search_params = new URL(redirect_url).search;
                            let current_search_params = window.location.search;
                            if (search_params !== current_search_params && search_params.search("tab") === -1){
                                redirect_url += current_search_params;
                            }

                            Turbolinks.visit(redirect_url)

                            document.addEventListener("turbolinks:load", function () {
                                if (data !== undefined) {
                                    NotificationToast(data?.type, data?.message)
                                    setTimeout(() => { //remove data after 500ms
                                        data = undefined;
                                    }, 500);
                                }
                            })
                        }).catch(function (error) {
                        NotificationToast("error", error.message)
                    });

                    document.querySelector(".jconfirm.jconfirm-modern.jconfirm-open").remove()
                }
            },
            Annuler: function () {
            }
        }
    });
}

export function customAlert(message){
    $.alert({
        icon: 'fa fa-exclamation-triangle',
        title: 'Alert!',
        content: message,
        useBootstrap: false,
        boxWidth: '500px',
        theme: 'material',
        closeIcon: true,
        animation: 'scale',
        type: 'red'
    });
}

export function CustomConfirmLogout(url) {
    $.confirm({
        icon: 'fa fa-question',
        title: 'Confirmation',
        content: 'Voulez-vous vraiment vous déconnectez de votre session utilisateur ?',
        useBootstrap: false,
        boxWidth: '500px',
        // autoClose: 'Annuler|10000',
        theme: 'modern',
        closeIcon: true,
        animation: 'scale',
        type: 'red',
        buttons: {
            OUI: {
                btnClass: 'btn__confirm__delete',
                action: function() {

                    axios({
                        method: 'post',
                        url: url,
                        responseType: 'json',
                    })
                        .then(function (response) {
                            let data = response.data

                            let redirect_url = data?.redirection
                            Turbolinks.visit(redirect_url)

                            document.addEventListener("turbolinks:load", function () {
                                if (data !== undefined) {
                                    NotificationToast(data?.type, data?.message)
                                    setTimeout(() => { //remove data after 500ms
                                        data = undefined;
                                    }, 500);
                                }
                            })
                        }).catch(function (error) {
                        NotificationToast("error", error.message)
                    });

                    document.querySelector(".jconfirm.jconfirm-modern.jconfirm-open").remove()
                }
            },
            NON: function () {
            }
        }
    });
}
