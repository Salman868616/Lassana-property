document.querySelectorAll('[data-location-fields]').forEach((group) => {
    const district = group.querySelector('[name="district"]');
    const city = group.querySelector('[name="city"]');
    const options = Array.from(city.options).slice(1);
    const refresh = (keepSelection) => {
        const previous = keepSelection ? city.value : '';
        city.replaceChildren(new Option(district.value ? (group.dataset.cityPlaceholder || 'Select city (optional)') : (group.dataset.cityEmptyPlaceholder || 'Select a district first'), ''));
        options.filter(option => option.dataset.district === district.value).forEach(option => city.append(option.cloneNode(true)));
        city.value = previous;
        if (city.selectedIndex < 0) city.value = '';
    };
    district.addEventListener('change', () => refresh(false));
    refresh(true);
});
