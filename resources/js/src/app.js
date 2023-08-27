import '../bootstrap'
import Chart from 'chart.js/auto';
import autocolors from 'chartjs-plugin-autocolors';
import {SelectInput, SelectInputTop} from "../Components/SelectInput";
import {DatePicker, DatePickerTwo, TimePicker} from "../Components/DatePicker";
import {InputNumeric} from "../Components/InputNumeric";
import {TextEditor} from "../Components/TextEditor";
import {calendar} from "../Components/calendar";
import {customAlert, CustomConfirm, CustomConfirmLogout} from "../libs/CustomConfirm";
import NotificationToast from "../libs/NotificationToast";
import formControl from "../libs/FormControl";
import tinymce from "tinymce";
import tippy from "tippy.js";
import autoComplete from "@tarekraafat/autocomplete.js/dist/autoComplete";
import AutoNumeric from "autonumeric";

let Turbolinks = require("turbolinks")

Turbolinks.start()

//Custom Select Input
customElements.define("custom-select", SelectInput, {extends: "select"})
customElements.define("custom-select-top", SelectInputTop, {extends: "select"})
customElements.define("time-picker", TimePicker, {extends: "input"})
customElements.define("date-picker", DatePicker, {extends: "input"})
customElements.define("date-picker-two", DatePickerTwo, {extends: "input"})
customElements.define("number-format", InputNumeric, {extends: "input"})
customElements.define("text-editor", TextEditor, {extends: "textarea"})
customElements.define("calendar-form", calendar, {extends: "div"})

document.addEventListener("turbolinks:load", function () {

    /**
     * Notifucation Toast
     */
   try {
       let notifyMSG = notification
       if (notifyMSG !== null) {
           NotificationToast(notifyMSG.type, notifyMSG.message)
       }
   }catch (e) {
       
   }

    let tooltip = document.querySelectorAll("[data-tooltip]")
    tooltip.forEach((item) => {
        if (item.dataset.tooltip !== "<ul></ul>" && item.dataset.tooltip !== "<ol></ol>") {
            let tooltipElement = tippy(item, {
                content: item.dataset.tooltip,
                allowHTML: true,
                animation: "shift-away",
                placement: "bottom",
                theme: "translucent",
                interactive: false
            })
        }
    })

    // Autoclose dropdown
    window.addEventListener("click", (e) => {
        if (!e.target.matches('.icon.fi-rr-menu-dots-vertical') && !e.target.matches('.table_drop_action')) {
            document.querySelectorAll('.table_drop_action').forEach(elm => {
                if (elm.classList.contains("active")) {
                    elm.classList.remove("active");
                }
            });
        }

        if (document.querySelector(".dropdown .default_option") !== null) {
            if (!e.target.matches('.dropdown .default_option')) {
                if (document.querySelector(".dropdown .default_option + ul").classList.contains("active")) {
                    document.querySelector(".dropdown .default_option + ul").classList.remove("active");
                }
            }
        }

        if (!e.target.matches('.JsShowNotification')) {
            document.querySelectorAll('.JsShowNotification').forEach(elm => {
                if (elm.parentElement.querySelector('.notifications_list').classList.contains("active")) {
                    elm.parentElement.querySelector('.notifications_list').classList.remove("active");
                }
            });
        }

        if (!e.target.matches('.default_option')) {
            document.querySelectorAll('.dropdownList > ul').forEach(elm => {
                if (elm.classList.contains("active")) {
                    elm.classList.remove("active");
                }
            });
        }
    });

    // Filter Drop
    let filterDrop = document.querySelector(".dropdown .default_option");
    if (filterDrop !== null && filterDrop !== undefined) {
        filterDrop.addEventListener("click", () => {
            let filterElm = document.querySelector(".dropdown .default_option + ul");
            filterElm.classList.toggle("active");
        });
    }

    let dropdownList = document.querySelectorAll(".dropdownList .default_option");
    dropdownList.forEach((dropdown) => {
        let dropdownListElm = dropdown.parentElement.querySelector("ul");
        if (dropdownList !== null && dropdownList !== undefined) {
            dropdown.addEventListener("click", () => {
                dropdownListElm.classList.toggle("active");
            });
        }
    })

    // Gestion de la suppression
    let formDelete = document.querySelectorAll(".deleteForm");
    formDelete.forEach((item) => {
        item.addEventListener("submit", (e) => {
            e.preventDefault();
            CustomConfirm(item)
        })
    })

// Table DropDown Action menu
    let table_drop_action = document.querySelectorAll('.table_drop_action');
    table_drop_action.forEach(element => {
        element.addEventListener("click", () => {
            table_drop_action.forEach(elm => {
                if (elm.classList.contains("active") && elm !== element) {
                    elm.classList.remove("active");
                }
            });
            element.classList.toggle("active");
        });
    });


// Navigation sidebar toggle

    let sidebar = document.querySelector(".sidebar")
    let sidebarBtn = document.querySelector("#close-nav")
    if (sidebarBtn !== null){
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close")
            menuBtnChange()
        });
    }

// Navigation sidebar control
    let nav_dropdown_link = document.querySelectorAll(".dropdown-link");
    for (let i = 0; i < nav_dropdown_link.length; i++) {
        nav_dropdown_link[i].addEventListener("click", (e) => {
            let nav_dropdown_linkParent = nav_dropdown_link[i].parentElement.parentElement;
            nav_dropdown_linkParent.classList.toggle("showMenu")
        });
    }

    function menuBtnChange() {
        if (!sidebar.classList.contains("close")) {
            sidebarBtn.classList.replace("fi-rr-menu-burger", "fi-rr-align-right")
        } else {
            sidebarBtn.classList.replace("fi-rr-align-right", "fi-rr-menu-burger")
        }
    }

    // Gestion de bar de recherche
    let searchField = document.querySelector(".search_field .input")
    if (searchField !== null && searchField !== undefined) {
        const autoCompleteJS = new autoComplete({
            selector: "#autoComplete",
            placeHolder: "Rechercher...",
            data: {
                src: searchList ?? [],
                cache: true,
            },
            resultsList: {
                element: (list, data) => {
                    if (!data.results.length) {
                        // Create "No Results" message element
                        const message = document.createElement("div");
                        // Add class to the created element
                        message.setAttribute("class", "no_result");
                        // Add message text content
                        message.innerHTML = `<span>Aucun résultat trouvé pour "${data.query}"</span>`;
                        // Append message element to the results list
                        list.prepend(message);
                    }
                },
                noResults: true,
                maxResults: 15,
                tabSelect: true,
            },
            // submit form
            submit: true,
            resultItem: {
                highlight: true
            },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        let url = window.location.origin + window.location.pathname
                        const params = new URLSearchParams({
                            q: selection
                        });
                        Turbolinks.visit(url + '?' + params.toString());
                    }
                }
            }
        });
    }


    /**
     * Show Notification menu on Btn ---> Click
     * @constructor
     */
    const JsShowNotification = () => {
        let btn = document.querySelectorAll(".JsShowNotification")
        btn.forEach((item) => {
            item.addEventListener('click', (e) => {
                let parent = item.parentElement
                parent?.querySelector(".notifications_list").classList.toggle("active")
            })
        })
    }
    JsShowNotification()


    /**
     *
     * @type {Element}
     */
    const chart__stats_year = document.querySelector("#chart__stats_year")
    if (chart__stats_year !== null) {

        const data = situation;
        let datasets = [];
        Object.keys(data).forEach(function (key, index) {
            datasets.push(
                {
                    label: key,
                    data: Object.values(data[key]),
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    tension: 0.2
                }
            )
        });

        new Chart(
            chart__stats_year,
            {
                type: 'line',
                data: {
                    labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                    datasets: datasets
                },
                options: {
                    plugins: {
                        autocolors,
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    family: 'poppins',
                                    weight: '500'
                                }
                            }
                        },
                        tooltip: {
                            bodyFont: {
                                family: 'poppins',
                                weight: '400'
                            },
                            titleFont: {
                                family: 'poppins',
                                weight: '400'
                            }
                        },
                        subtitle: {
                            display: true,
                            text: 'Situation Charges/Revenus ' + (new Date().getFullYear()),
                            font: {
                                family: 'poppins',
                                weight: '700'
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                font: {
                                    family: 'poppins',
                                    weight: '500'
                                }
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    family: 'poppins',
                                    weight: '500'
                                }
                            }
                        }
                    }
                }
            }
        );
    }

    const chart__stats_doughnut = document.querySelector("#chart__stats_doughnut")
    if (chart__stats_doughnut !== null) {
        const data = categorie_article

        new Chart(
            chart__stats_doughnut,
            {
                type: 'doughnut',
                data: {
                    labels: data.map(row => row.title),
                    datasets: [
                        {
                            label: 'Articles',
                            data: data.map(row => row.value)
                        }
                    ]
                },
                options: {
                    plugins: {
                        autocolors,
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    family: 'poppins'
                                }
                            }
                        },
                        tooltip: {
                            bodyFont: {
                                family: 'poppins',
                                weight: '400'
                            },
                            titleFont: {
                                family: 'poppins',
                                weight: '400'
                            }
                        },
                        subtitle: {
                            display: true,
                            text: 'Articles/Catégories',
                            font: {
                                family: 'poppins',
                                weight: '700'
                            }
                        }
                    }
                }
            }
        );
    }


    /**
     * Custom input file preview
     */
    loadInputFile()

    // custom__link
    let custom__link = document.querySelectorAll('.custom__link')
    custom__link.forEach((item) => {
        item.addEventListener('click', (e) => {
            e.preventDefault()
            Turbolinks.visit(item.dataset.url)
        })
    })


    // All Form submit in Ajax Promise
    let allFormElement = document.querySelectorAll("form.custom__form")
    allFormElement.forEach((item) => {
        item.addEventListener("submit", (e) => {
            e.preventDefault()
            let formElement = item
            let payload = new FormData(formElement)
            let url = formElement.action
            let formControlResult = formControl(formElement, payload)
            if (formControlResult === true) {
                document.querySelector('.spinner__loader')?.classList.add('active')
                axios({
                    method: 'post',
                    url: url,
                    responseType: 'json',
                    data: payload
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
            }
        })
    })

    // All Form submit in Ajax Promise
    let submit__form = document.querySelectorAll(".submit__form")
    submit__form.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault()
            let formElement = document.querySelector('form#'+item.dataset.id)
            let payload = new FormData(formElement)
            let url = formElement.action
            let formControlResult = formControl(formElement, payload)
            if (formControlResult === true) {
                document.querySelector('.spinner__loader')?.classList.add('active')
                axios({
                    method: 'post',
                    url: url,
                    responseType: 'json',
                    data: payload
                })
                    .then(function (response) {
                        let data = response.data

                        let redirect_url = data?.redirection
                        document.querySelector('.spinner__loader')?.classList.remove('active')
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
            }
        })
    })


    /**
     * Generate form Ajax
     * @type {NodeListOf<Element>}
     */
    let JS_Call_Url_Get_Form = document.querySelectorAll(".JS_Call_Url_Get_Form")
    JS_Call_Url_Get_Form.forEach((item) => {
        item.addEventListener('click', (e) => {
            e.preventDefault()
            let url = item.dataset.url
            if (url === undefined) {
                url = item.href
            }

            if (url !== null && url !== undefined) {
                axios({
                    method: 'get',
                    url: url,
                    responseType: 'text',
                })
                    .then(function (response) {
                        let generateEditForm = document.querySelector("#JS_GenerateForm")
                        if (response.data === undefined || generateEditForm === null) {
                            return 0
                        }
                        generateEditForm.innerHTML = response.data

                        let form = generateEditForm.querySelector("form")
                        if (form != null) {
                            form.setAttribute("method", "post")
                        }

                        let requiredText = generateEditForm.querySelector("[data-control ~= 'noEmpty']")
                        if (requiredText !== null) {
                            if (generateEditForm.querySelector(".required__placeholder") == null) {

                                let paragraph = document.createElement('p')
                                paragraph.classList.add('required__placeholder')
                                paragraph.innerHTML = `<i class="fi-rr-exclamation"></i> champs obligatoires`

                                generateEditForm.querySelector(".modal__container").insertBefore(paragraph, generateEditForm.querySelector(".modal__footer"))
                            }
                        }

                        // Toggle Switch Edit Modal
                        toggleEditForm()

                        setTimeout(function () {
                            generateEditForm.querySelector('.modal__box').classList.add('active')
                            document.querySelector("body").style.overflow = "hidden"
                        }, 100)

                        // Close Modal
                        let close__modal = generateEditForm.querySelectorAll(".close__modal")
                        if (close__modal !== null && close__modal !== undefined) {
                            close__modal.forEach((item) => {
                                item.addEventListener("click", () => {
                                    CloseModal()
                                })
                            })
                        }

                        // Submit Form
                        let modalForm__submit = generateEditForm.querySelector(".modalForm__submit")
                        if (modalForm__submit !== null && modalForm__submit !== undefined) {
                            modalForm__submit.addEventListener("click", () => {
                                submitForm(modalForm__submit)
                            })

                            let form = generateEditForm.querySelector("form")
                            form.addEventListener("submit", (e) => {
                                e.preventDefault()
                                submitForm(modalForm__submit)
                            })
                        }

                    }).catch(function (error) {
                    NotificationToast("error", error.message)
                });

            }
        })
    })

    // vente_form
    let vente_form = document.querySelector('#vente_form')
    if (vente_form !== null) {
        let article = vente_form.querySelector('#article')
        let price = vente_form.querySelector('#price')
        let qte = vente_form.querySelector('#qte')
        let total = vente_form.querySelector('#total')
        article.addEventListener('change', (e) => {
            let option = article.options[article.selectedIndex]
            AutoNumeric.set(price, option.dataset.price)

            axios({
                method: 'post',
                url: vente_form.dataset.stock + option.value,
                responseType: 'text',
            })
                .then(function (response) {

                    AutoNumeric.set(qte, 1, {
                        maximumValue: response.data
                    })
                    getTotal()
                })
        })

        qte.onkeyup = () => {
            getTotal()
        }
        qte.onchange = () => {
            getTotal()
        }

        function getTotal() {
            let qte = parseInt(vente_form.querySelector('#qte').value.replace(' ', ''), 10)
            if (qte <= 0){
                qte = 1
            }
            let sum = parseInt(vente_form.querySelector('#price').value.replace(' ', ''), 10) * qte
            AutoNumeric.set(total, sum)
        }
    }

    let link_delete = document.querySelectorAll(".link_delete");
    link_delete.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            let url = item.dataset.url
            let text = item.dataset.content
            if (url === '' || url === null) {
                return 0
            }
            item.action = url
            CustomConfirm(item)
        })
    })

    let JSlogout__user = document.querySelector("#JSlogout__user")
    JSlogout__user?.addEventListener("click", (e) => {
        e.preventDefault()
        CustomConfirmLogout(JSlogout__user.dataset.url)
    })
})


/**
 * Custom input file preview
 */
function loadInputFile() {

    let allInputUploadImage = document.querySelectorAll(".JS_load__previewImg");
    allInputUploadImage.forEach((item) => {
        let uploadImagePreview = document.querySelector("#load__previewImg_" + item.name)
        let uploadImageDeletePreview = item.parentElement.querySelector(".deleteUploadPreview")
        item.addEventListener("change", () => {
            if (item.files && item.files.length === 1 && item.files[0].size > 2097152) {
                customAlert("La taille de l'image <b>" + item.files[0].name + "</b> ne doit pas dépasser <b>2MB</b>.")
                item.value = null;
                uploadImagePreview.setAttribute('src', uploadImagePreview.dataset.img);
                uploadImageDeletePreview.style.display = "none";
            } else {
                const fileSrc = item.files[0];
                if (fileSrc) {
                    const reader = new FileReader();
                    reader.addEventListener("load", () => {
                        if (item.files[0].type.indexOf("image") !== -1) uploadImagePreview.setAttribute('src', reader.result);
                        uploadImageDeletePreview.style.display = "block";
                    });
                    reader.readAsDataURL(fileSrc);
                } else {
                    // item.value = uploadImagePreview.src;
                    if (item.files[0].type.indexOf("image") !== -1) uploadImagePreview.setAttribute('src', uploadImagePreview.dataset.img);
                    uploadImageDeletePreview.style.display = "none";
                }
            }
        })

        uploadImageDeletePreview.addEventListener("click", (e) => {
            e.preventDefault();
            if (item.value != null) {
                item.value = null;
                uploadImagePreview.setAttribute('src', uploadImagePreview.dataset.img);
                uploadImageDeletePreview.style.display = "none";

                let removeInput = document.querySelector("#remove_" + item.name)
                if (removeInput !== null) {
                    removeInput.value = true
                }
            }
        })
    })
}

/**
 * Submit form data
 * @param element
 * @returns {boolean}
 */
function submitForm(element) {
    element.setAttribute("disabled", "")
    let animation = element.parentElement.parentElement
    let formParent = element.parentElement.parentElement.querySelector(".modal__body")
    let formElement = formParent.querySelector(".modal__body form")
    let payload = new FormData(formElement)
    let allSelect = formElement.querySelectorAll("textarea[is='text-editor']")
    allSelect.forEach((item) => {
        let content = tinymce.get(item.id).getContent()
        payload.set(item.name, content)
    })

    let url = formElement.action
    let formControlResult = formControl(formElement, payload)

    if (formControlResult === true) {
        animation.classList.add("show__loader")
        axios({
            method: 'post',
            url: url,
            responseType: 'json',
            data: payload
        })
            .then(function (response) {
                let data = response.data

                let redirect_url = data?.redirection
                let search_params = new URL(redirect_url).search;
                let current_search_params = window.location.search;
                if (search_params !== current_search_params && search_params.search("tab") === -1) {
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
            animation.classList.remove("show__loader")
            NotificationToast("error", error.message)
        });
    }
    setTimeout(() => {
        element.removeAttribute("disabled")
    }, 1000)
}

// Close modal Form
function CloseModal() {
    const popUpModal = document.querySelector(".modal__box:not(.excel_export_popUp)")
    popUpModal.classList.toggle("active")
    document.querySelector("body").style.overflow = "auto"
    setTimeout(function () {
        document.querySelector("#JS_GenerateForm").innerHTML = ""
    }, 200)
}

/**
 * Toglle EditForm
 */
function toggleEditForm() {
    let switch_btn = document.querySelector(".modal__box .modal__header #JS_editModal")
    if (switch_btn !== null) {
        verifyToggle(switch_btn)
        switch_btn.addEventListener('click', () => {
            verifyToggle(switch_btn)
        })
    }

    function verifyToggle(switch_btn) {
        if (switch_btn.checked === false) {
            let allInput = document.querySelectorAll(".modal__body input")
            allInput.forEach((item) => {
                item.setAttribute('disabled', '')
            })

            let allSelect = document.querySelectorAll(".modal__body select")
            allSelect.forEach((item) => {
                item.setAttribute('disabled', '')
            })

            let allTextArea = document.querySelectorAll(".modal__body textarea")
            allTextArea.forEach((item) => {
                item.setAttribute('disabled', '')
            })

            let submitBtn = document.querySelectorAll(".modal__footer input")
            submitBtn.forEach((item) => {
                item.style.opacity = 0
                item.style.visibility = "hidden"
            })

            let requiredIcon = document.querySelectorAll(".modal__body [data-control*=noEmpty] + label + i")
            requiredIcon.forEach((item) => {
                item.style.opacity = 0
                item.style.visibility = "hidden"
                item.setAttribute('disabled', '')
            })

            let requiredIcon2 = document.querySelectorAll(".modal__body [data-control*=noEmpty] + .ss-main + label +i")
            requiredIcon2.forEach((item) => {
                item.style.opacity = 0
                item.style.visibility = "hidden"
                item.setAttribute('disabled', '')
            })

            let br = document.querySelector('.modal__body + br')
            if (br !== null) {
                br.style.display = "none"
            }
            let required__placeholder = document.querySelector(".required__placeholder")
            if (required__placeholder !== null) {
                required__placeholder.style.display = "none"
            }
        } else {
            let allInput = document.querySelectorAll(".modal__body input")
            allInput.forEach((item) => {
                item.removeAttribute('disabled')
            })

            let allSelect = document.querySelectorAll(".modal__body select")
            allSelect.forEach((item) => {
                if (item.getAttribute("forceDisabled") == null) {
                    item.removeAttribute('disabled')
                }
            })

            let allTextArea = document.querySelectorAll(".modal__body textarea")
            allTextArea.forEach((item) => {
                item.removeAttribute('disabled')
            })

            let submitBtn = document.querySelectorAll(".modal__footer input")
            submitBtn.forEach((item) => {
                item.style.opacity = 1
                item.style.visibility = "visible"
            })

            let requiredIcon = document.querySelectorAll(".modal__body [data-control*=noEmpty] + label + i")
            requiredIcon.forEach((item) => {
                item.style.opacity = 1
                item.style.visibility = "visible"
                item.removeAttribute('disabled')
            })

            let requiredIcon2 = document.querySelectorAll(".modal__body [data-control*=noEmpty] + .ss-main + label + i")
            requiredIcon2.forEach((item) => {
                item.style.opacity = 1
                item.style.visibility = "visible"
                item.removeAttribute('disabled')
            })
            let br = document.querySelector('.modal__body + br')
            if (br !== null) {
                br.style.display = "block"
            }

            let required__placeholder = document.querySelector(".required__placeholder")
            if (required__placeholder !== null) {
                required__placeholder.style.display = "flex"
            }
        }
    }
}
