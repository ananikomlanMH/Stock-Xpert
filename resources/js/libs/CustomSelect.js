// Custom Select
import SlimSelect from 'slim-select';
import '/node_modules/slim-select/dist/slimselect.min.css'

export function customSelect() {
    let allSelect = document.querySelectorAll('.custom-select')
    let allSelectTop = document.querySelectorAll('.custom-select-top')
    allSelect.forEach(item => {
        new SlimSelect({
            select: item,
            searchPlaceholder: 'Rechercher',
            searchText: 'Aucun resultat trouvé'
        });
    });

    allSelectTop.forEach(item => {
        new SlimSelect({
            select: item,
            searchPlaceholder: 'Rechercher',
            searchText: 'Aucun resultat trouvé',
            showContent: 'up'
        });
    });
}

export function customSelectByElement(element) {
    let allSelect = element.querySelectorAll('.custom-select')
    let allSelectTop = element.querySelectorAll('.custom-select-top')
    allSelect.forEach(item => {
        new SlimSelect({
            select: item,
            searchPlaceholder: 'Rechercher',
            searchText: 'Aucun resultat trouvé'
        });
    });

    allSelectTop.forEach(item => {
        new SlimSelect({
            select: item,
            searchPlaceholder: 'Rechercher',
            searchText: 'Aucun resultat trouvé',
            showContent: 'up'
        });
    });
}

export function customSelectByInput(element, direction = "down"){
    new SlimSelect({
        select: element,
        searchPlaceholder: 'Rechercher',
        searchText: 'Aucun Resultat',
        showContent: direction
    });
}