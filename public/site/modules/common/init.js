
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    '_token' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};
