function get_bookings(search = '', page = 1) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/booking_records.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.status === 200) {
            try {
                const data = JSON.parse(this.responseText);
                document.getElementById('table-data').innerHTML = data.table_data || '';
                document.getElementById('table-pagination').innerHTML = data.pagination || '';
            } catch (e) {
                console.error('Invalid JSON:', this.responseText);
            }
        } else {
            console.error('Request failed:', this.status);
        }
    };

    const params = `search=${encodeURIComponent(search)}&page=${encodeURIComponent(page)}&get_bookings=1`;
    xhr.send(params);
}



function change_page(page) {
    const searchInput = document.getElementById('search_input');
    const query = searchInput ? searchInput.value.trim() : '';
    
    // Call your data-fetching function with search query and page number
    get_bookings(query, page);
}

function download(id){
    window.location.href = 'generate_pdf.php?gen_pdf&id='+id;
}














    

window.onload = function()
{
get_bookings();

}